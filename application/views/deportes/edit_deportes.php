<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>


<div class="container">

<?php $this->load->view("inckudes/breadcrum"); ?>

    <div class="col-md-12">
        <div class="box">
            <?php if(validation_errors()) {  ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($products as $product) { ?>
            <h3>Edit Deportes:  <i><?= $product['product_name'] ?></i> </h3>

            <hr>

            <?php echo form_open_multipart(base_url() . 'Products_controller/update_product/' . $product['product_id']); ?>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Select Category</label>
                  <select class="form-control" name="product_category_id">
                    <?php $prod_cat_id = $product['product_category_id']; ?>
                      <option value="<?php echo $product['product_category_id']; ?>">
                          <?php if($prod_cat_id == 1) { ?>
                            <li>Surf y Deportes de Agua</li>
                          <?php } elseif($prod_cat_id == 2) { ?>
                            <li>Ciclismo</li>
                          <?php } elseif($prod_cat_id == 3) { ?>
                            <li>Fitness/Musculacion</li>
                          <?php } elseif($prod_cat_id == 4) { ?>
                            <li>Camping/Senderismo</li>
                          <?php } elseif($prod_cat_id == 5) { ?>
                            <li>Artes Marciales</li>
                          <?php } elseif($prod_cat_id == 6) { ?>
                            <li>Baloncesto</li>
                          <?php } elseif($prod_cat_id == 7) { ?>
                            <li>Futbol</li>
                          <?php } elseif($prod_cat_id == 8) { ?>
                            <li>Boxeo</li>
                          <?php } elseif($prod_cat_id == 9) { ?>
                            <li>Golf</li>
                          <?php } elseif($prod_cat_id == 10) { ?>
                            <li>Tenis</li>
                          <?php } elseif($prod_cat_id == 11) { ?>
                            <li>Skate</li>
                          <?php } else { ?>
                            <li>Otros</li>
                          <?php } ?>
                      </option>
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
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Wet Suit" value="<?= $product['product_name'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><?php  echo $GLOBALS['cost']; ?></label>
                        <input type="number" step="0.01" class="form-control" id="product_cost" name="product_cost" placeholder="12.99" value="<?= $product['product_cost'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                           <label for="product_image"><?php  echo $GLOBALS['image']; ?></label>
                           <div class="input-group">
                           <span class="input-group-btn">
                               <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                               <input name="product_image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" >
                           </span>
                          <span class="form-control"></span>
                        </div>
                        <label for=""><?php  echo $GLOBALS['current_image']; ?></label>
                        <a class="pull-left fancybox" rel="group" href="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                            <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $product['product_image']; ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                          <label for="description"><?php  echo $GLOBALS['description']; ?></label>
                        <textarea class="form-control" rows="5" name="product_description" id="product_description"><?= $product['product_description'] ?></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i><?php  echo $GLOBALS['update']; ?></button>
                </div>
            <?php echo form_close(); ?>
          <?php } ?>
        </div>
    </div>
</div>
<!-- /.container -->


<?php $this->load->view('includes/footer');?>
