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
            <?php if($this->session->flashdata('error')) {  ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <h3>Login</h3>

            <hr>

            <?php echo form_open(base_url() . 'Auth_controller/login'); ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="something@something.com">
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Login</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- /.container -->

<?php $this->load->view('includes/footer');?>
