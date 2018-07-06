<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>
    <script type="text/javascript">
        function initMap() {
          <?php foreach ($locations as $location) { ?>
              var myLatLng = {lat: <?php echo $location['location_lat'] ?>, lng: <?php echo $location['location_lng'] ?>};
          <?php } ?>

           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 10,
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

                <div class="col-md-12">
                    <ul class="breadcrumb">
                      <li><a href="#"><?php echo $GLOBALS['home']; ?></a>
                        </li>
                        <li><?php echo $GLOBALS['event_details']; ?></li>
                    </ul>
                    <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success text-center removeIn3"> <?= $this->session->flashdata('success') ?> </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('failed')) { ?>
                    <div class="alert alert-danger text-center removeIn3"> <?= $this->session->flashdata('failed') ?> </div>
                    <?php } ?>

                </div>

                <?php foreach ($eventos as $evento) { ?>
                <div class="col-md-12">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <a class="text-center thumbnail fancybox" rel="group" href="<?php echo base_url('assets/img/') . $evento['eventos_image']; ?>">
                                    <img class="test-center media-object img-responsive" src="<?php echo base_url('assets/img/') . $evento['eventos_image']; ?>">
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="box" id="details">
                                <h2 class="text-center"><?php echo $evento['eventos_title']; ?></h2>
                                <!-- <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details</a> -->
                                <p class="goToDescription"><?php echo $evento['eventos_description']; ?></p>
                                <?php if(!empty($this->session->userdata('user_id'))) { ?>
                                <?php foreach ($locations as $location) { ?>
                                    <p>
                                      <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $location['location_name']; ?>
                                      <br>
                                      <br>
                                      <i class="fa fa-calendar-o"></i> <?php echo date("F jS Y", strtotime(substr($evento['eventos_timestamp'],0,10)));   ?>
                                    </p>
                                <?php } ?>

                                <p>
                                    <?php  $evento_id = $this->uri->segment(3);?>
                                    <a href="<?php echo base_url("Eventos_controller/view_attending/").$evento_id; ?>">
                                        Ver <?php echo $this->db->where('eventos_attend_id', $evento_id)->count_all_results('eventos_attend'); ?> ir a su evento
                                    </a>
                                </p>
                                <?php } ?>
                                <hr>
                                <div class="col-md-12">
                                  <div class="pull-right">
                                    <?php if(!empty($this->session->userdata('user_id'))) { ?>
                                    <?php $user_id = $this->session->userdata("user_id"); $evento_id = $evento['eventos_id']; ?>
                                            <?php
                                            $this->db->where('eventos_attend_user_id', $user_id);
                                            $this->db->where('eventos_attend_id', $evento_id);
                                            $buttons = $this->db->get('eventos_attend');
                                            ?>
                                                <?php if($buttons->num_rows() == 0) { ?>
                                                  <a class="btn btn-info btn-xs" href="<?php echo base_url("Eventos_controller/attend/") . $evento['eventos_id'] . "/" . $user_id; ?>"><?php echo $GLOBALS['attend']; ?></a>
                                                <?php } else { ?>
                                                  <a class="btn btn-warning btn-xs" href="<?php echo base_url("Eventos_controller/unattend/") . $evento['eventos_id'] . "/" . $user_id;  ?>"><?php echo $GLOBALS['unattend']; ?></a>
                                                <?php } ?>
                                      <?php } ?>
                                      <!-- <a class='btn btn-success' href='https://maps.google.com/?q=<?php //echo $evento_lat; ?>,<?php //echo $evento_lng; ?>' target='_blank'>Map</a> -->
                                      <?php foreach ($locations as $location) { ?>
                                        <!-- <i class="fa fa-map-marker" aria-hidden="true"></i> -->
                                      <a href="" class="btn btn-success btn-xs" data-toggle="modal" data-target="#show_map"><?php echo $GLOBALS['map']; ?></a>
                                      <!-- Modal -->
                                          <?php
                                              $lat = $location['location_lat'];
                                              $lng = $location['location_lng'];
                                           ?>
                                           <div id='show_map' class='modal fade' role='dialog'>
                                               <div class='modal-dialog'>
                                                   <!-- Modal content-->
                                                   <div class='modal-content'>
                                                       <div class='modal-header bg-primary'>
                                                         <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                         <h4 class='modal-title'>Location</h4>
                                                       </div>
                                                       <div class='modal-body'>
                                                            <div id='map' style='height:400px; width:100%;'></div>
                                                       </div>

                                                       <div class='modal-footer'>
                                                         <button type='button' class='btn btn-danger pull-left' data-dismiss='modal'>Close</button>
                                                          <a class='btn btn-info pull-right' href='https://maps.google.com/?q=$lat,$lng' target='_blank'>View full map</a>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                      <!-- Modal END -->
                                      <?php } ?>
                                          <?php if($evento['eventos_user_id'] == $this->session->userdata("user_id")) { ?>
                                                <div class="btn-group">
                                                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><?php echo $GLOBALS['edit']; ?><span class="caret"></span></button>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li><a href="<?php echo base_url('Eventos_controller/edit_evento_by_id/') . $evento['eventos_id']; ?>"><?php echo $GLOBALS['edit']; ?></a></li>
                                                    <li><a class="delete-alert" href="<?php echo base_url('Eventos_controller/delete_eventos_by_id/') . $evento['eventos_id']; ?>"><?php echo $GLOBALS['delete']; ?></a></li>
                                                  </ul>
                                                </div>
                                                <div class="break"></div>
                                      <?php } ?>
                                  </div>
                                </div>
                                      <!-- Load Facebook SDK for JavaScript -->
                                      <?php
                                            $seg3 = $this->uri->segment(3);
                                            $seg4 = $this->uri->segment(4);
                                        ?>
                                      <div class="fb-like" data-href="<?php echo base_url('Eventos_controller/details/') . "$seg3/$seg4"; ?>" data-width="160" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                      <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
                                        fjs.parentNode.insertBefore(js, fjs);
                                      }(document, 'script', 'facebook-jssdk'));</script>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="box" id="details">
                        <div class="comments">
                          <?php if(!empty($this->session->userdata('user_id'))) { ?>
                            <?php echo form_open(base_url("Eventos_controller/add_comment/".$this->uri->segment(3) . "/" . $this->session->userdata("user_id") . "/" . $evento['eventos_user_id'])); ?>
                            <label for="comment"><?php echo $GLOBALS['comments']; ?></label>
                                <div class="comment-wrap">
                                    <div class="comment-block" style="border: 1px solid grey;">
                                          <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Add comment..."></textarea>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-xs btn-primary pull-right"><?php echo $GLOBALS['add_comments']; ?></button>
                            <?php echo form_close(); ?>
                          <?php } ?>
                            <br>
                            <?php foreach ($comments as $comment) { ?>
                                <div class="comment-wrap">
                                    <div class="photo">
                                        <a class="img-circle avatar" rel="group" href="<?php echo base_url("Profile_controller/profile/") . $this->session->userdata('user_id');?>">
                                            <img class="media-object img-responsive img-circle" src="<?php echo base_url("assets/cropped_img/") . $comment['user_image_cropped'];?>">
                                        </a>
                                    </div>
                                    <div class="comment-block">

                                        <p class="comment-text"> <?php echo $comment['comment'] ?> </p>

                                        <div class="bottom-comment">
                                            <div class="comment-date"><?php echo $comment['comment_timestamp'] ?></div>
                                            <!-- <ul class="comment-actions">
                                                <li class="complain">Complain</li>
                                                <li class="reply">Reply</li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                          <?php  } ?>
                        </div>
                    </div>
                </div>

<?php } ?>


                <!-- /.col-md-12 main container -->
              </div>





                <?php $this->load->view('includes/footer');?>
