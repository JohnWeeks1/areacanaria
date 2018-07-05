<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	private $eventos_table = "eventos";
	private $eventos_time_created = "eventos_timestamp";

	public function __construct(){
		parent::__construct();
		$this->load->model('Eventos_model');
		$this->load->model('Products_model');
		$this->load->model('User_model');
		$this->load->library('pagination');
	}

	public function index(){
		$data['user_count'] = $this->db->count_all('users');
		$data['evento_count'] = $this->db->count_all('eventos');
		$data['product_count'] = $this->db->count_all('products');
		$this->load->view('admin/index', $data);
	}
	public function eventos(){
    $data['eventos'] = $this->Eventos_model->select_all_for_pagination($limit = 24);
    $data['total_rows'] = $this->Eventos_model->pagination_count($this->eventos_table,24);

    $config['total_rows'] = $data['total_rows'];
    $config['per_page'] = 24;
    $config['uri_segment'] = 3;
    $config['base_url'] = site_url("Admin_controller/eventos/");

    //$data['locations'] = $this->Main_model->select_all($this->locations);

    //pagination.php has been created and place in config
    //pagination.php in config is used when calling the pagination library
    $this->pagination->initialize($config);
    $data['page_links'] = $this->pagination->create_links();
    //$data['eventos'] = $this->Eventos_model->get_eventos();
		$this->load->view('admin/eventos', $data);
	}
	public function products(){
		$data['products'] = $this->Products_model->select_all_for_pagination($limit = 30);
		$data['total_rows'] = $this->Products_model->pagination_count("products",30);

		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 30;
		$config['uri_segment'] = 3;
		$config['base_url'] = site_url("Admin_controller/products/");

		//$data['locations'] = $this->Main_model->select_all($this->locations);

		//pagination.php has been created and place in config
		//pagination.php in config is used when calling the pagination library
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();
		//$data['eventos'] = $this->Eventos_model->get_eventos();
		$this->load->view('admin/products', $data);
	}
	public function eventos_for_approval(){
		$this->load->view('admin/products_for_approval');
	}
	public function users(){
		$data['users'] = $this->User_model->all_users();
		$this->load->view('admin/users', $data);
	}
	public function contact_us(){
		$this->load->view('contact/contact_us');
	}
	public function contact_us_send(){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
				if($this->form_validation->run() == false){
						$this->load->view('contact/contact_us');
				} else {
						$name = $this->input->post("name");
						$subject = $this->input->post("subject");
						$email = $this->input->post("email");
						$message = $this->input->post("message");

						$this->email->from("$email", "$name");
						$this->email->to("area.canaria.info@gmail.com");
						$this->email->subject("$subject");
						$this->email->message("$message");
						$this->email->send();
						$this->session->set_flashdata("success", "Usted acaba de enviarnos un mensaje. ¡Estupendo! Nos pondremos en contacto con usted lo antes posible.");
						redirect(base_url("Home_controller"));
				}
	}
	public function eventos_view($evento_id){
		$data['eventos_by_id'] = $this->Eventos_model->evento_by_id($evento_id);
		$evento_user_id = $data['eventos_by_id'][0]['eventos_user_id'];
		$data['users_by_id'] = $this->User_model->get_by_id($evento_user_id);
		$this->load->view('admin/eventos_view', $data);
	}
	public function user_view($user_id){
		$data['users_by_id'] = $this->User_model->get_by_id($user_id);
		$this->load->view('admin/user_view', $data);
	}
	public function eventos_delete($id){
		$user_id = $this->uri->segment(4);
		$data['user_by_id'] = $this->User_model->get_by_id($user_id);
		$user_firstname = $data['user_by_id'][0]['user_firstname'];
		$user_lastname = $data['user_by_id'][0]['user_lastname'];
		$user_email = $data['user_by_id'][0]['user_email'];
		$data['eventos_by_id'] = $this->Eventos_model->evento_by_id($id);
		$evento_title = $data['eventos_by_id'][0]['eventos_title'];
		$user_profile = base_url("Profile_controller/profile/$user_id");
		//custom_email_helper
		$this->send_email(
								$from = "jonathanweeks007@gmail.com",
								$to = "$user_email",
								// $from = "$current_user_email",
								// $to = "$user_email" ,
								$subject = "Area Canaria"
							);
		$this->Eventos_model->delete_evento_by_id($id);
		$this->session->set_flashdata("success", "You just deleted an Evento by <a target='_blank' href='$user_profile'>$user_firstname $user_lastname</a>");
		redirect(base_url("Admin_controller/eventos"));
	}

	public function send_email($from, $to ,$subject) {
		//get main CodeIgniter object
		 $ci =& get_instance();

		 $config = Array(
			 'protocol' => 'smtp',
			 'smtp_host' => 'ssl://smtp.gmail.com',
			 'smtp_port' => 465,
			 'smtp_user' => 'jonathanweeks007@gmail.com', // change it to yours
			 'smtp_pass' => 'ForkLittle67!', // change it to yours
			 // 'wordwrap' => TRUE
		 );

		 //load email library
		 $this->load->library('email', $config);
		 $this->email->set_newline("\r\n");
		 //set email information and content
		 $info['name'] = $this->session->userdata("user_firstname");
		 $this->email->from("$from", 'Area Canaria');
		 $this->email->to($to);  // replace it with receiver mail id
		 $this->email->subject($subject); // replace it with relevant subject
		 $this->email->message($this->load->view('templates/delete_evento_template',$info,true));
		// $this->email->attach(base_url() . "assets/site_img/area_canaria_logo.png", "inline");

		 $this->email->set_mailtype('html');


		 $this->email->send();

	 }

	public function delete_by_id($id) {
			$data['users_by_id'] = $this->User_model->get_by_id($user_id);
			$user_email = $data['users_by_id'][0]['users_email'];
			$user_image = $data['users_by_id'][0]['users_image_cropped'];
			unlink(base_url("assets/cropped_img/$user_image"));
			$current_user_email = $this->session->userdata("user_email");
			//custom_email_helper
			send_email(
									$from = "jonathanweeks007@gmail.com",
									$to = "jonathanweeks007@gmail.com" ,
									// $from = "$current_user_email",
									// $to = "$user_email" ,
									$subject = "Area Canaria",
									$message = "Your profile has been deleted"
								);
			$this->User_model->delete_by_id($id);
			$this->session->sess_destroy();
			redirect(base_url("Admin_controller/users"));
	}
}
