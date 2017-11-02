<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>CI Insert Form</title>

 <link rel="stylesheet" href="/eventmanagementsystem/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/eventmanagementsystem/assets/css/bootstrap-theme.min.css">
	<script src ="/eventmanagementsystem/js/jquery.js"></script>
	<script src ="/eventmanagementsystem/js/jquery.min.js"></script>
	<script src ="/eventmanagementsystem/assets/js/bootstrap.min.js"></script>
	<script src ="/eventmanagementsystem/js/validator.js"></script>
	<style>
	input[class="input-large"] {
	width: 400px}
	</style> 

</head>

<body>
<div class="container">
<div class="jumbotron">

<form method="post" action="<?php echo base_url();?>index.php/Employee/update">
<?php
extract($employee);
?>

<div class="form-group">
      <label for="name" class="control-label">Employee Name</label>
	  <input type="text" id="name" name="name" minlength="2" class="form-control" size="20"value="<?php echo $name;?>" data-error="Enter a valied name" required/>
	  <div class="help-block with-errors"></div>
	</div>

<div class="form-group">
      <label for="name" class="control-label">NID</label>
	  <input type="text" id="nid" name="nid" class="form-control" minlength="10" pattern="[a-zA-Z " value="<?php echo $nid;?>" data-error="Enter a valied NID" required/>
	  <div class="help-block with-errors"></div>
	</div>

<div class="form-group">
      <label for="name" class="control-label">Date of Birth</label>
	  <input type="text" id="dob" name="dob" class="form-control" size="20" value="<?php echo $dob;?>" data-error="Enter a valied NID" required/>
	  <div class="help-block with-errors"></div>
	</div>


<div class="form-group">
      <label for="name" class="control-label">Gender</label>
	  <input type="text" id="gender" name="gender" class="form-control" size="20" value="<?php echo $gender;?>" data-error="Enter a valied NID" required/>
	  <div class="help-block with-errors"></div>
	</div>

<div class="form-group">
      <label for="name" class="control-label">Employee Address</label>
	  <input type="text" id="address" name="address" class="form-control" size="20" value="<?php echo $address;?>" data-error="Enter a valied address" required/>
	  <div class="help-block with-errors"></div>
	</div>

<div class="form-group">
      <label for="name" class="control-label">Employee Contact no</label>
	  <input type="text" id="contact_no" name="contact_no" class="form-control" size="20" value="<?php echo $contact_no;?>" data-error="Enter a valied contact no" required/>
	  <div class="help-block with-errors"></div>
	</div>

<div class="checkbox">
  <label><input type="checkbox" id="c" name="c" value="<?php echo $c;?>">Cameraman</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" id="ca" name="ca"value="<?php echo $ca;?>">Camera Assistant</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" id="ta" name="ta"value="<?php echo $ta;?>">Technical Assistant</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" id="se" name="se"value="<?php echo $se;?>">Setup Engineer</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" id="ao" name="ao"value="<?php echo $ao;?>">Audio Operater</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" id="vo" name="vo"value="<?php echo $vo;?>">Vision Operater</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" id="co" name="co"value="<?php echo $co;?>">Customer Officer</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" id="m" name="m"value="<?php echo $m;?>">Manager</label>
</div>


	<tr>
	<th align="right" scope="row">&nbsp;</th>

	<td> <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	<input type="submit" name="edit" value="edit" /></td> 


	</tr>  

	</table> 

	</form> 

	</body> 

	</html>