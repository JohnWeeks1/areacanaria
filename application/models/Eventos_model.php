<?php

class Eventos_model extends CI_Model {

  private $eventos_table = "eventos";
  private $users_table = "users";
  private $locations_table = "locations";
  private $evento_id = "eventos_id";
  private $eventos_time_created = "eventos_timestamp";

    public function __construct() {
        parent::__construct();
    }

    public function create_eventos($data) {
        $this->db->insert($this->eventos_table, $data);
    }

    public function update_evento($data, $evento_id) {
      $this->db->where($this->evento_id,$evento_id);
      $this->db->set($data);
      $this->db->update($this->eventos_table);
    }

    public function select_all_for_pagination($limit) {

        $offset = $this->uri->segment(3);
        $this->db->order_by($this->eventos_time_created, "DESC");
        $this->db->limit($limit,$offset);
        $this->db->join("$this->users_table","$this->users_table.user_id = $this->eventos_table.eventos_user_id", 'left');
        $this->db->join("$this->locations_table","$this->locations_table.location_evento_id = $this->eventos_table.eventos_id", 'left');
        $query = $this->db->get($this->eventos_table);

        return $query->result_array();
    }

    public function pagination_count($table,$limit = 24) {

        $query = $this->db->count_all_results($table);
        return $query;
    }

    public function attend_evento($data) {
        $this->db->insert("eventos_attend", $data);
    }

    public function unattend_evento($evento_id, $user_id) {
        $this->db->where('eventos_attend_user_id', $user_id);
        $this->db->where('eventos_attend_id', $evento_id);
        $this->db->delete('eventos_attend');
    }

    public function all_eventos_with_same_id($evento_id) {
        $this->db->join('users','users.user_id = eventos_attend.eventos_attend_user_id', 'left');
        $this->db->where("eventos_attend_id", $evento_id);
        $query = $this->db->get("eventos_attend");
        return $query->result_array();
    }
    public function all_eventos_attend_joined_eventos_user_id($user_id) {
        $this->db->order_by('eventos_attend_id','DESC');
        $this->db->where("eventos_attend_user_id", $user_id);
        $query = $this->db->get("eventos_attend");
        return $query->result_array();
    }

    public function get_eventos() {
        $this->db->select("*");
        $this->db->from('eventos');
        $this->db->join('users','users.user_id = eventos.eventos_user_id');
        $query = $this->db->get();
        return $query;
    }

    public function eventos_by_user_id($id) {
        $this->db->where('eventos_user_id', $id);
        if(base_url("Profile_controller/profile/$id") == current_url()) { $this->db->limit(4); }
        $this->db->join('locations', 'locations.location_evento_id = eventos.eventos_id');
        $this->db->order_by($this->eventos_time_created, "DESC");
        $query = $this->db->get('eventos');
        return $query->result_array();
    }

    public function eventos_attend_by_user_id($eventos_id) {
        $this->db->where('eventos_attend_id', $eventos_id);
        $query = $query = $this->db->get('eventos_attend');
        return $query->result_array();
    }

    public function evento_by_id($evento_id) {
        $this->db->order_by('eventos_timestamp','DESC');
        $this->db->join('locations', 'eventos.eventos_id = locations.location_evento_id', 'left');
        $this->db->where('eventos_id', $evento_id);
        $query = $this->db->get('eventos');
        return $query->result_array();
    }
    public function evento_attend_by_id($evento_id) {
        $this->db->where('eventos_attend_id', $evento_id);
        $query = $this->db->get('eventos_attend');
        return $query->result_array();
    }

    public function delete_evento_by_id($id){
        $this->db->where('eventos_id', $id);
        $this->db->delete('eventos');
    }

    public function delete_evento_attend_by_id($id){
        $this->db->where('eventos_attend_id', $id);
        $this->db->delete('eventos_attend');
    }

}
