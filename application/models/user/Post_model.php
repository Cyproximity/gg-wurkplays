<?php
Class Post_model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function delete_this_post($id) {

    $query = $this->db->where('post_id', $id)->delete('gg_post');

  }
  public function update_this_post($id, $data) {
    echo time();
    $query = $this->db->set('post', $data)
                      ->set('time', time())
                      ->where('post_id', $id)
                      ->update('gg_post');

   // redirect('/dashboard/', 'refresh', 301);
  }
  public function get_this_post($id) {

    $query = $this->db->select('*')->from('gg_post')->where('post_id', $id)->get();

    $row = $query->row();
    if(isset($row)) {
      $data = array(
        'post_id' => $row->post_id,
        'post_message' => $row->post
      );
      return $data;
    }
  }
}
?>
