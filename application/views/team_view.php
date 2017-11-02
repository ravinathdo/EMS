<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript">
    function show_confirm(act,gotoid)
    {
    if(act=="edit")
    var r=confirm("Do you really want to edit?");
    else
    var r=confirm("Do you really want to delete?");
    if (r==true)
    {
    window.location="<?php echo base_url();?>index.php/package/"+act+"/"+gotoid;
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
          <li><a href="#"><i class="fa fa-user fa-fw"></i> Team</a></li>
          <li><a href="#">View Team</a></li>
        </ol>
      </section>









     <!-- Main content -->
      <section class="content">

      <div class="container">

       <h2> Team Details</h2>

        <table class="table table-hover" >
        <thead>
        <tr>
          <th scope="col" width="20%">Cameramen</th>
          <th scope="col" width="20%">Camera Assistants</th>
          <th scope="col" width="20%">Technical Assistants</th>
          <th scope="col" width="20%">Setup Engineer</th>
          <th scope="col" width="20%">Audio Operator</th>
          <th scope="col" width="20%">Vision Operator</th>
        </tr>
        </thead>

        
        <tbody>
        <tr>
         <form data-toggle="validator" role="form" id="team_for_event" method="post" action="<?php echo base_url(); ?>index.php/event/team_for_event" >


          <td>
           <?php $index = 0;
           foreach($c_list as $n_key){ ?>
                <div class="checkbox">
                <label><input type="checkbox" id="c" name="c[]" value="<?php echo $index+1; ?>">
                <?php echo $n_key->name; 
                $index++;?></label></div>
                 <br/><br/>
                <?php 
                }?>  
          </td>


          <td>
            <?php $index = 0;
            foreach($ca_list as $n_key){?>
               <div class="checkbox">
                <label><input type="checkbox" id="ca" name="ca[]" value="<?php echo $index+1; ?>">
                <?php echo $n_key->name; 
                $index++;?></label></div>
                 <br/><br/>
                <?php 
                }?>   
                </td>

              <td>
              <?php $index = 0;
              foreach($ta_list as $n_key){?>
                <div class="checkbox">
                <label><input type="checkbox" id="ta" name="ta[]" value="<?php echo $index+1; ?>">
                <?php echo $n_key->name; 
                $index++;?></label></div>
                 <br/><br/>
                <?php 
                }?>  
                </td>


              <td>
                <?php $index = 0;
                foreach($se_list as $n_key){?>
                  <div class="checkbox">
                <label><input type="checkbox" id="se" name="se[]" value="<?php echo $index+1; ?>">
                <?php echo $n_key->name; 
                $index++;?></label></div>
                 <br/><br/>
                <?php 
                }?>  
                </td>

              <td>
                <?php $index = 0;
                foreach($ao_list as $n_key){?>
                  <div class="checkbox">
                <label><input type="checkbox" id="ao" name="ao[]" value="<?php echo $index+1; ?>">
                <?php echo $n_key->name; 
                $index++;?></label></div>
                 <br/><br/>
                <?php 
                }?>  
              </td>

              <td>
                  <?php $index = 0;
                  foreach($vo_list as $n_key){?>
                  <div class="checkbox">
                <label><input type="checkbox" id="vo" name="vo[]" value="<?php echo $index+1; ?>">
                <?php echo $n_key->name; 
                $index++;?></label></div>
                 <br/><br/>
                <?php 
                }?>  
                </td>

                </tr>

                <tr><td><input type="submit" name="submit" value="Submit" /></td></tr>
              </tbody>
              
</form>
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