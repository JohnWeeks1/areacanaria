<?php

class User_model extends CI_Model {

    private $users_table = "users";
    private $user_table_id = "user_id";

    public function __construct() {
        parent::__construct();
    }

    public function create($data) {
        $this->db->insert($this->users_table, $data);
    }

    public function create_eventos($data) {
        $this->db->insert('eventos', $data);
    }

    public function all_users_for_search() {
      $this->db->order_by("user_firstname", "asc");
      $query = $this->db->get("users");
        return $query->result_array();
    }

    public function all_users() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->result_array();
    }

    public function get_user_by_email($user_email) {
        $query = $this->db->query("SELECT user_password, user_id FROM users WHERE user_email = '$user_email'");
        return $query->result_array();
    }

    public function get_by_id($id) {
      $query = $this->db->query("SELECT * FROM $this->users_table WHERE user_id = '$id'");
      return $query->result_array();
    }

    public function get_by_profile_category_id($id) {
      $query = $this->db->query("SELECT * FROM $this->users_table WHERE user_profile_or_business = $id");
      return $query->result_array();
    }

    public function delete_by_id($id) {
      $this->db->where($this->user_table_id, $id);
      $this->db->delete($this->users_table);
    }

    public function cropped_image($user_id, $data) {
      $this->db->where('user_id', $user_id);
      $this->db->update('users', $data);
    }

}
