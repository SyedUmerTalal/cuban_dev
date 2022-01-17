  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
            <div class="col-md-8">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb  ">
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>"><?php echo $aboutData->previous_page_text;?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $aboutData->current_page_text;?></li>
            </ol>
          </nav>
          </div>
          </div>
      <div class="row">
        <div class="col-lg-6 p-0">
          <img alt="A lazy image " class="mb-2 d-inline  lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/about_page/').$aboutData->aboutus_image;?>">
        </div>
        <div class="col-lg-6 contact align-self-center">
          <h2 class="clr-1"><?php echo $aboutData->main_heading;?></h2>
          <p>
           <?php echo $aboutData->aboutus_text;?>
          </p>
        </div>
      </div>
    </div>
    <section class="sale lazy px-lg-5 py-5" data-bg="linear-gradient(rgba(156, 205, 0, 0.7), rgba(156, 205, 0, .7)),url(<?php echo base_url('uploads/about_page/').$aboutData->section_one_image;?>)">
      <div class="container ">
        <div class="row  justify-content-center text-center text-white">
          <div class="col-lg-6 col-md-8 align-self-center wow slideInLeft" data-wow-offset="10"  data-wow-iteration="1">
          <h2><?php echo $aboutData->section_one_heading;?></h2>
          <p><?php echo $aboutData->section_one_text;?></p>
          <button onclick="window.location.href = '<?php echo base_url('products');?>'; "> <?php echo $aboutData->section_one_button_text;?>  </button>
        </div>
        </div>
      </div>
    </section> 
    <section class="py-5">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-6">
            <h4 class="clr-1"><?php echo $aboutData->section_two_left_heading;?></h4>
            <p><?php echo $aboutData->section_two_left_text;?></p>
          </div>
          <div class="col-lg-6">
            <h4 class="clr-1"><?php echo $aboutData->section_two_right_heading;?></h4>
            <p><?php echo $aboutData->section_two_right_text;?></p>
          </div>
        </div>
      </div>
    </section>