<style>
  .card_title {
    /* display: inline-block; */
    width: 50px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
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
              <!-- <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a> -->
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card">
              <!--<div class="card-header">-->
              <!--  <h3 class="card-title">Add Slider Content</h3>-->
              <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  
                  if(count($arr_data) > 0 ) 
                   {
                       ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Package Type</th>
                    <th>Tour No / Name</th>
                    <th>Request Amount For More Fund</th>
                    <th>Approved / Disapproved</th>
                    <th>Action</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['package_type'] ?></td>
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
                    <td><?php echo $info['more_fund_amt'] ?></td>
                    <td><?php echo $info['status'] ?></td>

                    <?php if($info['status']== 'approved'){?>
                      <td>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item">Send</button> </a>
                      </td>
                    <?php } else { ?>
                      <td>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item" disabled>Send</button> </a>
                    </td>
                    <?php } ?>

                  </tr>

                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Payment Send Details</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?php echo $module_url_path;?>/account_pay_send" enctype="multipart/form-data">
                            <div class="col-md-12">
                              <div class="row">
                                <input type="hidden" class="form-control" name="tour_manager_id" id="tour_manager_id" value="<?php echo $info['tour_manager_id']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                <input type="hidden" class="form-control" name="tm_request_more_fund_id" id="tm_request_more_fund_id" value="<?php echo $info['id']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Payment Date:</label> 
                                  <input type="date" class="form-control" name="payment_date" id="payment_date" max="<?php echo date("Y-m-d"); ?>" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Payment Mode</label>
                                    <div class="input-group">
                                        <select class="form-control niceSelect" name="payment_mode" id="payment_mode" onfocus='this.size=4;' onblur='this.size=1;' 
                                            onchange='this.size=1; this.blur();' required="required">
                                            <option value="">Select payment mode</option>
                                            <option value="UPI">UPI</option>
                                            <option value="CASH">CASH</option>
                                            <option value="NEFT">NEFT</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Transaction Id:</label> 
                                  <input type="text" class="form-control" name="transaction_id" id="transaction_id" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Transaction Amount</label> 
                                  <input type="text" class="form-control" name="transaction_amt" id="transaction_amt" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>

                                <div class="col-md-7">
                                  <div class="form-group">
                                    <label>Upload Image</label><br>
                                    <input type="file" name="image_name" id="image_name">
                                  </div>
                                </div>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a onclick="return confirm('Are You Sure You Want To send ?')" href="<?php echo $module_url_path;?>/advance_pay_send/"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; } ?>
                  </tbody>
                  
                </table>
                 <?php } else
                {echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b>
                Sorry No records available
              </div>' ; } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>