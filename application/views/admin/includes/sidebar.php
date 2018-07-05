<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="<?php if(current_url() == base_url('Admin_controller/index')) { echo 'active'; } ?>">
            <a href="<?php echo base_url('Admin_controller/index'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="<?php if(current_url() == base_url('Admin_controller/users')) { echo 'active'; } ?>">
            <a href="<?php echo base_url('Admin_controller/users'); ?>"><i class="fa fa-fw fa-dashboard"></i> Users</a>
        </li>
        <li class="<?php if(current_url() == base_url('Admin_controller/eventos')) { echo 'active'; } ?>">
            <a href="<?php echo base_url('Admin_controller/eventos'); ?>"><i class="fa fa-fw fa-dashboard"></i> Eventos</a>
        </li>
        <!-- <li class="<?php //if(current_url() == base_url('Admin_controller/eventos_for_approval')) { echo 'active'; } ?>">
            <a href="<?php //echo base_url('Admin_controller/eventos_for_approval'); ?>"><i class="fa fa-fw fa-dashboard"></i> Eventos for Approval</a>
        </li> -->
        <!-- <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li class="">
                    <a href="<?php //echo base_url('Admin_controller/eventos'); ?>">Eventos</a>
                </li>
                <li>
                    <a href="<?php //echo base_url('Admin_controller/ropa'); ?>">Ropa</a>
                </li>
            </ul>
        </li> -->
    </ul>
</div>
<!-- /.navbar-collapse -->
