  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
  <section class="gallery py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <h2 class=""><?php echo $galleryData->page_heading;?></h2>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb  ">
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>"><?php echo $galleryData->previous_page;?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $galleryData->currenty_page;?></li>
            </ol>
          </nav>
          </div>
      </div>
      <div class="row">
       <?php if(!empty($galleryimageData)):foreach($galleryimageData as $galleryimg):?>
        <div class="col-md-4 text-center">
          <figure>
              <a class="galleryimg" data-fancybox="mygallery" href="<?php echo base_url('uploads/gallery_page_images/').$galleryimg->image;?>">
                <img alt="A lazy image " class="mb-2 d-inline mx-auto lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/gallery_page_images/').$galleryimg->image;?>">
              </a>
            </figure>
        </div>
      <?php endforeach;endif;?>

      


      </div>

    </div>
  </section>