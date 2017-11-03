<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->

        <div class="pull-left image" style="padding-top: 10px;padding-left: 70px">
            <img src="<?php echo base_url(); ?>assets/images/ems-logo.png" style="width: 50px;height: 50px" class="img-square">

        </div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <table style="color: white" width="100%">      <!-- <? base_url();?>   -->
            <tr>
                <td>
                    <!--<h3>Video Event Management System </h3>-->
                    <h3>Event Management System</h3>
                </td>
                <td align="right" >
                      <i class="fa fa-user " aria-hidden="true">
                          <?php echo $this->session->userdata('name'); ?>
                          </i>
                    <a href="<?php echo base_url(); ?>index.php/calendar">
                        <i class="fa fa-home " aria-hidden="true"> Home </i>
                    </a> | 
                    <a href="<?php echo base_url(); ?>index.php/user/logout"> 
                        <i class="fa fa-eject " aria-hidden="true">  Log Out </i> </a>
                </td>
                 <td>
                     <h3>&nbsp;</h3>
                </td>
            </tr>
        </table>    <!-- <button type="button" class="btn btn-default navbar-btn pull-right">Sign in</button> -->

    </nav>
</header>