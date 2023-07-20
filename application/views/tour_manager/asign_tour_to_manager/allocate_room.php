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
             
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if(count($arr_data) > 0 ) 
                { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Total One Bed Rooms</th>
                    <th>Total Two Bed Rooms</th>
                    <th>Total Three Bed Rooms</th>
                    <th>Total Four Bed Rooms</th>
                    <th>Allocate Rooms</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['mr/mrs'] ?> <?php echo $info['first_name'] ?> <?php echo $info['middle_name'] ?> <?php echo $info['last_name'] ?></td>
                    <td><?php echo $info['total_allocated_rooms_1'] ?></td>
                    <td>
                      <?php 
                      if($info['total_allocated_rooms_2']!==''){
                        echo $info['total_allocated_rooms_2'] ;
                      } else{
                        echo '0';
                      }
                      
                      ?>
                    </td>
                    <td>
                      <?php 
                      if($info['total_allocated_rooms_3']!==''){
                        echo $info['total_allocated_rooms_3'] ;
                      } else{
                        echo '0';
                      }
                      
                      ?>
                      </td>
                    <td>
                      <?php 
                      if($info['total_allocated_rooms_4']!==''){
                        echo $info['total_allocated_rooms_4'] ;
                      } else{
                        echo '0';
                      }
                      
                      ?>
                    </td>

                    <td>
                      
                        <select class="select2" multiple="multiple" data-placeholder="Allocate rooms" style="width: 100%;" name="allocate_rooms[]" id="allocate_rooms" required="required">
                            <option value="">Allocate Rooms</option>
                            <?php
                              foreach($hotel_allocated_room_data as $hotel_allocated_room_data_info) 
                              { 
                            ?>
                              <option value="<?php echo $hotel_allocated_room_data_info['id']; ?>"><?php echo $hotel_allocated_room_data_info['booking_center']; ?></option>
                          <?php } ?>
                          </select>
                      
                    
                    </td>
                    
                    
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
  

</body>
</html>
