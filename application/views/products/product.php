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

                <!-- <div class="col-md-3">
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="category.html">Men <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="category.html">T-shirts</a>
                                        </li>
                                        <li><a href="category.html">Shirts</a>
                                        </li>
                                        <li><a href="category.html">Pants</a>
                                        </li>
                                        <li><a href="category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="category.html">Ladies  <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li><a href="category.html">T-shirts</a>
                                        </li>
                                        <li><a href="category.html">Skirts</a>
                                        </li>
                                        <li><a href="category.html">Pants</a>
                                        </li>
                                        <li><a href="category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="category.html">Kids  <span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="category.html">T-shirts</a>
                                        </li>
                                        <li><a href="category.html">Skirts</a>
                                        </li>
                                        <li><a href="category.html">Pants</a>
                                        </li>
                                        <li><a href="category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Brands <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Armani (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Versace (12)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Carlo Bruni (15)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Jack Honey (14)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> White (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>


                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div> -->
                <?php foreach ($products as $product) { ?>
                <div class="col-md-12">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">

                                    <a class="fancybox thumbnail center-block" rel="group" href="<?php echo base_url('assets/img/') . $product['product_image']?>">
                                        <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $product['product_image']?>">
                                    </a>

                            </div>

                            <!-- <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div> -->
                            <!-- /.ribbon -->

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
                                    <a href="<?php echo base_url('Auth_controller/register');?>" class="btn btn-primary"><i class="fa fa-heart"></i> <?php echo $GLOBALS['register_to_contact_seller']; ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url("Products_controller/contact_seller/") . $product['product_user_id'] . "/" . $product['product_id'] ?>" class="btn btn-primary"><i class="fa fa-heart"></i><?php echo $GLOBALS['contact_seller']; ?></a>
                                <?php } ?>
                                </p>
                                <?php if($product['product_user_id'] == $this->session->userdata("user_id")) { ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo $GLOBALS['edit']; ?><span class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="<?php echo base_url("Products_controller/edit_deportes/") . $product['product_id']; ?>"><?php echo $GLOBALS['edit']; ?></a></li>
                                          <li><a class="delete-alert" href="<?php echo base_url('Products_controller/delete_product_by_id/') . $product['product_id']; ?>"><?php echo $GLOBALS['delete']; ?></a></li>
                                        </ul>
                                      </div>
                                    </div>

                                  </div>

                                <?php } ?>
                                <hr>
                                <div class="social">
                                    <h4><?php echo $GLOBALS['show_it_to_your_friends']; ?></h4>
                                    <p>
                                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                    </p>
                                </div>


                            </div>

                            <!--<div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="img/detailbig1.jpg" class="thumb">
                                        <img src="img/detailsquare.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="img/detailbig2.jpg" class="thumb">
                                        <img src="img/detailsquare2.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="img/detailbig3.jpg" class="thumb">
                                        <img src="img/detailsquare3.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div> -->
                        </div>

                    </div>


                    <!-- <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p></p>
                            <h4>Material & care</h4>
                            <ul>
                                <li>Polyester</li>
                                <li>Machine wash</li>
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                                <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                            </ul> -->

                            <!-- <blockquote>
                                <p>
                                  <em><?php //echo $product['product_description']; ?></em>
                                </p>
                            </blockquote> -->

                            <!-- <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div> -->

                    <!-- <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Products viewed recently</h3>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                        </div>

                    </div> -->

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
