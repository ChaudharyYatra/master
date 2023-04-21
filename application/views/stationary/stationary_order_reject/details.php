<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?php echo $module_url_path; ?>/reject"><button class="btn btn-primary">List</button></a>
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
              <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
              <form method="post" enctype="multipart/form-data" action="<?php echo $module_url_path;?>/received">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Stationary Name</th>
                    <th>Quantity</th>
                    <th>Send by stationary</th>
                    <th>Received Quantity</th>
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
                    <td>
                      <?php echo $i; ?>
                      <input type="hidden" class="form-control" name="s_id[]" id="s_id" value="<?php echo $info['id'] ?>" />
                      <input type="hidden" class="form-control" name="o_id" id="o_id" value="<?php echo $info['order_id'] ?>" />
                    </td>
                    <td><?php echo $info['stationary_name'] ?></td>
                    <td><?php echo $info['stationary_qty'] ?></td>
                    <td><?php echo $info['send_qty'] ?></td>
                    <td>
                            <input type="text" name="received_qty[]" class="received_qty" id="received_qty" value="<?php echo $info['received_qty'] ?>" disabled />
                    </td>
                    <!-- <td>
                        <?php 
                        //if($info['is_active']=='yes')
                          //{
                        ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php //} else { ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php //} ?>
                    </td> -->
                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
                  <center>
                    <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="received" name="submit" value="received">Received</button> -->
                  </center>
              </form>
                 <?php } else
                { echo '<div class="alert alert-danger alert-dismissable">
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