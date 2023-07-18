<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $module_title; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php 
            if($arr_data['package_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['package_count']; ?></h3>
              <p>Domestic Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['international_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $arr_data['international_count']; ?></h3>
                <p>International Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['custom_domestic_packages_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo  $arr_data['custom_domestic_packages_count']; ?></h3>
              <p>Custom Domestic Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          

          <?php 
            if($arr_data['custom_inter_packages_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo  $arr_data['custom_inter_packages_count']; ?></h3>
              <p>Custom International Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          <?php 
            if($arr_data['package_mapping_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/package_mapping/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['package_mapping_count']; ?></h3>
              <p>Main Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>


          <?php 
            if($arr_data['agent_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/agent/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $arr_data['agent_count']; ?></h3>

                <p>Total Agents</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/contact_us/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo  $arr_data['enquiry_count']; ?></h3>
                <p>Contact Us</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['enquiry_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/client_reviews/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo  $arr_data['reviews_count']; ?></h3>
                <p>Client Reviews</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          
          <?php 
            if($arr_data['total_enquiry_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo  $arr_data['total_enquiry_count']; ?></h3>
                <p>Total Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            
          </div>
          <?php } ?>
          
          <?php 
            if($visiter_c>0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $visiter_c; ?></h3>
                <p>Website Visiter Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            
          </div>
          <?php } ?>



          <?php 
            if($arr_data['bus_open_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/bus_open/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo  $arr_data['bus_open_count']; ?></h3>
                <p>Bus Open Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['final_booking_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/final_booking_details/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo  $arr_data['final_booking_count']; ?></h3>
                <p>Final Booking Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>


          <?php 
            if($arr_data['vehicle_owner_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/vehicle_owner/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo  $arr_data['vehicle_owner_count']; ?></h3>
                <p>Vehicle Owner</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['vehicle_data_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/contact_us/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $arr_data['vehicle_data_count']; ?></h3>
                <p>Vehicle Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['vehicle_driver_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/client_reviews/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo  $arr_data['vehicle_driver_count']; ?></h3>
                <p>Vehicle Driver Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

        </div>
        <!-- /.row -->
        
    </div>
</section>
