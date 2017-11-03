<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Events Calendar</title>
        <link href='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.css' rel='stylesheet' />
        <link href='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />

        <script src='<?php echo base_url(); ?>assets/fullcalendar/lib/jquery.min.js'></script>
        <script src='<?php echo base_url(); ?>template/plugins/daterangepicker/moment.js'></script>
        <script src='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.js'></script>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php include 'application/views/header.php' ?>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <?php include 'application/views/main_header.php' ?>

            <?php include 'application/views/menu.php' ?>



            <!-- Content Wrapper -->
            <div class="content-wrapper" style="min-height: 703px">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="col-lg-9 connectedSortable ui-sortable">


                    <!-- Calendar -->
                    <div class="box box-solid bg-gradient" style="width: 100%">
                        <div class="box-header">
                            <i class="fa fa-calendar"></i>

                            <h3 class="box-title">Calendar</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <!-- button with a dropdown -->

                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%">
                            </div>
                        </div>
                    </div>
          <!--   <input type="hidden" id="hidden_base_url" name="hidden_base_url" value="<?php echo base_url(); ?>"> -->

                </section>



                <section class="col-lg-3 connectedSortable ui-sortable">
                    <br>
                    <!--<img src="<?php //echo base_url(); ?>/assets/images/Videos-1-icon.png" alt="" style="width: 100px;height: 100px"/>-->
                    <b>Reminder</b>

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td><button type="button" class="btn btn-primary btn-xs">Rs 1399</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td><button type="button" class="btn btn-primary btn-xs">Rs 4566</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </section>















            </div>
            <!-- /.content-wrapper -->


            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Created by:&nbsp;<font color="#3c8baa"> Imalka Christeen Wevita </font></strong>
            </footer>


        </div>
        <?php include 'application/views/footer.php' ?>


<?php //echo '-------------------------<br>';
 //echo '<tt><pre>'.var_export($activeEventList, TRUE).'</pre></tt>';
?>

        <script>

            $(document).ready(function () {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                    //defaultDate: '2017-10-12',
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
<?php
if ($activeEventList != FALSE) {
    foreach ($activeEventList as $rows) {
        ?>

                                            {
                                                title: '[<?php echo $rows->id; ?>] <?php echo $rows->event_name; ?>  ',
                                                start: '<?php echo $rows->event_date; ?>',
                                                url: 'http://google.com/',
                                            },
        <?php
    }
}
?>
                                ]
                });

            });

        </script>


        <script type="text/javascript">

            $(document).ready(function () {

                var base_url = $('#hidden_base_url').val();


            });

            function checkEvent(date) {
                var dataSet = {
                    date_x: date,
                    method: 'ajax'
                };

                var dataSentUrl = 'http://localhost/eventmanagementsystem/index.php/calendar/availability';

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: dataSentUrl,
                    data: dataSet,
                    success: function (data) {
                        $('#modal_pkg1').html(data[0].tot);
                        $('#modal_pkg2').html(data[1].tot);
                        $('#modal_pkg3').html(data[2].tot);
                        $('#modal_pkg4').html(data[3].tot);
                        $('#btn_new').attr('data-gotoid', data.date);

                        $('#view_availability').modal();
                    }
                });
            }

            $(document).on('click', '#btn_new', function () {
                var gotoid = $(this).data('gotoid');
                console.log(gotoid);
                $('#view_availability').modal('hide');
                window.location = '<?php echo base_url(); ?>index.php/event/add_new_event/' + gotoid;
            });

            $(document).on('click', '#btn_close', function () {
                $('#modal_pkg1').html('');
                $('#modal_pkg2').html('');
                $('#modal_pkg3').html('');
                $('#modal_pkg4').html('');

                $('#view_availability').modal('hide');
            });



            // var dataSet = {
            //   date_x: date,
            //   method: 'ajax'
            // };

            // var dataSentUrl ='http://localhost/eventmanagementsystem/index.php/calendar/availability';

            // $.ajax({
            //   type: 'POST',
            //   dataType: 'json',
            //   url:dataSentUrl,
            //   data:dataSet,

            //   success: function(data){
            //     $('#modal_pkg1').html(data[0].tot);
            //     $('#modal_pkg2').html(data[1].tot);
            //     $('#modal_pkg3').html(data[2].tot);
            //     $('#modal_pkg4').html(data[3].tot);
            //     $('#modal_date').html(date);

            //     $('#view_availability').modal();
            //   }

        </script>


    </body>
</html>