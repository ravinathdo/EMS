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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>








    <!-- Main content -->
    <section class="content">
    <form method="post" action="<?php echo base_url();?>index.php/event/update">
      <?php
      extract($event);
      extract($customers);
      ?>

    <table width="400" border="0" cellpadding="5">

    <div class="form-group">
      <label for="customer_id">Customer Name</label>
      <select class="form-control" id="customer_id" name="customer_id">
        <?php
          foreach ($customers as $customer){ ?>
          <option value = "<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
        <?php } ?> 
     </select>
    </div>

    <div class="form-group">
      <label for="id" class="control-label">Event Name</label>
    	 <input type="text" id="event_name" name="event_name" class="form-control" size="20" value="<?php echo $event_name;?>" data-error="Event Name is invalid" required/>
    	 <div class="help-block with-errors"></div>
    </div>
    	
    <div class="form-group">
      <label for="name" class="control-label">Event Date</label>
        <input type="text" id="date" name="date" class="form-control" size="20" placeholder="Enter your event date" value="<?php echo $date;?>" data-error="Enteravalied date" required/>
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      <label for="name" class="control-label">Place</label>
    	  <input type="text" id="place" name="place" class="form-control" size="20" placeholder="Enter event address" value="<?php echo $place;?>" data-error="Enteravalied address" required="true"/>
    	 <div class="help-block with-errors"></div>
    </div>


    <div class="form-group">
      <label for="name" class="control-label">Starting Time</label>
        <input type="text" id="starting_time" name="starting_time" class="form-control" size="20" placeholder="Starting Time" value="<?php echo $starting_time;?>" data-error="Enteravalied time" required/>
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      <label for="name" class="control-label">End Time</label>
        <input type="text" id="end_time" name="end_time" class="form-control" size="20" placeholder="End Time" value="<?php echo $end_time;?>" data-error="Enteravalied time" required/>
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      <label for="name" class="control-label">Number of Cameras</label>
        <input type="text" id="no_of_cams" name="no_of_cams" class="form-control" size="20" placeholder="" value="<?php echo $no_of_cams;?>" data-error="" required/>
      <div class="help-block with-errors"></div>
    </div>


    <div class="form-group">
      <label for="name" class="control-label">Package</label>
        <input type="text" id="package_package" name="package_package" class="form-control" size="20" placeholder="Package" value="<?php echo $package_package;?>" data-error="" required/>
      <div class="help-block with-errors"></div>
    </div>

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