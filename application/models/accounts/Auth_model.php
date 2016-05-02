<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth_model extends CI_Model {

  private $privilege;

  public function AUTH_USER(){
    if($this->session->role === 'normal_user_privilege' && $this->session->logged_in === TRUE){
      redirect('/dashboard/', 'location', 301);
    }
  }
  public function AUTH_IS_LOGGED_IN(){
    if($this->session->role === 'guest'){
      show_404();
      $this->session->role = 'guest';
    }
  }

}
