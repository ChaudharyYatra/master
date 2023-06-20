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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 col-sm-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                <tr>
                    <th>Vehicle Type</th>
                    <td><?php echo $info['vehicle_type_name']; ?></td>

                    <th>Fuel Type</th>
                    <td><?php echo $info['vehicle_fuel_name']; ?></td>
                      
                    <th>Vehicle Brand</th>
                    <td><?php echo $info['vehicle_brand_name']; ?></td>
                  </tr>

                  <tr>
                  <th>Seat Capacity</th>
                    <td><?php echo $info['seat_capacity']; ?></td>

                    <th>Insurance Number</th>
                    <td><?php echo $info['insurance_number']; ?></td>

                    <th>Upload Insurance Image</th>
                    <td><img src="<?php echo base_url(); ?>uploads/insurance_photo/<?php echo $info['insurance_image_name']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                    
                  </tr>

                  <tr>
                    <th>Permit Number</th>
                    <td><?php echo $info['permit_number']; ?></td>

                    <th>Upload Permit Image</th>
                    <td><img src="<?php echo base_url(); ?>uploads/permit_photo/<?php echo $info['permit_image_name']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                    
                    <th>Air Conditioners</th>
                    <td><?php echo $info['air_conditionar']; ?></td>
                  </tr>

                  <tr>
                    <th>vehicle Model</th>
                    <td><?php echo $info['vehicle_model']; ?></td>

                    <th>RTO Registration Number</th>
                    <td><?php echo $info['registration_number']; ?></td>
                    
                    <th>Luggage Carring Capacity(Kg)</th>
                    <td><?php echo $info['luggage_capacity']; ?></td>
                  </tr>

                  <tr>
                    <th>Total kilometer(reading)</th>
                    <td><?php echo $info['total_kilometer']; ?></td>

                    <th>Vehicle Image(Front)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_front_image']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                    
                    <th>Vehicle Image(Back)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_back_image']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                  </tr>

                  <tr>
                    <th>Vehicle Image(left)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_left_image']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>

                    <th>Vehicle Image(right)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_right_image']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                    
                    <th>Vehicle Image(inside one)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_insideone_image']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                  </tr>

                  <tr>
                    <th>Vehicle Image(inside two)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_insidetwo_image']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                  </tr>


                  </table>
              </div>
            </div>
            <?php } ?>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  