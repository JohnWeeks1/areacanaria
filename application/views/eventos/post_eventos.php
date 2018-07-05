<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>


<div class="container">

    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="<?php base_url(); ?>"><?php echo $GLOBALS['home']; ?></a>
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
            <?php if($this->session->flashdata('failed')) { ?>
              <div class="alert alert-danger">
                  <?php echo $this->session->flashdata('failed'); ?>
              </div>
              <?php } ?>
            <h1><?php echo $GLOBALS['create_event']; ?></h1>

            <hr>

            <?php echo form_open_multipart(base_url() . 'Eventos_controller/create_eventos'); ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><?php echo $GLOBALS['title']; ?></label>
                        <input type="text" class="form-control" id="eventos_title" name="eventos_title" placeholder="Title" value="<?= set_value('eventos_title') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                           <label for="eventos_image"><?php echo $GLOBALS['image']; ?></label>
                           <div class="input-group">
                           <span class="input-group-btn">
                               <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();"><?php echo $GLOBALS['browse']; ?></span>
                               <input name="eventos_image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" value="<?= set_value('eventos_image') ?>"/>
                           </span>
                          <span class="form-control"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="description"><?php echo $GLOBALS['date']; ?></label>
                          <input class="form-control" name="eventos_date" type="date" value="<?= set_value('eventos_date') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="description"><?php echo $GLOBALS['time']; ?> (<i>Example: 18:45 = 6:45 pm</i>)</label>
                          <input class="form-control" name="eventos_time" type="time" value="<?= set_value('eventos_time') ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                          <label for="description"><?php echo $GLOBALS['description']; ?></label>
                        <textarea class="form-control" rows="5" name="eventos_description" id="eventos_description" ><?= set_value('eventos_description') ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> <?php echo $GLOBALS['submit']; ?></button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- /.container -->


<?php $this->load->view('includes/footer');?>
