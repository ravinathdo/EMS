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
        <li><a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Packages</a></li>
        <li><a href="#">View Packages</a></li>
      </ol>
    </section>









  <!-- Main content -->
  <section class="content">

    <h2> Packages</h2>

    <table class="table table-hover" >
      <thead>
      <tr>
        <th scope="col" width="15%">Package</th>
        <th scope="col" width="20%" >Number of Cameras</th>
        <th scope="col" width="20%">Charge per camera</th>
        <th scope="col" width="20%">Description</th>
      </tr>
      </thead>

    <?php foreach ($package_list as $p_key){ ?>

      <tbody>
      <tr>
        <td><?php echo $p_key->package; ?></td>
        <td><?php echo $p_key->no_of_cameras; ?></td>
        <td><?php echo $p_key->charge_per_cam; ?></td>
        <td><?php echo $p_key->description; ?></td>

        <td width="5%" align="left">
          <a class="btn btn-primary" href="#" onClick="show_confirm('edit',<?php echo $p_key->id;?>)" alt="Edit">
          <i class="fa fa-pencil-square-o" aria-hidden="true">
          </i>
          </a>
        </td>

      <td width="40%" align="left" >
        <a class="btn btn-primary" href="#" onClick="show_confirm('delete',<?php echo $p_key->id;?>)" aria-label="Delete">
        <i class="fa fa-trash-o" aria-hidden="true">
        </i>
        </a>
      </td>

      </tr>

      <?php }?>

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