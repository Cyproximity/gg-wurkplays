<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Account_model extends CI_Model {

  protected $user;

  private $password;

  private $credential;

  public function __construct(){

    parent::__construct();

    $this->load->database();
    $this->load->library(array('encryption', 'session'));
    $this->load->helper(array('url'));

    $this->encryption->initialize(
      array(
        'cipher'  => 'aes-256',
        'mode'    => 'ctr'
      )
    );

    //setters
    $login_sessions = array(
      'role'  => 'guest'
    );

    $this->session->set_userdata($login_sessions);
  }

  public function is_account_register(){

    $this->user = $this->input->post('Usermail');

    $this->password = $this->encryption->encrypt($this->input->post('hiddenPassword'));
    $this->database_probe();

  }
  private function database_probe(){

    $str = "SELECT * FROM `gg_accounts` WHERE `username` = '".$this->user."'";

    $query = $this->db->query($str);

    $row = $query->row();

    if(isset($row)){

      $this->credential = array(
        'username'  => $row->username,
        'email'     => $row->email,
        'password'  => $row->password,
        'role'      => $row->role,
        'time'      => $row->time
      );

      $this->login_procedure();

      return TRUE;

    }else{

      $err = array(
        'flag' => FALSE,
        'error_message' => "The email or username that you've entered doesn't match any account."
      );

      $this->flag_error($err);

      return FALSE;
    }
  }
  private function login_procedure(){
    if($this->credential){
      $this->verify_password($this->credential['password']);
    }
  }
  protected function flag_error($err){
    $data['error'] = $err;
    $this->load->view('register/signin', $data);
  }
  protected function verify_password($password){

    if($this->encryption->decrypt($this->password) === $this->encryption->decrypt($password)){

      $user_data = array(
        'user_key'  =>  $this->credential['username'],
        'logged_in' =>  TRUE,
        'role'      =>  $this->credential['role'],
        'username'  =>  $this->credential['username'],
        'email'     =>  $this->credential['email']
      );

      $this->session->set_userdata($user_data);

      redirect('/dashboard/', 'location', 301);

    }else {
      $err = array(
        'flag' => FALSE,
        'error_message' => "The password you've entered is incorrect."
      );
      $this->flag_error($err);
      return FALSE;
    }

  }

}
?>
