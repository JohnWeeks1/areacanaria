<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

    <div class="container">

        <div class="col-md-12">
          <ul class="breadcrumb">
              <li>
                <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
              </li>
              <li><?php echo $GLOBALS['search']; ?></li>
          </ul>
        </div>

        <div class="col-md-12" id="basket">

            <div class="box">

                    <h3><?php echo $GLOBALS['search']; ?></h3>
                    <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker" onchange="location = this.value;">
                          <option><?php echo $GLOBALS['search_profile']; ?></option>
                          <?php foreach ($users_all as $user_all) { ?>
                            <?php if($user_all['user_profile_or_business'] == 1) { ?>
                                  <option value="<?php echo base_url() . 'Profile_controller/profile_search_result/' . $user_all['user_id']; ?>"  onchange="this.form.submit()"><?php echo $user_all['user_firstname'] . " " . $user_all['user_lastname'];?></option>
                          <?php } ?>
                        <?php } ?>
                    </select>
                    <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker" onchange="location = this.value;">
                          <option><?php echo $GLOBALS['search_business']; ?></option>
                          <?php foreach ($users_all as $user_all) { ?>
                              <?php if($user_all['user_profile_or_business'] == 2) { ?>
                                  <option value="<?php echo base_url() . 'Profile_controller/business_search_result/' . $user_all['user_id']; ?>"  onchange="this.form.submit()"><?php echo $user_all['user_business_name'];?></option>
                              <?php } ?>
                          <?php } ?>

                    </select>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo $GLOBALS['image']; ?></th>
                                    <th><?php echo $GLOBALS['name/business']; ?></th>
                                    <th><?php echo $GLOBALS['options']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($users_all as $user_all) { ?>
                                <tr>
                                    <td>
                                      <a class="fancybox center-block" rel="group" href="<?php  if(!empty($user_all['user_image_cropped'])) {echo base_url("assets/cropped_img/") . $user_all['user_image_cropped'];}else{echo ' https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg';} ?>">
                                          <img class="media-object img-responsive" src="<?php  if(!empty($user_all['user_image_cropped'])) {echo base_url("assets/cropped_img/") . $user_all['user_image_cropped'];}else{echo ' https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg';} ?>" style="width:60px;">
                                      </a>
                                    </td>
                                    <td>
                                      <?php  if($user_all['user_profile_or_business'] == 1) {
                                        echo $user_all['user_firstname'] . " " . $user_all['user_lastname'];
                                      } else {
                                        echo $user_all['user_business_name'];
                                      }?>
                                        <?php ; ?>
                                    </td>
                                    <td><a href="<?php echo base_url('Profile_controller/profile/'.$user_all['user_id']) ?>" class="btn btn-primary btn-sm" type="button"><?php echo $GLOBALS['profile']; ?></a></td>
                                    <!-- <td><a href="#"><i class="fa fa-trash-o"></i></a> -->
                                    </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                  <!-- /.box -->
                </div>
            </div>
        </div>
<?php $this->load->view('includes/footer');?>
