<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Search_model extends CI_Model {

  public function __construct(){
    parent::__construct();

  }

  public function find($q){
    echo $q;
  }

}
?>
