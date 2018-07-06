<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>



<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
            </li>
            <li><?php echo $GLOBALS['contact_seller']; ?></li>
            <li><?php echo $GLOBALS['message']; ?></li>

        </ul>
    </div>


    <div class="col-md-12">
        <div class="box">
            <?php if(validation_errors()) {  ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($users as $user) { ?>
            <h3><?php echo $GLOBALS['contact_seller']; ?>: <?php echo $user['user_firstname']; ?></h3>

            <hr>

            <?php foreach ($products as $product) { ?>
            <?php
                  echo form_open_multipart(base_url("Products_controller/message_seller/") . $this->uri->segment(3)."/".$this->uri->segment(4));
             ?>
            <div class="col-md-12">
              <ul class="nav nav-pills">
                  <li class="active"><a data-toggle="pill" href="#home"><?php echo $GLOBALS['email']; ?></a></li>
                  <li><a data-toggle="pill" href="#menu1"><?php echo $GLOBALS['whatsapp']; ?></a></li>
              </ul>
            </div>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <p>
                        <div class="col-md-6">
                          <h5><?php echo $GLOBALS['product']; ?></h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <h5><?php echo $GLOBALS['email']; ?></h5>
                            <div class="form-group">
                                <input type="email" class="form-control" id="user_phone" name="user_phone" placeholder="Email" value="<?php echo $user['user_email']; ?>" readonly>
                            </div>
                        </div>
                          <div class="col-md-12">
                            <h5><?php echo $GLOBALS['message']; ?></h5>
                              <div class="form-group">
                                  <textarea class="form-control" rows="5" name="message" id="message"></textarea>
                              </div>
                          </div>
                          <div class="row">
                            <div class="text-center">
                                <button type="submit" name+="email" class="btn btn-primary"><i class="fa fa-user-md"></i> Send Email</button>
                            </div>
                          </div>
                    </p>
                    </div>
                    <?php echo form_close(); ?>
                    <div id="menu1" class="tab-pane fade">
                      <p>
                        <div class="col-md-6">
                          <h5><?php echo $GLOBALS['product']; ?></h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <h5><?php echo $GLOBALS['mobile']; ?></h5>
                            <div class="form-group">
                                <input type="number" class="form-control" id="phone" placeholder="Email" value="<?php echo $user['user_phone']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <h5><?php echo $GLOBALS['message']; ?></h5>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="message"></textarea>
                            </div>
                        </div>
                        <div class="row">
                          <div class="text-center">
                            <a type='button' href='https://api.whatsapp.com/send' id='send_whatsapp_message' target='_blank' class='btn btn-success'><?php echo $GLOBALS['send_whatsapp']; ?></a>
                          </div>
                        </div>
                      </p>
                    </div>
                  </div>

                <?php } ?>
              <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->


<?php $this->load->view('includes/footer');?>
