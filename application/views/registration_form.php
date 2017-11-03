<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/login/index.php/user_authentication/user_login_process");
}
?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Video ADS | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Registration Form</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>

        <?php include 'application/views/header.php' ?>


</head>
  <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <?php include 'application/views/main_header.php' ?>
            <?php include 'application/views/menu.php' ?>
            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Customer</a></li>
                        <li><a href="#">New Customer</a></li>
                    </ol>
                </section>
                 <section class="content">

        <h2>Hello There</h2>
         <h5>Please enter the required information below.</h5> 

                 <form data-toggle="validator" role="form" id="new_user_form" method="post" action="<?php echo base_url(); ?>index.php/user/new_user_registration" >
      <div>
 
       <?php 
          $fattr = array('class' => 'form-signin');
          echo form_open('/main/register', $fattr); ?>
          <div class="form-group">
            <?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'First Name', 'class'=>'form-control', 'value' => set_value('firstname'))); ?>
            <?php echo form_error('firstname');?>
          </div>
          <div class="form-group">
            <?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'Last Name', 'class'=>'form-control', 'value'=> set_value('lastname'))); ?>
            <?php echo form_error('lastname');?>
          </div>
          <div class="form-group">
            <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
            <?php echo form_error('email');?>
          </div>
          <?php echo form_submit(array('value'=>'Sign up', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
          <?php echo form_close(); ?>

      </div>
       </section>



                


                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->








            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Created by:&nbsp;<font color="#3c8baa"> Imalka Christeen Wevita </font></strong>
            </footer>


        </div>


    </body>

    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/validator.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
//            alert('jq');
            //$('#myForm').validator();
        });

    </script>
    <?php include 'application/views/footer.php' ?>
</html>