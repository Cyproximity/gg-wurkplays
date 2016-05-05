<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_model extends CI_Model {

  protected $id;

  public function __construct(){
    parent::__construct();

    $this->load->helper('date');

    $this->get_user_account();
  }
  public function get_user_account(){
    $query = $this->db->query("SELECT * FROM `gg_accounts` WHERE `username`='".$this->session->username."'");

    $row = $query->row();

    $this->id = $row->gg_accid;
  }

  public function get_feeds(){
    $query = $this->db->query("SELECT * FROM `gg_post` WHERE `user_id`='".$this->id."' ORDER BY `gg_post`.`time` DESC");

    return $query->result_array();
  }

}

?>
