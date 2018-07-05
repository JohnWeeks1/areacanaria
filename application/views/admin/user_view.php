<?php $this->load->view('admin/includes/header');?>
<?php $this->load->view('admin/includes/navbar');?>

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-12">
              <h2 class="page-header">
                  User by ID
              </h2>
          </div>
      </div>
      <!-- /.row -->

      <?php foreach ($users_by_id as $user_by_id) { ?>
          <div class="well">
              <div class="media">
                  <div class="col-md-4">
                      <img class="img-responsive" src="<?php echo base_url('assets/cropped_img/') . $user_by_id['user_image_cropped']; ?>">
                  </div>
                  <div class="col-md-8">
            		      <div class="media-body">
                          <ul class="list-group">
                              <li class="list-group-item"><b>User ID:</b> <?php echo $user_by_id['user_id']; ?></li>
                              <li class="list-group-item"><b>Name:</b> <?php echo $user_by_id['user_firstname'] . " " . $user_by_id['user_lastname']; ?></li>
                              <li class="list-group-item"><b>Admin:</b> <?php if($user_by_id['user_is_admin'] == 1) { echo "Level 1"; } else { echo "No"; }; ?></li>
                              <li class="list-group-item"><b>Email:</b> <?php echo $user_by_id['user_email']; ?></li>
                              <li class="list-group-item"><b>User Joined:</b> <?php echo $user_by_id['user_timestamp']; ?></li>
                          </ul>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#whatsappModal<?php echo $user_by_id['user_id']; ?>">Whatsapp</button>
                          <!-- <button type="button" class="btn btn-primary">Email</button> -->
                          <a href="<?php echo base_url('Admin_controller/delete_by_id/') . $user_by_id['user_id']; ?>" class="btn btn-danger delete-alert">Delete</a>
                          <!-- Modal -->
                          <?php
                              $id = $user_by_id['user_id'];
                              $user_phone = $user_by_id['user_phone'];
                              $CI =& get_instance();
                              $CI->load->library('custom_modal');
                              $CI->custom_modal->admin_modal(
                                $modal_id_name = "whatsappModal",
                                $class = "",
                                $id = "$id",
                                $modal_title = "Whatsapp Message",
                                $body = "<div class='form-group'>
                                            <label for='phone'>Phone Number</label>
                                            <input type='phone' class='form-control' id='phone' value='$user_phone'>
                                          </div>
                                          <div class='form-group'>
                                            <label for='comment'>Message</label>
                                            <textarea class='form-control' rows='5' id='message'></textarea>
                                          </div>",
                                $footer = "<button type='button' class='btn btn-danger pull-left' data-dismiss='modal'>Close</button>
                                           <a type='button' href='https://api.whatsapp.com/send' id='send_whatsapp_message' target='_blank' class='btn btn-success pull-right'>Send to user</a>"

                              );
                           ?>
                           <!-- Modal END -->
                      </div>
                      <!-- <a type="button" href="https://api.whatsapp.com/send?phone=447971642651&text=Another Test" target="_blank" class="btn btn-success pull-right">Send Message</a> -->
                  </div>
              </div>
          </div>
      <?php } ?>

<?php $this->load->view('admin/includes/footer');?>
