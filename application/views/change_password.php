<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Video ADS | Event :: Insert</title>
        <!-- Tell the browser to be responsive to screen width -->


        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <?php include 'application/views/header.php' ?>

        <style type="text/css">
            #date-error.error {
                display: none;
            }

            .input-group-addon {
                height: 34px;
            }
        </style>

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
                        <li><a href="#"><i class="fa fa-video-camera"></i> Event</a></li>
                        <li><a href="#">New Event</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">

                            <?php echo form_open('user/changePassword') ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Password</label>
                                <input required="" type="password" name="currentpass" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input required="" type="password" name="newpass" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Retype Password</label>
                                <input required="" type="password" name="retypepass" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"></label>
                                <button type="submit" class="btn btn-default">Change Password</button>
                            </div>
                            <?php echo form_close() ?>

                            <?php
                            if (isset($msg)) {
                                echo $msg;
                            }
                            ?>

                        </div>
                        <div class="col-md-4"></div>
                    </div>



                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->



            <!-- MODAL -->
            <div id="noCams" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" width="700px">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>No available cameras for this package.</h4>   
                            <div class="modal-footer">
                                <button type="button" id="btn_close" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL -->



            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Created by:&nbsp;<font color="#3c8baa"> Imalka Christeen Wevita </font></strong>
            </footer>

        </div>

    </body>

    <?php include 'application/views/footer.php' ?>




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
                    pkg_id = $('#package_package').val();

                    eventDataSet = $('#event_insert_form').serialize();
                    console.log(eventDataSet);

                    var eventDataSentUrl = 'http://localhost/eventmanagementsystem/event/insert_newevent_db';

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
                            window.location = 'http://localhost/eventmanagementsystem/quotation';
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