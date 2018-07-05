<?php

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function update_profile($data, $user_id) {
      $this->db->where('user_id',$user_id);
      $this->db->set($data);
      $this->db->update('users');
    }

    public function update_location($data, $user_id) {
      $this->db->where('locations_user_id',$user_id);
      $this->db->set($data);
      $this->db->update('locations');
    }

    public function create_location($data) {
      $this->db->insert('locations',$data);
    }

    public function all_locations($user_id) {
      $this->db->where('locations_user_id',$user_id);
      $this->db->from('locations');
      $this->db->select('*');
    }

}
