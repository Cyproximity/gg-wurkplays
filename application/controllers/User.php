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
    $dataHeader = array(
      'title' => $this->session->username,
    );

    $this->load->view('user/basic_template/header', $dataHeader); # header block

    $this->load->view('user/basic_template/top-navigation'); # top mavigation block

    $this->load->view('user/dashboard/post'); # post block

    $feeds['news_feeds'] = $this->user->get_feeds();

    $this->load->view('user/dashboard/feeds', $feeds);

    $this->load->view('user/basic_template/footer');
  }

  public function post_status(){
    $this->load->model('user/Post_model', 'post');

    $this->form_validation->set_rules('post_content', '<b>Status</b>', 'trim|required');

    $data['posted_status'] = $this->input->post('post_content');

    if($this->form_validation->run() === FALSE){

      $data['success'] = false;
      $data['notification'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . validation_errors() . '</div>' ;

    }else{
      $id = $this->post->post_this_status($data['posted_status']);

      $data['success'] = true;
      $data['notification'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-success" role="alert"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Successfully Posted</div>';

      $delete = anchor('post/delete/'.$id, 'Delete', 'class="btn btn-default"');
      $edit = anchor('post/update/'.$id, 'Edit', 'class="btn btn-default"');

      $data['row'] = '<tr><td>'.$data['posted_status'].'</td><td>'.timespan(time(), 2).'</td><td>'.$edit.'</td><td>'.$delete.'</td></tr>';
    }

    echo json_encode($data);
  }


  public function user_account(){
    $dataHeader = array(
      'title' => 'Settings'
    );

    $this->load->view('user/basic_template/header', $dataHeader);  # header block

    $this->load->view('user/basic_template/top-navigation'); # top mavigation block

    $this->load->view('user/settings/settings');


    $this->load->view('user/basic_template/footer');
  }

  public function user_profile() {
    $dataHeader = array(
      'title' => 'Profile'
    );
    $this->load->view('user/basic_template/header', $dataHeader); # header block

    $this->load->view('user/basic_template/top-navigation'); # top mavigation block

    $this->load->view('user/profile/profile');

    $this->load->view('user/basic_template/footer');
  }

  public function logout(){

    $this->session->sess_destroy();

    redirect('/login/', 'location', 301);

  }

}

?>
