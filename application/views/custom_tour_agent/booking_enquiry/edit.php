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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
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
            <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($arr_data as $info) 
                  //  print_r($arr_data); die;
                   { 
                     ?>
                            <form method="post" enctype="multipart/form-data" id="custom_edit_bookingenquiry">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Full Name</label><br>
                          <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter full name" value="<?php echo $info['full_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" pattern="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" value="<?php echo $info['email']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile number </label>
                                <input type="text"  class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter mobile number" value="<?php echo $info['mobile_number1']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
					            <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile number(optional)</label>
                                <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter mobile number" value="<?php echo $info['mobile_number2']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour number</label>
                                  <select class="form-control" name="tour_number" id="tour_number" onchange='CheckColors(this.value); 
                                  this.blur();' onfocus='this.size=6;' onblur='this.size=1;'>
                                    <option value="">Select tour title</option>
                                    <option value="Other">Other</option>
                                    <?php foreach($packages_data as $packages_data_value){ ?> 
                                        <option value="<?php echo $packages_data_value['id'];?>" <?php if(isset($info['package_id'])){if($packages_data_value['id'] == $info['package_id']) {echo 'selected';}}?>><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                      </div>
                      <div class="col-md-6" id="other_tour_name_div" style='display:none;'>
                              <div class="form-group">
                                <label>Enquiry destination name</label>
                                <input type="text" class="form-control" name="other_tour_name" id="other_tour_name" value="<?php echo $info['other_tour_name']; ?>" placeholder="Enter destination name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Checkin Date</label>
                                <input type="date" class="form-control" placeholder="" name="checkin_date" id="checkin_date" value="<?php echo $info['checkin_date']; ?>">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Checkout Date</label>
                                <input type="date" class="form-control" placeholder="" name="checkout_date" id="checkout_date" value="<?php echo $info['checkout_date']; ?>">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>No Of Nights</label>
                                <input type="text" class="form-control" name="no_of_nights" id="no_of_nights" value="<?php echo $info['no_of_nights']; ?>">
                              </div>
                      </div>

                      <div class="col-md-6">
                              <div class="form-group">
                                <?php 
                                $quali1=array();
                                  $p = $info['hotel_type'];
                                  $quali1 = explode(',',$p);
                                  // print_r($quali1); die;
                                ?>
                                <label>Hotel Type
                                  <?php ?>
                                </label><br>
                                            <input type="checkbox" name="hotel_type[]" id="hotel_type" value="All Hotels" <?php if(in_array('All Hotels',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp;All Hotels
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="3 STAR" <?php if(in_array('3 STAR',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; 3 STAR
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="2 STAR" <?php if(in_array('2 STAR',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; 2 STAR
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="4 STAR" <?php if(in_array('4 STAR',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; 4 STAR
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="5 STAR" <?php if(in_array('5 STAR',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; 5 STAR <br>
                                            <input type="checkbox" name="hotel_type[]" id="hotel_type" value="HOMESTAYS WITHOUT POOL" <?php if(in_array('HOMESTAYS WITHOUT POOL',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp;HOMESTAYS WITHOUT POOL
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="BEACH PROPERTIES" <?php if(in_array('BEACH PROPERTIES',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; BEACH PROPERTIES<br>
                                            <input type="checkbox" name="hotel_type[]" id="hotel_type" value="DELUXE COTTAGES" <?php if(in_array('DELUXE COTTAGES',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp;DELUXE COTTAGES<br>
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>No Of Couple </label> <br>
                                <input type="text" class="form-control" name="no_of_couple" id="no_of_couple" value="<?php echo $info['no_of_couple']; ?>"oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      
					 
					                  <div class="col-md-6">
                              <div class="form-group">
                                <label>Meal Plan</label>
                                  <select class="form-control niceSelect" name="meal_plan" id="meal_plan" onfocus='this.size=3;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                      <option value="">Select Meal Plan</option>
                                      <?php foreach($meal_plan as $meal_plan_info){ ?> 
                                          <option value="<?php echo $meal_plan_info['id'];?>" <?php if(isset($info['meal_plan'])){if($meal_plan_info['id'] == $info['meal_plan']) {echo 'selected';}}?>><?php echo $meal_plan_info['meal_plan_name'];?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Adult</label>
                                <input type="text" class="form-control" name="total_adult" id="total_adult" placeholder="" value="<?php echo $info['total_adult']; ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Child With Bed</label>
                                <input type="text" class="form-control" name="total_child_with_bed" id="total_child_with_bed" placeholder="" value="<?php echo $info['total_child_with_bed']; ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Child Without Bed</label>
                                <input type="text" class="form-control" name="total_child_without_bed" id="total_child_without_bed" placeholder="" value="<?php echo $info['total_child_without_bed']; ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Select Vehicle Type</label>
                                <select class="form-control niceSelect" name="vehicle_type" id="vehicle_type" onfocus='this.size=3;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                    <option value="">Select vehicle type</option>
                                    <?php foreach($vehicle_type as $vehicle_type_info){ ?> 
                                        <option value="<?php echo $vehicle_type_info['id'];?>" <?php if(isset($info['vehicle_type'])){if($vehicle_type_info['id'] == $info['vehicle_type']) {echo 'selected';}}?>><?php echo $vehicle_type_info['vehicle_type_name'];?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Pick Up From</label>
                                <select class="form-control niceSelect" name="pick_up_from" id="pick_up_from" onfocus='this.size=3;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                  <option value="">Select Pick Up From</option>
                                  <?php foreach($pick_up_from as $pick_up_from_info){ ?> 
                                      <option value="<?php echo $pick_up_from_info['id'];?>" <?php if(isset($info['pick_up_from'])){if($pick_up_from_info['id'] == $info['pick_up_from']) {echo 'selected';}}?>><?php echo $pick_up_from_info['pick_up_name'];?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Pickup Allo. Date</label>
                                <input type="date" class="form-control" name="pickup_date" id="pickup_date" value="<?php echo $info['pickup_date']; ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Pick Up Time</label>
                                <input type="time" class="form-control" name="pickup_time" id="pickup_time" value="<?php echo $info['pickup_time']; ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Drop to</label>
                                <select class="form-control niceSelect" name="drop_to" id="drop_to" onfocus='this.size=3;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                    <option value="">Select Drop To</option>
                                    <?php foreach($drop_to as $drop_to_info){ ?> 
                                        <option value="<?php echo $drop_to_info['id'];?>" <?php if(isset($info['drop_to'])){if($drop_to_info['id'] == $info['drop_to']) {echo 'selected';}}?>><?php echo $drop_to_info['drop_to_name'];?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Drop Allocation Date</label>
                                <input type="date" class="form-control" name="drop_date" id="drop_date" value="<?php echo $info['drop_date']; ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Drop Time</label>
                                <input type="time" class="form-control" name="drop_time" id="drop_time" value="<?php echo $info['drop_time']; ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Special Note</label>
                                <textarea type="text" class="form-control" name="special_note" id="special_note" placeholder="Enter Special Note"><?php echo $info['special_note']; ?></textarea>
                              </div>
                            </div>
					 
                                    
					 
					 
                      
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                  <!-- <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button>  -->
                  <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
