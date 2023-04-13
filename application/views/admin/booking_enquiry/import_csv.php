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
            <!-- <ol class="breadcrumb float-sm-right">
              <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
            </ol> -->
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
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="add_import">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                            <label>Import File</label>
                              <div class="form-group input-group">
                                <input type="file" name="file" />
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                  <!--<span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password1"></span>-->
                                  </div>
                                </div>
                              </div>
                      </div>


                
                      
              </div>
              <!-- <div class="registrationFormAlert" id="divCheckPasswordMatch"> -->
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          <span class="registrationFormAlert" id="divCheckPasswordMatch"></span>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

  

</body>
</html>
