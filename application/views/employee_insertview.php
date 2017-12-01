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
                        <li><i class="fa fa-users"></i> Employees</li>
                        <li>New Employee</li>
                    </ol>
                </section>






                <!-- Main content -->
                <section class="content">

                    <h2>Employee Details</h2><br>


                    <form method="post" action="<?php echo base_url(); ?>employee/insert_newemployee_db">
                        <div class="row">
                            <?php 
                            if (isset($msg)) {
                                echo $msg;
                            }
                            ?>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name" class="control-label">Employee Name</label>
                                    <input type="text" id="employee_name" name="employee_name" class="form-control" size="20" placeholder="Employee name" data-error="Enter a valied name" required/>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label">NID (without 'V')</label>
                                    <input type="number" id="nid" name="nid" class="form-control" size="20" placeholder="Employee NID" data-error="Enter a valied NID" required/>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" class="form-control" size="20" placeholder="Date of Birth" data-error="Enter a valied Date" required/>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label">Gender</label>
                                    <input type="radio" name="gender" value="MALE" checked=""/> MALE
                                    <input type="radio" name="gender" value="FEMALE" /> FEMALE
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label">Employee Address</label>
                                    <input type="text" id="address" name="address" class="form-control" size="20" placeholder="Employee address" data-error="Enter a valied address" required/>
                                    <div class="help-block with-errors"></div>
                                </div>


                            </div>
                            <div class="col-md-7"> 
                                <div class="form-group">
                                    <label for="name" class="control-label">Employee Contact no</label>
                                    <input type="number" id="contact_no" name="contact_no" class="form-control" size="20" placeholder="Employee contact no" data-error="Enter a valied contact no" required/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Email</label>
                                    <input type="text" id="contact_no" name="email" class="form-control" size="20" placeholder="Employee email" data-error="Enter a valied email no" required/>
                                    <div class="help-block with-errors"></div>
                                </div>  <?php
                                if ($posiList != FALSE) {
                                    foreach ($posiList as $rows) {
                                        ?>
                                        <div class="checkbox">
                                            <label><input type="checkbox" id="<?= $rows->posi; ?>" name="position[]" value="<?= $rows->posi; ?>"><?= $rows->description; ?></label>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>




                                <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                            </div>
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
        <?php include 'application/views/footer.php' ?>

    </body>
</html>