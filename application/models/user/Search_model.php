<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Search_model extends CI_Model {

  public function __construct(){
    parent::__construct();

  }
  public function find($q, $selection){
    $data = array('username' => $q,'email' => $q);
    $query = $this->db->select('*')->from('gg_accounts')->where('role', 'normal_user_privilege')->like($data)->get();
    $row = $query->result_array();
    $data_list = array();
    foreach($row as $key => $value){
      $data_list[$key] = array(
        'UID' => $value['gg_accid'],
        'USN' => $value['username']
      );
    }
    return $data_list;
  }
  public function category($cat){
    switch ($cat) {
      case 'general':

        return 'general';
        break;
      case 'people':

        return 'people';
        break;
      case 'post':

        return 'post';
        break;
      case 'game':

        return 'game';
        break;
      default:

        return 'general';
        break;
    }

  }

}
?>
