<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>



              <div class="container">
                  <div class="col-md-12">
                      <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <?php if($this->uri->segment(3) == 1) { ?>
                          <li>Surf y Deportes de Agua</li>
                        <?php } elseif($this->uri->segment(3) == 2) { ?>
                          <li>Ciclismo</li>
                        <?php } elseif($this->uri->segment(3) == 3) { ?>
                          <li>Fitness/Musculacion</li>
                        <?php } elseif($this->uri->segment(3) == 4) { ?>
                          <li>Camping/Senderismo</li>
                        <?php } elseif($this->uri->segment(3) == 5) { ?>
                          <li>Artes Marciales</li>
                        <?php } elseif($this->uri->segment(3) == 6) { ?>
                          <li>Baloncesto</li>
                        <?php } elseif($this->uri->segment(3) == 7) { ?>
                          <li>Futbol</li>
                        <?php } elseif($this->uri->segment(3) == 8) { ?>
                          <li>Boxeo</li>
                        <?php } elseif($this->uri->segment(3) == 9) { ?>
                          <li>Golf</li>
                        <?php } elseif($this->uri->segment(3) == 10) { ?>
                          <li>Tenis</li>
                        <?php } elseif($this->uri->segment(3) == 11) { ?>
                          <li>Skate</li>
                        <?php } else { ?>
                          <li>Otros</li>
                        <?php } ?>
                      </ul>
                  </div>
              </div>


              <!-- <div class="container">
                  <div class="col-sm-12">
                    <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker" onchange="location = this.value;">
                          <option>Search By Area</option>
                          <option value="<?php //echo base_url() . 'Profile_controller/profile_search_result/' . $user_all['user_id']; ?>"  onchange="this.form.submit()">Don't know yet</option>
                    </select>
                  </div>
              </div> -->


              <div class="container">
                  <div <div class="container-fluid">
                    <div class="masonry-container">
                    <div class="col-xs-12 col-sm-6 col-md-3 masonry-sizer"></div><!-- left empty for column sizing -->
                    <?php foreach ($products as $product) { ?>
                    		<div class="col-xs-12 col-sm-6 col-md-3 masonry-item">
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
                              <br> <br>
                              <span><?php echo $GLOBALS['by']; ?> <a href="<?php echo base_url("Profile_controller/profile/") . $product['user_id']; ?>"><?php echo $product['user_firstname'] . " " . $product['user_lastname'] ?></a></span>
                            <hr>
                    				<a href="<?php echo base_url("Products_controller/product/") . $product['product_id']; ?>" class="pull-right btn btn-info btn-xs" role="button"><?php echo $GLOBALS['view_product']; ?></a>
                    				</div>
                    			</div>
                    		</div>
                    <?php } ?>
                    </div>
                </div>
              </div>


                <?php $this->load->view('includes/footer');?>
