<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>


<div class="container">

    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="#"><?php echo $GLOBALS['home']; ?></a>
            </li>
            <li><?php echo $GLOBALS['create_post']; ?></li>
        </ul>

    </div>

    <div class="col-md-12">
        <div class="box">
            <?php if(validation_errors()) {  ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <h1>Create Advert for Deportes</h1>

            <hr>

            <?php echo form_open_multipart(base_url() . 'Products_controller/create_product'); ?>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Select Category</label>
                  <select class="form-control" name="product_category_id">
                      <option value="">Select</option>
                      <option value="1">Surf y Deportes de Agua</option>
                      <option value="2">Ciclismo</option>
                      <option value="3">Fitness/Musculacion</option>
                      <option value="4">Camping/Senderismo</option>
                      <option value="5">Artes Marciales</option>
                      <option value="6">Boloncesto</option>
                      <option value="7">Futbol</option>
                      <option value="8">Boxeo</option>
                      <option value="9">Golf</option>
                      <option value="10">Tenis</option>
                      <option value="11">Skate</option>
                      <option value="12">Otros</option>
                  </select>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><?php echo $GLOBALS['product_name']; ?></label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Wet Suit" value="<?= set_value('product_name') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><?php echo $GLOBALS['cost']; ?></label>
                        <input type="number" step="0.01" class="form-control" id="product_cost" name="product_cost" placeholder="12.99" value="<?= set_value('product_cost') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                           <label for="product_image"><?php echo $GLOBALS['image']; ?></label>
                           <div class="input-group">
                           <span class="input-group-btn">
                               <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                               <input name="product_image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" value="<?= set_value('product_image') ?>">
                           </span>
                          <span class="form-control"></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_image">Image</label>
                        <input type="file" class="form-control" id="product_image" name="product_image">
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="form-group">
                          <label for="description"><?php echo $GLOBALS['description']; ?></label>
                        <textarea class="form-control" rows="5" name="product_description" id="product_description"><?= set_value('product_description') ?></textarea>
                    </div>
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
