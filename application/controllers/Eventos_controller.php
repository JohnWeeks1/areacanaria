<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos_controller extends CI_Controller {

  private $eventos_table = "eventos";
  private $eventos_time_created = "eventos_timestamp";

    public function __construct(){
		parent::__construct();
    $this->load->model('Eventos_model');
    $this->load->model('User_model');
    $this->load->model('Locations_model');
    $this->load->model('Comments_model');
    $this->load->library('pagination');
	}

  public function validation_rules_eventos() {
      /* Set validation rule for name field in the form */
      $this->form_validation->set_rules('eventos_title', 'Title', 'trim|required');
      $this->form_validation->set_rules('eventos_description', 'Description', 'required');
  }

  public function validation_rules_update_eventos($evento_id, $eventos_image) {
    $data = array(
        'eventos_title' => $this->input->post('eventos_title'),
        'eventos_id' => $evento_id,
        'eventos_last_edited_timestamp' => date('Y-m-d H:i:s'),
        'eventos_description' => $this->input->post('eventos_description'));
        if(!empty($eventos_image['file_name'])) {
            $data['eventos_image'] = $eventos_image['file_name'];
        }

      return $data;
  }

  public function validation_rules_location($evento_id) {

    $this->form_validation->set_rules('location_lng', 'Location', 'trim|required');
    $this->form_validation->set_rules('location_lat', 'Location', 'trim|required');
    $location = array(
        'location_lng' => $this->input->post('location_lng'),
        'location_lat' => $this->input->post('location_lat'),
        'location_user_id' => $this->session->userdata("user_id"),
        'location_evento_id' => $evento_id);

      return $location;
  }

	public function eventos(){
    $data['eventos'] = $this->Eventos_model->select_all_for_pagination($limit = 24);
    $data['total_rows'] = $this->Eventos_model->pagination_count($this->eventos_table,24);

    $config['total_rows'] = $data['total_rows'];
    $config['per_page'] = 24;
    $config['uri_segment'] = 3;
    $config['base_url'] = site_url("Eventos_controller/eventos/");

    //$data['locations'] = $this->Main_model->select_all($this->locations);

    //pagination.php has been created and place in config
    //pagination.php in config is used when calling the pagination library
    $this->pagination->initialize($config);
    $data['page_links'] = $this->pagination->create_links();
    //$data['eventos'] = $this->Eventos_model->get_eventos();
		$this->load->view('eventos/eventos', $data);
	}

  public function details($id) {
    $data['eventos'] = $this->Eventos_model->evento_by_id($id);
    $data['locations'] = $this->Locations_model->location_by_eventos_id($id);
    $data['comments'] = $this->Comments_model->comments_by_eventos_id($id);
    $this->load->view('eventos/evento_details', $data);
  }

  public function view_attending($evento_id) {
    $data['users'] = $this->Eventos_model->all_eventos_with_same_id($evento_id);
    $this->load->view('eventos/view_attending', $data);
  }

  public function i_will_attend($user_id) {
    $data['i_will_attend'] = $this->Eventos_model->all_eventos_attend_joined_eventos_user_id($user_id);
    $this->load->view('profile/eventos_i_will_attend', $data);
  }

  public function get_evento_by_evento_id($evento_id) {
      $data['eventos_by_id'] = $this->Eventos_model->evento_by_id($evento_id);
      $evento_user_id = $data['eventos_by_id'][0]['eventos_user_id'];
      $data['users_by_id'] = $this->User_model->get_by_id($evento_user_id);
      redirect(base_url('Eventos_controller/edit_evento/') . $evento_id);
  }

  public function attend($evento_id, $user_id) {
    $data = array(
      "eventos_attend_id" => $evento_id,
      "eventos_attend_user_id" => $user_id);
     $this->Eventos_model->attend_evento($data);
     $this->session->set_flashdata('success', "Vas a este evento");
     //$this->session->set_flashdata('success', "You are attending this evento");
     redirect(base_url("Eventos_controller/details/$evento_id"));
  }

  public function unattend($evento_id, $user_id) {
     $this->Eventos_model->unattend_evento($evento_id, $user_id);
     $this->session->set_flashdata('failed', "No vas a este evento");
     // $this->session->set_flashdata('failed', "You are not attending this evento");
     redirect(base_url("Eventos_controller/details/$evento_id"));
  }

  public function add_comment($evento_id, $user_id, $profile_id) {
    $this->form_validation->set_rules('comment', 'Comment', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('failed', "No puedes publicar un comentario vacío. Inténtalo de nuevo.");
        // $this->session->set_flashdata('failed', "You can't post an empty comment. Please try again.");
        redirect(base_url("Eventos_controller/details/$evento_id"));
    } else {
      $data = array(
          'comment' => $this->input->post('comment'),
          'comment_eventos_id' => $evento_id,
          'comment_profile_id' => $profile_id,
          'comment_user_id' => $user_id);
        $this->Comments_model->create($data);
        // $this->session->set_flashdata('success', "You just made a comment");
        $this->session->set_flashdata('success', "Acabas de hacer un comentario");
        redirect(base_url("Eventos_controller/details/$evento_id"));
    }
  }

  public function post_eventos(){
		$this->load->view('eventos/post_eventos');
	}

  public function delete_eventos_by_id($id){
    $user_id = $this->session->userdata('user_id');
    $data['eventos_by_id'] = $this->Eventos_model->evento_by_id($id);
    $evento_image = $data['eventos_by_id'][0]['eventos_image'];
    unlink("assets/img/$evento_image");
		$this->Eventos_model->delete_evento_by_id($id);
    // $this->session->set_flashdata('success', 'Your Evento was deleted');
    $this->session->set_flashdata('success', 'Tu Evento fue eliminado');
    redirect(base_url('Profile_controller/profile/') . $user_id);
	}

  public function create_eventos() {

    $this->form_validation->set_rules('eventos_title', 'Title', 'trim|required');
    $this->form_validation->set_rules('eventos_description', 'Description', 'required');
    $this->form_validation->set_rules('eventos_date', 'Date', 'trim|required');
    $this->form_validation->set_rules('eventos_time', 'Time', 'trim|required');
    $config['upload_path']          = './assets/img/';
    $config['allowed_types']        = 'jpg|jpeg|png|gif';
    //$config['max_size']             = 100;
    //$config['max_width']            = 1024;
    //$config['max_height']           = 768;
    $this->load->library('upload', $config);
    $this->upload->do_upload('eventos_image');
    $eventos_image = $this->upload->data();
    $eventos_date_and_time = $this->input->post('eventos_date') . " " . $this->input->post('eventos_time') . ":00";
    $data = array(
        'eventos_title' => $this->input->post('eventos_title'),
        'eventos_user_id' => $this->session->userdata('user_id'),
        'eventos_date_and_time' => $eventos_date_and_time,
        'eventos_timestamp' => date('Y-m-d H:i:s'),
        'eventos_description' => $this->input->post('eventos_description'));
        if(!empty($eventos_image['file_name'])) { $data['eventos_image'] = $eventos_image['file_name']; }

        if ($this->form_validation->run() == FALSE) {
             //your validation messages will be taken care of.
              $this->post_eventos();
           } else {
           $this->Eventos_model->create_eventos($data);
           $evento_id = $this->db->insert_id();
           $location = $this->validation_rules_location($evento_id);
           $this->Locations_model->create_location($location);
           redirect(base_url('Eventos_controller/eventos'));
          }


  }

  public function update($evento_id){

    $this->form_validation->set_rules('eventos_title', 'Title', 'trim|required');
    $this->form_validation->set_rules('eventos_description', 'Description', 'required');
    $this->form_validation->set_rules('eventos_date', 'Date', 'trim|required');
    $this->form_validation->set_rules('eventos_time', 'Time', 'trim|required');

    $config['upload_path']          = './assets/img/';
    $config['allowed_types']        = 'jpg|jpeg|png|gif';
    //$config['max_size']             = 100;
    //$config['max_width']            = 1024;
    //$config['max_height']           = 768;
    $this->load->library('upload', $config);
    $this->upload->do_upload('eventos_image');
    $eventos_image = $this->upload->data();
    $eventos_date_and_time = $this->input->post('eventos_date') . " " . $this->input->post('eventos_time') . ":00";

    $data = array(
        'eventos_title' => $this->input->post('eventos_title'),
        'eventos_date_and_time' => $eventos_date_and_time,
        'eventos_timestamp' => date('Y-m-d H:i:s'),
        'eventos_description' => $this->input->post('eventos_description'));
        if(!empty($eventos_image['file_name'])) { $data['eventos_image'] = $eventos_image['file_name']; }

    if ($this->form_validation->run() == FALSE) {
          $this->get_evento_by_evento_id($evento_id);
      } else {
          $this->Eventos_model->update_evento($data, $evento_id);
          if(!empty($this->input->post('location_lng'))) { $data1['location_lng'] = $this->input->post('location_lng'); }
          if(!empty($this->input->post('location_lat'))) { $data1['location_lat'] = $this->input->post('location_lat'); }
          if(!empty($this->input->post('location_name'))) { $data1['location_name'] = $this->input->post('location_name'); }
          if(!empty($this->input->post('location_lng'))) { $this->Locations_model->update_location_evento($data1, $evento_id);}

                    $title = $this->input->post('eventos_title');
          // $this->session->set_flashdata('success', "Your Evento $title has been updated");
          $this->session->set_flashdata('success', "Tu evento $title ha sido actualizado");
          $user_id = $this->session->userdata("user_id");
          redirect(base_url('Profile_controller/profile/'.$user_id));
      }
  }

  public function eventos_by_user_id($user_id) {
      $data['eventos'] = $this->Eventos_model->eventos_by_user_id($user_id);
      $this->load->view('eventos/eventos_by_user', $data);
  }

  public function edit_evento_by_id($evento_id){
    $data['eventos'] = $this->Eventos_model->evento_by_id($evento_id);
    $evento_user_id = $data['eventos'][0]['eventos_user_id'];
    $data['user'] = $this->User_model->get_by_id($evento_user_id);
    $this->load->view('eventos/edit_evento', $data);
  }

}
