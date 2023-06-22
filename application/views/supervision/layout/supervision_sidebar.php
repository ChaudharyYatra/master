<style>
  .designation{
    color:#fff;
  }
  a{
    text-decoration:none;
  }

</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>supervision/dashboard" class="brand-link">

      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Choudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block"><?php echo $supervision_sess_name; ?></a></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php if($this->session->userdata['supervision_role']=='3') {?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>supervision/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
    

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/supervision_request/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Requests For Code
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/supervision_request_completed/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Code Allocation Completed
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/login/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
           </li>
        </ul>
        <?php } elseif($this->session->userdata['supervision_role']=='4'){?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
    

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/assign_staff/main_index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Assign Staff
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tours
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/completed_tours/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Tours</p>
                </a>
               </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Hotel Advance Payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>tour_operation_manager/hotel_advance_payment/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Hotel Advance Payment Req to Accountent
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>tour_operation_manager/hotel_advance_payment/advance_pay_detail" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Hotel Advance Payment Request Completed
                </p>
              </a>
            </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Request More Fund
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/more_fund_request/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Fund From Tour Manager</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/account_pay_amt/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Requested Amount Pay From Account</p>
                </a>
               </li>
               
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/login/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
           </li>
        </ul>
        

        <?php } elseif($this->session->userdata['supervision_role']=='5'){?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
    

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>account/tour_expences/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Tour Expences
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Hotel Advance Payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/hotel_advance_payment_req/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Hotel Advance Payment Request
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/hotel_advance_payment_req/advance_pay_detail" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Hotel Advance Payment Request Completed
                  </p>
                </a>
              </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Request More Fund
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/more_fund_request_acc/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Fund From Tour Manager</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/account_pay_amt_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Fund From My side</p>
                </a>
               </li>
               
            </ul>
          </li>



          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>account/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>account/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/login/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
           </li>
        </ul>
        <?php }?>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>