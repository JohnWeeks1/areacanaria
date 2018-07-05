<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <!--
        <div class="col-md-6 offer" data-animate="fadeInDown">
            <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
        </div>
        -->
        <div class="col-md-12" data-animate="fadeInDown">
            <ul class="menu">
                <?php if($this->session->userdata('user_loggedin')) { ?>
                    <?php if($this->session->userdata('user_is_admin') == 1) { ?>
                        <li><a href="<?php echo base_url('Admin_controller/index');?>"><?php echo $GLOBALS['dashboard']; ?></a></li>
                    <?php } ?>
                    <?php $id = $this->session->userdata('user_id'); ?>
                    <li><a href="<?php echo base_url('Profile_controller/profile/') . $id ."";?>"><?php echo $GLOBALS['my_profile']; ?></a></li>
                    <li><a href="<?php echo base_url('Auth_controller/logout');?>"><?php echo $GLOBALS['logout']; ?></a></li>
                <?php } else { ?>
                  <!-- <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li> -->
                    <li><a href="<?php echo base_url('Auth_controller/login_page');?>"><?php echo $GLOBALS['login']; ?></a></li>
                    <li><a href="<?php echo base_url('Auth_controller/register');?>"><?php echo $GLOBALS['register']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
  <!--  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                    <?php //echo form_open(base_url() . 'Auth_controller/login'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email-modal" placeholder="user_email" name="user_email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password-modal" placeholder="user_password" name="user_password">
                        </div>

                        <p class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    <?php //echo form_close(); ?>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                </div>
            </div>
        </div>
    </div> -->

</div>

<!-- *** TOP BAR END *** -->
