<?php $this->load->view('admin/includes/header');?>
<?php $this->load->view('admin/includes/navbar');?>


      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-12">
              <h2 class="page-header">
                  Eventos
              </h2>
          </div>
      </div>
      <!-- /.row -->

      <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success text-center"> <?= $this->session->flashdata('success') ?> </div>
      <?php } ?>

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <h3 class="panel-title">All Eventos</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                    <div id="no-more-tables">
                        <table class="col-sm-12 table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                          <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($eventos as $all_evento) { ?>
                          <tr>
                            <td data-title="Title"><?php echo $all_evento['eventos_title']; ?></td>
                            <td data-title="Description"><?php echo substr("".$all_evento['eventos_description']."", 0, 100); ?>...</td>
                            <td data-title="Image"> <img src=" <?php echo base_url('assets/img/') . $all_evento['eventos_image']; ?>" alt="" height="60"> </td>
                            <td data-title="Options">
                                <a href="<?php echo base_url('Admin_controller/eventos_view/'.$all_evento['eventos_id']) ?>" class="btn btn-primary btn-sm" type="button">View Post</a>
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
                    <!--<ul class="pagination hidden-xs">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>-->
                      <div class="text-center">
                          <?php if(!isset($_POST['submit'])) { echo $page_links; } ?>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
              </div>


<?php $this->load->view('admin/includes/footer');?>
