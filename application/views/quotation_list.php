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
        <li><a href="#"><i class="fa fa-suitcase"></i> Package</a></li>
        <li><a href="#">New Package</a></li>
      </ol>
    </section>









    <!-- Main content -->
    <section class="content">

    <h2>Quotation Details Form</h2><br>
    
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>QID</th>
                <th>Event Name</th>
                <th>Cam chargers</th>
                <th>Other charges</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>QID</th>
                <th>Event Name</th>
                <th>Cam chargers</th>
                <th>Other charges</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Status</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
                <?php
                if ($quoList != FALSE) {
                    foreach ($quoList as $rows) {
                        ?>
            <tr >
                            <td><?= $rows->id; ?></td>
                            <td><?= $rows->event_name; ?></td>
                            <td><?= $rows->camera_charges; ?></td>
                            <td><?= $rows->other; ?></td>
                            <td><?= $rows->discount; ?></td>
                            <td><?= $rows->total; ?></td>
                            <td><?= $rows->booked_or_not; //event_id ?></td>
                            <td><?php if($rows->status != 'payment done'){ ?>
                                <a href="<?php echo base_url('payment/load_payment/'.$rows->id.'/'.$rows->eid);?>"> Next Payment</a>
                            <?php }else{
                                ?> 
                              <a href="<?php echo base_url('payment/load_payment/'.$rows->id.'/'.$rows->eid);?>" class="btn btn-success btn-xs"  >Payment completed</a>
                                <?php
                            } ?>
                            </td>
                        </tr>

                    <?php
                    }
                }
                ?>
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

</body>

<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/validator.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
//            alert('jq');
            //$('#myForm').validator();
        });

    </script>
    <?php include 'application/views/footer.php' ?>
    
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );</script>
</html>