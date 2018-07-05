<?php

class Session_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        /* Load form session library */
        $this->load->library('session');
    }

    public function session_data($user_id) {
        $query = $this->db->query("SELECT * FROM users WHERE user_id = $user_id");
        return $query->result_array();
    }

}
