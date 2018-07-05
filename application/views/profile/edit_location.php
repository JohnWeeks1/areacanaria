<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
            </li>
            <li><?php echo $GLOBALS['profile']; ?></li>
            <li><?php echo $GLOBALS['edit_location']; ?></li>
        </ul>
        <?php if(validation_errors()) {  ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-12">

          <?php
              $query = $this->db->query('SELECT location_user_id FROM locations WHERE location_user_id = ' . $this->uri->segment(3) . ' AND location_evento_id = 0');
              if(empty($query->row())) {
                  echo form_open(base_url("Profile_controller/create_location/").$this->uri->segment(3));
              } else {
                  echo form_open(base_url("Profile_controller/update_location/").$this->uri->segment(3));
              }
          ?>
          <div class="row">
                    <div class="col-md-12">
                        <!-- Name
                        <input type="text" name="name" class="form-control"><br> -->

                      <input type="hidden" name="location_lat" id="lat">
                      <input type="hidden" name="location_lng" id="lng">
                      <input type="hidden" name="location_name" id="location">

                      <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                      <div id="type-selector" class="controls">
                        <input type="radio" name="type" id="changetype-all" checked="checked">
                        <label for="changetype-all"><?php echo $GLOBALS['all']; ?></label>


                      </div>
                      <div id="map"></div>
                    </br>
                      <input type="submit" name="submit" value="<?php echo $GLOBALS['submit']; ?>" class="form-control btn btn-primary">
                      </br>
                      </br>
                  </div>
            </div><!--End of row-->
        <?php echo form_close(); ?>

            </div>
        </div>
        <!-- /.container -->

<?php $this->load->view('includes/footer');?>
