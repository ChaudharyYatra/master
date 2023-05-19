<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    img{
        width:25% !important;
        height:25% !important;
    }

    table{
        table-layout: fixed;
        display: block;
        overflow: auto;
    }
    .for_row_set .row_set{
        width:135px;

    }
    .for_row_set .row_set1{
        width:70px;

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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a> -->
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
            <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card card-primary">
                <div class="card-body">
                <?php foreach($tour_expenses_all as $tour_expenses_all_info){ ?> 
                    <form method="post" enctype="multipart/form-data" id="edit_tour_expenses">   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expense Type</label>
                                <select class="select_css" name="expense_type" id="expense_type" required>
                                    <option value="">Select Expense Type</option>
                                    <?php foreach($expense_type_data as $expense_type_info){ ?> 
                                        <!-- <option value="<?php //echo $expense_type_info['id'];?>"><?php //echo $expense_type_info['expense_type_name'];?></option> -->
                                        <option value="<?php echo $expense_type_info['id']; ?>" <?php if($expense_type_info['id']==$tour_expenses_all_info['expense_type']) { echo "selected"; } ?>><?php echo $expense_type_info['expense_type_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="select_css" name="expense_category" id="expense_category">
                                        <option value="">Select Category</option>
                                        <?php foreach($expense_category_data as $expense_category_info){ ?> 
                                        <option value="<?php echo $expense_category_info['id'];?>" <?php if($expense_category_info['id']==$tour_expenses_all_info['expense_category_id']){echo "selected";} ?>><?php echo $expense_category_info['expense_category'];?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expenses Amount</label>
                                <input type="text" class="form-control" name="expense_amt" id="expense_amt" placeholder="Enter Expense Amount" required value="<?php echo $tour_expenses_all_info['expense_amt'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expenses date</label>
                                <input type="date" class="form-control" name="expense_date" id="expense_date" placeholder="Enter Expense Date" required value="<?php echo $tour_expenses_all_info['expense_date'];?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Remark(optional)</label>
                                <textarea class="form-control" name="tour_expenses_remark" id="tour_expenses_remark" placeholder="Enter Expense Remark"><?php echo $tour_expenses_all_info['tour_expenses_remark'];?></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                        <!-- <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button>  -->
                        <!-- <a href="<?php //echo $module_booking_basic_info; ?>/add/<?php //echo $enquiry_id;?>/1"><button type="button" class="btn btn-warning" name="back_btn">Back</button></a> -->
                        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div>
                </form>
                <?php } ?>
                </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>