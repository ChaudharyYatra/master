<style>
  .tourmanager{
    text-decoration:none;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>agent/dashboard" class="brand-link">

      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block tourmanager"><?php echo $tour_manager_sess_name; ?></a></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_manager/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>

          
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/suggestion_module/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Suggestion Module
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/instruction_module/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Instruction Module
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/tour_expenses/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Tour Expenses
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                My Tour Operation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_manager/asign_tour_to_manager/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Asigned Tour</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_manager/birthday_module/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Birthday Module</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_manager/anniversary_module/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anniversary Module</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_manager/tour_photos/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tour Photos</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/daily_attendance/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance</p>
                </a>
              </li> -->

            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>agent/fixed_Customized_enquiries/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Fixed & Customized Enquiries
              </p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Domestic Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/domestic_booking_process/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking Process</p>
                </a>
               </li>

              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Domestic Booking Enquiry</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/todays_domestic_followup_list/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todays Followup</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/not_interested/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>
            </ul>
          </li> -->

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 International Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/inter_booking_process/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking Process</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/international_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>International Booking Enquiry</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/todays_international_followup_list/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todays Followup</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/not_interested_international/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>
            </ul>
          </li> -->


          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Website Customized Enquiries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/website_visitor_data/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Domestic Customised Enquiries</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/agent/international_website_visitor_data/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>International Customised Enquiries</p>
                </a>
               </li>
            </ul>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>agent/contact_general_enquiry/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               General Enquiries
              </p>
            </a>
          </li> -->

         <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stationary
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/stationary_order/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stationary Order</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/stationary_order_completed/completed" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Stationary Order</p>
                </a>
               </li>
            </ul>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>agent/request_code_number/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Request Code Number
              </p>
            </a>
          </li> -->

          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/login/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
           </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>