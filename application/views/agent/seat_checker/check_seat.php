<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    .btn_follow{padding: 2px 8px;};
</style>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/bus_seat_design/css/jquery.seat-charts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bus_seat_design/css/style.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $module_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="wrapper">
        <div class="container">
            <div class="row">
              
            <form method="post" enctype="multipart/form-data" id="bus_seat_selection">
            <input type="hidden" class="form-control" name="is_main_page" id="is_main_page" value="no">

                <div class="card-body card-bg">
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Tour</label>
                            <select class="select_css" name="pack_id" id="pack_id">
                              <option value="">Select Package</option>
                                <?php foreach($packages_data_booking as $packages_data_booking){ ?>  
                                  <option value="<?php echo $packages_data_booking['id'];?>"><?php echo $packages_data_booking['tour_title'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Date</label>
                            <select class="select_css" name="pack_date_id" id="pack_date_id">
                              <option value="">Select Date</option>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <button type="submit" class="btn btn-success mt-4" name="submit" value="Search" id="search">Search </button> 
                          <button type="button" class="btn btn-danger mt-4" >Cancel</button>
                        </div>
                      </div>
                    </div>
                </div>
              </form>
              <div class="grid-50">
                  <div id="seat-map">
                      <div class="front-indicator">Bus Seat Reservation</div>
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">From Front Row</h4>
                      <div id="bus-seat-map" class="no_click"></div>
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">End of Seat Row</h4>
                  </div>
              </div>
                <div class="grid-50">
                  <div class="booking-details">
                      <form action="" method="post">
                      <input type="hidden" id="bdata" value='<?php print_r(
                          $bus_info
                      ); ?>'>
                   

                      <input type="hidden" id="booked_data" value='<?php print_r($final_booked_data); ?>'>
                      <script>
                      var booked_data=<?php echo json_encode($final_booked_data);?>;
                    </script> 
                         
                         <input type="hidden" id="temp_booked_data" value='<?php print_r($temp_booking_data); ?>'>
                    <script>
                      var temp_booked_data=<?php echo json_encode($temp_booking_data);?>;
                    </script> 

                      </form>
                      <div id="legend"></div>
                  </div>
                </div>
              </div>
             
    </div>














      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
