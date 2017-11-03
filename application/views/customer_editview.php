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
                        <li><i class="fa fa-users"></i> Customer</li>
                        <li>Edit Customer</li>
                    </ol>
                </section>






                <!-- Main content -->
                <section class="content">

                    <h2>Customer Details</h2><br>

                    <form data-toggle="validator" role="form" method="post" action="<?php echo base_url(); ?>index.php/Customer/update">
                        <?php
                        extract($customer);
                        ?>



                        <div class="form-group">
                            <label for="id" class="control-label">Enter your Name</label>
                            <input type="text"  pattern="^[a-zA-Z ]*$"  id="customer_name" name="customer_name" class="form-control" size="20" value="<?php echo $name; ?>" data-error="Customer Name is invalid" required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="id" class="control-label">Enter your Address</label>
                            <input type="text" id="address" name="address" class="form-control" size="20" value="<?php echo $address; ?>" data-error="Address Id is invalid" required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="id" class="control-label">Enter your Contact Number</label>
                            <input type="text"  pattern="^[0-9]+$"  id="tele" name="tele" class="form-control" size="20" value="<?php echo $tele; ?>" data-error="Contact Number is invalid" required/>
                            <div class="help-block with-errors"></div>
                        </div>



                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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
</html>