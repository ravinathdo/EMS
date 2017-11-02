<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

<?php echo base_url(); ?>
      
        <ul class="sidebar-menu">

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user fa-fw"></i> <span>Customer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>customer/add_new_customer"><i class="fa fa-circle-o"></i> New Customer</a></li>
                    <li><a href="<?php echo base_url(); ?>customer/index"><i class="fa fa-circle-o"></i> View Customers</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>event/add_new_event"><i class="fa fa-circle-o"></i> New Event</a></li>
                    <li><a href="<?php echo base_url(); ?>event/index"><i class="fa fa-circle-o"></i> View Events</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder" aria-hidden="true"></i>
                    <span>Payments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/payment/add_new_payment"><i class="fa fa-circle-o"></i> New Payment</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/payment/index"><i class="fa fa-circle-o"></i> View Payments</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Employees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/employee/add_employee"><i class="fa fa-circle-o"></i> New Employee</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/employee/index"><i class="fa fa-circle-o"></i> View Employees</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase" aria-hidden="true"></i> <span>Packages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/package/add_package"><i class="fa fa-circle-o"></i> New Package</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/package/index"><i class="fa fa-circle-o"></i> View Packages</a></li>
                    <li><a href="<?php echo base_url(); ?>template/forms/advanced.html"><i class="fa fa-circle-o"></i> View Package Charges</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Teams</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/event/get_event_id"><i class="fa fa-circle-o"></i> Assign Team</a></li>
                    <li><a href="<?php echo base_url(); ?>template/tables/data.html"><i class="fa fa-circle-o"></i> View Teams</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop" aria-hidden="true"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/user/user_registration_show"><i class="fa fa-circle-o"></i> New User</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/user/index"><i class="fa fa-circle-o"></i> View Users</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop" aria-hidden="true"></i> <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/report/load_report_view"><i class="fa fa-circle-o"></i>Reports</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/report/load_customer_event_report"><i class="fa fa-circle-o"></i>Customer event list</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/user/index"><i class="fa fa-circle-o"></i> View Users</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop" aria-hidden="true"></i> <span>Quatation</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>quotation_insertvieww"><i class="fa fa-circle-o"></i>Quata</a></li>
                </ul>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>template/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-yellow"></small>
                        <small class="label pull-right bg-green"></small>
                        <small class="label pull-right bg-red"></small>
                    </span>
                </a>
            </li>

            </aside>