<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->AUTH->AUTH_IS_LOGGED_IN();
    $this->load->library('form_validation');
    $this->load->model('user/User_model', 'user');
  }

  public function dashboard(){
    //var_dump($this->session->userdata);

    $dataHeader = array(
      'title' => $this->session->username,
    );
    $data = array();

    $this->load->view('user/header', $dataHeader);

    $this->form_validation->set_rules('post_message', 'Post', 'trim|required|htmlspecialchars');

    $this->load->view('user/dashboard', $data);

    if($this->form_validation->run() === FALSE){

      $this->load->view('user/post', $data);

    }else{

      $this->user->user_post_message($this->input->post('post_message'));

      redirect('/dashboard/', 'refresh', 301);
    }

    $feeds['news_feeds'] = $this->user->get_feeds();

    $this->load->view('user/feeds', $feeds);
    $this->load->view('user/footer');
  }

  public function user_account(){
    $dataHeader = array(
      'title' => 'Settings'
    );

    $this->load->view('user/header', $dataHeader);

    $this->load->view('user/settings');

    $this->load->view('user/footer');
  }

  public function user_profile() {
    $dataHeader = array(
      'title' => 'Profile'
    );
    $this->load->view('user/header', $dataHeader);

    $this->load->view('user/profile');

    $this->load->view('user/footer');
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('/login/', 'location', 301);
  }
}

?>
