<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>
<script type="text/javascript">
    function initMap() {
      <?php foreach ($locations as $location) { ?>
          var myLatLng = {lat: <?php echo $location['location_lat'] ?>, lng: <?php echo $location['location_lng'] ?>};
      <?php } ?>

       var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 11,
         center: myLatLng
       });


       var marker = new google.maps.Marker({
         position: myLatLng,
         map: map,
         title: '<?php echo $location['location_name'] ?>'
       });
     }
</script>
<div class="container">
    <div class="col-sm-12">
        <ul class="breadcrumb">
            <li>
              <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
            </li>
            <li><?php echo $GLOBALS['profile']; ?></li>
        </ul>
        <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success text-center removeIn3"> <?= $this->session->flashdata('success') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('failed')) { ?>
        <div class="alert alert-danger text-center removeIn3"> <?= $this->session->flashdata('failed') ?> </div>
        <?php } ?>
    </div>
</div>
<div class="container">
    <?php foreach ($users as $user) { ?>
    <div class="col-md-12" id="blog-listing">
        <div class="box">
            <div class="media">
                <div class="col-sm-3">
                    <a class="fancybox thumbnail center-block" rel="group" href="<?php  if(!empty($user['user_image_cropped'])) {echo base_url("assets/cropped_img/") . $user['user_image_cropped'];}else{echo ' https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg';} ?>">
                    <img class="media-object img-responsive" src="<?php  if(!empty($user['user_image_cropped'])) {echo base_url("assets/cropped_img/") . $user['user_image_cropped'];}else{echo ' https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg';} ?>">
                    </a>
                </div>
                <div class="col-sm-9">
                    <p class="date-comments">
                    <h2>
                      <?php
                        if($user['user_profile_or_business'] == 1) {
                            echo $user['user_firstname'] . " " . $user['user_lastname'];
                        } else {
                            echo $user['user_business_name'];
                        }
                      ?>
                   </h2>
                    </p>
                    <?php if($user['user_profile_or_business'] == 2) { ?>
                    <div class="media-body">
                      <div>
                          <p><?php echo $GLOBALS['position']; ?>: <b><?php echo $user['user_business_position']; ?></b> </p>
                      </div>
                        <div>
                            <h5><i class="fa fa-globe" aria-hidden="true"></i> <a target="_blank" type="button" href="<?php echo $user['user_business_website']; ?>"><?php echo $GLOBALS['business_website']; ?></a></h5>
                        </div>
                        <div>
                          <h5><?php echo $GLOBALS['about_us']; ?></h5>
                            <p><?php echo $user['user_business_description']; ?></p>
                        </div>
                        <?php } ?>
                        <hr>
                        <ul style="list-style-type: none;position: relative;right:40px;">
                          <?php if($user['user_profile_or_business'] == 2) { ?>
                            <li>
                                <?php foreach ($locations as $location) { ?>
                                <?php if(empty($location['location_evento_id']) && !empty($location['location_lat'])) { ?>
                                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <a href="" data-toggle="modal" data-target="#show_map"> <?php echo $GLOBALS['view_location']; ?></a>
                                <!-- Modal -->
                                <?php
                                    $lat = $location['location_lat'];
                                    $lng = $location['location_lng'];

                                        $CI =& get_instance();
                                        $CI->load->library('custom_modal');
                                        $CI->custom_modal->admin_modal(
                                          $modal_id_name = "show_map",
                                          $class = "modal-md",
                                          $id = "",
                                          $modal_title = "Location",
                                          $body = "

                                           <div id='map' style='height:400px; width:100%;'></div>

                                                  ",
                                          $footer = "<button type='button' class='btn btn-danger pull-left' data-dismiss='modal'>Close</button>
                                                    <a class='btn btn-info pull-right' href='https://maps.google.com/?q=$lat,$lng' target='_blank'>View full map</a>
                                          "
                                        );
                                     ?>
                                <!-- Modal END -->
                                <?php } ?>
                                <?php } ?>
                              </li>
                            <?php } ?>
                              <li>
                                <?php if($user['user_phone'] != 0) { ?>
                                  <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="" data-toggle="modal" data-target="#whatsappModalProfile<?php echo $user['user_id']; ?>">Whatsapp</a>
                                <!-- Modal -->
                                <?php
                                    $id = $user['user_id'];
                                    $user_phone = $user['user_phone'];
                                    $user_email = $user['user_email'];
                                    $CI =& get_instance();
                                    $CI->load->library('custom_modal');
                                    $CI->custom_modal->admin_modal(
                                      $modal_id_name = "whatsappModalProfile",
                                      $class = "",
                                      $id = "$id",
                                      $modal_title = "Whatsapp Message",
                                      $body = "<div class='form-group'>
                                                  <label for='phone'>Phone Number</label>
                                                  <input type='phone' class='form-control' id='phone' value='$user_phone' readonly>
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
                                <?php } ?>
                              </li>
                              <li>
                                <i class="fa fa-share" aria-hidden="true"></i>
                                <a href=""  data-toggle="modal" data-target="#email_person"><?php echo $GLOBALS['email']; ?></a>
                                <?php $link = base_url('Profile_controller/email_user/'); ?>
                                <!-- Modal -->
                                <div id='email_person' class='modal fade' role='dialog'>
                                    <div class='modal-dialog'>
                                        <!-- Modal content-->
                                        <div class='modal-content'>
                                            <div class='modal-header bg-primary'>
                                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                              <h4 class='modal-title'><?php if($user['user_profile_or_business'] == 1) { echo "Email"; } else { echo "Business Email"; } ?></h4>
                                            </div>
                                            <div class='modal-body'>
                                              <?php echo form_open(base_url("Profile_controller/email_user_from_profile/".$this->uri->segment(3))); ?>
                                              <div class='form-group'>
                                                  <label for='phone'><?php if($user['user_profile_or_business'] == 1) { echo "Email"; } else { echo "Business Email"; } ?></label>
                                                  <input type='phone' class='form-control' id='email' name="email" value="<?php echo $user['user_email']; ?>" readonly>
                                                </div>
                                                <div class='form-group'>
                                                  <label for='comment'><?php echo $GLOBALS['message']; ?></label>
                                                  <textarea class='form-control' rows='5' id='message' name="message"></textarea>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                    <button type='button' class='btn btn-danger pull-left' data-dismiss='modal'><?php echo $GLOBALS['close']; ?></button>
                                                    <button type="submit" class='btn btn-success pull-right'><?php echo $GLOBALS['send_email']; ?></button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal END -->
                            </li>
                            <br>
                            <!-- <li>
                                <p><span class="glyphicon glyphicon-envelope one"></span> <?php //echo $user['user_email']; ?></p>
                            </li> -->
                            <li>
                                <!-- <p> Date Of Joining: <?php //echo $user['user_timestamp']; ?> </p> -->
                            </li>
                            <li>
                              <?php if($user['user_profile_or_business'] == 1) { ?>
                                <?php if(!empty($user['user_facebook'])) { ?>
                                <a target="_blank" href="<?php echo $user['user_facebook']; ?>"><img src="<?php echo base_url('assets/site_img/facebook.png'); ?>" alt="Twitter"></a>
                                <?php } ?>
                                <?php if(!empty($user['user_twitter'])) { ?>
                                <a target="_blank" href="<?php echo $user['user_twitter']; ?>"><img src="<?php echo base_url('assets/site_img/twitter.png'); ?>" alt="Facebook"></a>
                                <?php } ?>
                              <?php } else { ?>
                                <?php if(!empty($user['user_business_facebook'])) { ?>
                                <a target="_blank" href="<?php echo $user['user_business_facebook']; ?>"><img src="<?php echo base_url('assets/site_img/facebook.png'); ?>" alt="Twitter"></a>
                                <?php } ?>
                                <?php if(!empty($user['user_business_facebook'])) { ?>
                                <a target="_blank" href="<?php echo $user['user_business_facebook']; ?>"><img src="<?php echo base_url('assets/site_img/twitter.png'); ?>" alt="Facebook"></a>
                                <?php } ?>
                              <?php } ?>

                            </li>
                        </ul>
                        <hr>
                        <?php if($this->session->userdata('user_id') == $user['user_id']) { ?>
                        <div class="pull-right">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit"><?php echo $GLOBALS['options']; ?></a>
                        </div>
                        <!-- Modal -->
                        <?php
                            $close = $GLOBALS['close'];
                            $profile = $GLOBALS['profile'];
                            $image = $GLOBALS['image'];
                            $location = $GLOBALS['location'];
                            $view_comments1 = $GLOBALS['view_comments'];
                            $profile_search1 = $GLOBALS['profile_search'];
                            $events_i_am_going_to = $GLOBALS['events_i_am_going_to'];
                            $edit_profile = base_url('Profile_controller/edit_profile/') . $user['user_id'];
                            $edit_location = base_url('Profile_controller/edit_location/') . $user['user_id'];
                            $edit_picture = base_url('Profile_controller/edit_picture/') . $user['user_id'];
                            $view_comments = base_url('Profile_controller/see_comments');
                            $profile_search = base_url("Profile_controller/profile_search");
                            $view_eventos_i_will_attend = base_url('Eventos_controller/i_will_attend/') . $user['user_id'];
                                $CI =& get_instance();
                                $CI->load->library('custom_modal');
                                $CI->custom_modal->admin_modal(
                                  $modal_id_name = "edit",
                                  $class = "",
                                  $id = "",
                                  $modal_title = "Edit",
                                  $body = "
                                  <div class='list-group text-center'>
                              				<a href='$edit_profile' class='list-group-item'>$profile</a>
                              				<a href='$edit_picture' class='list-group-item'>$image</a>
                              				<a href='$edit_location' class='list-group-item'>$location</a>
                                      <a href='$view_comments' class='list-group-item'>$view_comments1</a>
                                      <a href='$profile_search' class='list-group-item'>$profile_search1</a>
                                      <a href='$view_eventos_i_will_attend' class='list-group-item'>$events_i_am_going_to</a>
                                  </div>
                                          ",
                                  $footer = "<button type='button' class='btn btn-danger pull-left' data-dismiss='modal'>$close</button>"
                                );
                             ?>
                        <!-- Modal END -->
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container"></div>
<div class="container">
      <div class="col-xs-9">
          <h3><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $GLOBALS['my_events']; ?></h3>
          <a href="<?php echo base_url("Eventos_controller/eventos_by_user_id/") . $this->session->userdata("user_id"); ?>"><?php echo $GLOBALS['view_all_events_by']; ?></a>
      </div>
      <div class="container"></div>
    <div class="container-fluid">
        <div class="masonry-container">
            <div class="col-xs-12 col-sm-6 col-md-3 masonry-sizer"></div>
            <!-- left empty for column sizing -->
            <?php foreach ($eventos as $evento) { ?>
            <div class="col-xs-12 col-sm-6 col-md-3 masonry-item">
                <div class="panel panel-default panel-front">
                    <div class="panel-heading">
                        <!-- <h4 class="panel-title"><a HREF="#"><img src="<?php //echo base_url('assets/img/') . $related_product['product_image']?>"></a></h4> -->
                        <h4 class="panel-title">
                            <a class="fancybox" rel="group" href="<?php echo base_url('assets/img/') . $evento['eventos_image']; ?>">
                            <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $evento['eventos_image']; ?>">
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <h4><?php echo $evento['eventos_title']; ?></h4>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $evento['location_name']; ?>
                        <br>
                        <i class="fa fa-calendar-o"></i> <?php echo date("F jS Y", strtotime(substr($evento['eventos_timestamp'],0,10)));   ?>
                        <br>
                        <a href="<?php echo base_url("Eventos_controller/details/") . $evento['eventos_id'] . "/" . $this->uri->segment(3); ?>" class="btn btn-primary read-more btn-xs pull-right"><?php echo $GLOBALS['read_description']; ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container"></div>
<div class="container">
  <?php foreach ($users as $user) { ?>
      <?php if(!empty($user)) { ?>
              <div class="col-xs-12">
                  <h3><i class="fa fa-shopping-cart"></i> <?php echo $GLOBALS['my_products']; ?></h3>
                  <a href="<?php echo base_url("Products_controller/products_by_user_id/") . $user['user_id']; ?>"><?php echo $GLOBALS['view_all_products_by']; ?></a>
              </div>
      <?php } ?>
  <?php } ?>
  <div class="container"></div>
    <div class="container-fluid">
        <div class="masonry-container">
            <div class="col-xs-12 col-sm-6 col-md-3 masonry-sizer"></div>
            <?php foreach ($products as $product) { ?>
            <div class="col-xs-12 col-sm-6 col-md-3 masonry-item">
                <div class="panel panel-default panel-front">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="fancybox" rel="group" href="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                            <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <h4><?php echo $product['product_name']; ?></h4>
                        €<?php echo $product['product_cost']; ?>
                        <div class="text-right">
                            <a href="<?php echo base_url("Products_controller/product/") . $product['product_id']; ?>" class="btn btn-info btn-xs" role="button"><?php echo $GLOBALS['view_product']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer');?>
