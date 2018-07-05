<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>


<div class="container">

    <div class="col-md-12">

        <ul class="breadcrumb">
          <li><a href="#"><?php echo $GLOBALS['home']; ?></a>
            </li>
            <li><?php echo $GLOBALS['create_event']; ?></li>
        </ul>

    </div>

    <div class="col-md-12">
        <div class="box">
            <?php if(validation_errors()) {  ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <h3><?php echo $GLOBALS['create_event']; ?></h3>

            <hr>
            <?php foreach ($eventos as $evento) { ?>
            <?php $evento_id = $evento['eventos_id']; ?>
            <?php echo form_open_multipart(base_url() . "Eventos_controller/update/$evento_id"); ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><?php echo $GLOBALS['title']; ?></label>
                        <input type="text" class="form-control" id="eventos_title" name="eventos_title" placeholder="Title" value="<?php echo $evento['eventos_title']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                           <label for="eventos_image"><?php echo $GLOBALS['image']; ?></label>
                           <div class="input-group">
                           <span class="input-group-btn">
                               <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();"><?php echo $GLOBALS['product']; ?></span>
                               <input name="eventos_image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" />
                           </span>
                          <span class="form-control"></span>
                        </div>
                        <br>
                        <label for=""><?php echo $GLOBALS['current_image']; ?></label>
                        <br>
                        <a class="pull-left thumbnail fancybox" rel="group" href="<?php echo base_url('assets/img/') . $evento['eventos_image']; ?>">
                            <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $evento['eventos_image']; ?>" >
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="description"><?php echo $GLOBALS['date']; ?></label>
                          <input class="form-control" name="eventos_date" type="date" value="<?php echo substr($evento['eventos_date_and_time'],0,10); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="description"> <?php echo $GLOBALS['time']; ?>(<i>Example: 18:45 = 6:45 pm</i>)</label>
                          <input class="form-control" name="eventos_time" type="time" value="<?php echo substr($evento['eventos_date_and_time'],11,15); ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                          <label for="description"><?php echo $GLOBALS['description']; ?></label>
                        <textarea class="form-control" rows="5" name="eventos_description" id="eventos_description"><?php echo $evento['eventos_description']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="alert alert-info">
                      <?php echo $GLOBALS['Your current location is'] . " <b>" . $evento['location_name'] . "</b>";?>
                  </div>
                  <label for=""><?php echo $GLOBALS['location']; ?></label>
                  <br>
                        <!-- Name
                        <input type="text" name="name" class="form-control"><br> -->
                      <input type="hidden" name="location_lat" id="lat">
                      <input type="hidden" name="location_lng" id="lng">
                      <input type="hidden" name="location_name" id="location">

                      <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                      <div id="type-selector" class="controls">
                        <input type="radio" name="type" id="changetype-all" checked="checked">
                        <label for="changetype-all">All</label>


                      </div>
                      <div id="map"></div>
                      <br>
                      <br>
                    </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> <?php echo $GLOBALS['update']; ?></button>
                </div>
            <?php echo form_close(); ?>
          <?php } ?>
        </div>
    </div>
</div>
<!-- /.container -->


<?php $this->load->view('includes/footer');?>
