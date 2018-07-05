<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>



<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
            </li>
            <li><?php echo $GLOBALS['contact_us']; ?></li>
        </ul>
    </div>

    <div class="col-md-12">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success text-center"> <?= $this->session->flashdata('success') ?> </div>
        <?php } ?>
    </div>

    <div class="col-md-12">
        <div class="box">
            <?php if(validation_errors()) {  ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <h3><?php echo $GLOBALS['contact_us']; ?></h3>
            <hr>
                <?php echo form_open_multipart(base_url("Admin_controller/contact_us_send")); ?>
                <div class="col-md-4">
                  <h5><?php echo $GLOBALS['name']; ?></h5>
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Juan" <?php if(!empty($this->session->userdata("user_firstname"))) { echo "readonly";} ?> value="<?php if(!empty($this->session->userdata("user_firstname"))) { echo $this->session->userdata("user_firstname")." ".$this->session->userdata("user_lastname"); } else { echo set_value("name"); } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                  <h5><?php echo $GLOBALS['subject']; ?></h5>
                    <div class="form-group">
                      <input type="text" class="form-control" id="subject" name="subject" placeholder="Hola" value="<?php echo set_value("subject"); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                  <h5><?php echo $GLOBALS['email']; ?></h5>
                    <div class="form-group">
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" <?php if(!empty($this->session->userdata("user_firstname"))) { echo "readonly";} ?> value="<?php if(!empty($this->session->userdata('user_email'))) { echo $this->session->userdata('user_email'); } else { echo set_value('email'); } ?>">
                    </div>
                </div>
                    <div class="col-md-12">
                      <h5><?php echo $GLOBALS['message']; ?></h5>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="message" id="message"><?php echo set_value("message"); ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                      <div class="text-center">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> <?php echo $GLOBALS['contact_us']; ?></button>
                      </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->


<?php $this->load->view('includes/footer');?>
