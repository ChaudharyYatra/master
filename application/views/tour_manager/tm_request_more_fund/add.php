<style>
  .mealplan_css{
            border: 1px solid red !important;
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
            <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                      <form method="post" enctype="multipart/form-data" id="suugestion_add">
                        <div class="card-body">
                          <div class="row">
                            <?php
                            foreach($packages_data as $packages_data_info) 
                            { 
                            ?>
                          <div class="col-md-6">
                                <div class="form-group">
                                    <label>Package Type</label>
                                    <input type="text" readonly class="form-control" name="package_type_name" id="package_type_name" placeholder="Enter package type" value="<?php echo $packages_data_info['package_type'];?>">
                                    <input type="hidden" class="form-control" name="package_type" id="package_type" placeholder="Enter package type" value="<?php echo $packages_data_info['pack_id'];?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tour No / Name</label>
                                    <input type="text" readonly class="form-control" name="tour_number_name" id="tour_number_name" placeholder="Enter package type" value="<?php echo $packages_data_info['tour_number'];?> - <?php echo $packages_data_info['tour_title'];?>">
                                    <input type="hidden" class="form-control" name="tour_number" id="tour_number" placeholder="Enter package type" value="<?php echo $packages_data_info['pid'];?>">
                                </div>
                            </div>

                                <?php } ?>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Request Amount For More Fund</label>
                                    <textarea class="form-control" name="request_more_fund" id="request_more_fund" placeholder="Enter More Fund Amt" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></textarea>
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
 