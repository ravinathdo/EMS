<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Video ADS | Quotation :: Insert</title>
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

                    <h2>Quotation Details</h2><br>


                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7"></div>
                    </div>



                    <form method="post">
                        <div class="form-group">
                            <label for="name" class="control-label">Camera Chargers</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rs.</span>
                                <input type="text" id="cameraChareges" name="cameraChareges" class="form-control" value="<?php extract($xx);
            echo $camera_charge; ?>" readonly />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Transport Charges </label>
                            <div class="input-group">
                                <span class="input-group-addon">Rs.</span>
                                <input type="text" id="transportCharges" name="transportCharges" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rs.</span>
                                <input type="text" id="amount" name="amount" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Discount</label>
                            <input type="text" id="gender" name="gender" class="form-control" size="20" placeholder="Discount" required/>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Total Amount</label>
                            <input type="text" id="address" name="address" class="form-control" size="20" placeholder="Total Amount" required/>
                        </div>


                        <button type="button" id="btn_save" class="btn btn-primary">Save</button>
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

    <script type="text/javascript">

        $(document).ready(function () {

            // Spaces and alphabetics only.
            jQuery.validator.addMethod("lettersOnly", function (value, element) {
                return this.optional(element) || /^[a-z\s]+$/i.test(value);
            }, "Please enter a valid name.");

            // No spaces.
            jQuery.validator.addMethod("noSpace", function (value, element) {
                return value.indexOf(" ") < 0 && value != "";
            }, "No spaces please.");

            // Address rule.
            jQuery.validator.addMethod("addressRule", function (value, element) {
                return this.optional(element) || /^[a-z0-9\s\,\.\/]+$/i.test(value);
            }, "Please enter a valid address.");

            // Telephone number starts with 0.
            $.validator.addMethod('telNumber', function (value, element) {
                return this.optional(element) || /^0\d{9,}$/i.test(value);
            }, 'Please enter a valid telephone number.');

            $('#starting_time').timepicker();
            $('#end_time').timepicker();

            $('#event_insert_form').validate({

                rules: {
                    first_name: {lettersOnly: true, noSpace: true},
                    last_name: {lettersOnly: true, noSpace: true},
                    other_names: {lettersOnly: true},
                    address_line1: {addressRule: true},
                    address_line2: {addressRule: true},
                    address_line3: {addressRule: true},
                    city: {lettersOnly: true, noSpace: true},
                    tel_home: {telNumber: true}
                },

                submitHandler: function (form) {
                    // pkg_id = $('#package_package').val();

                    eventDataSet = $('#event_insert_form').serialize();
                    console.log(eventDataSet);

                    var eventDataSentUrl = 'http://localhost/eventmanagementsystem/index.php/event/insert_newevent_db';

                    $.ajax({

                        type: "POST",
                        dataType: "json",
                        url: eventDataSentUrl,
                        data: eventDataSet,

                        success: function (data) {
                            $('#event_insert_form').each(function () {
                                this.reset();
                            });
                            console.log('Successful!');
                            // Quotation
                            window.location = 'http://localhost/eventmanagementsystem/index.php/quotation';
                        }

                    });
                }

            });



            $('#package_package').change(function () {
                pkg_id = $(this).val();
                date = $('#date').val();
                fiter_cams(pkg_id, date);
            });

            function fiter_cams(pkg_id, date) {

                var dataSet = {
                    pkg_id: pkg_id,
                    date: date,
                    method: 'ajax'
                };

                var dataSentUrl = 'http://localhost/eventmanagementsystem/index.php/event/cam_availability';

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: dataSentUrl,
                    data: dataSet,

                    success: function (data) {
                        var optionVal = '<option value="0">--Select Number of Cameras--</option>';
                        // console.log(data.tot);
                        if (data.tot <= 0) {
                            $('#noCams').modal();
                        } else {
                            for (var i = 1; i <= data.tot; i++) {
                                // console.log(i);
                                optionVal += '<option value=' + i + '>' + i + '</option>';
                            }
                            $('#no_of_cams').html(optionVal);
                        }

                    }

                });

            }


        });

    </script>

</html>