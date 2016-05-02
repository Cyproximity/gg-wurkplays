<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_controller {
  public function __construct(){
    parent::__construct();
  }
  public function index(){
    redirect('/dashboard/', 'refresh', 301);
  }
}
?>
