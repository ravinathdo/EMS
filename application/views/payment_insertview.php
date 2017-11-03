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
        <li><a href="#"><i class="fa fa-folder"></i> Payment</a></li>
        <li><a href="#">New Payment</a></li>
      </ol>
    </section>












    <!-- Main content -->
    <section class="content">

    <h2>Payment Details Form</h2><br>

    <form method="post" action="<?php echo base_url();?>index.php/payment/insert_newpayment_db">

    <table width="400" border="0" cellpadding="5">

      <div class="form-group">
        <label for="quotation_id">Quotation ID</label>
        	<select class="form-control" id="quotation_id" name="quotation_id">
           <?php
            foreach ($quotations as $quotation){ ?>
            <option value = "<?php echo $quotation->id; ?>"><?php echo $quotation->name; ?></option>
           <?php } ?> 
       	</select>
      </div>

      <div class="form-group">
        <label for="name" class="control-label">Date</label>
      	  <input type="text" id="date" name="date" class="form-control" size="20" placeholder="date" data-error="Enter a valied date" required/>
      	  <div class="help-block with-errors"></div>
      	</div>

      <div class="form-group">
        <label for="name" class="control-label">Payed Amount</label>
      	  <input type="text" id="payed" name="payed" class="form-control" size="20" placeholder="amount" data-error="Enter a valied amount" required/>
      	  <div class="help-block with-errors"></div>
      	</div>

      <tr>
        <th align="right" scope="row">&nbsp;</th>
        <td><input type="submit" name="submit" value="Print Receipt" /></td>
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