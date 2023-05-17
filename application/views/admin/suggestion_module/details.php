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
          <div class="col-md-12 col-sm-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                  <tr>
					          <th>Title</th>
                    <td><?php echo $info['title']; ?></td>

					          <th>Tour Name</th>
                    <td><?php echo $info['tour_number']; ?> - <?php echo $info['tour_title']; ?></td>

                   </tr>
                   <tr>
                    <th>Date</th>
                    <td><?php echo date("d-m-Y",strtotime($info['date'])); ?></td>
                    
                    <th>Priority</th>
                    <td><?php echo $info['priority']; ?></td>
                    </tr>

                    <tr>
                    <th>Upload Attatchment</th>
                    <td><?php if(!empty($info['image_name'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name']; ?>" width="20%">
                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php } ?>
                    </td>

                    <th>Description</th>
                    <td><?php echo $info['description']; ?></td>
                  </tr>
                  
                  <tr>
                    <th>Remark</th>
                    <td><?php echo $info['admin_remark']; ?></td>
                  </tr>

                  </table>
              </div>
              
        <br>
        <div class="row">


            </div>
            <?php } ?>
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
  

</body>
</html>
