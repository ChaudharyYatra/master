    
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
                    <h1 class="mb-3"><?php echo $page_title; ?></h1>
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
                                <form class="mb-2" method="post" onsubmit="return validateEnquiryForms()">
                                    <h5>Fill your information</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="label_color">Checkin Date</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label_color">No Of Nights</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label_color">Checkout Date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="date" placeholder="First Name" name="checkin_date" id="checkin_date">
                                                <!-- <span class="text-danger float-left" id="first_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="text" name="no_of_nights" id="no_of_nights">
                                                <!-- <span class="text-danger float-left" id="last_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="date" placeholder="First Name" name="checkout_date" id="checkout_date">
                                                <!-- <span class="text-danger float-left" id="first_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="all_hotels" id="all_hotels">&nbsp;&nbsp;All Hotels
                                                <!-- <span class="text-danger float-left" id="email_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="mobile_number" id="mobile_number">&nbsp;&nbsp; 3 STAR
                                                <!-- <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span> -->
                                            </div>
                                        </div>
										<div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="mobile_number" id="mobile_number">&nbsp;&nbsp; 2 STAR
                                                <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="mobile_number" id="mobile_number">&nbsp;&nbsp; 4 STAR
                                                <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="mobile_number" id="mobile_number">&nbsp;&nbsp; 5 STAR
                                                <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="mobile_number" id="mobile_number">&nbsp;&nbsp; HOMESTAYS WITHOUT POOL
                                                <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="mobile_number" id="mobile_number">&nbsp;&nbsp; BEACH PROPERTIES
                                                <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="checkbox" name="mobile_number" id="mobile_number">&nbsp;&nbsp; DELUXE COTTAGES
                                                <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
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
                                                <div class="col-md-3">
                                                    <label class="label_color">Extra Adult</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Extra Child</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="no_of_nights" id="no_of_nights">
                                                <!-- <span class="text-danger float-left" id="last_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="gender" id="gender">
                                                        <option value="">Meal Plan</option>
                                                        <option value="Veg">Veg</option>
                                                        <option value="Non-veg">Non-veg</option>
                                                    </select>
                                                </div>
                                                <!-- <span class="text-danger float-left" id="gender_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="no_of_nights" id="no_of_nights" placeholder="with mattress">
                                                <!-- <span class="text-danger float-left" id="last_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="no_of_nights" id="no_of_nights" placeholder="with mattress">
                                                <!-- <span class="text-danger float-left" id="last_name_error" style="display:none"></span> -->
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
                                                    <select class="niceSelect" name="gender" id="gender">
                                                        <option value="">Select</option>
                                                        <option value="Veg"></option>
                                                        <option value="Non-veg"></option>
                                                    </select>
                                                </div>
                                                <!-- <span class="text-danger float-left" id="gender_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="gender" id="gender">
                                                        <option value="">Select</option>
                                                        <option value="Veg"></option>
                                                        <option value="Non-veg"></option>
                                                    </select>
                                                </div>
                                                <!-- <span class="text-danger float-left" id="gender_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="date" placeholder="First Name" name="checkout_date" id="checkout_date">
                                                <!-- <span class="text-danger float-left" id="first_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="time" placeholder="First Name" name="checkout_date" id="checkout_date">
                                                <!-- <span class="text-danger float-left" id="first_name_error" style="display:none"></span> -->
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
                                                    <select class="niceSelect" name="gender" id="gender">
                                                        <option value="">Select</option>
                                                        <option value="Veg"></option>
                                                        <option value="Non-veg"></option>
                                                    </select>
                                                </div>
                                                <!-- <span class="text-danger float-left" id="gender_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="date" placeholder="First Name" name="checkout_date" id="checkout_date">
                                                <!-- <span class="text-danger float-left" id="first_name_error" style="display:none"></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="time" placeholder="First Name" name="checkout_date" id="checkout_date">
                                                <!-- <span class="text-danger float-left" id="first_name_error" style="display:none"></span> -->
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
