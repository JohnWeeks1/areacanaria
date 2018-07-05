<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Products_model");
		$this->load->library('pagination');

	}

	public function index(){
		$this->get_and_paginate(
														$name = "products",
														$model = 'Products_model',
														$table_count = "products",
														$limit = 30,
														$perpage = 30,
													  $uri_segment = 3,
													  $site_url = "Home_controller/index/",
													  $view = "home/home"
													 );
	}

	public function get_and_paginate($name, $model, $table_count, $limit = 30, $perpage, $uri_segment, $site_url, $view){
			$data["$name"] = $this->$model->select_all_for_pagination($limit = 30);
			$data['total_rows'] = $this->$model->pagination_count("$table_count",$perpage);
			$config['total_rows'] = $data['total_rows'];
			$config['per_page'] = $perpage;
			$config['uri_segment'] = $uri_segment;
			$config['base_url'] = site_url("$site_url");
			$this->pagination->initialize($config);
			$data['page_links'] = $this->pagination->create_links();
			$this->load->view("$view", $data);
	}

}
