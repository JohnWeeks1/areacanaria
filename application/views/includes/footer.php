<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
 <div class="container">
     <div class="row">
         <div class="col-md-3 col-sm-6">
             <h4><?php echo $GLOBALS['pages'] ?></h4>

             <ul>
                 <li><a href="text.html"><?php echo $GLOBALS['about_us'] ?></a>
                 </li>
                 <!-- <li><a href="text.html">Terms and conditions</a>
                 </li>
                 <li><a href="faq.html">FAQ</a>
                 </li> -->
                 <li><a href="<?php echo base_url("Admin_controller/contact_us"); ?>"><?php echo $GLOBALS['contact_us'] ?></a>
                 </li>
             </ul>

             <hr class="hidden-md hidden-lg hidden-sm">

         </div>
         <div class="col-md-3 col-sm-6">

             <h4><?php echo $GLOBALS['user_section'] ?></h4>

             <ul>
                 <li><a href="<?php echo base_url('Auth_controller/login'); ?>"><?php echo $GLOBALS['login'] ?></a>
                 </li>
                 <li><a href="<?php echo base_url('Auth_controller/register'); ?>"><?php echo $GLOBALS['register'] ?></a>
                 </li>
             </ul>

             <hr class="hidden-md hidden-lg hidden-sm">

         </div>
         <div class="col-md-3 col-sm-6">
             <h4><?php echo $GLOBALS['stay_in_touch'] ?></h4>
             <p class="social">
                 <a href="https://fb.me/CanaryStyle" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                 <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                 <!-- <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                 <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a> -->
                 <a href="<?php echo base_url("Admin_controller/contact_us"); ?>" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
             </p>
         </div>

         <div class="col-md-3 col-sm-6">
             <h4><?php echo $GLOBALS['donations']; ?></h4>

             <ul>
                 <li style="font-size:11px;"> <img src="<?php echo base_url("assets/site_img/bitcoin.png"); ?>" alt="" style="width:50px;"> 1KyMXVB3h6ZuzXd37CLauiFWtcx3Jg6i8L</li>
                 <li style="font-size:11px;"> <img src="<?php echo base_url("assets/site_img/litecoin.png"); ?>" alt="" style="width:37px; position:relative;left:8px;"> <span style="position:relative;left:12px;">Lbp6ZvQC4Kg2whKXhTauMSKsQf3gtmqfha</span> </li>
             </ul>

             <hr class="hidden-md hidden-lg hidden-sm">

         </div>

     </div>
     <!-- /.row -->

 </div>
 <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
 <div class="container">
     <div class="col-md-6">
         <p class="pull-left">© 2018 Area Canaria</p>

     </div>
     <div class="col-md-6">
         <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a> & <a href="https://fity.cz">Fity</a>
                 <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
         </p>
     </div>
 </div>
</div>
<!-- *** COPYRIGHT END *** -->
</div>
<!-- /#all -->
<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.cookie.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-hover-dropdown.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/front.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/croppie.js');?>"></script>
<script src="<?php echo base_url('assets/js/masonry.js');?>"></script>
<script src="<?php echo base_url('assets/admin/js/custom_js.js');?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR5PFyvraK8Cqbu-vQu7UAR-NkcABHNuw&libraries=places&callback=initMap" async defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</body>

</html>
