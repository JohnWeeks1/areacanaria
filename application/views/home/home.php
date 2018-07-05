<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

<div class="container">
    <div class="col-md-12">
        <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success text-center removeIn3"> <?= $this->session->flashdata('success') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('failed')) { ?>
        <div class="alert alert-danger text-center removeIn3"> <?= $this->session->flashdata('failed') ?> </div>
        <?php } ?>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <div id="main-slider">
            <div class="item">
                <img src="<?php echo base_url('assets/site_img/AC_banner.png');?>" alt="" class="img-responsive">
            </div>
            <div class="item">
                <img src="<?php echo base_url('assets/site_img/AC_banner3.png');?>" alt="" class="img-responsive">
            </div>
            <div class="item">
                <img src="<?php echo base_url('assets/site_img/AC_banner2.png');?>" alt="" class="img-responsive">
            </div>
        </div>
        <!-- /#main-slider -->
    </div>
  </div>






  <!-- <div class="container">
        <div class="row">
            <h2>Autocomplete Codeigniter</h2>
        </div>
        <div class="row">
            <form>
                 <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Title">
                  </div>
            </form>
        </div>
    </div> -->

<div class="container">
    <div <div class="container-fluid">
      <div class="masonry-container">
      <div class="col-xs-12 col-sm-4 col-md-2 masonry-sizer"></div><!-- left empty for column sizing -->
      <?php foreach ($products as $product) { ?>
      		<div class="col-xs-12 col-sm-4 col-md-2 masonry-item">
      			<div class="panel panel-default panel-front">
      				<div class="panel-heading">
                <a class="fancybox" rel="group" href="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                    <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                </a>
      				</div>
      				<div class="panel-body">
                <!-- <div class="ribbon new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                </div> -->
      					<h4><?php echo $product['product_name']; ?></h4>
                €<?php echo $product['product_cost']; ?>
      				<div class="text-right">
              <!-- <span class="pull-left">By <a href="<?php //echo base_url("Profile_controller/profile/") . $product['user_id']; ?>"><?php //echo $product['user_firstname'] . " " . $product['user_lastname'] ?></a></span> -->
      					<a href="<?php echo base_url("Products_controller/product/") . $product['product_id']; ?>" class="btn btn-info btn-xs" role="button"><?php echo $GLOBALS['view_product']; ?></a>
      				</div>
      				</div>
      			</div>
      		</div>
        <?php } ?>
      </div>
  </div>
  <div class="container">
  </div>
  <div class="col-sm-12" id="blog-listing">
    <div class="text-center">
        <?php if(!isset($_POST['submit'])) { echo $page_links; } ?>
    </div>
  </div>


</div>

<?php $this->load->view('includes/footer');?>
