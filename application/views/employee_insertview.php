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
          <li><i class="fa fa-users"></i> Employees</li>
          <li>New Employee</li>
        </ol>
      </section>






      <!-- Main content -->
      <section class="content">

      <h2>Employee Details</h2><br>

    
  
    
    
    
  <form method="post" action="<?php echo base_url();?>index.php/employee/insert_newemployee_db">
      <div class="form-group">
        <label for="name" class="control-label">Employee Name</label>
      	<input type="text" id="employee_name" name="employee_name" class="form-control" size="20" placeholder="Employee name" data-error="Enter a valied name" required/>
      	<div class="help-block with-errors"></div>
      </div>

      <div class="form-group">
        <label for="name" class="control-label">NID</label>
    	  <input type="text" id="nid" name="nid" class="form-control" size="20" placeholder="Employee NID" data-error="Enter a valied NID" required/>
    	  <div class="help-block with-errors"></div>
    	</div>

      <div class="form-group">
        <label for="name" class="control-label">Date of Birth</label>
    	  <input type="text" id="dob" name="dob" class="form-control" size="20" placeholder="Date of Birth" data-error="Enter a valied Date" required/>
    	  <div class="help-block with-errors"></div>
    	</div>

      <div class="form-group">
        <label for="name" class="control-label">Gender</label>
  	    <input type="text" id="gender" name="gender" class="form-control" size="20" placeholder="Gender" data-error="" required/>
    	  <div class="help-block with-errors"></div>
    	</div>

      <div class="form-group">
        <label for="name" class="control-label">Employee Address</label>
    	  <input type="text" id="address" name="address" class="form-control" size="20" placeholder="Employee address" data-error="Enter a valied address" required/>
    	  <div class="help-block with-errors"></div>
    	</div>

      <div class="form-group">
        <label for="name" class="control-label">Employee Contact no</label>
    	  <input type="text" id="contact_no" name="contact_no" class="form-control" size="20" placeholder="Employee contact no" data-error="Enter a valied contact no" required/>
    	  <div class="help-block with-errors"></div>
    	</div>

      <div class="checkbox">
        <label><input type="checkbox" id="c" name="check[]" value="c">Cameraman</label>
      </div>

      <div class="checkbox">
        <label><input type="checkbox" id="ca" name="check[]"value="ca">Camera Assistant</label>
      </div>

      <div class="checkbox">
        <label><input type="checkbox" id="ta" name="check[]"value="ta">Technical Assistant</label>
      </div>

      <div class="checkbox">
        <label><input type="checkbox" id="se" name="check[]"value="se">Setup Engineer</label>
      </div>

      <div class="checkbox">
        <label><input type="checkbox" id="ao" name="check[]"value="ao">Audio Operater</label>
      </div>

      <div class="checkbox">
        <label><input type="checkbox" id="vo" name="check[]"value="vo">Vision Operater</label>
      </div>

      <div class="checkbox">
        <label><input type="checkbox" id="fm" name="check[]"value="fm">Flow Manager</label>
      </div>


      <div class="checkbox">
        <label><input type="checkbox" id="co" name="check[]"value="co">Customer Officer</label>
      </div>

      <div class="checkbox">
        <label><input type="checkbox" id="m" name="check[]"value="m">Manager</label>
      </div>
<input type="submit" name="submit" value="Submit" />
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