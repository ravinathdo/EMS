<!DOCTYPE html>
<html>
    <head>

        <script type="text/javascript">
            function show_confirm(act, gotoid)
            {
                if (act == "edit")
                    var r = confirm("Do you really want to edit?");
                else
                    var r = confirm("Do you really want to delete?");
                if (r == true)
                {
                    window.location = "<?php echo base_url(); ?>index.php/customer/" + act + "/" + gotoid;
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Customer</a></li>
                        <li><a href="#">View Customers</a></li>
                    </ol>
                </section>








                <!-- Main content -->
                <section class="content">

                    <div class="container">

                        <h2> Customer Details</h2>

                        <?php
                        if (isset($msg)) {
                            echo $msg;
                        }
                        ?>

                        <table class="table table-hover" >
                            <thead>
                                <tr>
                                    <th scope="col" width="20%">Name</th>
                                    <th scope="col" width="30%">Address</th>
                                    <th scope="col" width="12%">Contact_no</th>
                                </tr>
                            </thead>

<?php foreach ($customer_list as $c_key) { ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $c_key->name; ?></td>
                                        <td><?php echo $c_key->address; ?></td>
                                        <td><?php echo $c_key->tele; ?></td>

                                        <td width="5%" align="left">
                                            <a class="btn btn-primary" href="#" onClick="show_confirm('edit',<?php echo $c_key->id; ?>)" alt="Edit">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true">
                                                </i>
                                            </a>
                                        </td>

                                        <td width="40%" align="left" >
                                            <a class="btn btn-primary" href="#" onClick="show_confirm('delete',<?php echo $c_key->id; ?>)" aria-label="Delete">
                                                <i class="fa fa-trash-o" aria-hidden="true">
                                                </i>
                                            </a>
                                        </td>

                                    </tr>
                                </tbody>

<?php } ?>

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