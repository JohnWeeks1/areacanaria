<?php $this->load->view('includes/header_logged_out');?>
<?php $this->load->view('includes/topbar');?>
<?php $this->load->view('includes/navbar');?>

  <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>"><?php echo $GLOBALS['home']; ?></a></li>
                </li>
                <li><?php echo $GLOBALS['events_i_am_attending']; ?></li>
            </ul>
        </div>
            <div class="container"></div>
            <div class="container-fluid">
                <div class="masonry-container">
                    <div class="col-xs-12 col-sm-6 col-md-3 masonry-sizer"></div>
                    <!-- left empty for column sizing -->
                    <?php foreach ($i_will_attend as $i_attend) { ?>
                    <?php $ids = $i_attend['eventos_attend_id'] ?>
                    <?php
                          $this->db->order_by('eventos_date_and_time','ASC');
                          $this->db->where('eventos_id', $ids);
                          $eventos = $this->db->get('eventos');
                    ?>
                    <?php foreach ($eventos->result_array() as $e) { ?>
                    <?php if($i_attend['eventos_attend_user_id']) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 masonry-item">
                        <div class="panel panel-default panel-front">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="fancybox" rel="group" href="<?php echo base_url('assets/img/') . $e['eventos_image']; ?>">
                                    <img class="media-object img-responsive" src="<?php echo base_url('assets/img/') . $e['eventos_image']; ?>">
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <h4><?php echo $e['eventos_title']; ?></h4>
                                <i class="fa fa-calendar-o"></i> <?php echo $e['eventos_timestamp']; ?>
                                <hr>
                                <a href="<?php echo base_url("Eventos_controller/details/") . $e['eventos_id'] . "/" . $e['eventos_user_id']; ?>" class="btn btn-primary read-more btn-xs pull-right"><?php echo $GLOBALS['read_description']; ?></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                  <?php } ?>
                  <?php } ?>
                </div>
            </div>
    </div>
<?php $this->load->view('includes/footer');?>
