<<!DOCTYPE html>
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
window.location="<?php echo base_url();?>index.php/event/"+act+"/"+gotoid;
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

<h2> Team Details</h2>

<table class="table table-hover" >

<!-- <label for="event_name">Event Name <?php echo $event_id; ?></label> -->
<h5>Event Name <span class="label label-default"></span></h5>

   <h2>Event Name</h2>
  <!-- <label for="event_name"><?php echo $event_name; ?></label> -->
  
      
     
    <thead>
    <tr>

<th scope="col">Employee Name</th>
<th scope="col">Position</th>

</tr>
</thead>
<?php foreach ($cam_list as $cam_key){ ?>

<tbody>
<tr>


              
                <?php echo $cam_key->name; ?></label></div>
                 <br/><br/>
                <?php 
                }?>  


<td width="40" align="left"><a class="btn btn-primary" href="#" onClick="show_confirm('edit',<?php echo $ev_key->id;?>)" alt="Edit">
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>


</a></td>

<td width="40" align="left" >
<a class="btn btn-primary" href="#" onClick="show_confirm('delete',<?php echo $ev_key->id;?>)" aria-label="Delete">
    <i class="fa fa-trash-o" aria-hidden="true"></i>
  </a></td>

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
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
      reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  <?php include 'application/views/footer.php' ?>

</body>
</html>