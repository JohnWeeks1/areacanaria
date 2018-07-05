<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

    <div class="container">

        <div class="col-md-12">
          <ul class="breadcrumb">
              <li>
                  <a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a>
              </li>
              <li><?php echo $GLOBALS['comments']; ?></li>
          </ul>
        </div>

        <div class="col-md-12" id="basket">

            <div class="box">

                    <h3><?php echo $GLOBALS['my_comments']; ?></h3>
                    <!-- <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker" onchange="location = this.value;">
                          <option>Search Profile</option>
                          <?php //foreach ($comments as $comment) { ?>
                                  <option value="<?php //echo base_url() . 'Profile_controller/profile_search_result/' . $comment['user_id']; ?>"  onchange="this.form.submit()"><?php //echo $comment['user_firstname'] . " " . $comment['user_lastname'];?></option>
                          <?php //} ?>
                    </select> -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo $GLOBALS['receiver_image']; ?></th>
                                    <th><?php echo $GLOBALS['receiver_name']; ?></th>
                                    <th><?php echo $GLOBALS['message']; ?></th>
                                    <th><?php echo $GLOBALS['options']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($comments as $comment) { ?>
                                <tr>
                                    <td>
                                      <a class="fancybox center-block" rel="group" href="<?php  if(!empty($comment['user_image_cropped'])) {echo base_url("assets/cropped_img/") . $comment['user_image_cropped'];}else{echo ' https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg';} ?>">
                                          <img class="media-object img-responsive" src="<?php  if(!empty($comment['user_image_cropped'])) {echo base_url("assets/cropped_img/") . $comment['user_image_cropped'];}else{echo ' https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg';} ?>" style="height:60px;">
                                      </a>
                                    </td>
                                    <td><?php echo $comment['user_firstname'] . " " . $comment['user_lastname']; ?></td>
                                    <td>
                                      <?php echo $comment['comment']; ?>
                                    </td>
                                    <td>
                                      <a href="<?php echo base_url('Profile_controller/profile/'.$comment['comment_profile_id']) ?>" class="btn btn-primary btn-sm" type="button"><?php echo $GLOBALS['profile']; ?></a>
                                      <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#full_comment"><?php echo $GLOBALS['view_comment']; ?></a>
                                      <a class="btn btn-danger btn-sm delete-alert" href="<?php echo base_url('Profile_controller/delete_comment/'.$comment['comment_id']) ?>"><?php echo $GLOBALS['delete']; ?></a>
                                      <?php
                                              $close = $GLOBALS['close'];
                                              $comment = $comment['comment'];
                                              $CI =& get_instance();
                                              $CI->load->library('custom_modal');
                                              $CI->custom_modal->admin_modal(
                                                $modal_id_name = "full_comment",
                                                $class = "",
                                                $id = "",
                                                $modal_title = "Full comment",
                                                $body = " <div class='container'>
                                                            <p>$comment</p>
                                                          </div>",
                                                $footer = "<button type='button' class='btn btn-danger pull-left' data-dismiss='modal'>$close</button>"
                                              );
                                           ?>
                                    </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                  <!-- /.box -->
                </div>
            </div>
        </div>
<?php $this->load->view('includes/footer');?>
