<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

<!-- <div id="accordion" class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. What is HTML?</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <p>HTML stands for HyperText Markup Language. HTML is the standard markup language for describing the structure of web pages. <a href="https://www.tutorialrepublic.com/html-tutorial/" target="_blank">Learn more.</a></p>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. What is Bootstrap?</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <p>Bootstrap is a sleek, intuitive, and powerful front-end framework for faster and easier web development. It is a collection of CSS and HTML conventions. <a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank">Learn more.</a></p>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. What is CSS?</a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="https://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
            </div>
        </div>
    </div>
</div> -->

<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
            </li>
            <li><?php echo $GLOBALS['profile']; ?></li>
            <li><?php echo $GLOBALS['edit_profile']; ?></li>
        </ul>
    </div>

    <div class="col-md-12">
        <div class="box">
            <?php if(validation_errors()) {  ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <h3><?php echo $GLOBALS['edit_profile']; ?></h3>

            <hr>
            <?php foreach ($users as $user) { ?>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12">
                  <ul class="nav nav-pills">
                      <li class="active"><a data-toggle="pill" href="#personal"><?php echo $GLOBALS['personal_profile']; ?></a></li>
                      <li><a data-toggle="pill" href="#business"><?php echo $GLOBALS['business_profile']; ?></a></li>
                  </ul>
                </div>

                      <div class="tab-content">
                        <div id="personal" class="tab-pane fade in active">
                          <p>
                            <?php echo form_open_multipart(base_url("Profile_controller/update/").$user['user_id']); ?>
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <h5><?php echo $GLOBALS['first_name']; ?></h5>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="user_firstname" name="user_firstname" placeholder="Firstname" value="<?php echo $user['user_firstname'];; ?>">
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <h5><?php echo $GLOBALS['last_name']; ?></h5>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Lastname" value="<?php echo $user['user_lastname'];; ?>">
                                  </div>
                              </div>
                            </div>
                              <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <h5><?php echo $GLOBALS['email']; ?></h5>
                                  <div class="form-group">
                                      <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" value="<?php echo $user['user_email']; ?>">
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <h5><?php echo $GLOBALS['mobile']; ?></h5>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="user_phone" name="user_phone" placeholder="Email" value="<?php echo $user['user_phone'];; ?>">
                                </div>
                            </div>
                          </div>
                              <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <h4><?php echo $GLOBALS['social_media']; ?></h4>
                              </div>
                            </div>
                              <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <h5><?php echo $GLOBALS['facebook']; ?></h5>
                                  <div class="form-group">
                                      <input type="url" class="form-control" id="user_facebook" name="user_facebook" placeholder="https://www.facebook.com/yourlink" value="<?php echo $user['user_facebook']; ?>">
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <h5><?php echo $GLOBALS['twitter']; ?></h5>
                                <div class="form-group">
                                    <input type="url" class="form-control" id="user_twitter" name="user_twitter" placeholder="https://twitter.com/yourlink" value="<?php echo $user['user_twitter'];; ?>">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6 col-md-offset-3">
                              <div class="form-group">
                                  <input type="hidden" class="form-control" id="user_profile_or_business" name="user_profile_or_business" placeholder="https://twitter.com/yourlink" value="1">
                              </div>
                          </div>
                        </div>
                          <div class="row">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> <?php echo $GLOBALS['upload']; ?></button>
                                </div>
                              </div>
                        </p>
                        </div>
                        <?php echo form_close(); ?>
                        <div id="business" class="tab-pane fade">
                          <p>
                            <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <h4><?php echo $GLOBALS['business_info']; ?></h4>
                            </div>
                          </div>
                          <?php echo form_open_multipart(base_url("Profile_controller/update_business/").$user['user_id']); ?>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <h5><?php echo $GLOBALS['business_name']; ?></h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="user_business_name" name="user_business_name" placeholder="Big LTD" value="<?php echo $user['user_business_name']; ?>">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <h5><?php echo $GLOBALS['business_position']; ?></h5>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="user_business_position" name="user_business_position" placeholder="CEO of a big business" value="<?php echo $user['user_business_position']; ?>">
                                  </div>
                              </div>
                            </div>
                          <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                <h5><?php echo $GLOBALS['business_description']; ?></h5>
                                  <div class="form-group">
                                    <textarea class="form-control" id="user_business_description" name="user_business_description" rows="5"><?php echo $user['user_business_description']; ?></textarea>
                                  </div>
                              </div>
                            </div>
                          <div class="row">
                          <div class="col-md-6 col-md-offset-3">
                            <h5><?php echo $GLOBALS['business_website']; ?></h5>
                              <div class="form-group">
                                  <input type="url" class="form-control" id="user_business_website" name="user_business_website" placeholder="https://google.com" value="<?php echo $user['user_business_website']; ?>">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                          <h5><?php echo $GLOBALS['facebook']; ?></h5>
                            <div class="form-group">
                                <input type="url" class="form-control" id="user_business_facebook" name="user_business_facebook" placeholder="https://www.facebook.com" value="<?php echo $user['user_business_facebook']; ?>">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <h5><?php echo $GLOBALS['twitter']; ?></h5>
                          <div class="form-group">
                              <input type="url" class="form-control" id="user_business_twitter" name="user_business_twitter" placeholder="https://twitter.com" value="<?php echo $user['user_business_twitter'];; ?>">
                          </div>
                      </div>
                    </div>
                        <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="user_profile_or_business" name="user_profile_or_business" value="2">
                            </div>
                        </div>
                      </div>
                      <?php } ?>
                        <div class="row">
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> <?php echo $GLOBALS['upload']; ?></button>
                              </div>
                            </div>
                            <?php echo form_close(); ?>
                          </p>
                        </div>
                      </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- /.container -->

<?php $this->load->view('includes/footer');?>
