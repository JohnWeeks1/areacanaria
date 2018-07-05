<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

<div class="container">

    <div class="col-md-12">
        <div class="box">
            <?php if(validation_errors()) {  ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <h3>New account</h3>

            <?php //echo $this->session->userdata('user_firstname'); ?>

            <p class="lead">Not our registered customer yet?</p>
            <!-- <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p> -->

            <hr>

            <?php echo form_open(base_url() . 'Auth_controller/register_user'); ?>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="form-group">
                      <label for="name">First Name</label>
                      <input type="text" class="form-control" id="user_firstname" name="user_firstname" placeholder="John" value="<?php echo set_value('user_firstname') ?>">
                  </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Doe" value="<?php echo set_value('user_lastname') ?>">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="somthing@something.com" value="<?php echo set_value('user_email') ?>">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="user_password" name="user_password">
                    </div>
                </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- /.container -->

<?php $this->load->view('includes/footer');?>
