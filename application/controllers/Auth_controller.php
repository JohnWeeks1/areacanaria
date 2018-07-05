<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_controller extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('User_model');
			$this->load->model('Session_model');
		}

		private function validation_rules() {
					$data = array(
							'user_firstname' => $this->input->post('user_firstname'),
							'user_lastname' => $this->input->post('user_lastname'),
							'user_email' => $this->input->post('user_email'),
							'user_profile_or_business' => 1,
							'user_password' => $this->input->post('user_password'));
							$data['user_password'] = password_hash($data['user_password'], PASSWORD_BCRYPT);

				 /* Set validation rule for name field in the form */
				 $this->form_validation->set_rules('user_firstname', 'First Name', 'trim|required');
				 $this->form_validation->set_rules('user_lastname', 'Last Name', 'trim|required');
				 $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');
				 $this->form_validation->set_message('is_unique', 'The Email is already taken. Please use another.');
				 $this->form_validation->set_rules('user_password', 'Password', 'trim|required');

				return $data;
		}

		public function register(){
			$this->load->view('auth/register');
		}

		public function login_page(){
			$this->load->view('auth/login');
		}

		public function logout() {
				$this->session->unset_userdata('user_id');
				$this->session->unset_userdata('user_firstname');
				$this->session->unset_userdata('user_lastname');
				$this->session->unset_userdata('user_email');
				$this->session->unset_userdata('user_is_admin');
				$this->session->unset_userdata('user_loggedin');
				$this->session->sess_destroy();
				redirect(base_url(), "refresh");
		}

		public function register_user() {

				$data = $this->validation_rules();

				if($this->form_validation->run() == false){
		        //your validation messages will be taken care of.
		        $this->load->view('auth/register');
		    } else {
		        $this->User_model->create($data);
						$user_email = $this->input->post('user_email');
						$user_data = $this->User_model->get_user_by_email($user_email);
						// print_f($user_data["user_email"]);exit;
						$user_id = $user_data[0]['user_id'];
						$session = $this->Session_model->session_data($user_id);
						$newdata = array(
									'user_id'  => $session[0]['user_id'],
									'user_firstname'  => $session[0]['user_firstname'],
									'user_lastname'  => $session[0]['user_lastname'],
									'user_email'  => $session[0]['user_email'],
									'user_is_admin'  => $session[0]['user_is_admin'],
									'user_loggedin'  => TRUE
									);
						$this->session->set_userdata($newdata);
						$your_profile = "base_url('Profile_controller/profile/').$user_id;";
						$link = "<a target='_blank' href='$your_profile'>Your Profile</a>";
						//custom_email_helper
						  $this->send_email(
							$from = "jonathanweeks007@gmail.com",
							$to = "$user_email",
							$subject = "Welcome to Area Canaria."
						);

						redirect(base_url());
					}
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
       $this->email->message($this->load->view('templates/welcome_template',$info,true));
			// $this->email->attach(base_url() . "assets/site_img/area_canaria_logo.png", "inline");

       $this->email->set_mailtype('html');


       $this->email->send();

     }


	public function login() {
			/* Set validation rule for name field in the form */
			$this->form_validation->set_rules('user_email', 'Email', 'required');
			$this->form_validation->set_rules('user_password', 'Password', 'trim|required');

			if($this->form_validation->run() == false){
					$this->login_page();
			} else {
				$user_email = $this->input->post('user_email');
				$user_password = $this->input->post('user_password');

				$user_data = $this->User_model->get_user_by_email($user_email);
				// print_r($user_data);exit;
				if(empty($user_data)) {
					$this->session->set_flashdata('error', 'Email no encontrado. Por favor regístrese');
					$this->login_page();
				} else {

					$password = implode('',$user_data[0]);
					$hash = substr( $password, 0, 60 );
					if(password_verify($user_password, $hash)) {
							$user_id = $user_data[0]['user_id'];
							$session = $this->Session_model->session_data($user_id);
							$newdata = array(
										'user_id'  => $session[0]['user_id'],
										'user_firstname'  => $session[0]['user_firstname'],
										'user_lastname'  => $session[0]['user_lastname'],
										'user_email'  => $session[0]['user_email'],
										'user_is_admin'  => $session[0]['user_is_admin'],
										'user_loggedin'  => TRUE
										);
							$name = $newdata['user_firstname'] . " " . $newdata['user_lastname'];
							$this->session->set_userdata($newdata);
							$this->session->set_flashdata('welcome', "Welcome, $name");
							$user_id = $this->session->userdata("user_id");
							redirect(base_url("Profile_controller/profile/$user_id"));
					} else {
							$this->session->set_flashdata('error', 'Email o contraseña incorrecto Inténtalo de nuevo.');
							$this->login_page();
					}

				}
			}
		}
}
