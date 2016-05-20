<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Post extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->AUTH->AUTH_IS_LOGGED_IN();

    $this->load->library('form_validation');

    $this->load->model('user/Post_model', 'action');

  }

  public function delete_post($id){

    $this->action->delete_this_post($id);

    redirect('/dashboard/', 'refresh', 301);
  }

  public function update_post($id){
    $dataHeader = array(
      'title' => $this->session->username,
    );
    $this->load->view('user/basic_template/header', $dataHeader);

    $this->form_validation->set_rules('post_message', 'Post', 'trim|required|htmlspecialchars');

    if($this->form_validation->run() === FALSE) {


      $data = $this->action->get_this_post($id);

      $this->load->view('user/dashboard/post-update', $data);

    }else {

      $Post_data = $this->input->post('post_message');

      $this->action->update_this_post($id, $Post_data);

      redirect('/dashboard/', 'location', 301);
    }

    $this->load->view('user/basic_template/footer');

  }

  public function comment_send(){

    $this->form_validation->set_rules('comment', 'comment', 'trim|required|htmlspecialchars');

    $comment  = $this->input->post('comment');
    $postid   = $this->input->post('post_id');

    if($this->form_validation->run() === FALSE){

      $data['status']   =  'error';
      $data['message']  = '<div class="alert alert-danger alert-dismissable" role="alert"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.validation_errors().'</div>';

      $data['SID'] = $this->action->id;

      $data['access']   = FALSE;
    }else{

      $template = '<dl class="dl-horizontal"><dt>'.$this->action->username.'</dt><dd>'.$comment.'</dd></dl>';

      $data = array(
        'access'  => TRUE,
        'status'  => 'success',
        'message' => $template,
        'SID'     => $this->action->id,
        'PID'     => $postid,
        'USERNAME'=> $this->action->username,
        'timespan'=> now(),
        'test'    => $this->action->count_comment($postid)
      );
      /////////////////////////// $user_id, $post_id, $comment
      $this->action->new_comment($this->action->id, $postid, $comment);
    }
    echo json_encode($data);
  }

  public function comment_get() {

    $this->output->set_header('Content-Type: application/json; charset="UTF-8"');
    $this->output->set_header('pragma: no-cache');

    $data = array(
        'key'     => html_escape( $this->input->get('key') ),
        'user_id' => html_escape( $this->input->get('user_id') ),
        'post_id' => html_escape( $this->input->get('post_id') )
    );
    if($data['key'] == TRUE){
      $this->action->get_comment($data['post_id'], $data['user_id']);
    }
    else{
      $error = array('status' => '400','error'  => 'Bad Request (400)');
      echo json_encode($error);
    }
  }
}
?>
