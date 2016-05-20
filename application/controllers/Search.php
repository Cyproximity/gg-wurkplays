<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Search extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->AUTH->AUTH_IS_LOGGED_IN();

    $this->load->model('user/Search_model', 'search');
  }

  public function index(){
    $search = html_escape($this->input->get('_q'));

    $data = array(
      'title' => 'Search',
      'search_data' => $search
    );

    $this->load->view('user/basic_template/header', $data);
    $this->load->view('user/basic_template/top-navigation', $data);
    $this->search->find($search);
    $this->load->view('user/basic_template/footer', $data);
  }

}
?>
