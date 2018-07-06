<?php

class Products_model extends CI_Model {

    private $products_table = "products";
    private $users_table = "users";
    private $user_table_id = "user_id";

    public function __construct() {
        parent::__construct();
    }


    public function select_all_for_pagination($limit) {

        $offset = $this->uri->segment(3);

        $this->db->order_by("product_id", "DESC");
        $this->db->limit($limit,$offset);
        $query = $this->db->get($this->products_table);

        return $query->result_array();
    }

    public function pagination_count($table,$limit = 30) {

        $query = $this->db->count_all_results($table);
        return $query;
    }


    public function create_product($data) {
        $this->db->insert($this->products_table, $data);
    }

    public function update_product($product_id, $data) {
      $this->db->where('product_id', $product_id);
      $this->db->update('products', $data);
    }

    public function get_all_products() {
        $this->db->order_by("product_id", "DESC");
        $this->db->join("$this->users_table","$this->users_table.user_id = $this->products_table.product_user_id", 'left');
        $query = $this->db->get($this->products_table);
        return $query->result_array();
    }

    public function related_products() {
        $this->db->limit(8);
        $this->db->join("$this->users_table","$this->users_table.user_id = $this->products_table.product_user_id", 'left');
        $query = $this->db->get($this->products_table);
        return $query->result_array();
    }

    public function product_by_id($product_id) {
        $this->db->join("$this->users_table","$this->users_table.user_id = $this->products_table.product_user_id", 'left');
        $this->db->where("product_id", $product_id);
        $query = $this->db->get($this->products_table);
        return $query->result_array();
    }

    public function delete_product_by_id($id){
        $this->db->where('product_id', $id);
        $this->db->delete('products');
    }

    public function products_by_user_id($user_id) {
        $this->db->order_by("product_id", "DESC");
        if(base_url("Profile_controller/profile/$user_id") == current_url()) { $this->db->limit(4); }
        $this->db->where("product_user_id", $user_id);
        $query = $this->db->get($this->products_table);
        return $query->result_array();
    }

    public function products_by_category_id($products_category_id) {
        $this->db->join("$this->users_table","$this->users_table.user_id = $this->products_table.product_user_id", 'left');
        $this->db->where("product_category_id", $products_category_id);
        $query = $this->db->get($this->products_table);
        return $query->result_array();
    }

}
