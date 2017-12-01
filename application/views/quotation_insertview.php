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
                    <p class="bg-success"><b>Event Created Successfully Next Payment for Booking</b></p>
                    <?php echo form_open('quotation/setQuatation', 'class="form-horizontal"'); ?>
                    <div class="row" ng-app="myApp" ng-controller="myCtrl" ng-init="init()">
                        <div class="col-md-4"><h2>Event No: <?= $event_id ?></h2>
                            <input type="hidden" name="event_id" value="<?= $event_id ?>" /></div>
                        
                        <div class="col-md-8">



                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Package</label>
                                <div class="col-sm-6">
                                    <?= $package_name ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">No of cams</label>
                                <div class="col-sm-6">
                                    <?= $no_of_cams ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Camera Charges</label>
                                <div class="col-sm-6">
                                    <input type="text" name="camera_charges"  class="form-control" id="camera_charges" value="<?= $camera_charges ?>" readonly="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Other Charges</label>
                                <div class="col-sm-6">
                                    <input type="number" name="other" class="form-control" id="inputEmail3" ng-model="other"   ng-change="calValue()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Discount</label>
                                <div class="col-sm-6">
                                    <input type="number" name="discount" class="form-control" id="inputEmail3" ng-model="discount" ng-change="calValue()" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Total Amount</label>
                                <div class="col-sm-6">
                                    <input type="text" name="total" class="form-control" id="inputEmail3" ng-model="total" readonly="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Pay Amount</label>
                                <div class="col-sm-6">
                                    <input type="number" name="pay_amount"  class="form-control" id="inputEmail3" ng-model="pay_amount"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <h3><button type="submit" class="btn btn-warning">Book-NOW</button>
                                    <tt> Balance Payment : {{total - pay_amount}}</tt>
                                    <input type="hidden" value="{{total - pay_amount}}" name="balance_amount" />
                                    </h3>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php echo form_close(); ?>



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



    <script src="<?php echo base_url(); ?>js/angular.min.js" type="text/javascript"></script>
    <script>
                                        var app = angular.module('myApp', []);
                                        app.controller('myCtrl', function ($scope) {

                                            $scope.other = parseInt(0);
                                            $scope.discount = parseInt(0);
                                                    $scope.init = function () {
                                                        // $scope.camera_charges = parseInt(<?= $camera_charges ?>);
                                                    }

                                            $scope.calValue = function () {
                                                console.log('calValue START');
                                                //get camera_charges value
                                                var camera_charges = document.getElementById('camera_charges').value;
                                                $scope.total = parseInt(camera_charges) + parseInt($scope.other) - parseInt($scope.discount);

                                                if ($scope.other < 0 ) {
                                                    $scope.other = 0;
                                                }
                                                if ($scope.discount < 0) {
                                                    $scope.discount = 0;
                                                }

                                                console.log('calValue END');
                                            }

                                        });
    </script>





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