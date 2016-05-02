<?php
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
    $this->load->view('user/header', $dataHeader);

    $this->form_validation->set_rules('post_message', 'Post', 'trim|required|htmlspecialchars');

    if($this->form_validation->run() === FALSE) {


      $data = $this->action->get_this_post($id);

      $this->load->view('user/post-update', $data);

    }else {

      $Post_data = $this->input->post('post_message');

      $this->action->update_this_post($id, $Post_data);

    }

    $this->load->view('user/footer');

  }
}
?>
