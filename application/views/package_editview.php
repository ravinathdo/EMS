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
          <li><i class="fa fa-users"></i> Package</li>
          <li>New Package</li>
        </ol>
      </section>


     








    <!-- Main content -->
    <section class="content">

    	<h2>Package Details</h2><br>

		<form method="post" action="<?php echo base_url();?>index.php/package/update">
		<?php
		extract($package);
		?>
		<table width="400" border="0" cellpadding="5">
		<tr>
		 	<th width="213" align="right" scope="row">Enter package Id</th>
			<td width="161"><input type="text" name="id" id="id" size="20" value="<?php echo $id;?>"/></td>
		</tr>

		<tr>
			<th width="213" align="right" scope="row">Enter package name</th>
			<td width="161"><input type="text" name="package_name" id="package_name" size="20" value="<?php echo $package_name;?>"/></td>
		</tr>

		<tr>
			<th width="213" align="right" scope="row">Enter Number of Cams</th>
			<td width="161"><input type="text" name="no_of_cams" id="no_of_cams" size="20" value="<?php echo $no_of_cams;?>"/></td>
		</tr>
		
		<tr>
			<th width="213" align="right" scope="row">Enter the price</th>
			<td width="161"><input type="text" name="price" id="price"size="20" value="<?php echo $price;?>"/></td>
		</tr>

	
	
		<tr>
			<th align="right" scope="row">&nbsp;</th>
			<td> <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
			<input type="submit" name="edit" value="edit" /></td> 
		</tr>  
	</table> 
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
  <?php include 'application/views/footer.php' ?>

</body>
</html>