<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>




<div class="container">
    <div class="col-sm-12">
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
            </li>
            <li><?php echo $GLOBALS['events']; ?></li>
        </ul>
    </div>
    <div class="container"></div>

        <div class="container-fluid">
            <div class="masonry-container">
                <div class="col-xs-12 col-sm-4 col-md-3 masonry-sizer"></div>
                <!-- left empty for column sizing -->
                <?php foreach ($eventos as $evento) { ?>
                <div class="col-xs-12 col-sm-4 col-md-3 masonry-item">
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
                            <a href="<?php echo base_url("Eventos_controller/details/") . $evento['eventos_id'] . "/" . $evento['eventos_user_id']; ?>" class="btn btn-primary read-more btn-xs pull-right"><?php echo $GLOBALS['read_description']; ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

      <div class="col-sm-12" id="blog-listing">
        <div class="text-center">
            <?php if(!isset($_POST['submit'])) { echo $page_links; } ?>
        </div>
      </div>
    </div>


<!-- /#content -->

<?php $this->load->view('includes/footer');?>
