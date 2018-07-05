<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="<?php echo base_url();?>" data-animate-hover="bounce">
                <img src="<?php echo base_url('assets/site_img/area_canaria_logo.png');?>" alt="Area Canaria logo" class="hidden-xs" style="height: 52px;">
                <img src="<?php echo base_url('assets/site_img/area_canaria_logo.png');?>" alt="Area Canaria logo" class="visible-xs" style="height: 52px;"><span class="sr-only">Area Canaria</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button> -->

                <!--
                <a class="btn btn-default navbar-toggle" href="basket.html">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                </a>
                -->
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="<?php if(current_url() == base_url()) { echo 'active'; } ?>">
                  <a href="<?php echo base_url();?>"><?php echo $GLOBALS['home']; ?></a>
                </li>
                <li class="yamm-fw <?php if(current_url() == base_url('Eventos_controller/eventos')) { echo 'active'; } ?>">
                    <a href="<?php echo base_url('Eventos_controller/eventos');?>" data-hover="dropdown"><?php echo $GLOBALS['events']; ?></a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Deportes<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                    <h5><?php echo $GLOBALS['home']; ?></h5>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/1');?>">Surf y Deportes de Agua</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/2');?>">Ciclismo</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/3');?>">Fitness/Musculacion</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/4');?>">Camping/Senderismo</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/5');?>">Artes Marciales</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/6');?>">Baloncesto</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/7');?>">Futbol</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/8');?>">Boxeo</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/9');?>">Golf</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/10');?>">Tenis</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/11');?>">Skate</a>
                                            </li>
                                            <li><a href="<?php echo base_url('Products_controller/products_by_category/12');?>">Otros</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>

                <!-- <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Ropa <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5>Hombre</h5>
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
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Mujer</h5>
                                        <ul>
                                            <li><a href="category.html">Trainers</a>
                                            </li>
                                            <li><a href="category.html">Sandals</a>
                                            </li>
                                            <li><a href="category.html">Hiking shoes</a>
                                            </li>
                                            <li><a href="category.html">Casual</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Niño</h5>
                                        <ul>
                                            <li><a href="category.html">Trainers</a>
                                            </li>
                                            <li><a href="category.html">Sandals</a>
                                            </li>
                                            <li><a href="category.html">Hiking shoes</a>
                                            </li>
                                            <li><a href="category.html">Casual</a>
                                            </li>
                                            <li><a href="category.html">Hiking shoes</a>
                                            </li>
                                            <li><a href="category.html">Casual</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Niña</h5>
                                        <ul>
                                            <li><a href="category.html">Trainers</a>
                                            </li>
                                            <li><a href="category.html">Sandals</a>
                                            </li>
                                            <li><a href="category.html">Hiking shoes</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Accesorios</h5>
                                        <ul>
                                            <li><a href="category.html">Trainers</a>
                                            </li>
                                            <li><a href="category.html">Sandals</a>
                                            </li>
                                            <li><a href="category.html">Hiking shoes</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="banner">
                                            <a href="#">
                                                <img src="img/banner.jpg" class="img img-responsive" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li> -->

                <?php if(!empty($this->session->userdata('user_id'))) { ?>
                  <li class="dropdown yamm-fw">
                      <a href="" class="dropdown-toggle post_something" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><?php echo $GLOBALS['create_post']; ?><b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li>
                              <div class="yamm-content">
                                      <h5><?php echo $GLOBALS['create_post']; ?></h5>
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <ul>
                                              <li>
                                                  <a href="<?php echo base_url('Products_controller/post_deportes');?>"><?php echo $GLOBALS['sports']; ?></a>
                                              </li>
                                              <li>
                                                  <a href="<?php echo base_url('Eventos_controller/post_eventos');?>"><?php echo $GLOBALS['events']; ?></a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <!-- /.yamm-content -->
                          </li>
                      </ul>
                  </li>
                <?php } ?>
                <script></script>

            </ul>
        </div>
        <!--/.nav-collapse -->

        <!-- <div class="navbar-buttons">
            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary pull-right" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>Buscar
                </button>
            </div>
        </div>
        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
              <div class="row">
                <div class='col-xs-12 col-sm-offset-1 col-sm-6'>
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Todo <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Eventos</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="">Surf y Deportes de Agua</a></li>
                        <li><a href="#">Ciclismo</a></li>
                        <li><a href="#">Fitness/Musculacion</a></li>
                        <li><a href="#">Camping/Senderismo</a></li>
                        <li><a href="#">Artes Marciales</a></li>
                        <li><a href="#">Baloncesto</a></li>
                        <li><a href="#">Futbol</a></li>
                        <li><a href="#">Boxeo</a></li>
                        <li><a href="#">Golf</a></li>
                        <li><a href="#">Yoga</a></li>
                        <li><a href="#">Tenis</a></li>
                        <li><a href="#">Otros</a></li>
                      </ul>
                    </div><
                    <input type="text" class="form-control" aria-label="..." placeholder="Surf Board">
                  </div><
                </div>
                    <div class='col-xs-12 col-sm-4'>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" placeholder="Location">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                    </div>
                  </div>
            </form>
        </div> -->
        <!--/.nav-collapse -->
    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
<div class="container " style="position:relative !important;top:-25px !important;">
  <div class="col-md-12 pull-right">
    <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,fr,it,pl,pt,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </div>
</div>

<div id="all">
    <div id="content">
