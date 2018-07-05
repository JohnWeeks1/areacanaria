<?php

class Locations_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function update_location($data) {
      $user_id = $this->session->userdata('user_id');
      $this->db->where('location_user_id',$user_id);
      $this->db->where('location_evento_id',0);
      $this->db->set($data);
      $this->db->update('locations');
    }

    public function update_location_evento($data, $evento_id) {
      $user_id = $this->session->userdata('user_id');
      $this->db->where('location_user_id',$user_id);
      $this->db->where('location_evento_id',$evento_id);
      $this->db->set($data);
      $this->db->update('locations');
    }

    public function create_location($data) {
      $this->db->insert('locations',$data);
    }

    public function all_locations($user_id) {
      $this->db->where('location_user_id',$user_id);
      $this->db->from('locations');
      $this->db->select('*');
    }

    public function location_by_user_id($id) {
      $this->db->where('location_evento_id', 0);
      $this->db->where('location_user_id', $id);
      $query = $this->db->get("locations");
      return $query->result_array();

    }

    public function location_by_eventos_id($id) {
      $user_id = $this->session->userdata("user_id");
      $this->db->where('location_user_id', $user_id);
      $this->db->where('location_evento_id', $id);
      $query = $this->db->get("locations");
      return $query->result_array();

    }

    public function delete_location_by_evento_id($id) {
      $this->db->where("location_evento_id", $id);
      $this->db->delete("locations");
    }

}
