<style>
  .iter_css{
    text-decoration:none;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a> -->
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Tour Details </th>
                    <th>Journey Date </th>
                    <th>Tour Days </th>
                    <!-- <th>Vehicle RTO Registration No</th> -->
                    <th>Boarding Office</th>
                    <th>Tour Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
                    <?php if($info['journey_date']!= ''){?>
                    <td><?php echo date("d-m-Y",strtotime($info['journey_date'])) ?></td>
                    <?php } else { ?>
                      <td> --- </td>
                    <?php } ?>
                    <td><?php echo $info['tour_number_of_days'] ?></td>
                    <!-- <td><?php //echo $info['registration_number'] ?></td> -->
                    <td><?php echo $info['booking_center'] ?></td>

                    <?php 
                    $today= date('Y-m-d');
                    if($info['journey_date'] > $today) {?>
                      <td> upcoming Tour </td>
                    <?php } else if($info['journey_date'] == $today){
                      ?>
                    <td> Running Tour </td>
                    <?php 
                     } else{
                    ?>
                    <td> Completed Tour </td>
                     <?php } ?>


                     <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a class="iter_css" href="<?php echo $module_url_path;?>/iternary_details/<?php $aid=base64_encode($info['package_id']); 
					                  echo rtrim($aid, '='); ?>/<?php $did=base64_encode($info['did']); 
					                  echo rtrim($did, '='); ?>" class="itinerary_css"><button class="dropdown-item">Itinerary Details</button></a>
                          <a class="iter_css" href="<?php echo $module_url_path_customer_feedback;?>/index/<?php $aid=base64_encode($info['package_id']); 
					                  echo rtrim($aid, '='); ?>/<?php $did=base64_encode($info['did']); echo rtrim($did, '='); ?> " class="itinerary_css"><button class="dropdown-item">Feedback From Customer</button></a>
                        </div>
                      </div>
                    </td>

                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
                <?php } else
                { echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b>
                Sorry No records available
              </div>' ; } ?>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
