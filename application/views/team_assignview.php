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
        <li><a href="#"><i class="fa fa-dashboard"></i> Team</a></li>
        <li><a href="#">Assign Team</a></li>
      </ol>
    </section>










<!-- Main content -->
    <section class="content">

      <h2>Assign A Team</h2><br>

      <form method="post" action="<?php echo base_url();?>index.php/event/get_no_of_cams">
      <table width="400" border="0" cellpadding="5">

        <div class="form-group">
          <label for="event_name">Event Name</label>
          <select class="form-control" id="event_id" name="event_id">
            <?php
              foreach ($event_list as $event){ ?>
              <option value = "<?php echo $event->id; ?>"><?php echo $event->event_name; ?></option>
            <?php } ?> 
         </select>
        </div>
      
      <tr>
        <th align="right" scope="row">&nbsp;</th>
        <td><input type="submit" name="submit" value="Send" /></td>
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