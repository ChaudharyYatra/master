    <style>
    /* testimonial index page */
    .item_right{
    margin-left: 20% !important;
    } 

    table.scrolldown tbody td, thead th {
  width : 260px;
  /* border-right: 2px solid black; */
}

table.scrolldown tbody{
    height : auto !important;
}
    </style>

    <!-- banner starts -->
    <section class="banner overflow-hidden">
        <div class="slider top50">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($sliders as $key => $sliders_value) { ?>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            
                            <div class="slide-image" style="background-image:url(<?php echo base_url(); ?>uploads/slider/<?php echo $sliders_value['image_name']; ?>)"></div>
                            <!-- <div class="swiper-content">
                                <div class="entry-meta mb-2">
                                    <h5 class="entry-category mb-0 white"><?php //echo $sliders_value['title']; ?></h5>
                                </div>
                                <h1 class="mb-2"><a href="#" class="white"><?php //echo $sliders_value['sub_title']; ?></a></h1>
                                <p class="white mb-4"><?php //echo $sliders_value['description']; ?></p>
                            </div> -->
                            <div class=""></div>
                        </div> 
                    </div>
                    <?php } ?>
                   
                </div>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>
    <!-- banner ends -->

    <!-- form main starts -->
    <div class="form-main">
        <div class="section-shape top-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape-pat.png);"></div>
        <div class="container">
            <div class="row align-items-center form-content rounded position-relative ms-5 me-5">
                <div class="col-lg-2 p-0">
                    <h4 class="form-title form-title1 text-center p-4 py-5 white bg-theme mb-0 rounded-start d-lg-flex align-items-center"><i class="icon-location-pin fs-1 me-1"></i> Find Your Holidays</h4>
                </div>
                <div class="col-lg-10 px-4">
                    <form action="<?php echo base_url();?>home/all_packages_search" method="post">
                    <div class="form-content-in d-lg-flex align-items-center">
                        <div class="form-group me-2">
                            <div class="input-box">
                                <!-- <select class="niceSelect" name="destination_name" >
                                    <option value="">Select Destination</option>
                                    <?php //foreach($main_packages as $pack_data){  ?>
                                    <option value="<?php //echo $pack_data['tour_title'];?>"><?php //echo $pack_data['tour_title'];?></option>
                                    <?php //} ?>
                                </select> -->
                                    <input type="text" list="mylist" size="5" name="destination_name" placeholder="Where would you like to go?">
                                    <datalist id="mylist" style="margin-top:500px!important;">
                                        <?php foreach($main_packages as $pack_data){  ?>
                                            <option value="<?php echo $pack_data['tour_title'];?>"><?php echo $pack_data['tour_title'];?></option>
                                        <?php } ?>
                                        
                                    </datalist>
                            </div>                            
                        </div>
                            
                      
                        <div class="form-group mb-0 text-center">
                            <input type="submit" class="nir-btn w-100" id="submit" value="Search Now" name="submit" style="width:20px">
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- form main ends -->

<?php foreach($core_features as $key => $core_features_value) { ?>
    <!-- about-us starts -->
    <section class="about-us pb-0 pt-10" style="background-image:url(<?php echo base_url(); ?>assets/front/images/shape4.png); background-position:center;">
        <div class="container">
            
        <!-- w-50 -->
            <div class="section-title mb-6 w-75 mx-auto text-center">
                
                <span>
                    <img src=<?php echo base_url(); ?>uploads\do_not_delete\get_to_know.png height="30%" width="30%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500"> <span class="theme">We Will Take Care  Of You</span></h2>
                <h4 class="mb_for_img" data-aos="fade-up" data-duration="500"><b>As We Provide Best</b></h4>
                <!-- We are best at providing -->
            </div>

            <!-- why us starts -->
            <div class="why-us">
                <div class="why-us-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInX">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fa fa-h-square white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_one_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_one_description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInY visible">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fa fa-plane white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_two_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_two_description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInY visible">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fas fa-hamburger white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_three_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_three_description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInY visible">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fa fa-user white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_four_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_four_description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- why us ends -->
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->
<?php } ?>


<!-- <section class="" style="margin-top:-50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <img src=<?php //echo base_url(); ?>IndiaMap.png height="70%" width="60%" alt></img>
                </div>
            </div>
        </div>
    </div>
</section> -->



    <!-- best tour Starts -->
    <section class="trending bg-grey pt-16 pb-5">
        <div class="section-shape top-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape8.png);"></div>
        <div class="container">
        <div class="section-title mb-6 w-75 mx-auto text-center">
                
                <span>
                    <img src=<?php echo base_url(); ?>india.png height="30%" width="60%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Our <span class="theme" data-aos="fade-up" data-duration="500">Indian Destinations</span></h2>  
                <h4 class="mb_for_img theme_sub_title" data-aos="fade-up" data-duration="500">Let's Explore Our Own Colorful Land</h4>
            </div>
            <div class="trend-box">
                <div class="row item-slider">
                    <?php  
                   foreach($main_packages as $key => $main_packages_value) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
						<a href="<?php echo base_url(); ?>packages/package_details/<?php echo $main_packages_value['id']; ?>">
                        <div class="trend-item rounded box-shadow bg-white" data-aos="fade-left" data-duration="100">
                            <div class="trend-image position-relative">
                                <img src="<?php echo base_url(); ?>uploads/packages/<?php echo $main_packages_value['image_name']; ?>" alt="<?php echo $main_packages_value['image_name']; ?>" height="250px">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                            <div class="new-trend2 bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> <?php echo $main_packages_value['tour_number_of_days']; ?> Days Tours</span>
                                </div>
                            </div>
                            <div class="new-trend term-btn bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <span class="fw-bold">Tour No. <?php echo $main_packages_value['tour_number']; ?></span>
                                </div>
                            </div>

                                <h3 class="mb-1 card_title"><?php echo mb_substr($main_packages_value['tour_title'], 0, 18); ?></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    <div class="rating">
                                        <?php if($main_packages_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='5') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php } ?>
                                    </div>

                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="entry-meta">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0">Starting from<span class="theme fw-bold fs-5"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $main_packages_value['cost'];?></span></p>
                                        </div>
                                    </div>  

                                </div>
                                <div class="entry-meta">
                                    <div class="entry-author d-flex align-items-center">
                                        <p class="mb-2">Tour Date&nbsp;<span class="theme fw-bold"> <?php echo $main_packages_value['journey_date'];?></span> <a href="" class="package-date" data-bs-toggle="modal" data-bs-target="#tour_dates_Modal_<?php echo $main_packages_value['id'] ?>">..More Dates</a></p> 
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <a href="#" class="nir-btn term-btn white fw-bold btn-width" data-bs-toggle="modal" data-bs-target="#InclusionModal_<?php echo $main_packages_value['id'] ?>">Inclusion</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <a href="#" class="nir-btn term-btn fw-bold btn-width white" data-bs-toggle="modal" data-bs-target="#itineraryModal_<?php echo $main_packages_value['id'] ?>">Itinerary</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <a href="<?php echo base_url(); ?>agent_list/index" class="nir-btn term-btn fw-bold btn-width white">Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <a href="#" class="nir-btn term-btn fw-bold btn-width white" data-bs-toggle="modal" data-bs-target="#tcModal_<?php echo $main_packages_value['id'] ?>">T & C</a>
                                            </div>
                                        </div>
                                </div>

                            </div>
                            <a href="<?php echo base_url(); ?>packages/package_details/<?php echo $main_packages_value['id']; ?>">
                            <div class="card-footer card_readmore" id="button-2">
                                <div id="slide"></div>
                                    <small class="card_css fw-bold">View More</small>
                            </div>

                        </div>
							</a>
                    </div>
                    <?php } ?>
                   
                </div>
            </div>  
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url(); ?>packages/all_packages" class="nir-btn">View All Packages</a>
                </div>
        </div>
    </section>
    <!-- best tour Ends -->

        <!-- Speciality Tours Deal Starts -->
        <section class="trending pt-17 pb-1 top" style="background-image: url(images/shape4.png);">
        <div class="container">
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <span>
                    <img src=<?php echo base_url(); ?>uploads\do_not_delete\Trending.png height="30%" width="30%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Trending <span class="theme" data-aos="fade-up" data-duration="500">Destinations </span></h2>  
                <h4 class="mb_for_img theme_sub_title" data-aos="fade-up" data-duration="500">Let's Experience The Season's Speciality</h4>
            </div>
            <div class="trend-box">
                <div class="row item-slider">
                <?php foreach($package_mapping_data as $pm_data){ ?>    
                    <div class="col-lg-4">
                        <div class="trend-item1 rounded box-shadow bg-white mb-4" data-aos="fade-left" data-duration="100">
                            <a href="<?php echo base_url(); ?>tour_list/index/<?php echo $pm_data['id']; ?>" class="white">
                            <div class="trend-image position-relative">
                                <img src="<?php echo base_url(); ?>uploads/package_mapping/<?php echo $pm_data['image_name']; ?>" alt="image" class="">
                                <div class="trend-content1 p-4">
                                    <h3 class="mb-1 white card_title"><?php echo mb_substr($pm_data['package_title'], 0, 18); ?></h3>
                                    
                                    <!-- <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0 white">Starting from <span class="theme1 fw-bold fs-5">₹ <?php //echo $pm_data['cost']; ?></span></p>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="overlay"></div>
                            </div>
                            </a>
                        </div>
                    </div>
                  <?php } ?>
                </div>
                    <div class="col-lg-12 text-center">
                        <a href="<?php echo base_url(); ?>tour_list/all_main_category_list" class="nir-btn">View All Packages</a>
                    </div>
            </div>    
        </div>
    </section>
    <!-- Speciality Tours Deal Ends -->

    <!-- <section class="" style="margin-top:-50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <img src=<?php //echo base_url(); ?>WorldMap.png height="70%" width="60%" alt></img>
                </div>
            </div>
        </div>
    </div>
    </section> -->

    <!-- top Destination starts -->
    <section class="trending bg-grey pb-3 pt-5">
    <div class="section-shape top-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape8.png);"></div>
        <div class="container">
            <div class="section-title mb-6 mt-8 w-75 mx-auto text-center">
                <span>
                    <img src=<?php echo base_url(); ?>international1.png height="20%" width="60%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Our <span class="theme" data-aos="fade-up" data-duration="500">International Destinations</span></h2>
                <h4 class="mb-1 theme_sub_title" data-aos="fade-up" data-duration="500">Let's Fly To Another Country</h4>
            </div>
            <div class="row align-items-center">
                <div class="row item-slider">
                    <?php if(count($international_packages)>0) { foreach($international_packages as $key => $international_packages_value) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
						
                        <div class="trend-item rounded box-shadow bg-white card_bg" data-aos="fade-left" data-duration="100">
                            <div class="trend-image position-relative">
                                <img src="<?php echo base_url(); ?>uploads/international_packages/<?php echo $international_packages_value['image_name']; ?>" alt="<?php echo $international_packages_value['image_name']; ?>" height="250px">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                            <div class="new-trend2 bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> <?php echo $international_packages_value['tour_number_of_days']; ?> Days Tours</span>
                                </div>
                            </div>
                            <div class="new-trend term-btn bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <span class="fw-bold">Tour No. <?php echo $international_packages_value['tour_number']; ?></span>
                                </div>
                            </div>
                                
                                <h3 class="mb-1 card_title"><?php echo mb_substr($international_packages_value['tour_title'], 0, 18); ?></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    
                                    <div class="rating">
                                        <?php if($international_packages_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='5') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php } ?>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="entry-meta">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0">Starting from<span class="theme fw-bold fs-5"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $international_packages_value['cost'];?></span></p>
                                        </div>
                                
                                    </div>

                                </div>                                
                                    <div class="entry-meta">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-2">Tour Date&nbsp;<span class="theme fw-bold"> <?php echo $international_packages_value['journey_date'];?></span> <a href="" class="package-date" data-bs-toggle="modal" data-bs-target="#tour_dates_Modal_international<?php echo $international_packages_value['id'] ?>">..More Dates</a></p> 
                                        </div>
                                    </div>

                                    <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="#" class="nir-btn term-btn white fw-bold btn-width" data-bs-toggle="modal" data-bs-target="#InclusionModal_<?php echo $international_packages_value['id'] ?>">Inclusion</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="#" class="nir-btn term-btn fw-bold btn-width white" data-bs-toggle="modal" data-bs-target="#itineraryModal_<?php echo $international_packages_value['id'] ?>">Itinerary</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="<?php echo base_url(); ?>agent_list/index" class="nir-btn term-btn fw-bold btn-width white">Contact Us</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="#" class="nir-btn term-btn fw-bold btn-width white" data-bs-toggle="modal" data-bs-target="#tcModal_<?php echo $international_packages_value['id'] ?>">T & C</a>
                                    </div>
                                </div>
                            </div>

                            </div>

                            <a href="<?php echo base_url(); ?>international_packages/package_details/<?php echo $international_packages_value['id']; ?>">
                            <div class="card-footer card_readmore" id="button-2">
                                <div id="slide"></div>
                                    <small class="card_css fw-bold">View More</small>
                            </div>
                            </a>

                        </div>
							
                    </div>
                    <?php } } ?>
                   
                </div>
                
            </div>
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url(); ?>international_packages/all_packages" class="nir-btn">View All Packages</a>
                </div>
        </div>
    </section>
    <!-- top Destination ends -->


    <!-- testimonial starts -->
    <section class="testimonial pt-10 pb-20"  style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Good_Reviews.png);">   
        <div class="container">
            <div class="testimonial-in">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="section-title">
                            <h4 class="mb-1 theme1" data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine">Our Testimonials</h4>
                            <h2 class="mb-1 white" data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine">Good Reviews By <span class="theme">Clients</span></h2>
                            <p class="mb-0 white" data-aos="fade-right" data-aos-offset="1s00" data-aos-easing="ease-in-sine">Reviews given by our clients about their tours.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row about-slider">
                            <?php if(count($client_reviews)>0) { foreach($client_reviews as $key => $client_reviews_value) { ?>
                            <div class="col-md-4 item" data-aos="fade-left" data-aos-offset="100" data-aos-easing="ease-in-sine">
                                <div class="testimonial-item1 item_right">
                                    <div class="details d-flex">
                                        <i class="fa fa-quote-left fs-1 mb-0"></i>
                                        <div class="author-content ms-4">
                                            <p class="mb-4 white fs-5 fw-normal"><?php echo $client_reviews_value['review']; ?></p>
                                            
                                            <div class="author-info d-flex align-items-center">
                                                <img src="<?php echo base_url(); ?>uploads/client_reviews/<?php echo $client_reviews_value['image_name']; ?>" alt="<?php echo $client_reviews_value['name']; ?>">
                                                <div class="author-title ms-3">
                                                    <h5 class="m-0 theme1"><?php echo $client_reviews_value['name']; ?></h5>
                                                    <span class="white"><?php echo $client_reviews_value['designation']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

        <div class="dot-overlay"></div>   
    </section>
    <!-- testimonial Ends -->

    <!-- offer Packages Starts -->
    <!-- <section class="trending trend-packages pt-0 pb-0 z-index3">
        <div class="container">
            <div class="trend-box mt-minus">
                <div class="row review-slider1 mx-0">
                    <?php //if(count($random_packages)>0) { foreach($random_packages as $key => $random_packages_value) { ?>
                    <div class="col-lg-6 px-2">
						<a href="<?php //echo base_url(); ?>packages/package_details/<?php //echo $random_packages_value['id']; ?>">
                        <div class="trend-full bg-white rounded box-shadow overflow-hidden card_bg">
                            <div class="row m-0">
                               
                                <div class="col-lg-12 col-md-12">
                                    <div class="trend-content py-3 position-relative">
                                        <h5 class="theme mb-1">Tour Number: <?php //echo $random_packages_value['tour_number']; ?></h5>
                                        <h3 class="mb-1"><?php //echo $random_packages_value['tour_title']; ?></h3>
                                        <div class="rating-main d-flex align-items-center pb-2">
                                            <div class="rating">
                                                 <?php //if($random_packages_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='5') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //} ?>
                                            </div>
                                           
                                        </div>
                                        <p><?php //echo mb_substr($random_packages_value['short_description'], 0, 20); ?> </p>
                                        <div class="trend-meta border-b pb-2 mb-2">
                                            <div class="entry-author theme">
                                                <i class="icon-calendar"></i>
                                                <span> <?php //echo $random_packages_value['tour_number_of_days']; ?></span>
                                            </div>
                                        </div>
                                        <div class="entry-meta">
                                            <div class="entry-author d-flex align-items-center">
                                                <p class="mb-0">Starting from <i class="fa fa-inr" aria-hidden="true"></i><span class="theme fw-bold fs-5"> <?php echo $random_packages_value['cost']; ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
							</a>
                    </div>
                    <?php //} } ?>
                </div>
            </div>    
        </div>
    </section> -->
    <!-- offer Packages Ends -->

    <!-- our teams starts -->
    <section class="our-team pb-0">
        <div class="container">
              
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <span>
                    <img src=<?php echo base_url(); ?>uploads\do_not_delete\meet_our_expert.png height="30%" width="30%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Meet <span class="theme" data-aos="fade-up" data-duration="500">Our Experts</span></h2>
                <h4 class="mb_for_img theme_sub_title" data-aos="fade-up" data-duration="500">Team Working Together To Make Your Trip Memorable</h4>
                <!-- <p>A person who shows the way to others.</p> -->
            </div>  
            <div class="team-main">
                <div class="row shop-slider">
                    <?php if(count($tour_guides)>0) { foreach($tour_guides as $key => $tour_guides_value) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="team-list rounded" data-aos="flip-left" data-aos-duration="3000">
                            <div class="team-image">
                                <img src="<?php echo base_url(); ?>uploads/tour_guides/<?php echo $tour_guides_value['image_name']; ?>" alt="<?php echo $tour_guides_value['name']; ?>">
                            </div>
                            <div class="team-content text-center p-3 bg-theme">
                               <h4 class="mb-0 white"><?php echo $tour_guides_value['name']; ?></h4>
                                <p class="mb-0 white"><?php echo $tour_guides_value['designation']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- our teams Ends -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>


<?php foreach($main_packages as $key => $main_packages_all_value) { ?>
<!-- itinerary modal -->
<div class="modal fade" id="itineraryModal_<?php echo $main_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Itinerary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b" style="height:425px;">
                <div id="" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                        <div class="responsive-wrapper"
                            style="-webkit-overflow-scrolling: touch;">

                            <?php if(!empty($main_packages_all_value['pdf_name'])) { ?>
                            <embed src="<?php echo base_url(); ?>uploads/package_daywise_program/<?php echo $main_packages_all_value['pdf_name']; ?>#toolbar=0" type="application/pdf" frameborder="0" width="100%" height="400px">
                            
                            <?php }?> 
                        </div>

                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Inclusion modal -->
<div class="modal fade" id="InclusionModal_<?php echo $main_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Inclusion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <!-- <?php //echo $main_packages_all_value['id'] ?> -->
            <?php if(!empty($main_packages_all_value['inclusion_img'])) { ?>
            <img src="<?php echo base_url(); ?>uploads/inclusion_img/<?php echo $main_packages_all_value['inclusion_img']; ?>" width="100%"/> 
            <?php } ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Terms & Condition modal -->
<div class="modal fade" id="tcModal_<?php echo $main_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Terms & Condition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <!-- <?php //echo $main_packages_all_value['id'] ?> -->
            <?php if(!empty($main_packages_all_value['tc_img'])) { ?>
            <img src="<?php echo base_url(); ?>uploads/tc_img/<?php echo $main_packages_all_value['tc_img']; ?>" width="100%"/> 
            <?php } ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Date modal -->
<div class="modal fade" id="tour_dates_Modal_<?php echo $main_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Dates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <table class="table table-bordered scrolldown">
                            <thead>
                            <tr class="table_head">
                                <th>Dates</th>
                                <th>Single Per Seat</th>
                                <th>Twin Sharing Per Seat</th>
                                <th>3/4 Sharing Per Seat</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php 
                        $record = array();
                        $fields = "package_date.*";
                        $this->db->where('packages.id',$main_packages_all_value['id']);
                        $this->db->where('packages.is_deleted','no');
                        $this->db->where('packages.is_active','yes');
                        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
                        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
                        // $this->db->group_by('package_id');
                        $main_packages_date = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
                        
                        foreach($main_packages_date as $main_packages_date_value){ ?>        
                            <tr>
                                <td><?php echo isset($main_packages_date_value['journey_date']) && $main_packages_date_value['journey_date']!=''? date('d-m-Y', strtotime($main_packages_date_value['journey_date'])):''; ?></td>
                                <td>₹ <?php echo $main_packages_date_value['single_seat_cost'];?></td>
                                <td>₹ <?php echo $main_packages_date_value['twin_seat_cost'];?></td>
                                <td>₹ <?php echo $main_packages_date_value['three_four_sharing_cost'];?></td>
                            </tr>
                        <?php } ?>
                            </tbody>
                        </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<?php } ?>

<!-- international pack modal -->


<?php foreach($international_packages as $key => $international_packages_all_value) { ?>
<!-- itinerary modal -->
<div class="modal fade" id="itineraryModal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Itinerary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b" style="height:425px;">
                <div id="" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                        <div class="responsive-wrapper"
                            style="-webkit-overflow-scrolling: touch;">

                            <?php if(!empty($international_packages_all_value['pdf_name'])) { ?>
                            <embed src="<?php echo base_url(); ?>uploads/international_package_daywise_program/<?php echo $international_packages_all_value['pdf_name']; ?>#toolbar=0" type="application/pdf" frameborder="0" width="100%"  height="400px">
                            
                            <?php }?> 
                        </div>

                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Inclusion modal -->
<div class="modal fade" id="InclusionModal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Inclusion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <!-- <?php //echo $international_packages_all_value['id'] ?> -->
            <?php if(!empty($international_packages_all_value['inclusion_img'])) { ?>
            <img src="<?php echo base_url(); ?>uploads/international_inclusion_img/<?php echo $international_packages_all_value['inclusion_img']; ?>" width="100%"/> 
            <?php } ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Terms & Condition modal -->
<div class="modal fade" id="tcModal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Terms & Condition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <!-- <?php //echo $international_packages_all_value['id'] ?> -->
            <?php if(!empty($international_packages_all_value['tc_img'])) { ?>
            <img src="<?php echo base_url(); ?>uploads/international_tc_img/<?php echo $international_packages_all_value['tc_img']; ?>" width="100%" style=""/> 
            <?php } ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Date modal -->
<div class="modal fade" id="tour_dates_Modal_international<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Dates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <table class="table table-bordered scrolldown">
                            <thead>
                            <tr class="table_head">
                                <th>Dates</th>
                                <th>Single Per Seat</th>
                                <th>Twin Sharing Per Seat</th>
                                <th>3/4 Sharing Per Seat</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                        <?php 
                        $record = array();
                        $fields = "international_packages_dates.*";
                        $this->db->where('international_packages_dates.package_id',$international_packages_all_value['id']);
                        //$this->db->where('international_packages_dates.is_deleted','no');
                        $this->db->where('international_packages_dates.is_active','yes');
                        //$this->db->join("international_packages_dates", //'international_packages.id=international_packages_dates.package_id','left');
                        //$this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
                        // $this->db->group_by('package_id');
                        $international_packages_dates = $this->master_model->getRecords('international_packages_dates',array('international_packages_dates.is_deleted'=>'no'),$fields);
                       
                        foreach($international_packages_dates as $international_packages_all_dates_value){ ?>        
                            <tr>
                                <td><?php echo isset($international_packages_all_dates_value['journey_date']) && $international_packages_all_dates_value['journey_date']!=''? date('d-m-Y', strtotime($international_packages_all_dates_value['journey_date'])):''; ?></td>
                                <td>₹ <?php echo $international_packages_all_dates_value['single_seat_cost'];?></td>
                                <td>₹ <?php echo $international_packages_all_dates_value['twin_seat_cost'];?></td>
                                <td>₹ <?php echo $international_packages_all_dates_value['three_four_sharing_cost'];?></td>
                            </tr>
                        <?php } ?>
                            </tbody>
                        </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<?php } ?>


<!-- Modal -->
<?php if(empty($website_visitor_data)){ ?>
<div class="modal fade" id="front_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Travelling information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="mb-2" method="post" onsubmit="return validateCustomisedForms()" action="<?php echo base_url();?>home/website_visitor_data">
        <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <input type="text" placeholder="First Name" name="first_name" id="first_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                    <span class="text-danger float-left" id="first_name_error" style="display:none"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <input type="text" placeholder="Last Name" name="last_name" id="last_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                    <span class="text-danger float-left" id="last_name_error" style="display:none"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <input type="text" placeholder="Email Address" name="email" id="email">
                    <span class="text-danger float-left" id="email_error" style="display:none"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <input type="text" placeholder="Mobile Number" name="mobile_number" id="mobile_number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                    <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group mb-2">
                    <div class="input-box">
                        <select class="niceSelect" name="department_id" id="department_id">
                            <option value="">Select Near By Region</option>
                            <?php foreach($department_data as $department){ ?> 
                            <option value="<?php echo $department['id'];?>"><?php echo $department['department'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <span class="text-danger float-left" id="department_id_error" style="display:none"></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group mb-2">
                    <div class="input-box">
                        <select class="" name="agent_id" id="agent_id">
                            <option value="">Select Nearest Area</option>
                        </select>
                    </div>
                    <span class="text-danger float-left" id="agent_id_error" style="display:none"></span>
                </div>
            </div> 
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label class="front_css">Travelling From Date</label>
                    </div>
                    <div class="col-md-6">
                        <label class="front_css">Travelling To Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <input type="date" placeholder="From date" name="form_date" id="form_date" min="<?php echo date("Y-m-d");?>">
                            <span class="text-danger float-left" id="form_date_error" style="display:none"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <input type="date" placeholder="To date" name="to_date" id="to_date" min="<?php echo date("Y-m-d");?>">
                            <span class="text-danger float-left" id="to_date_error" style="display:none"></span>
                        </div>
                    </div>  
                </div> 
            </div>    
        </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" value="submit" name="submit" id="submit">Submit</button>
        </div>
        </form>
    </div>
  </div>
</div>
<?php } ?>