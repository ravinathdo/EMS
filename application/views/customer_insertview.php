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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Customer</a></li>
                        <li><a href="#">New Customer</a></li>
                    </ol>
                </section>


                <!-- Main content -->
                <section class="content">

                    <h2>Customer Details Form</h2><br>
                    <?php
                    if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-5"><form data-toggle="validator" role="form" id="new_customer_form" method="post" action="<?php echo base_url(); ?>customer/insert_newcustomer_db" >


                                <div class="form-group">
                                    <label for="customer_name" class="control-label">Customer Name </label>
                                    <input type="text"  pattern="^[a-zA-Z ]*$" id="customer_name" name="customer_name" class="form-control" minlength="2" placeholder="Enter customer name" data-error="Enter a valied customer name"  required/>
                                    <div class="help-block with-errors"></div>
                                </div>


                                <div class="form-group">
                                    <label for="name" class="control-label">Address </label>
                                    <input type="text" id="address" name="address" class="form-control required number" minlength="2" placeholder="Enter customer address" data-error="Enter a valied address" required/>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label">Contact number</label>
                                    <input type="number"  id="tele" name="tele" class="form-control required number" minlength="10" maxlength="12" placeholder="Enter your Contact number" data-error="Enter a valied telephone number" required/>
                                    <div class="help-block with-errors"></div>
                                </div>


                    <!--<input type="submit" name="submit" value="Submit" class="btn btn-primary"/>-->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Customer</button>
                                </div>
                            </form></div>
                        <div class="col-md-7">

                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Telephone</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Telephone</th>
                                        
                                    </tr>
                                </tfoot>
                                <tbody>
                                   
                                    <?php
                if ($custList != FALSE) {
                    foreach ($custList as $rows) {
                        ?>
                        <tr>
                            <td>#<?= $rows->id; ?></td>
                            <td><?= $rows->name; ?></td>
                            <td><?= $rows->address; ?></td>
                            <td><?= $rows->tele; ?></td>
                        </tr>

                    <?php
                    }
                }
                ?>
                                </tbody></table>
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


    </body>

   
    <script src="<?php echo base_url(); ?>js/validator.js"></script>



     <script src="<?php echo base_url(); ?>js/jquery-1.12.4.js"></script>
   
    <?php include 'application/views/footer.php' ?>
    
    <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
     <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</html>