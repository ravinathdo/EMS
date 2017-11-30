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
                        <li><a href="#"><i class="fa fa-video-camera"></i> Team Manage </a></li>
                        <li><a href="#">New Event</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <?php
                        if (isset($msg)) {
                            echo $msg;
                        }
                        ?>
                        <div class="col-md-5">
                            
                            <h2>Event : <?= $event_id;?> [<?= $event_date; ?>]</h2>
                            
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="AUDIO_OPERATER" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">AUDIO OPERATOR</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($AUDIO_OPERATER_LIST != FALSE) {
                                        foreach ($AUDIO_OPERATER_LIST as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add AUDIO OPERATOR</button>
                            </div>
                            <?php echo form_close(); ?>

                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="CAMERAMAN" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">CAMERAMAN</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($CAMERAMAN_LIST != FALSE) {
                                        foreach ($CAMERAMAN_LIST as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add CAMERAMAN</button>
                            </div>

                            <?php echo form_close(); ?>
                            
                            
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="CAMERA_ASSISTANT" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">CAMERA ASSISTANT</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($CAMERA_ASSISTANT_LIST != FALSE) {
                                        foreach ($CAMERA_ASSISTANTR_LIST as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add CAMERA ASSISTANT</button>
                            </div>
                            <?php echo form_close(); ?>
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="CUSTOMER_OFFICER" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">CUSTOMER OFFICER</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($CUSTOMER_OFFICER != FALSE) {
                                        foreach ($CUSTOMER_OFFICER as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add CUSTOMER OFFICER</button>
                            </div>
                            <?php echo form_close(); ?>
                            
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="FLOW_MANAGER" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">FLOW MANAGER</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($FLOW_MANAGER != FALSE) {
                                        foreach ($FLOW_MANAGER as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add FLOW MANAGER</button>
                            </div>
                            <?php echo form_close(); ?>
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="MANAGER" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">MANAGER</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($MANAGER != FALSE) {
                                        foreach ($MANAGER as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add MANAGER</button>
                            </div>
                            <?php echo form_close(); ?>
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="MANAGER" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">MANAGER</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($MANAGER != FALSE) {
                                        foreach ($MANAGER as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add MANAGER</button>
                            </div>
                            <?php echo form_close(); ?>
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="SETUP_ENGINEER" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">SETUP ENGINEER</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($SETUP_ENGINEER != FALSE) {
                                        foreach ($SETUP_ENGINEER as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add SETUP ENGINEER</button>
                            </div>
                            <?php echo form_close(); ?>
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="TECHNICAL_ASSISTANT" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">TECHNICAL ASSISTANT</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($TECHNICAL_ASSISTANT != FALSE) {
                                        foreach ($TECHNICAL_ASSISTANT as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add TECHNICAL ASSISTANT</button>
                            </div>
                            <?php echo form_close(); ?>
                            <?php echo form_open('team/teamForTheEvent'); ?>
                            <div class="form-group">
                                <input type="hidden" name="position_id" value="VISION_OPERATER" />
                                <input type="hidden" name="event_date" value="<?= $event_date; ?>" />
                                <input type="hidden" name="event_id" value="<?= $event_id; ?>" />
                                <label for="exampleInputEmail1">VISION OPERATER</label>
                                <select class="form-control" required="" name="employee_id">
                                    <option value="">--select employee--</option>
                                    <?php
                                    if ($VISION_OPERATER != FALSE) {
                                        foreach ($VISION_OPERATER as $rows) {
                                            ?>
                                            <option value="<?= $rows->id; ?>"> <?= $rows->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Add VISION OPERATER</button>
                            </div>
                            <?php echo form_close(); ?>


                        </div>
                        <div class="col-md-7">



                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Employee Name</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Position</th>
                                        <th>Employee Name</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if ($eventTeamList != FALSE) {
                                        foreach ($eventTeamList as $rows) {
                                            ?>
                                            <tr>
                                                <td><span class="btn btn-success btn-xs"><?= $rows->position_id; ?></span></td>
                                                <td><?= $rows->name; ?></td>
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