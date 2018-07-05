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

      <div class="well">
          <div class="media">
              <div class="col-md-4">
                  <a class="pull-left" href="#">
                      <img class="media-object img-responsive" src="http://placehold.it/300x200<?php //echo base_url('assets/img/') . $evento_by_id->eventos_image; ?>">
                  </a>
              </div>
              <div class="col-md-8">
                  <div class="media-body">
                  <h4 class="media-heading">Receta 1</h4>
                      <p class="text-right">By Francisco</p>
                      <p><?php //echo $evento_by_id->eventos_description; ?></p>
                      <ul class="list-inline list-unstyled">
                          <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                          <li>|</li>
                          <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                          <li>|</li>
                          <li>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star-empty"></span>
                          </li>
                          <li>|</li>
                          <li>
                          <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                            <span><i class="fa fa-facebook-square"></i></span>
                            <span><i class="fa fa-twitter-square"></i></span>
                            <span><i class="fa fa-google-plus-square"></i></span>
                          </li>
                          <li>
                              <a href="<?php //echo base_url('Admin_controller/approve/'.$evento_by_id->eventos_id) ?>" class="btn btn-success btn-sm" type="button">Approve</a>
                              <a href="<?php //echo base_url('Admin_controller/do_not_approve/'.$evento_by_id->eventos_id) ?>" class="btn btn-danger btn-sm" type="button">Don't Approve</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>


<?php $this->load->view('admin/includes/footer');?>
