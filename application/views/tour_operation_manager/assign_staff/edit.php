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
            <?php $this->load->view('tour_operation_manager/layout/tour_operation_manager_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>

              <form method="post" enctype="multipart/form-data" id="edit_assign_staff">
                <div class="card-body">
                  <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Package Type</label><br>
                          <select class="select_css" name="package_type" id="package_type">
                          <option value="">Select package type</option>
                                <?php
                                  foreach($package_type as $package_type_info) 
                                  { 
                                ?>
                                <option value="<?php echo $package_type_info['id'];?>" <?php if(isset($info['package_type'])){if($package_type_info['id'] == $info['package_type']) {echo 'selected';}}?>><?php echo $package_type_info['package_type'];?></option>
                                <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tour No / Name</label>
                            <select class="form-control" name="tour_number" id="tour_number" onfocus='this.size=5;' onblur='this.size=1;' 
                                  onchange='this.size=1; this.blur();'>
                              <option value="">Select tour title</option>
                              <!-- <option value="Other">Other</option> -->
                              <?php foreach($packages_data as $packages_data_value){ ?> 
                                <option value="<?php echo $packages_data_value['id'];?>" <?php if(isset($info['tour_number'])){if($packages_data_value['id'] == $info['tour_number']) {echo 'selected';}}?>><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Staff Name</label><br>
                        <input type="text" class="form-control" name="staff_name" id="staff_name" value="<?php echo $info['staff_name'] ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Mobile Number</label><br>
                        <input class="form-control" type="text" name="mobile_number" id="mobile_number" value="<?php echo $info['mobile_number'] ?>" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label><br>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $info['email'] ?>" pattern="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" id="male" name="gender" value="male" required="required" <?php if(isset($info['gender'])){if($info['gender']=='male') {echo'checked';}}?>> Male
                        <input type="radio" id="female" name="gender" value="female" required="required" <?php if(isset($info['gender'])){if($info['gender']=='female') {echo'checked';}}?>> Female
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Attachment</label><br>
                        <input type="file" name="image_name" id="att_image_name">
                        <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                      </div>
                    </div>
                    
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Uploaded Attachment</label><br>
                        <?php if(!empty($info['image_name'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/tour_operation_manager/<?php echo $info['image_name']; ?>" width="50%">
                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_operation_manager/<?php echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php } ?>
                      </div>
                    </div>


                  </div>  
                  
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
                    
                    <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                  </div>
                </div>
              </form>
              <?php } ?>
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
  
