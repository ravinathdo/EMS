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
  <!--   <input type="hidden" id="hidden_base_url" name="hidden_base_url" value="<?php echo base_url();?>"> -->

</section>




    



<!-- MODAL -->
<div id="view_calendar_reservations" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" width="700px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="modalTitle"></h4>
      </div>

      <div class="modal-body">
       <table class="table table-hover" >
         <tbody>
         
          <tr>
              <td scope="col" width="50%">Place:</td>
              <td scope="col" width="50%"><h4 class="modal-title" id="modalPlace"></h4></td>
          </tr>

          <tr>
              <td scope="col" width="50%">Package :</td>
              <td scope="col" width="50%"><h4 class="modal-title" id="modalPackage"></h4></td>
          </tr>

          <tr>
              <td scope="col" width="50%">No of cams :</td>
              <td scope="col" width="50%"><h4 class="modal-title" id="modalNo_of_cams"></h4></td>
          </tr>

          </tbody>
          </table>

        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url();?>index.php/event/all_events">
        <button type="button" class="btn btn-primary">More Details</button></a>
        </div>
            </div>
          </div>
        </div>
      </div>
<!--MODAL-->










<section class="col-lg-3 connectedSortable ui-sortable" style="height: 687px">
<aside class="main-rightsidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   <!--  <section class="sidebar-right"> -->
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel"> -->
        <div class="pull-left image">
          <img src="<?php echo base_url();?>template/dist/user/1.jpg" class="img-rounded" width="220" height="200"/>
        </div>
       <div class="pull-left image">
          <img src="<?php echo base_url();?>template/dist/user/6.jpg" class="img-rounded" width="220" height="200"/>
        </div>
         <div class="pull-left image">
          <img src="<?php echo base_url();?>template/dist/user/adsart_preview.jpg" class="img-rounded" width="220" height="200"/>
        </div>

    <!-- /.sidebar -->
  </aside>

           

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





<!-- MODAL -->
<form method="post" >
<div id="view_availability" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="padding-left: 100%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
         <h4 >Available Cameras</h4>
      </div>
        
          <table class="table table-hover" >
            <tbody>
              <tr>
                <td scope="col" width="50%">Broadcast:</td>
                <td scope="col" width="50%"><h4 class="modal-title" id="modal_pkg1"></h4></td>
              </tr>

              <tr>
                <td scope="col" width="50%">Production:</td>
                <td scope="col" width="50%"><h4 class="modal-title" id="modal_pkg2"></h4></td>
              </tr>

              <tr>
                <td scope="col" width="50%">HD:</td>
                <td scope="col" width="50%"><h4 class="modal-title" id="modal_pkg3"></h4></td>
              </tr>

              <tr>
                <td scope="col" width="50%">Budjet:</td>
                <td scope="col" width="50%"><h4 class="modal-title" id="modal_pkg4"></h4></td>
              </tr>
</tbody></table>
             
          <div class="modal-footer">
            <button type="button" id="btn_close" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="#" id="btn_new" class="btn btn-primary">New Event</a>
          </div>
        
      </div>
    </div>
  </div>
<!-- MODAL -->

  <script type="text/javascript">

    $(document).ready(function() { 

    var base_url = $('#hidden_base_url').val();

    $('#calendar').fullCalendar(
     {
      header: {
        left: 'prevYear,prev today ,next,nextYear',
        center: 'title',
        right: 'month,agendaWeek,resourceDay'
      }, 
      selectable:true,
      selectHelper:true,
      editable:true,
      eventLimit:true,

      // eventSources: [ fcSources.courses, fcSources.loads ],
      events:"<?php echo base_url().'index.php/calendar/getCalendarData';?>",

      dayClick: function (date,jsEvent,view) {
        checkEvent(date.format());          
      },

        eventClick:function (allEvents, jsEvent,view) {
      //add data to show in modal
      $('#modalTitle').html(allEvents.title);
      $('#modalDate').html(allEvents.date);  
      $('#modalPlace').html(allEvents.place);              
      $('#modalStart').html(allEvents.start);
      $('#modalEnd').html(allEvents.end);
      $('#modalNo_of_cams').html(allEvents.no_of_cams);
      $('#modalCustomer_id').html(allEvents.customer_id);
      $('#modalPackage').html(allEvents.package);

      //display the BOOTSTRAP modal
      jQuery('#view_calendar_reservations').modal('toggle');
  
           
    }
     
       });
    });

    function checkEvent(date){
      var dataSet = {
        date_x: date,
        method: 'ajax'
      };

      var dataSentUrl ='http://localhost/eventmanagementsystem/index.php/calendar/availability';

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url:dataSentUrl,
        data:dataSet,

        success: function(data){
          $('#modal_pkg1').html(data[0].tot);
          $('#modal_pkg2').html(data[1].tot);
          $('#modal_pkg3').html(data[2].tot);
          $('#modal_pkg4').html(data[3].tot);
          $('#btn_new').attr('data-gotoid', data.date);

          $('#view_availability').modal();
        }
      });
    }

  $(document).on('click','#btn_new', function() {
    var gotoid = $(this).data('gotoid');
    console.log(gotoid);
    $('#view_availability').modal('hide');
    window.location = '<?php echo base_url();?>index.php/event/add_new_event/'+gotoid;
  });

  $(document).on('click','#btn_close', function() {
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