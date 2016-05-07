<?php
Class Post_model extends CI_Model {
  protected $id;

  public function __construct() {

    parent::__construct();

    $this->get_user_account();

  }

  public function get_user_account(){
    $query = $this->db->query("SELECT * FROM `gg_accounts` WHERE `username`='".$this->session->username."'");

    $row = $query->row();

    $this->id = $row->gg_accid;
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
}
?>
