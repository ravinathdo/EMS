<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Video ADS | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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
        <li><a href="#"><i class="fa fa-suitcase"></i> Package</a></li>
        <li><a href="#">New Package</a></li>
      </ol>
    </section>









    <!-- Main content -->
    <section class="content">

    <h2>Package Details Form</h2><br>

    <form  data-toggle="validator" role="form"  method="post" action="<?php echo base_url();?>index.php/package/insert_newpackage_db">

    

    	<div class="form-group">
        <label for="name" class="control-label">Package Name</label>
      	<input type="text" id="package" name="package" class="form-control" size="20"  data-error="Enteravalied name" required/>
      	<div class="help-block with-errors"></div>
    	</div>

    	
    	<div class="form-group">
        <label for="name" class="control-label">Number of Cameras</label>
    	  <input type="text" pattern="^[0-9]+$" id="no_of_cameras" name="no_of_cameras" class="form-control" size="20"  data-error="Enteravalied name" required/>
    	  <div class="help-block with-errors"></div>
    	</div>

    	<div class="form-group">
        <label for="name" class="control-label">Charge per camera</label>
    	  <input type="text" pattern="^\$?(?=\(.*\)|[^()]*$)\(?\d{1,3}(,?\d{3})?(\.\d\d?)?\)?$"  id="charge_per_cam" name="charge_per_cam" class="form-control" size="20"  data-error="Enteravalied name" required/>
    	  <div class="help-block with-errors"></div>
    	</div>

    	<div class="form-group">
        <label for="name" class="control-label">Description</label>
    	  <input type="text" id="description" name="description" class="form-control" size="20"  data-error="Enteravalied name" required/>
    	  <div class="help-block with-errors"></div>
    	</div>
	


    
        <div class="form-group">

                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
     

    </form>

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