<?php $this->load->view('admin/includes/header');?>
<?php $this->load->view('admin/includes/navbar');?>

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-12">
              <h2 class="page-header">
                  Eventos
              </h2>
          </div>
      </div>
      <!-- /.row -->


      <?php foreach ($eventos_by_id as $evento_by_id) { ?>

      <div class="well">
          <div class="media">
              <div class="col-md-4">
                  <a class="pull-left fancybox" rel="group" href="<?php echo base_url('assets/img/') . $evento_by_id['eventos_image']; ?>">
                      <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $evento_by_id['eventos_image']; ?>">
                  </a>
              </div>
              <div class="col-md-8">
        		      <div class="media-body">
              		<h4 class="media-heading"><?php echo $evento_by_id['eventos_title']; ?>
                    <h5> By
                      <?php foreach ($users_by_id as $user_by_id) { ?>
                        <a href="#"><?php echo $user_by_id['user_firstname'] . " " . $user_by_id['user_lastname']; ?></a>
                      <?php } ?>
                    </h5>
                  </h4>
                      <p><?php echo $evento_by_id['eventos_description']; ?></p>
                      <ul class="list-inline list-unstyled">
        			            <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $evento_by_id['eventos_timestamp']; ?> </span></li>
                          <li>|</li>
                          <!--<span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                          <li>|</li>
                          <li>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star-empty"></span>
                          </li>
                          <li>|</li>
                          <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                          <!-- <li>
                            <span><i class="fa fa-facebook-square"></i></span>
                            <span><i class="fa fa-twitter-square"></i></span>
                            <span><i class="fa fa-google-plus-square"></i></span>
                          </li> -->
                          <?php foreach ($users_by_id as $user_by_id) { ?>
                              <li>
                                  <!-- <a href="<?php //echo base_url('Admin_controller/approve/'.$evento_by_id['eventos_id']) ?>" class="btn btn-success btn-sm" type="button">Approve</a>  -->
                                  <a href="<?php echo base_url('Admin_controller/eventos_delete/').$evento_by_id['eventos_id'] .'/'.$user_by_id['user_id']; ?>" class="btn btn-danger btn-sm delete-alert" type="button">Delete</a>
                              </li>
                          <?php } ?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
    <?php } ?>

<?php $this->load->view('admin/includes/footer');?>
