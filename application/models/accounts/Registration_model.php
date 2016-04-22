<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Registration_model extends CI_Model {

  public function __construct(){

    parent::__construct();

    $this->load->database();
    $this->load->library('encryption');
    $this->load->helper('date');

    $this->encryption->initialize(
      array(
        'cipher'  => 'aes-256',
        'mode'    => 'ctr'
      )
    );

  }

  public function create_account(){
    $data = array(
      'username'  => $this->input->post('Username'),
      'email'     => $this->input->post('Email'),
      'password'  => $this->encryption->encrypt($this->input->post('Password')),
      'role'      => 'normal_user_privilege',
      'time'      => now()
      );

    $str = $this->db->insert_string('gg_accounts', html_escape($data));
    $query = $this->db->query($str);
  }

  public function check_username($user){
    $query = $this->db->query("SELECT * FROM `gg_accounts` WHERE `username` = '".$user."'");

    $row = $query->row();
    if(isset($row)){
      return $row->username;
    }else{
      return NULL;
    }

 }

}
?>
