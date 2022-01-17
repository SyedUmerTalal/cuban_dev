  <div class="inner-banner"> 
    <div class="container h-100">
      <div class="row h-100 justify-content-center text-center align-items-end">
        <div class="col-md-6">

        </div>
      </div>
    </div>
  </div>
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h2 class="clr-1">Your Cart Is Looking Good</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb  ">
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('products');?>">Products</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row py-5 justify-content-center">
        <div class="col-12">
          <table id="cart" class="table table-hover table-responsive">
            <thead>
              <tr class="cart-head">
                <td width="5%">S.no</td>
                <td><b>Item</b></td>
                <td><b>Price</b></td>
                <td><b>Quantity</b></td>
                <td><b>Sub Total</b></td>
                <td><b>Actions</b></td>

              </tr>
            </thead>
            <tbody>
             <?php if($this->cart->contents()): $i=1; foreach($this->cart->contents() as $items):?>
              <tr  data-proid="<?php echo $items["id"];?>" data-id="<?php echo $items["rowid"];?>">

                <td><?php echo $i;?></td>

                <td>

                  <div class="row">
                    <div>
                      <a href="javascript:;" tabindex="-1"><img style="width:80px !important;padding: 5px;" class="lazy loaded w-100" src="<?php echo base_url('uploads/product/').$items['image']?>" data-src="<?php echo base_url('uploads/product/').$items['image']?>" data-was-processed="true"></a>
                    </div>
                    <div class="align-self-center">
                      <h6 class="fw-300"><?php echo $items['name'];?></h6> 
                    </div>
                  </div>

                </td>

                <td><?php echo $this->currency.' '; ?><?php echo round($items['price'],2);?></td>


                <td>
                  <div class="quantity buttons_added">
                    <input type="button" value="-" class="minus"><input type="text" step="1" min="1" max="5" readonly="readonly"  name="quantity" id="myqty" value="<?php echo $items["qty"];?>" title="Qty" class="input-text qty text pro-qty" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                  </div>
                </td>

                <td data-th="Subtotal" class="cartsubtotal"><?php echo $this->currency.' '; ?><?php echo round($this->cart->format_number($items["subtotal"]),2);?></td>

                <td>
                  <div>
                    <button class="btn btn-sm remove_from_cart" data-id="<?php echo $items["rowid"];?>"><span class="icon-delete"></span></button>
                    <!--<button class="btn btn-danger btn-sm remove_from_cart"><span class="icon-spinner11"></span></button>-->
                  </div>
                </td>

              </tr>
              <?php $i++; endforeach; else: ?>
              <h1>No products in cart</h1>
            <?php endif; ?> 
          </tbody>
        </table>
      </div>

      <div class="col-sm-8">
        <button onclick="window.location.href = '<?php echo base_url('products');?>';" class="mb-2">Continue Shopping</button>&nbsp; &nbsp;<button class="mb-2 gold" onclick="window.location.href = '<?php echo base_url('checkout');?>';">Proceed To Checkout</button>
      </div>
      <div class="col-sm-4">
        <h5>Cart Total:  $<?php echo round((get_sub_total()),2); ?></h5>
      </div>
    </div>
  </div>
</section>
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