<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>



              <div class="container">
                  <div class="col-md-12">
                      <ul class="breadcrumb">
                        <li><a href="<?php echo base_url("Profile_controller/profile/") . $this->uri->segment(3); ?>"><?php echo $GLOBALS['profile']; ?></a></li>
                        <li><?php echo $GLOBALS['users_products']; ?></li>
                      </ul>
                  </div>
                </div>



              <div class="container">
                  <div <div class="container-fluid">
                    <div class="masonry-container">
                    <div class="col-xs-12 col-sm-4 col-md-2 masonry-sizer"></div><!-- left empty for column sizing -->
                    <?php foreach ($products as $product) { ?>
                    		<div class="col-xs-12 col-sm-4 col-md-2 masonry-item">
                    			<div class="panel panel-default panel-front">
                    				<div class="panel-heading">
                    					   <!-- <h4 class="panel-title"><a HREF="#"><img src="<?php //echo base_url('assets/img/') . $product['product_image']?>"></a></h4> -->
                                 <h4 class="panel-title">
                                     <a class="fancybox" rel="group" href="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                                         <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                                     </a>
                                 </h4>
                    				</div>
                    				<div class="panel-body">
                    					<h4><?php echo $product['product_name']; ?></h4>
                              €<?php echo $product['product_cost']; ?>
                            <hr>
                    				<a href="<?php echo base_url("Products_controller/product/") . $product['product_id']; ?>" class="pull-right btn btn-info btn-xs" role="button"><?php echo $GLOBALS['view_product']; ?></a>
                    				</div>
                    			</div>
                    		</div>
                    <?php } ?>
                    </div>
                </div>
              </div>
              <!-- <div class="container">
                <div class="col-xs-12 text-center">
                    <div class="text-center">
                        <?php //if(!isset($_POST['submit'])) { echo $page_links; } ?>
                    </div>
                </div>
              </div> -->



                <?php $this->load->view('includes/footer');?>
