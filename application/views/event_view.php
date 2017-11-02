<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript">
    function show_confirm(act,gotoid)
    {
    if(act=="edit")
    var r=confirm("Do you really want to edit?");
    else
    var r=confirm("Do you really want to delete?");
    if (r==true)
    {
    window.location="<?php echo base_url();?>index.php/package/"+act+"/"+gotoid;
    }
    }
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Video ADS </title>
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
          <li><a href="#"><i class="fa fa-video-camera" aria-hidden="true"></i> Event</a></li>
          <li><a href="#">View Events</a></li>
        </ol>
      </section>










      <!-- Main content -->
      <section class="content">

        <h2> Event Details</h2>

        <table class="table table-hover" >
        <thead>
        <tr>
          <th scope="col">Event Name</th>
          <th scope="col">Event Date</th>
          <th scope="col">Place</th>
          <th scope="col">Starting Time</th>
          <th scope="col">End Time</th>
          <th scope="col">Number of Cameras</th>
          <th scope="col">Package</th>
          <th scope="col">Booked Or Not</th>
        </tr>
        </thead>

        <?php foreach ($event_list as $ev_key){ ?>

        <tbody>
        <tr>
          <td><?php echo $ev_key->event_name; ?></td>
          <td><?php echo $ev_key->date; ?></td>
          <td><?php echo $ev_key->place; ?></td>
          <td><?php echo $ev_key->starting_time; ?></td>
          <td><?php echo $ev_key->end_time; ?></td>
          <td align="center"><?php echo $ev_key->no_of_cams; ?></td>
          <td><?php echo $ev_key->package_id; ?></td>
          <td><?php echo $ev_key->booked_or_not; ?></td>

          <td width="40" align="left">
            <a class="btn btn-primary" href="#" onClick="show_confirm('edit',<?php echo $ev_key->id;?>)" alt="Edit">
            <i class="fa fa-pencil-square-o" aria-hidden="true">
            </i>
            </a>
          </td>

          <td width="40" align="left" >
            <a class="btn btn-primary" href="#" onClick="show_confirm('delete',<?php echo $ev_key->id;?>)" aria-label="Delete">
            <i class="fa fa-trash-o" aria-hidden="true">
            </i>
            </a>
          </td>

        </tr>

        <?php }?>

        </tbody>
        </table>

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