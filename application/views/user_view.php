<!DOCTYPE html>
<html>
<head>

<title>Login Form</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Video ADS </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/style.css"> 

  <?php include 'application/views/header.php' ?>
  <!-- login -->
  
</head>

<body class="hold-transition skin-blue sidebar-mini">

     






<!-- Main content -->
    <section class="content">
      <div id="bg"></div>

      <form method='POST' action='<?php echo base_url();?>index.php/user/verify_login'>

        <input type="text" name="username" id="username" placeholder="user name"" " class="email">
        <br> 
        <input type="password" name="password" id="password" placeholder="password" class="pass">
    
        <button type="submit">login to your account</button>
    
        </form>

      <?php echo form_close(); ?>
 

</body>
</html>
