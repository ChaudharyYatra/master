<style>
  .box-color{
    background-color:#ffb6c14d;
  }
  .h-color{
    color:#e50000e8;
    text-align:center;
  }
  .receipt{
    background-color: white;
    color:#e50000e8;
    letter-spacing: 3px;
    border-radius:5px;
    font-weight: bold;
  }
  .amt-css{
    background-color: white;
    border-radius:5px;
  }
  .rupees{
    color:#e50000e8;
    padding: 5px;
  }
  /* .box-info{
    background-color:white;
    margin-left: 10px; 
    margin-right:10px !important;
    width: 98%;
  } */
  .section-css{
    padding:20px;
    /* margin:10px; */
  }
  .rupees_css{
    margin-top: 22%;
  }
  .border{
    border: 2px solid #e50000e8 !important;
    border-radius: 5px;
  }
  .input_css{
    height:30px;
  }
</style>

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
              <!-- <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="section-css">
        <div class="container border">
            <div class="row box-color">
                <div class="col-md-12">
                    <div class="mt-4">
                        <h2 class="h-color">CHOUDHARY YATRA COMPANY PVT.LTD.</h2>
                        <p class="text-center"><b>Reg No.</b> 17-88888888  <b>Corp.Office :</b>Tirupatil Apt. Nandini Nadi Road, Nr. Gaikwad Sabhagruh, Bhabha Nagar, Nashik Mo.7888 48 48 48</p>
                        <hr>
                    </div>
                </div>

                <div class="col-md-5">
                </div>
                <div class="col-md-2">
                    <h3 class="receipt text-center"> RECEIPT </h3>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-1">
                <h6>Date:</h6>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-2">
                        <h6 class="ml-5">Code No. </h6>  
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="col-md-1">
                        <h6>given by </h6>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="col-md-1">
                        <h6 class="mr-5">Time: </h6>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>

                    <div class="col-md-4 mt-3">
                        <h6 class="ml-5">Received with Thanks from  </h6>  
                    </div>
                    <div class="col-md-8 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>

                    <div class="col-md-3 mt-3">
                        <h6 class="ml-5">The sum of Rs.</h6>  
                    </div>
                    <div class="col-md-4 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="col-md-5 mt-3">
                        <h6 class="mr-5">as Advance / Part / Full Payment of Choudhary</h6>
                    </div>

                    <div class="col-md-6 mt-3">
                        <h6 class="ml-5">Yatra Co Pvt. Ltd. By QR Code/Cash/cheque/D.D.No.</h6>  
                    </div>
                    <div class="col-md-6 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>

                    <div class="col-md-2 mt-3">
                        <h6 class="ml-5">Drawn on </h6>  
                    </div>
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="col-md-1 mt-3">
                        <h6>Bank</h6>  
                    </div>
                    <div class="col-md-7 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>

                    <div class="col-md-3 mt-3">
                        <h6 class="ml-5">against SBA/BBA No.</h6>  
                    </div>
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="col-md-1 mt-3">
                        <h6>Tour No.</h6>  
                    </div>
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="col-md-2 mt-3">
                        <h6>Tour Date.</h6>  
                    </div>
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 rupees_css">
                        <div class="amt-css ml-5">
                            <h3 class="ml-2 rupees">₹  /-</h3>
                        </div>
                    </div>

                    <div class="col-md-6 mt-5 box-padding">
                        <div class="amt-css ml-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mt-2 ml-3 text-center">Particulars</h6>  
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h6 class="mt-2 ml-3">2000 X</h6>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="mt-2 ml-3">500 X</h6>
                                        </div>
                                        <div class="col-md-7 mt-2">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="mt-2 ml-3">200 X</h6>
                                        </div>
                                        <div class="col-md-7 mt-2">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="mt-2 ml-3">100 X</h6>
                                        </div>
                                        <div class="col-md-7 mt-2">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="mt-2 ml-3">50 X</h6>
                                        </div>
                                        <div class="col-md-7 mt-2">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="mt-2 ml-3">20 X</h6>
                                        </div>
                                        <div class="col-md-7 mt-2">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="mt-2 ml-3">10 X</h6>
                                        </div>
                                        <div class="col-md-7 mt-2 mb-2">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                        </div>
                                        <div class="col-md-7 mt-2 mb-2">
                                            <h6 class="mt-2 ml-3">Total (Rs.)</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mt-2 ml-3 text-center">Rupees</h6>  
                                    <div class="row">
                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mt-2 input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mt-2 input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mt-2 input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mt-2 input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mt-2 input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mt-2 input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-2">
                                            =
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mt-2 input_css" name="enq_seat_count" id="enq_seat_count" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-2 mb-2 ml-2 mr-2 text-center">
                        <h6>नोट : यात्रा बुकिंग केलेले डोकमेण्ट प्रामाणिक आहे कि नाही याची खात्री करण्यासाठी मो.7588484848 क्रमांकावर डोकमेण्ट व्हाट्स अप करावे.</h6>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <h5>GST No.27AAACC7487N1N0</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a onclick="return confirm('Are You Sure You Want To Final Book This Tour ?')" href="<?php echo $domestic_final_booking;?>/index"><button type="submit" class="btn btn-success float-right" name="submit" value="submit">Final Submit</button> 
        </div>
    </section>
    <!-- /.content -->
  </div>

</body>
</html>