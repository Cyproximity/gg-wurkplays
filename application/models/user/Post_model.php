<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Post_model extends CI_Model {

  public $id;

  public $username;

  public function __construct() {

    parent::__construct();

    $this->get_user_account();

  }

  public function get_user_account(){

    $query = $this->db->select('*')->from('gg_accounts')->where('username', $this->session->username)->get();

    $row = $query->row();

    $this->id = $row->gg_accid;

    $this->username = $row->username;
  }

  public function delete_this_post($id) {

    $query = $this->db->where('post_id', $id)->delete('gg_post');

  }

  public function post_this_status($str){

    $data = array(
      'post' => $str,
      'time' => now(),
      'user_id' =>  $this->id
    );

    $this->db->insert('gg_post', $data);

    return $this->db->insert_id();
  }

  public function update_this_post($id, $data) {

    $query = $this->db->set('post', $data)
                      ->set('time', now())
                      ->where('post_id', $id)
                      ->update('gg_post');

   // redirect('/dashboard/', 'refresh', 301);
  }

  public function get_this_post($id) {

    $query = $this->db->select('*')->from('gg_post')->where('post_id', $id)->get();

    $row = $query->row();

    if(isset($row)) {

      $data = array(
        'post_id' => $row->post_id,
        'post_message' => $row->post
      );

      return $data;
    }
  }

  public function new_comment($user_id, $post_id, $comment){

    $data = array(
      'user_id' => $user_id,
      'post_id' => $post_id,
      'comment' => html_escape($comment),
      'time' => now()
    );

    $query = $this->db->insert('gg_comments',$data);
  }

  public function counted_comment($post_id){

    $query = $this->db->query("SELECT * FROM `gg_post` WHERE `post_id` = '".$post_id."'");

    $row = $query->row();

    if(isset($row)){

      $comments = $row->count_comment;
    }

    return $comments;
  }

  public function count_comment($post_id){

    $query = $this->db->query("SELECT * FROM `gg_post` WHERE `post_id` = '".$post_id."'");

    $row = $query->row();

    if(isset($row)){

      $counted_data = $row->count_comment;
    }

    $solution = $counted_data + 1;

    $query = $this->db->set('count_comment', $solution)->where('post_id', $post_id)->update('gg_post');

    return $solution;
  }

  public function get_individual_username($id){
    $query = $this->db->select('*')->from('gg_accounts')->where('gg_accid', $id)->get();

    $row =$query->row();

    if(isset($row)){
      return $row->username;
    }
  }

  public function get_comment($post_id, $user_id){

    if($post_id != null && $user_id != null){

      $query = $this->db->select('*')->from('gg_comments')->where('post_id', $post_id)->get();

      $data = array();

      if($query->num_rows() > 0) {
      //  echo $query->num_rows();
        foreach ($query->result() as $key => $row) {
          $username = $this->get_individual_username($row->user_id);

          $data[$key] = array(
            'SID' => $username,
            'PID' => $row->post_id,
            'CID' => $row->comment_id,
            'CC'  => $row->comment,
            'TS'  => timespan($row->time, time(), 2),
            'DATE'=> standard_date('DATE_RFC822',$row->time)
          );
        }
      }
      echo( json_encode($data) );
    ////
    }
    else{

      $error = array('status' => '400','error'  => 'Bad Request (400)');

      echo json_encode($error);
    }

  }

}
?>
