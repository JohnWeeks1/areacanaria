<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Products_model");
        $this->load->model("User_model");
    }

    private function validation_rules()
    {
        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('product_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('product_category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('product_description', 'Description', 'trim|required');
        $this->form_validation->set_rules('product_cost', 'Cost', 'trim|required');
    }

    public function product($product_id)
    {
        $_SESSION['current_url'] = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $data['products']         = $this->Products_model->product_by_id($product_id);
        $data['related_products'] = $this->Products_model->related_products();
        $this->load->view('products/product', $data);
    }

    public function products_by_user_id($user_id)
    {
        $data['products'] = $this->Products_model->products_by_user_id($user_id);
        $this->load->view('products/products_by_user', $data);
    }

    public function edit_deportes($product_id)
    {
        $data['products'] = $this->Products_model->product_by_id($product_id);
        $this->load->view('deportes/edit_deportes', $data);
    }

    public function post_deportes()
    {
        $this->load->view('deportes/post_deportes');
    }

    public function products_by_category()
    {
        $products_category_id = $this->uri->segment(3);
        $data['products']     = $this->Products_model->products_by_category_id($products_category_id);
        $this->load->view("products/products_by_category", $data);
    }

    public function create_product()
    {
        $this->validation_rules();
        if ($this->form_validation->run() == false) {
            $this->load->view('deportes/post_deportes');
        } else {
            $config['upload_path']   = './assets/img/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']             = 700;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $this->load->library('upload', $config);
            $this->upload->do_upload('product_image');
            $product_image = $this->upload->data();
            //print_r($product_image);exit;
            $data          = array(
                'product_user_id' => $this->session->userdata('user_id'),
                'product_category_id' => $this->input->post('product_category_id'),
                'product_description' => $this->input->post('product_description'),
                'product_cost' => $this->input->post('product_cost'),
                'product_name' => $this->input->post('product_name')
            );

            if (!empty($product_image['file_name'])) {
                $data['product_image'] = $product_image['file_name'];
                $this->Products_model->create_product($data);
                $current_user_id = $this->session->userdata("user_id");
                redirect(base_url("Profile_controller/profile/$current_user_id"));

            } else {
                $this->form_validation->set_message('product_image', 'Por favor proporcione una imagen.');
//                $this->form_validation->set_message('product_image', 'Please provide an Image.');


            }

        }

    }

    public function update_product($product_id)
    {
        $this->validation_rules();
        if ($this->form_validation->run() == false) {
            $this->load->view('deportes/post_deportes');
        } else {
            $config['upload_path']   = './assets/img/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']             = 700;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $this->load->library('upload', $config);
            $this->upload->do_upload('product_image');
            $product_image = $this->upload->data();
            //print_r($product_image);exit;
            $data  = array(
                'product_category_id' => $this->input->post('product_category_id'),
                'product_description' => $this->input->post('product_description'),
                'product_cost' => $this->input->post('product_cost'),
                'product_name' => $this->input->post('product_name')
            );
            if (!empty($product_image['file_name'])) { $data['product_image'] = $product_image['file_name']; }
                $this->Products_model->update_product($product_id, $data);
                $current_user_id = $this->session->userdata("user_id");
                redirect(base_url("Profile_controller/profile/$current_user_id"));
        }

    }

    public function contact_seller()
    {
        $user_id          = $this->uri->segment(3);
        $product_id       = $this->uri->segment(4);
        $data['users']    = $this->User_model->get_by_id($user_id);
        $data['products'] = $this->Products_model->product_by_id($product_id);
        $this->load->view('products/contact_seller', $data);
    }

    public function message_seller($seller_id, $product_id)
    {
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() == false) {
            $this->contact_seller();
        } else {
            $data['seller']   = $this->User_model->get_by_id($seller_id);
            $data['products'] = $this->Products_model->product_by_id($product_id);
            $seller_email     = $data['seller'][0]['user_email'];
            $seller_name      = $data['seller'][0]['user_firstname'] . ' ' . $data['seller'][0]['user_lastname'];
            $seller_firstname = $data['seller'][0]['user_firstname'];
            $buyer_name       = $this->session->userdata('user_firstname') . " " . $this->session->userdata('user_lastname');
            $product_name     = $data['products'][0]['product_name'];
            $current_url = current_url();
            $profile_link_id = base_url("Profile_controller/profile/") . $seller_id;
            $product_link_id = base_url("Products_controller/product/") . $product_id;
            $message = $this->input->post("message");
            $this->send_email_contact_seller(
                                              $from = $this->session->userdata('user_email'),
                                              $to = $seller_email,
                                              $subject = "Product interest",
                                              $seller_firstname = $seller_firstname,
                                              $buyer_name = $buyer_name,
                                              $product_name = $product_name,
                                              $message = $message,
                                              $current_url = $current_url,
                                              $profile_link_id = $profile_link_id,
                                              $product_link_id = $product_link_id
                                            );
            $this->session->set_flashdata('success', "Usted acaba de enviar un mensaje a $seller_name");
//            $this->session->set_flashdata('success', "You just sent a message to $seller_name");

            $id = $this->session->userdata('user_id');
            redirect(base_url("Profile_controller/profile/$id"));
        }
    }

    public function delete_product_by_id($id){
      $user_id = $this->session->userdata('user_id');
      $data['products'] = $this->Products_model->product_by_id($id);
      $product_image = $data['products'][0]['product_image'];
      unlink("assets/img/$product_image");
      $this->Products_model->delete_product_by_id($id);
      $this->session->set_flashdata('success', 'Your product was deleted');
      redirect(base_url('Profile_controller/profile/') . $user_id);
    }

    public function send_email_contact_seller(
        $from,
         $to,
         $subject,
         $seller_firstname,
         $buyer_name,
         $product_name,
         $message,
         $current_url,
         $profile_link_id,
         $product_link_id
       ) {

        $ci =& get_instance();

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'area.canaria.info@gmail.com', // change it to yours
            'smtp_pass' => '@re@c@n@ri@2018' // change it to yours
            // 'wordwrap' => TRUE
        );

        //load email library
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        //set email information and content
        $info['name']       = $seller_firstname;
        $info['buyer_name'] = $buyer_name;
        $info['product']    = $product_name;
        $info['message']    = $message;
        $info['link'] = $current_url;
        $info['profile_link_id'] = $profile_link_id;
        $info['product_link_id'] = $product_link_id;
        $this->email->from("$from", 'Area Canaria');
        $this->email->to($to); // replace it with receiver mail id
        $this->email->subject($subject); // replace it with relevant subject
        $this->email->message($this->load->view('templates/contact_seller_template', $info, true));
        //$this->email->attach(base_url() . "assets/site_img/area_canaria_logo.png", "inline");
        $this->email->set_mailtype('html');
        $this->email->send();


    }

}
