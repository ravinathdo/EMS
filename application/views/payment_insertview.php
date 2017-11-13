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

                    <div class="row">
                        <div class="col-md-5">
                            <h2>Payment Details Form</h2><br>

                            <form method="post" action="<?php echo base_url('payment/insert_newpayment_db'); ?>">
                                <input type="hidden" name="event_id" value="<?= $eventDetail['id']; ?>" />
                                <table width="400" border="0" cellpadding="5">

                                    <div class="form-group">
                                        <label for="quotation_id">Quotation ID</label>
                                        <input type="text" readonly="true" value="<?= $quoDetail['id']; ?>"  name="quotation_id"  class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="control-label">Pay Amount</label>
                                        <input type="text" id="payment" name="payment" class="form-control" size="20" placeholder="amount" data-error="Enter a valied amount" required/>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <tr>
                                        <th align="right" scope="row">&nbsp;</th>
                                        <td><input type="submit" name="submit" value="Pay" /></td>
                                    </tr>

                                </table>
                            </form>
                            <?php 
                            if(isset($msg)){
                                echo msg;
                            }
                            ?>

                        </div>
                        <div class="col-md-7">


                            <table class="table table-bordered">
                                <!--                                 id' => '1',
                                  'event_date' => '2017-10-31',
                                  '' => 'Ruwan doratuwa',
                                  'place' => 'Dompe',
                                  'starting_time' => '16:30:00',
                                  'end_time' => '18:30:00',
                                  'no_of_cams' => '2',
                                  'booked_or_not' => 'booked',
                                  'balance_amount' => NULL,
                                  'customer_id' => '1',
                                  'package_id' => '1',
                                  'usercreated' => NULL,
                                  'timecreated' => '2017-10-31 05:33:03',-->
                                <tbody>
                                    <tr>
                                        <td>


                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Event ID</label>
                                                    <div class="col-sm-8">
                                                      <?= $eventDetail['id']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Event Name</label>
                                                    <div class="col-sm-8">
                                                         <?= $eventDetail['event_name']; ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Event Date</label>
                                                    <div class="col-sm-8">
                                                         <?= $eventDetail['event_date']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Balance Amount</label>
                                                    <div class="col-sm-8">
                                                        <h2>  <?= $eventDetail['balance_amount']; ?> </h2>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label"></label>
                                                    <div class="col-sm-8">
                                                        <span class="btn btn-default btn-lg">  <?= $eventDetail['booked_or_not']; ?> </span>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </td>
                                        <td> 
<!--                                             'camera_charges' => '130000',
  'other' => '1500',
  'discount' => '122',
  'total' => '131378.00',
  'event_id' => '49',-->
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Quotation ID</label>
                                                    <div class="col-sm-8">
                                                      <?= $quoDetail['id']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Cam charges</label>
                                                    <div class="col-sm-8">
                                                         <?= $quoDetail['camera_charges']; ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Other</label>
                                                    <div class="col-sm-8">
                                                         <?= $quoDetail['other']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Discount</label>
                                                    <div class="col-sm-8">
                                                         <?= $quoDetail['discount']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Total</label>
                                                    <div class="col-sm-8">
                                                        <h2>  <?= $quoDetail['total']; ?></h2>
                                                    </div>
                                                </div>
                                                
                                            </form></td>
                                    </tr>
                                    
                                </tbody>
                            </table>

<hr>

<h3>Payment History</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Receipt No</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
   <tbody>
                <?php
                if ($paymentHistory != FALSE) {
                    foreach ($paymentHistory as $rows) {
                        ?>
                        <tr>
                            <td><?= $rows->id; ?></td>
                            <td><?= $rows->payment; ?></td>
                            <td><?= $rows->paydate; ?></td>
                        </tr>

                    <?php
                    }
                }
                ?>
        </tbody>
</table>


                        </div>
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