<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
            </li>
            <li><?php echo $GLOBALS['profile']; ?></li>
            <li><?php echo $GLOBALS['edit_picture']; ?></li>
        </ul>
        <?php if(validation_errors()) {  ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
    </div>

      <div class="col-md-12">
            <?php $attributes = array('id' => 'form'); ?>
            <?php echo form_open_multipart(base_url("Profile_controller/update_picture/").$this->uri->segment(3), $attributes); ?>
            <label class="btn btn-info">
                <?php echo $GLOBALS['browse']; ?> <input id="upload" type="file" hidden style="display: none !important">
            </label>
            <button type="button" class="form_submit btn btn-success pull-right"><?php echo $GLOBALS['upload']; ?></button>
        </div>
      </br>
        <div class="col-md-12">
            <div id="upload-demo"></div>
            <input type="hidden" id="user_image_cropped" name="user_image_cropped">
            </form>
        </div>
    </div>
    <!-- /.container -->

<?php $this->load->view('includes/footer');?>
