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

                    <?php if($info['send'] != 'no'){?>
                      <td>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i; ?>" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item">View</button> </a>
                      </td>
                    <?php } else { ?>
                      <td>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i; ?>" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item" disabled>View</button> </a>
                    </td>
                    <?php } ?>

                    
                    
                  </tr>

                  <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <input type="date" readonly class="form-control" name="payment_date" id="payment_date" value="<?php echo $info['payment_date']; ?>" max="<?php echo date("Y-m-d"); ?>" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Payment Mode</label>
                                    <div class="input-group">
                                        <select class="form-control niceSelect" name="payment_mode" id="payment_mode" onfocus='this.size=4;' onblur='this.size=1;' 
                                            onchange='this.size=1; this.blur();' required="required" readonly>
                                            <option value="">Select payment mode</option>
                                            <option value="UPI" <?php if(isset($info['payment_mode'])){if("UPI" == $info['payment_mode']) {echo 'selected';}}?>>UPI</option>
                                            <option value="CASH" <?php if(isset($info['payment_mode'])){if("CASH" == $info['payment_mode']) {echo 'selected';}}?>>CASH</option>
                                            <option value="NEFT" <?php if(isset($info['payment_mode'])){if("NEFT" == $info['payment_mode']) {echo 'selected';}}?>>NEFT</option>
                                            <option value="Cheque" <?php if(isset($info['payment_mode'])){if("Cheque" == $info['payment_mode']) {echo 'selected';}}?>>Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Transaction Id:</label> 
                                  <input type="text" readonly class="form-control" name="transaction_id" id="transaction_id"  value="<?php echo $info['transaction_id']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Transaction Amount</label> 
                                  <input type="text" readonly class="form-control" name="transaction_amt" id="transaction_amt" value="<?php echo $info['transaction_amt']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Uploaded Image</label><br>
                                    <?php if(!empty($info['image_name'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/more_fund_amt_account/<?php echo $info['image_name']; ?>" width="50%">
                                      <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                                    <?php } ?>
                                    <br>
                                    <?php if(!empty($info['image_name'])){ ?>
                                    <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/more_fund_amt_account/<?php echo $info['image_name']; ?>">Download</a>
                                    <?php } ?>
                                </div>
                                </div>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <!-- <a onclick="return confirm('Are You Sure You Want To send ?')" href="<?php //echo $module_url_path;?>/advance_pay_send/"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a> -->
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
