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

                    <h2>Event Creation</h2><br>
<?php if(isset($msg)){
     echo $msg;
}?>
                    <?php echo form_open('event/insert_newevent_db'); ?>
                    <div class="row">
                        <div class="col-md-5">


                            <div class="form-group">
                                <label for="name" class="control-label">Event Date</label>
                                <input type="date" id="date" name="event_date" class="form-control"  required/>
                            </div>



                            <div class="form-group">
                                <label for="customer_id">Customer Name</label>
                                <select class="form-control" id="customer_id" name="customer_id">
                                    <option value="0" disabled selected>--Select Customer--</option>
                                    <?php foreach ($customers as $customer) { ?>
                                        <option value = "<?php echo $customer->id; ?>|<?php echo $customer->tele; ?>"><?php echo $customer->name; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name" class="control-label">Event Name</label>
                                <input type="text" id="event_name" name="event_name" class="form-control" size="20" placeholder="Enter Your Event Name" required/>
                            </div>



                            <div class="form-group">
                                <label for="name" class="control-label">Place</label>
                                <input type="text" id="place" name="place" class="form-control" size="20" placeholder="Enter Event Address" data-error="Enteravalied address" required/>
                            </div>





                        </div>

                        <div class="col-md-7">

                            <table class="table table-bordered" style="width:50%">
                                <tr>
                                    <td><label for="customer_id">Starting Time</label></td>
                                    <td> <input type="time" name="starting_time" required=""/></td>
                                </tr>
                                <tr>
                                    <td><label for="customer_id">End Time</label></td>
                                    <td> <input type="time" name="end_time" required=""/></td>
                                </tr>
                            </table>






                            <div class="form-group">
                                <label for="customer_id">Package</label>
                                <select class="form-control" id="package_package" name="package_id">
                                    <option value="0" disabled selected>--Select Package--</option>
                                    <?php foreach ($packages as $package) { ?>
                                        <option value = "<?php echo $package->id; ?>|<?php echo $package->charge_per_cam; ?>|<?php echo $package->package; ?>|<?php echo $package->no_of_cameras; ?>"><?php echo $package->package; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="no_of_cams" class="control-label">Number of Cameras</label>
                                <input type="number" id="no_of_cams" name="no_of_cams" class="form-control" size="20" placeholder="Enter Number of Cameras" data-error="Enteravalied address" required/>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="btn1" class="btn btn-primary">Create Event</button>
                            </div>

                        </div>
                    </div>
                    <?php echo form_close(); ?>



                </section>
                <!-- /.content -->


                <!--event-list-->
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <th>Event ID</th>
                                    <th>Date-Time</th>
                                    <th>Event Name</th>
                                    <th>Place</th>
                                    <th>No of cams</th>
                                    <th>Status</th>
                                    <th>Timecreated</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Date-Time</th>
                                    <th>Event Name</th>
                                    <th>Place</th>
                                    <th>No of cams</th>
                                    <th>Status</th>
                                    <th>Timecreated</th>

                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                if ($eventList != FALSE) {
                                    foreach ($eventList as $rows) {
                                        ?>
                                        <tr>
                                            <td><?= $rows->id; ?></td>
                                            <td><?= $rows->event_date; ?> [
                                                <?= $rows->starting_time; ?> to <?= $rows->end_time; ?>]</td>
                                            <td><?= $rows->event_name; ?></td>
                                            <td><?= $rows->place; ?></td>
                                            <td><?= $rows->no_of_cams; ?></td>
                                            <td><?php if($rows->booked_or_not == 'pending'){ ?>
                                                <a href="<?php echo base_url()?>event/loadBookNow/<?= $rows->id; ?>" class="btn btn-warning btn-xs">pending</a>
                                            <?php }else{
                                                echo $rows->booked_or_not;
                                            }  ?></td>
                                            <td><?= $rows->timecreated; ?></td>
                                        </tr>

                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.event-list-->


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


    <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
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