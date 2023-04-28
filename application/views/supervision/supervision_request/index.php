<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a>
              
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Agent Name - Boooking Center</th>
                    <th>Stationary Type</th>
                    <th>Image</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Stationary Remark</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                     ?>
                  <tr id="tableHolder">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['agent_name']; ?> - <?php echo $info['booking_center']; ?></td>
                    <td><?php echo $info['stationary_name']; ?></td>
                    <!-- <td><?php //echo $info['image_name']; ?></td> -->
                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image"></td>
                    <!-- <td><?php //if(!empty($info['image_name2'])){ echo $info['image_name2'];} ?></td> -->

                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code2/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>
                    
                    <!-- <td><?php //if(!empty($info['image_name3'])){ echo $info['image_name3'];} ?></td> -->
                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code3/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>

                    <td><?php echo $info['stationary_remark']; ?></td>

                    <!-- <td>
                      <a href="<?php //echo $module_url_path;?>/details/<?php //echo $info['id'];  ?>" ><i class="fas fa-eye" aria-hidden="true" style="color:black";></i></a> &nbsp;
                    </td> -->
                    <?php if($info['enter_code']!=''){ ?>
                      <td>
                        <button class="btn bg-success btn-md" data-toggle="modal" data-target="#myModal1_<?php echo $info['id'] ?>">
                          Done
                        </button>
                      </td>
                    <?php } else if($info['is_hold']=='yes' && $info['superviser_id']!=$iid){ ?>
                      <td>
                        <button class="btn bg-danger btn-md newid" id="to_change" title="This Request Hold By <?php echo $info['supervision_name'] ?>" data-toggle="modal" >
                          Hold
                        </button>
                      </td>
                    <?php } else{ ?>
                      <td>
                        <button class="btn btn-primary btn-md newid" data-toggle="modal" attr_hold="<?php echo $info['id'] ?>" data-target="#myModal1_<?php echo $info['id'] ?>">
                          Allocate
                        </button>
                      </td>
                    <?php } ?>

                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
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



<!-- Modal -->
<?php  
                  
$i=1; 
foreach($arr_data as $info) 
{ 
  ?>
<div class="modal fade" id="myModal1_<?php echo $info['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="myModalLabel">Send Code</h4>
      </div>
      
      <div class="modal-body">
        <form method="post" action="<?php echo $module_url_path; ?>/edit" >
        <input type="hidden" class="form-control" name="sup_r_id" id="sup_r_id" value="<?php echo $info['id']; ?>">
        <?php if($info['enter_code']!=''){ ?>
          <input type="text" readonly class="form-control" name="enter_code" id="enter_code" placeholder="Enter Code" value="<?php echo $info['enter_code'] ?>" required>
        <?php } else{ ?>
          <input type="text" class="form-control" name="enter_code" id="enter_code" placeholder="Enter Code" value="<?php echo $info['enter_code'] ?>" required>
        <?php } ?>
      </div>
      <div class="modal-footer">
      <?php if($info['enter_code']!=''){ ?>
          <button type="submit" hidden class="btn btn-primary" name="send" value="send" id="send">Send</button>
        <?php } else{ ?>
          <button type="submit" class="btn btn-primary" name="send" value="send" id="send">Send</button>
        <?php } ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>
  </div>
</div>

<?php } ?>
  

</body>
</html>
