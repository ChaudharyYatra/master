<style>
  .desig_css{
    color:white;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>admin/dashboard/index" class="brand-link">      
      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:100%;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="<?php //echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
          <center><a href="#" class="d-block"><?php echo  $admin_name = $this->session->userdata('name');?></a></center>
          <h6 class="desig_css">[ Admin ]</h6>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/dashboard/index" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/slider/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/website_basic_structure/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Basic Structure</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/core_features/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Core Features</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/about_us/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/privacy_policy/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Privacy Policy</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/terms_conditions/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terms and Conditions</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/academic_year/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Academic Year</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/department/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/client_reviews/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client Reviews</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/tour_guides/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Our Experts</p>
                </a>
               </li>
               
                <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/tour_cancel_rules/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tour Cancel Rules</p>
                </a>
               </li>
               
                <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/seat_reservation_rules/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seat Reservation Rules</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/gallery/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gallery</p>
                </a>
               </li>
				
				        <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/award/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Awards</p>
                </a>
               </li>
				
			          <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/faq/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>FAQ</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/agent_percentage/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Agent Percentage</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/media_source/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Media Source</p>
                </a>
               </li>
				
				      <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/relation/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Relation</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/stationary/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Stationary</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/courier_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Courier Company Name</p>
                </a>
               </li>


               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/followup_reason/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Followup Reason</p>
                </a>
               </li>
				
				      <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/region_head/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                   <p>Region Head Master</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/hotel_type/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hotel Type</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/bus_master/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Type</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/boarding_expenses_master/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boarding Expenses Master</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/zone_master/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zone Master</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/package_type/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package Type</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/expense_type/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense Type</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/expense_category/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense Category</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/role_type/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role Type</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/country/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Country Master</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/state/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>State Master</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/city_master/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>City Master</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/district/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>District Master</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/taluka/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Taluka Master</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/user_operation/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Operation</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/vehicle_type/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Type</p>s
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/vehicle_fuel/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Fuel</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/vehicle_brand/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Brand</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/bus_type/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Type</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/special_req_master/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Special Request Master</p>
                </a>
               </li>

            </ul>
          </li>
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Package
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--<li class="nav-item">-->
              <!--  <a href="<?php //echo base_url(); ?>admin/main_category/index" class="nav-link">-->
              <!--    <i class="far fa-circle nav-icon"></i>-->
              <!--    <p>Main Category</p>-->
              <!--  </a>-->
              <!-- </li>-->
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/packages/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Domestic Packages</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/international_packages/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>International Packages</p>
                </a>
               </li>
               
               <li class="nav-item">
               <a href="<?php echo base_url(); ?>admin/package_mapping/index" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Main Packages</p>
               </a>
               </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/agent/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Agents
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/vehicle_owner/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Vehicle Owner
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/vehicle_details/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Vehicle Details
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/vehicle_driver/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Vehicle Driver
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/supervision/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Supervision
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/hotel/index" class="nav-link">
              <i class="nav-icon fas fa fa-hotel"></i>
              <p>
                Hotel
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/profile_edit_req/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Profile Edit Request
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Domestic Booking Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/followup_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Followup</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/not_interested/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/all_general_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All General Enquiry</p>
                </a>
               </li>
               
            </ul>
          </li>
          
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>admin/booking_enquiry/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Domestic Booking Enquiry
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                International Booking Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/international_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/international_followup_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Followup</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/not_interested_international/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/bus_open/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Bus Open
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/final_booking_details/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Final Booking
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/sub_expenses_head/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Other Sub Expenses Head
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/tour_expenses/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tour Expenses
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/stationary_details/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stationary Details
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/instruction_list/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Task/Instruction List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/suggestion_module/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Suggestion Module
              </p>
            </a>
          </li>
          
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>admin/general_enquiry/index" class="nav-link">
              <i class="nav-icon fas fa fa-book"></i>
              <p>
                General Enquiries
              </p>
            </a>
          </li> -->
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/profile/index" class="nav-link">
              <i class="nav-icon fas fa fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/login/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
