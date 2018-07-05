<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                  <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
                </li>
                <li><?php echo $GLOBALS['view_attending']; ?></li>
            </ul>
        </div>
        <div class="container"></div>
          <div class="container-fluid">
              <div class="masonry-container">
                  <div class="col-xs-12 col-sm-4 col-md-2 masonry-sizer"></div>
                  <?php foreach ($users as $user) { ?>
                  <div class="col-xs-6 col-sm-4 col-md-2 masonry-item">
                <div class="panel panel-default panel-front">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="fancybox" rel="group" href="<?php echo base_url('assets/cropped_img/') . $user['user_image_cropped']; ?>">
                            <img class="media-object img-responsive" src="<?php echo base_url('assets/cropped_img/') . $user['user_image_cropped']; ?>">
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <h4><?php
                                  if($user['user_profile_or_business'] == 1) {
                                        echo $user['user_firstname'] . " " . $user['user_lastname'];
                                  } else {
                                        echo $user['user_business_name'];
                                  }
                            ?>
                        </h4>
                        <div class="text-right">
                            <a href="<?php echo base_url("Profile_controller/profile/") . $user['user_id']; ?>" class="btn btn-info btn-xs" role="button">
                              <?php
                                        if($user['user_profile_or_business'] == 1) {
                                              echo $GLOBALS["profile"];
                                        } else {
                                              echo $GLOBALS['business_profile'];
                                        }
                                  ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
      </div>

    </div>
<?php $this->load->view('includes/footer');?>
