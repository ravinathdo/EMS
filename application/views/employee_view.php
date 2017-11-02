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
  <div class="container">
        <h2> Employees</h2>

        <table class="table table-hover" >
          <thead>
            <tr>
              <th scope="col">Employee no</th>
              <th scope="col">Employee Name</th>
              <th scope="col">NID</th>
              <th scope="col">Date of Birth</th>
              <th scope="col">Gender</th>
              <th scope="col">Address</th>
              <th scope="col">Contact no</th>
              <th scope="col" align="center">C</th>
              <th scope="col" align="center">CA</th>
              <th scope="col" align="center">TA</th>
              <th scope="col" align="center">SE</th>
              <th scope="col" align="center">AO</th>
              <th scope="col" align="center">VO</th>
              <th scope="col" align="center">FM</th>
              <th scope="col" align="center">CO</th>
              <th scope="col" align="center">M</th>
            </tr>
          </thead>
          <?php foreach ($employee_list as $e_key){ ?>
          <tbody>
            <tr>
              <td><?php echo $e_key->id; ?></td>
              <td><?php echo $e_key->name; ?></td>
              <td><?php echo $e_key->nid; ?></td>
              <td><?php echo $e_key->dob; ?></td>
              <td><?php echo $e_key->gender; ?></td>
              <td><?php echo $e_key->address; ?></td>
              <td><?php echo $e_key->contact_no; ?></td>
              <?php }?>
              <?php foreach ($position_list as $p_key){ ?>
              <td><?php echo $p_key->position; ?></td>
              
              <td width="40" align="left">
                  <a class="btn btn-primary" href="#" onClick="show_confirm('edit',<?php echo $e_key->id;?>)" alt="Edit">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td width="40" align="left" >
                  <a class="btn btn-primary" href="#" onClick="show_confirm('delete',<?php echo $e_key->id;?>)" aria-label="Delete">
                  <i class="fa fa-trash-o" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php }?>
          </tbody>
        </table>
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
  <?php include 'application/views/footer.php' ?>

</body>
</html>