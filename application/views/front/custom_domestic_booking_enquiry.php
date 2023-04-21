    
    <style>
        .label_color{
            color: black;
        }
        </style>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Booking.png);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Custom Domestic Booking </h1><h1 class="mt-5">Enquiry</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 

    <!-- top Destination starts -->
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-6">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">
                                <form class="mb-2" method="post" onsubmit="return custom_enquiry_form()" name="myForm">
                                    <h5>Fill your information</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="label_color">FullName</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Email</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Mobile No.</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Mobile No.(optional)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="full_name" id="full_name" placeholder="Enter full name">
                                                <span class="text-danger float-left" id="full_name_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="email" id="email" placeholder="Enter Email">
                                                <span class="text-danger float-left" id="email_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="mobile_number1" id="mobile_number1" placeholder="Enter mobile number">
                                                <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="mobile_number2" id="mobile_number2" placeholder="Enter mobile number">
                                                <!-- <span class="text-danger float-left" id="last_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="label_color">Checkin Date</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label_color">Checkout Date</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label_color">No Of Nights</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="date" placeholder="" name="checkin_date" id="checkin_date">
                                                <span class="text-danger float-left" id="chechin_date_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="date" placeholder="" name="checkout_date" id="checkout_date">
                                                <span class="text-danger float-left" id="checkout_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="text" name="no_of_nights" id="no_of_nights">
                                                <span class="text-danger float-left" id="no_of_nights_error" style="display:none"></span>
                                            </div>
                                        </div>
                                    

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="label_color">Hotel Type</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="All Hotels">&nbsp;&nbsp;All Hotels
                                                    <!-- <span class="text-danger float-left" id="email_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="3 STAR">&nbsp;&nbsp; 3 STAR
                                                    <!-- <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="2 STAR">&nbsp;&nbsp; 2 STAR
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="4 STAR">&nbsp;&nbsp; 4 STAR
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="5 STAR">&nbsp;&nbsp; 5 STAR
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="HOMESTAYS WITHOUT POOL">&nbsp;&nbsp; HOMESTAYS WITHOUT POOL
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="BEACH PROPERTIES">&nbsp;&nbsp; BEACH PROPERTIES
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" name="hotel_type[]" id="hotel_type" value="DELUXE COTTAGES">&nbsp;&nbsp; DELUXE COTTAGES
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div><br>
                                            <span class="text-danger float-left" id="hotel_type_error" style="display:none"></span>
                                        </div>
                                    </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="label_color">No Of Couple</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Meal Plan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="label_color">Total Adult</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="label_color">Total Child With Bed</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="label_color">Total Child Without Bed</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="no_of_couple" id="no_of_couple">
                                                <span class="text-danger float-left" id="no_of_couple_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="meal_plan" id="meal_plan">
                                                        <option value="">Select Meal Plan</option>
                                                        <?php foreach($meal_plan as $meal_plan_info){ ?> 
                                                            <option value="<?php echo $meal_plan_info['id'];?>"><?php echo $meal_plan_info['meal_plan_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="meal_plan_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <input type="text" name="total_adult" id="total_adult" placeholder="">
                                                <span class="text-danger float-left" id="total_adult_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <input type="text" name="total_child_with_bed" id="total_child_with_bed" placeholder="">
                                                <span class="text-danger float-left" id="total_child_with_bed_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <input type="text" name="total_child_without_bed" id="total_child_without_bed" placeholder="">
                                                <span class="text-danger float-left" id="total_child_without_bed_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="label_color">Select Vehicle Type</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Pick Up From </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Pickup Allo. Date</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Pick Up Time</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="vehicle_type" id="vehicle_type">
                                                        <option value="">Select vehicle type</option>
                                                        <?php foreach($vehicle_type as $vehicle_type_info){ ?> 
                                                            <option value="<?php echo $vehicle_type_info['id'];?>"><?php echo $vehicle_type_info['vehicle_type_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="vehicle_type_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="pick_up_from" id="pick_up_from">
                                                        <option value="">Select Pick Up From</option>
                                                        <?php foreach($pick_up_from as $pick_up_from_info){ ?> 
                                                            <option value="<?php echo $pick_up_from_info['id'];?>"><?php echo $pick_up_from_info['pick_up_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="pick_up_from_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="date" name="pickup_date" id="pickup_date">
                                                <span class="text-danger float-left" id="pickup_date_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="time" name="pickup_time" id="pickup_time">
                                                <span class="text-danger float-left" id="pickup_time_error" style="display:none"></span>
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Drop to </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Drop Allocation Date</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Drop Time</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="drop_to" id="drop_to">
                                                        <option value="">Select Drop To</option>
                                                        <?php foreach($drop_to as $drop_to_info){ ?> 
                                                            <option value="<?php echo $drop_to_info['id'];?>"><?php echo $drop_to_info['drop_to_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="drop_to_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="date" name="drop_date" id="drop_date">
                                                <span class="text-danger float-left" id="drop_date_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="time"  name="drop_time" id="drop_time">
                                                <span class="text-danger float-left" id="drop_time_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Special Note</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <textarea type="text" name="special_note" id="special_note" placeholder="Enter Special Note"></textarea>
                                                        <span class="text-danger float-left" id="special_note_error" style="display:none"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                           
                                <div class="booking-terms border-t pt-3 mt-3">
                                    <!-- <form class="d-lg-flex align-items-center"> -->
                                        <div class="form-group mb-2 w-75">
                                            <!--<input type="checkbox"> By continuing, you agree to the <a href="#">Terms and Conditions.</a>-->
                                        </div>
                                        <!-- <a href="#" class="nir-btn float-lg-end w-25" name="submit">CONFIRM BOOKING</a> -->
                                        <input type="submit" class="nir-btn float-lg-end w-25" id="submit" value="submit" name="submit">

                                    </form>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- top Destination ends -->
