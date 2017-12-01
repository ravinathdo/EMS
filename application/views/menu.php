<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <?php if ($this->session->userdata('user_type') == 'ADMIN') {
            ?>
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
                    <li><a href="<?php echo base_url(); ?>event/add_new_event"><i class="fa fa-circle-o"></i> Manage Event</a></li>
                    <li><a href="<?php echo base_url(); ?>event/loadStatusEventList"><i class="fa fa-circle-o"></i> Event Status</a></li>
                    <!--<li><a href="<?php // echo base_url();  ?>event/index"><i class="fa fa-circle-o"></i> View Events</a></li>-->
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
                    <li><a href="<?php echo base_url(); ?>payment/list_quatations"><i class="fa fa-circle-o"></i> List Quotations</a></li>
<!--                    <li><a href="<?php // echo base_url();  ?>index.php/payment/add_new_payment"><i class="fa fa-circle-o"></i> New Payment</a></li>
                    <li><a href="<?php // echo base_url();  ?>index.php/payment/index"><i class="fa fa-circle-o"></i> View Payments</a></li>-->
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
                    <!--<li><a href="<?php // echo base_url();  ?>template/forms/advanced.html"><i class="fa fa-circle-o"></i> View Package Charges</a></li>-->
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
                    <li><a href="<?php echo base_url(); ?>index.php/event/getBookedEventList"><i class="fa fa-circle-o"></i> Manage Teams </a></li>
<!--                    <li><a href="<?php // echo base_url();  ?>index.php/event/get_event_id"><i class="fa fa-circle-o"></i> Assign Team</a></li>
                    <li><a href="<?php // echo base_url();  ?>template/tables/data.html"><i class="fa fa-circle-o"></i> View Teams</a></li>-->
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
                    <li><a href="<?php echo base_url(); ?>index.php/user/loadChangePassword"><i class="fa fa-circle-o"></i>Change Password</a></li>
                    <!--<li><a href="<?php // echo base_url(); ?>index.php/user/index"><i class="fa fa-circle-o"></i> View Users</a></li>-->
                </ul>
            </li>


            <li class="treeview">
                <a href="">
                    <i class="fa fa-laptop" aria-hidden="true"></i> <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/report/loadEventReport"><i class="fa fa-circle-o"></i>Event Reports</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/report/loadEmployeeEvent"><i class="fa fa-circle-o"></i>Employee Event</a></li>
                    <!--<li><a href="<?php // echo base_url(); ?>index.php/user/index"><i class="fa fa-circle-o"></i> View Users</a></li>-->
                </ul>
            </li>
        </ul>
        <?php
        }
        ?>


        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') {
          ?>
        <ul class="sidebar-menu">

           
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>report/employeeIndividualEvent"><i class="fa fa-circle-o"></i> My Event</a></li>
                    <!--<li><a href="<?php // echo base_url();  ?>event/index"><i class="fa fa-circle-o"></i> View Events</a></li>-->
                </ul>
            </li>

          
            
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Teams</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php // echo base_url(); ?>index.php/event/xx"><i class="fa fa-circle-o"></i> My Contribution </a></li>
                    <li><a href="<?php // echo base_url();  ?>index.php/event/get_event_id"><i class="fa fa-circle-o"></i> Assign Team</a></li>
                    <li><a href="<?php // echo base_url();  ?>template/tables/data.html"><i class="fa fa-circle-o"></i> View Teams</a></li>
                </ul>
            </li>-->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop" aria-hidden="true"></i> <span>Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/user/changePassword"><i class="fa fa-circle-o"></i> Change Password</a></li>
                </ul>
            </li>


            
        </ul>
        <?php   
        }
        ?>



        

</aside>