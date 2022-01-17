
    <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
    <section class="products py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2 class="">All Products</h2>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb  ">
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
          </nav>
          </div>
          <div class=" col-md-4">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0 d-inline">
                            <button class=" w-100" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             ALL Category
                            </button>
                         </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" id="child1">
                           <?php if(!empty($categoryData)):foreach($categoryData as $cat):?>  
                            <div class="card-body">      
                                <div class="card-header">
                                    <a href="<?php echo base_url('products/category_wise_products/').$cat->category_slug;?>"> <?php echo $cat->category_name;?></a>
                                </div>    
                            </div>
                         <?php endforeach;endif;?>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="row ">
        
        <?php if(!empty($productsData)):foreach($productsData as $product):?>
          <div class="col-lg-4 col-md-6 px-5 mb-2 product wow slideInUp" data-wow-offset="10"  data-wow-iteration="1">
            <div class="product-image position-relative">
              <img alt="A lazy image " class="mb-2 d-inline w-100 lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/product/').$product->product_image;?>">
              <div class="overlay d-flex">
                <button class="mr-1" onclick="window.location.href = '<?php echo base_url('product_detail/show_single_product/').$product->product_id;?>'"><span class="icon-Icon-open-eye"></span></button><br>

                <button data-proqty="1" data-proid="<?php echo $product->product_id;?>" class="mr-1 cart_btn"><span class="icon-shopping-cart"></span> </button>
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
        <?php endforeach;endif;?>

        </div>
      </div>
    </section>