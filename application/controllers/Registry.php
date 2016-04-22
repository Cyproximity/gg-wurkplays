<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Registry extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->library(array('session', 'form_validation'));
    $this->load->helper(array('form', 'url', 'html'));

    $this->AUTH->AUTH_USER();

    $this->load->model('accounts/Registration_model', 'regis');
    $this->load->model('accounts/Account_model', 'account');

  }
  public function register(){


    $this->load->view('templates/header');

    $this->form_validation->set_rules('Username', 'Username', 'required|trim|min_length[6]|max_length[16]|callback_username_check');

    $this->form_validation->set_rules('Email', 'Email', 'required|trim|valid_email|max_length[32]');

    $this->form_validation->set_rules('Password', 'Password', 'required|trim|min_length[8]|max_length[32]');

    $this->form_validation->set_rules('ConPassword', 'Confirm Password', 'trim|matches[Password]');

    if($this->form_validation->run() === FALSE) {

      $this->load->view('register/signup');

    }else {
      $this->load->view('register/information');
      $this->regis->create_account();
    }

    $this->load->view('templates/footer');

  }
  public function login(){

    $this->form_validation->set_rules('Usermail', 'Username or Email', 'required|trim');

    $this->form_validation->set_rules('hiddenPassword', 'Password', 'required|trim');

    $this->load->view('templates/header');

    if($this->form_validation->run() === FALSE) {
      $this->load->view('register/signin');
    }else{
      $this->account->is_account_register();
    }

    $this->load->view('templates/footer');

  }
  public function username_check($user){

    if($user ===  $this->regis->check_username($user)){
      $this->form_validation->set_message('username_check', 'The {field} already been used.');
      return FALSE;
    }else{
      return TRUE;
    }
  }
}
?>
