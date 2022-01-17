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
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('products');?>">Products</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $result->product_name;?></li>
            </ol>
          </nav>
          </div>
          </div>

          <div class="row py-5">
    
            <div class="col-md-8">
              <h3><?php echo $result->product_name;?></h3>
              <h6 class="clr-2"><span>$<?php echo $result->product_discounted_price;?> </span><strike class="clr-1">$<?php echo $result->product_regular_price;?> </strike></h6>
              <p><?php echo $result->product_quantity;?> in stock</p>
              <h5>Description</h5>
              <p>
              <?php echo $result->product_description;?>
              </p>
              <div class="quantity buttons_added">
                <input type="button" value="-" class="minus">
                <input type="number" step="1" min="1" max="5" readonly="readonly" name="quantity" value="1" title="Qty" class="text-center input-text qty text" size="4" pattern="" inputmode="">
                <input type="button" value="+" class="plus">
              </div><br><br>
              <button  class="cart_btn" data-proid="<?php echo $result->product_id?>">ADD TO CART</button>
            </div>
               <div class="col-md-4">
              <div class="productslider">
                  
                <div class="light-zoom" data-thumb="<?php echo base_url('uploads/product/').$result->product_image; ?>">
                  <img alt="A lazy image " class="mb-2 d-inline  lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/product/').$result->product_image; ?>">
                </div>
                
                <?php if(!empty($images)): foreach($images as $img): ?>
                <div class="light-zoom" data-thumb="<?php echo base_url('uploads/product_img/').$img->product_img_image; ?>">
                  <img alt="A lazy image " class="mb-2 d-inline  lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/product_img/').$img->product_img_image; ?>">
                </div>
                <?php endforeach; endif; ?>

              </div>
            </div>

          </div>

        </div>
         <section class=" py-4">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-md-6">
              <h4 class="clr-1">YOU MAY LIKE</h4>
            </div>
        </div>
        <div id="offer">
          <div class="slider">
        <?php if(!empty($productsData)):foreach($productsData as $product):?>
          <div class="p-2">
            <div class="product">
              <div class="product-image position-relative">
                <img alt="A lazy image " class="mb-2 d-inline w-100 lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/product/').$product->product_image;?>">
                <div class="overlay d-flex">
                  <button class="mr-1" onclick="window.location.href = '<?php echo base_url('product_detail/show_single_product/').$product->product_id;?>'; "><span class="icon-Icon-open-eye"></span></button><br>
                  <button><span class="icon-shopping-cart"></span> </button>
                </div>
              </div>
              <div class="short-discription ">
                <h5><?php echo $product->product_name;?></h5>
                <p><?php 
                if($product->product_discounted_price > 0)
                {
                  echo $product->product_discounted_price;
                }
                else
                {
                  echo $product->product_regular_price;
                }
                ?></p>               
              </div>
            </div>
          </div>
        <?php endforeach;endif;?>
        
          </div>
        </div>
        </div>
    </section>