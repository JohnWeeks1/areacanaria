<?php

class Comments_model extends CI_Model {

    private $comments_table = "comments";
    private $comments_table_id = "comment_id";

    public function __construct() {
        parent::__construct();
    }

    public function create($data) {
        $this->db->insert($this->comments_table, $data);
    }
    public function comments_by_eventos_id($evento_id) {
        $this->db->order_by("comment_timestamp", "DESC");
        $this->db->join("eventos","eventos.eventos_id = comments.comment_eventos_id", 'left');
        $this->db->join("users","users.user_id = $this->comments_table.comment_user_id", 'left');
        $this->db->where("comment_eventos_id", $evento_id);
        $query = $this->db->get($this->comments_table);
        return $query->result_array();
    }
    public function comments_by_profile_id($id) {
        $this->db->order_by("comment_timestamp", "DESC");
        $this->db->join("users","users.user_id = $this->comments_table.comment_profile_id", 'left');
        $this->db->where("comment_user_id", $id);
        $query = $this->db->get($this->comments_table);
        return $query->result_array();
    }
    public function delete_comment_by_id($id) {
      $this->db->where($this->comments_table_id, $id);
      $this->db->delete($this->comments_table);
    }
    public function delete_comment_by_evento_id($id) {
      $this->db->where("comment_eventos_id", $id);
      $this->db->delete("comments");
    }
}
