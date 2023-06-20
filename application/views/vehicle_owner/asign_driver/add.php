<style>
    .select2{
        width: 100%;   
        }
</style>

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
          <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="add_asign_driver">
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Vehicle RTO Registration No</label>
                        <select class="select_css" name="vehicle_rto_registration" id="vehicle_rto_registration" required="required">
                            <option value="">Select RTO Registration No</option>
                            <?php
                                foreach($vehicle_details as $vehicle_details_info) 
                                { 
                            ?>
                                <option value="<?php echo $vehicle_details_info['id']; ?>"><?php echo $vehicle_details_info['registration_number']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Driver Name</label>
                        <select class="select2" multiple="multiple" name="asign_driver_name[]" id="asign_driver_name" required="required">
                            <option value="">Select Driver Name</option>
                            <?php
                                foreach($vehicle_driver as $vehicle_driver_info) 
                                { 
                            ?>
                                <option value="<?php echo $vehicle_driver_info['id']; ?>"><?php echo $vehicle_driver_info['driver_name']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
				    <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
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
  

</body>
</html>
