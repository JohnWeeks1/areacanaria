<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                      <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
                        </li>
                        <li><?php echo $GLOBALS['sports']; ?></li>
                    </ul>
                </div>
                <?php foreach ($products as $product) { ?>
                <div class="col-md-12">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">

                                    <a class="fancybox thumbnail center-block" rel="group" href="<?php echo base_url('assets/img/') . $product['product_image']?>">
                                        <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $product['product_image']?>">
                                    </a>

                            </div>

                            <div class="ribbon new">
                                <div class="theribbon"><?php echo $GLOBALS['new']; ?></div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box" id="details">
                                <h2 class="text-center"><?php echo $product['product_name']; ?></h2>
                                <!-- <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details</a> -->
                                <p class="goToDescription"><?php echo $product['product_description']; ?></p>
                                <p class="price">€<?php echo $product['product_cost']; ?></p>

                                <p class="text-center buttons">
                                <!-- <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                <?php if(empty($this->session->userdata('user_id'))) { ?>
                                    <a href="<?php echo base_url('Auth_controller/register');?>" class="btn btn-primary btn-xs"><i class="fa fa-heart"></i> <?php echo $GLOBALS['register_to_contact_seller']; ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url("Products_controller/contact_seller/") . $product['product_user_id'] . "/" . $product['product_id'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-heart"></i><?php echo $GLOBALS['contact_seller']; ?></a>
                                <?php } ?>
                                </p>
                                <span><?php echo $GLOBALS['by']; ?> <a href="<?php echo base_url("Profile_controller/profile/") . $product['user_id']; ?>"><?php echo $product['user_firstname'] . " " . $product['user_lastname'] ?></a></span>
                                <?php if($product['product_user_id'] == $this->session->userdata("user_id")) { ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><?php echo $GLOBALS['edit']; ?><span class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="<?php echo base_url("Products_controller/edit_deportes/") . $product['product_id']; ?>"><?php echo $GLOBALS['edit']; ?></a></li>
                                          <li><a class="delete-alert" href="<?php echo base_url('Products_controller/delete_product_by_id/') . $product['product_id']; ?>"><?php echo $GLOBALS['delete']; ?></a></li>
                                        </ul>
                                      </div>
                                    </div>

                                  </div>

                                <?php } ?>
                                <hr>
                                <!-- Load Facebook SDK for JavaScript -->
                                <div class="fb-like" data-href="https://fb.me/CanaryStyle" data-width="160" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- /.col-md-9 -->
              </div>
              <div class="container">
                <div class="container"><h3><i class="fa fa-shopping-cart"></i> <?php echo $GLOBALS['related_products']; ?></h3></div>
                  <div <div class="container-fluid">
                    <div class="masonry-container">
                    <div class="col-xs-12 col-sm-6 col-md-3 masonry-sizer"></div><!-- left empty for column sizing -->
                    <?php foreach ($products as $product) { ?>
                        <?php foreach ($related_products as $related_product) { ?>
                             <?php if($this->uri->segment(3) != $related_product['product_id']) { ?>
                                 <?php if($product['product_category_id'] == $related_product['product_category_id']) { ?>
                                    		<div class="col-xs-12 col-sm-6 col-md-3 masonry-item">
                                    			<div class="panel panel-default panel-front">
                                    				<div class="panel-heading">
                                    					   <!-- <h4 class="panel-title"><a HREF="#"><img src="<?php echo base_url('assets/img/') . $related_product['product_image']?>"></a></h4> -->
                                                 <h4 class="panel-title"><a HREF="#">
                                                   <a class="fancybox" rel="group" href="<?php echo base_url('assets/img/') . $related_product['product_image']?>">
                                                       <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $related_product['product_image']?>">
                                                   </a>
                                                 </h4>
                                    				</div>
                                    				<div class="panel-body">
                                    					<h4><?php echo $related_product['product_name']; ?></h4>
                                              €<?php echo $related_product['product_cost']; ?>
                                              <br>
                                              <span><?php echo $GLOBALS['by']; ?> <a href="<?php echo base_url("Profile_controller/profile/") . $related_product['user_id']; ?>"><?php echo $related_product['user_firstname'] . " " . $related_product['user_lastname'] ?></a></span>
                                              <br>
                                    				<div class="text-right">
                                            	<a href="<?php echo base_url("Products_controller/product/") . $related_product['product_id']; ?>" class="btn btn-info btn-xs" role="button"><?php echo $GLOBALS['view_product']; ?></a>
                                    				</div>
                                    				</div>
                                    			</div>
                                    		</div>
                                    <?php } ?>
                               <?php } ?>
                          <?php } ?>
                     <?php } ?>
                    </div>
                </div>
              </div>


                <?php $this->load->view('includes/footer');?>
