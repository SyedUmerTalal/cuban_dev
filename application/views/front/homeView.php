
    <div class="banner">
      <div class="slider">
        <div class="position-relative align-items-center">
          <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
              <div class="mt-5 col-lg-6 col-md-10 align-self-center text-center content wow" data-wow-offset="10"  data-wow-iteration="1">
                <h1 class="f-colonna"><?php echo $homeData->main_heading;?></h1>
                <img alt="A lazy image " class="mb-2 ban d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/home_page/').$homeData->center_moving_image;?>">
                <button onclick="window.location.href = '<?php echo base_url('products');?>'; "><?php echo $homeData->main_heading_button_text;?></button>
              </div>
            </div>
          </div>
          <img alt="A lazy image " class="side d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/home_page/').$homeData->background_image;?>">
        </div>
      </div>
      <img alt="A lazy image " class="rightside d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/home_page/').$homeData->right_moving_image;?>">
      <img alt="A lazy image " class="leftside d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/home_page/').$homeData->left_moving_image;?>">
    </div>
    <section class=" py-5 popular">
      <div class="container">
        <div class="row">
         <div class="col-xl-4 col-md-6 wow slideInDown" data-wow-offset="10"  data-wow-iteration="1">
            <h2 ><?php echo $homeData->section_one_heading;?></h2>
            <p><?php echo $homeData->section_one_text;?> </p>
         </div>
        </div>
        <div class="row">
          <?php if(!empty($categoryData)):foreach($categoryData as $cat):?>  
          <div class="col-xl-4 col-md-6 px-4 py-4 product  wow slideInUp" data-wow-offset="10"  data-wow-iteration="1">
            <div class="productname text-center">
               <h5><?php echo $cat->category_name;?></h5>
            </div>
            <div class="product-image ">
              <img alt="A lazy image " class="mb-2 d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('assets/front/')?>img/product-1.jpg">
            </div>    
            <button class="w-100" onclick="window.location.href = '<?php echo base_url('products/category_wise_products/').$cat->category_slug;?>'; "> VIEW CATEGORY</button>
          </div>
          <?php endforeach;endif;?>
        </div>
      </div>
    </section>
    <section class="sale lazy px-lg-5 py-5" data-bg="linear-gradient(rgba(156, 205, 0, 0.7), rgba(156, 205, 0, .7)),url(<?php echo base_url('uploads/home_page/').$homeData->section_two_image;?>)">
      <div class="container ">
        <div class="row  justify-content-center text-center text-white">
          <div class="col-lg-6 col-md-8 align-self-center wow slideInLeft" data-wow-offset="10"  data-wow-iteration="1">
          <h2><?php echo $homeData->section_two_heading;?></h2>
          <p><?php echo $homeData->section_two_text;?></p>
          <button onclick="window.location.href = '<?php echo base_url('products');?>'; "> <?php echo $homeData->section_two_button_text;?>  </button>
        </div>
        </div>
      </div>
    </section> 
    <section class=" py-5 testimonials">
      <div class="container">
        <div class="row justify-content-center text-center">
         <div class="col-xl-4 col-md-6 wow slideInDown" data-wow-offset="10"  data-wow-iteration="1">
            <h2><?php echo $homeData->section_three_heading;?></h2>
            <p><?php echo $homeData->section_three_text;?> </p>
         </div>
        </div>
        <div class="slider">

          <?php if(!empty($feedbackData)):foreach($feedbackData as $costumer):?>
          <div class="px-4 ">
            <div class="row justify-content-center text-lg-left text-center">
              <div class="col-lg-3 col-10">
                <figure>
                  <img alt="A lazy image " class="mb-2 d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/home_page_feedback/').$costumer->costumer_image;?>">
                </figure>
              </div>
              <div class="col-lg-6 col-12 align-self-center">
                <h4><?php echo $costumer->costumer_name;?></h4>
                <p><?php echo $costumer->costumer_text;?> </p>
              </div>
            </div>
          </div>
        <?php endforeach;endif;?>

        </div>
        </div>
      </div>
    </section>
    <section class="gallery">
      <div class="container-fluid">
        <div class="slider">
         
      <?php if(!empty($galleryimageData)):foreach($galleryimageData as $gallery):?>
          <div class="">
            <figure>
              <a class="galleryimg" data-fancybox="mygallery" href="<?php echo base_url('uploads/gallery_page_images/').$gallery->image;?>">
                <img alt="A lazy image " class="mb-2 d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/gallery_page_images/').$gallery->image;?>">
              </a>
            </figure>
          </div>
      <?php endforeach;endif;?>


        </div>
      </div>
    </section>