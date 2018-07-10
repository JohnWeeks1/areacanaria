<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Profile_model');
		$this->load->model('User_model');
		$this->load->model('Eventos_model');
		$this->load->model('Locations_model');
		$this->load->model('Products_model');
		$this->load->model('Comments_model');
	}

	private function validation_rules_profile() {
		 	  	 $this->form_validation->set_rules('user_firstname', 'Firstname', 'trim|required');
		 	  	 $this->form_validation->set_rules('user_lastname', 'Lastname', 'trim|required');
		 	  	 $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
	}

	private function validation_rules_business() {
					 $this->form_validation->set_rules('user_business_name', 'Firstname', 'trim|required');
					 $this->form_validation->set_rules('user_business_website', 'Lastname', 'trim|required');
					 $this->form_validation->set_rules('user_business_description', 'Email', 'trim|required');
	}

	private function validation_rules_profile2($user_image) {
			$data = array(
					'user_firstname' => $this->input->post('user_firstname'),
					'user_lastname' => $this->input->post('user_lastname'),
					'user_email' => $this->input->post('user_email'),
					'user_facebook' => $this->input->post('user_facebook'),
					'user_profile_or_business' => $this->input->post('user_profile_or_business'),
					'user_twitter' => $this->input->post('user_twitter'));
					$data['user_phone'] = $this->input->post('user_country_code') . $this->input->post('user_phone');

		return $data;
	}

	private function validation_rules_business2($user_image) {
			$data = array(
					'user_business_twitter' => $this->input->post('user_business_twitter'),
					'user_business_facebook' => $this->input->post('user_business_facebook'),
					'user_profile_or_business' => $this->input->post('user_profile_or_business'),
					'user_business_name' => $this->input->post('user_business_name'),
					'user_business_position' => $this->input->post('user_business_position'),
					'user_business_description' => $this->input->post('user_business_description'),
					'user_business_website' => $this->input->post('user_business_website'));
					//if(!empty($user_image['file_name'])) { $data['user_image'] = $user_image['file_name']; }

		return $data;
	}

	public function profile($id){
			$data['users'] = $this->User_model->get_by_id($id);
			$user_id = $this->uri->segment(3);
			$data['eventos'] = $this->Eventos_model->eventos_by_user_id($user_id);
			$data['locations'] = $this->Locations_model->location_by_user_id($user_id);
			$data['products'] = $this->Products_model->products_by_user_id($user_id);

			$this->load->view('profile/profile', $data, "refresh");
	}

	public function profile_search(){
		$data['users_all'] = $this->User_model->all_users_for_search();
		$this->load->view('profile/profile_search', $data);
	}

	public function profile_search_result($id){
		$data['users_all'] = $this->User_model->get_by_id($id);
		$this->load->view('profile/profile_search_result', $data);
	}

	public function business_search_result($id){
		$data['users_all'] = $this->User_model->get_by_id($id);
		$this->load->view('profile/business_search_result', $data);
	}

	public function see_comments(){
		$id = $this->session->userdata("user_id");
		$data['comments'] = $this->Comments_model->comments_by_profile_id($id);
		$this->load->view('profile/comments', $data);
	}

	public function delete_comment($id){
		$this->Comments_model->delete_comment_by_id($id);
		$this->session->set_flashdata('success', 'Tu comentario fue eliminado');
//		$this->session->set_flashdata('success', 'Your comment was deleted');

		redirect(base_url('Profile_controller/see_comments/'));
	}

	public function edit_profile($user_id) {
			 $data['users'] = $this->User_model->get_by_id($user_id);
			 $this->load->view('profile/edit_profile', $data);
	}

	public function edit_picture($user_id) {
			 $data['users'] = $this->User_model->get_by_id($user_id);
			 $this->load->view('profile/edit_picture', $data);
	}

	public function update_picture($user_id) {

		$user_image_cropped = $_POST['user_image_cropped'];

		list($type, $user_image_cropped) = explode(';', $user_image_cropped);
		list(, $user_image_cropped) = explode(',', $user_image_cropped);
		$user_image_cropped = base64_decode($user_image_cropped);

		$user_name = $this->session->userdata("user_firstname") . "_" . $this->session->userdata("user_lastname");
		$image_cropped = $user_name . '_Cropped.png';

		$path = base_url();
		$full_path = "assets/cropped_img/$image_cropped";

		$data1 = array('user_image_cropped' => $image_cropped);

		if (file_exists($full_path)) {

				delete_files($full_path);

				file_put_contents($full_path, $user_image_cropped);
				$this->User_model->cropped_image($user_id, $data1);

				redirect(base_url('Profile_controller/profile/'.$user_id));
		} else {
				file_put_contents($full_path, $user_image_cropped);
				$this->User_model->cropped_image($user_id, $data1);

				redirect(base_url('Profile_controller/profile/'.$user_id, 'refresh'));
	  }
	}

	public function edit_location($user_id) {
			 $data['users'] = $this->User_model->get_by_id($user_id);
			 $this->load->view('profile/edit_location', $data);
	}

	public function create_location($user_id) {
		/* Top of the page validation_rules() */
		$this->form_validation->set_rules('location_lng', 'Location Lng', 'trim|required');
		$this->form_validation->set_rules('location_lat', 'Location Lat', 'trim|required');

	 if ($this->form_validation->run() == FALSE) {
				 //your validation messages will be taken care of.
				 $this->edit_location($user_id);
			} else {
					$data = array(
							'location_user_id' => $user_id,
							'location_name' => $this->input->post('location_name'),
							'location_lat' => $this->input->post('location_lat'),
							'location_lng' => $this->input->post('location_lng'));
						$this->Locations_model->create_location($data);
						$this->session->set_flashdata('success', "Usted acaba de agregar una ubicación");
						redirect(base_url('Profile_controller/profile/'.$user_id));
			}
	}

	public function update_location($user_id) {
		/* Top of the page validation_rules() */
		$this->form_validation->set_rules('location_lng', 'Location Lng', 'trim|required');
		$this->form_validation->set_rules('location_lat', 'Location Lat', 'trim|required');

	 if ($this->form_validation->run() == FALSE) {
				 //your validation messages will be taken care of.
         $this->edit_location($user_id);
      } else {
					$data = array(
						'location_name' => $this->input->post('location_name'),
						'location_lat' => $this->input->post('location_lat'),
						'location_lng' => $this->input->post('location_lng'));
						$this->Locations_model->update_location($data);
					 	redirect(base_url('Profile_controller/profile/'.$user_id));
      }
	}

	public function update($user_id) {
		/* Top of the page validation_rules() */
		$data = $this->validation_rules_profile();

	 if ($this->form_validation->run() == FALSE) {
				 //your validation messages will be taken care of.
         $this->edit_profile($user_id);
      } else {
				$config['upload_path']          = './assets/img/';
				$config['allowed_types']        = 'jpg|jpeg|png|gif';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				$this->upload->do_upload('user_image');
				$user_image = $this->upload->data();
				/* Top of the page validation_rules2() */
				$data = $this->validation_rules_profile2($user_image);
			 $this->Profile_model->update_profile($data, $user_id);
			 redirect(base_url('Profile_controller/profile/'.$user_id));
      }
	}

	public function update_business($user_id) {
		/* Top of the page validation_rules() */
		$data = $this->validation_rules_business();

	 if ($this->form_validation->run() == FALSE) {
				 //your validation messages will be taken care of.
				 $this->edit_profile($user_id);
			} else {
				$config['upload_path']          = './assets/img/';
				$config['allowed_types']        = 'jpg|jpeg|png|gif';
				//$config['max_size']             = 100;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				$this->upload->do_upload('user_image');
				$user_image = $this->upload->data();
				/* Top of the page validation_rules2() */
				$data = $this->validation_rules_business2($user_image);
			 $this->Profile_model->update_profile($data, $user_id);
			 redirect(base_url('Profile_controller/profile/'.$user_id));
			}
	}

	public function email_user_from_profile($id) {
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('failed', "No puedes enviar un mensaje vacío. Inténtalo de nuevo.");
//				$this->session->set_flashdata('failed', "You cant send an empty message. Please try again.");

				redirect(base_url("Profile_controller/profile/$id"));
		} else {
				$user_email = $this->session->userdata("user_email");
				$user_firstname = $this->session->userdata("user_firstname");
				$user_lastname = $this->session->userdata("user_lastname");
				$email = $this->input->post("email");
				$message = $this->input->post("message");

					$this->send_email($from = $user_email,
														$to = $email,
														$subject = "Area Canaria message from $user_firstname $user_lastname",
														$messege = $message);
			  $this->session->set_flashdata('success', "Usted acaba de enviar un email a $user_firstname $user_lastname");
				//$this->session->set_flashdata('success', "You just sent an email to $user_firstname $user_lastname");
				redirect(base_url('Profile_controller/profile/'.$this->session->userdata("user_id")));
		}
	 }

	public function send_email($from, $to ,$subject, $messege) {
		//get main CodeIgniter object
		 $ci =& get_instance();

		 // $config = Array(
			//  'protocol' => 'smtp',
			//  'smtp_host' => 'ssl://smtp.gmail.com',
			//  'smtp_port' => 465,
			//  'smtp_user' => 'jonathanweeks007@gmail.com', // change it to yours
			//  'smtp_pass' => 'ForkLittle67!', // change it to yours
			//  // 'wordwrap' => TRUE
		 // );

		 //load email library
		 $this->load->library('email', $config);
		 $this->email->set_newline("\r\n");
		 //set email information and content
		 $info['message'] = $messege;
		 $info['name'] = $this->session->userdata("user_firstname") . " " . $this->session->userdata("user_lastname");
		 $info['sender_profile_link'] = base_url('Profile_controller/profile/') . $this->session->userdata("user_id");
		 $this->email->from("$from", 'Area Canaria');
		 $this->email->to($to);  // replace it with receiver mail id
		 $this->email->subject($subject); // replace it with relevant subject
		 $this->email->message($this->load->view('templates/contact_seller_profile_template',$info,true));
		// $this->email->attach(base_url() . "assets/site_img/area_canaria_logo.png", "inline");

		 $this->email->set_mailtype('html');


		 $this->email->send();

	 }


}
