<?php $this->load->view('admin/includes/header');?>
<?php $this->load->view('admin/includes/navbar');?>

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-12">
              <h2 class="page-header">
                  Users
              </h2>
          </div>
      </div>
      <!-- /.row -->

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <h3 class="panel-title">All Users</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                    <div id="no-more-tables">
                        <table class="col-sm-12 table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($users as $user) { ?>
                          <tr>
                            <td data-title="Name"><?php echo $user['user_firstname'] . " " . $user['user_lastname']; ?></td>
                            <td data-title="Email"><?php echo $user['user_email']; ?></td>
                            <td data-title="Image"> <img src=" <?php echo base_url('assets/cropped_img/') . $user['user_image_cropped']; ?>" alt="" height="60"> </td>
                            <td data-title="Options">
                                <a href="<?php echo base_url('Admin_controller/user_view/'.$user['user_id']) ?>" class="btn btn-primary btn-sm" type="button">View User</a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>

              <div class="panel-footer">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <ul class="pagination hidden-xs">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              </div>


<?php $this->load->view('admin/includes/footer');?>
