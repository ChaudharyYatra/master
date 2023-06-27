<style>
.book-tbl {
    position: relative;
    display: inline-flex;
    width: 100%;
    margin-top: 5%;
    padding-bottom: 20px;
}

.new_seat_design_ul {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

.new_seat_design_ul li {
    display: block;
    float: left;
    margin: 0 5px;
}

.label {
    display: inline-block;
    position: relative;
    width: 20px;
    color: #fff;
    background: #FBCF61;
    text-align: center;
    line-height: 22px;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.25s ease 0s;
    -webkit-transition: all 0.25s
}

.label:hover {
    background: #00B4F1;
}

.label:active {
    transition: 0;
    -webkit-transition: 0;
    -webkit-filter: brightness(.8);
}

input {
    display: none;
}

input:checked+label {
    background: #FF7541;
    color: #fff;
}

input:checked+label {
    animation: boom .5s;
    -webkit-animation: boom .5s;
}

@keyframes boom {
    25% {
        transform: scale(1.25);
    }
}

@-webkit-keyframes boom {
    25% {
        -webkit-transform: scale(1.25);
    }
}

input:disabled+label {
    color: #fff;
    background: #f00;
}

.book-txt {
    font-family: "Open Sans", sans-serif;
    text-align: center;
    color: #888;
}

.book-txt h2 {
    color: #FF7541;
}

.note {
    padding: 25px 0;
    font-size: 14px;
}

.note a {
    color: #FF7541;
    text-decoration: none;
}

.note a:hover {
    text-decoration: underline;
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
                        <a href="<?php echo $module_url_path; ?>/index/"><button
                                class="btn btn-primary">Back</button></a>
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
                    <!-- jquery validation --> <?php $this->load->view('tour_manager/layout/agent_alert'); ?> <div
                        class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $page_title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- <?php
                  // foreach($arr_data as $info) 
                   //{ 
                     ?> -->
                        <form method="post" enctype="multipart/form-data">

                            <div class="card-body">
                                <div class="row" id="main_row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="One Bed" Value="One Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Number</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="First Class" Value="First Class" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Seat Numbers</label> -->
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Add On Price</label>
                                            <input type="text" class="form-control" name="first_class_price"
                                                id="first_class_price" placeholder="Enter Price"
                                                oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');"
                                                required="required">
                                            <span class="error"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="Two Bed" Value="Two Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Number</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="First Class" Value="First Class" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Seat Numbers</label> -->
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Add On Price</label>
                                            <input type="text" class="form-control" name="second_class_price"
                                                id="second_class_price" placeholder="Enter Price" required="required">
                                            <span class="error"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="Three Bed" Value="Three Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Number</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="First Class" Value="First Class" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Seat Numbers</label> -->
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Add On Price</label>
                                            <input type="text" class="form-control" name="third_class_price"
                                                id="third_class_price" placeholder="Enter Price"
                                                oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');"
                                                required="required">
                                            <span class="error"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="Four Bed" Value="Four Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Number</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="First Class" Value="First Class" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Seat Numbers</label> -->
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                    <li>
                                                        <input id="i1" type="checkbox" />
                                                        <label class="label" for="i1">1</label>
                                                    </li>

                                                    <li>
                                                        <input id="i2" type="checkbox" />
                                                        <label class="label" for="i2">2</label>
                                                    </li>

                                                    <li>
                                                        <input id="i3" type="checkbox" />
                                                        <label class="label" for="i3">3</label>
                                                    </li>

                                                    <li>
                                                        <input id="i4" type="checkbox" />
                                                        <label class="label" for="i4">4</label>
                                                    </li>

                                                    <li>
                                                        <input id="i5" type="checkbox" />
                                                        <label class="label" for="i5">5</label>
                                                    </li>

                                                    <li>
                                                        <input id="i6" type="checkbox" />
                                                        <label class="label" for="i6">6</label>
                                                    </li>

                                                    <li>
                                                        <input id="i7" type="checkbox" />
                                                        <label class="label" for="i7">7</label>
                                                    </li>

                                                    <li>
                                                        <input id="i8" type="checkbox" />
                                                        <label class="label" for="i8">8</label>
                                                    </li>

                                                    <li>
                                                        <input id="i9" type="checkbox" />
                                                        <label class="label" for="i9">9</label>
                                                    </li>

                                                    <li>
                                                        <input id="i10" type="checkbox" />
                                                        <label class="label" for="i10">10</label>
                                                    </li>

                                                    <li>
                                                        <input id="i11" type="checkbox" />
                                                        <label class="label" for="i11">11</label>
                                                    </li>

                                                    <li>
                                                        <input id="i12" type="checkbox" />
                                                        <label class="label" for="i12">12</label>
                                                    </li>

                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Add On Price</label>
                                            <input type="text" class="form-control" name="third_class_price"
                                                id="third_class_price" placeholder="Enter Price"
                                                oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');"
                                                required="required">
                                            <span class="error"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary form-control" name="submit" value="submit"
                                    style="width:10%;">Submit</button>
                                <a href="<?php echo $module_url_path; ?>/index/"><button type="button"
                                        class="btn btn-danger">Cancel</button></a>
                            </div>
                        </form>

                    </div>
                    <!-- <?php //} ?>   -->
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