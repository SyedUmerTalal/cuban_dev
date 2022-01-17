    <div class="inner-banner"> 
      <div class="position-relative align-items-end lazy py-3 bg" data-bg="url(<?php echo base_url('assets/front/')?>img/banner.jpg)">
          <div class="container h-100">
            <div class="row h-100 align-items-end">
              <div class="col-md-6 align-self-end content wow slideInLeft" data-wow-offset="10"  data-wow-iteration="1">
                <!-- <h5 class="clr-2 fw-700">Welcome To</h5> -->
                <h1 class="fw-700">Products</h1>
                <ul class="list-unstyled breadcrumb">
                  <li class="breadcrumb-item"><a href="">HOME</a></li>
                  <li class="breadcrumb-item active"><a href="">CART</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>
  <section class="checkout-page py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 border-bottom">
                            <h3>Checkout</h3>
                        </div>
                        <div class="row w-100 flex-column-reverse flex-lg-row">
                            <div class="col-lg-7 mt-3">
                                <div class="checkout p-3">
                                    <h3>Shipping details</h3>
                                    <form method="post" action="<?php echo base_url('proceed-checkout'); ?>" class="needs-validation">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name</label>
                                        <input type="text" class="form-control" name="first_name" value="<?php echo !empty($cusDetails->customer_first_name)?$cusDetails->customer_first_name:''; ?>" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Last name</label>
                                        <input type="text" class="form-control" name="last_name" value="<?php echo !empty($cusDetails->customer_last_name)?$cusDetails->customer_last_name:''; ?>" required>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="lastName">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo !empty($cusDetails->customer_phone_number)?$cusDetails->customer_phone_number:''; ?>" required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your number is required.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email <span class="text-muted"></span></label>
                                    <input type="email" class="form-control" name="email" value="<?php echo !empty($cusDetails->customer_email)?$cusDetails->customer_email:''; ?>" required id="email" placeholder="you@example.com">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" value="<?php echo !empty($cusDetails->customer_address)?$cusDetails->customer_address:''; ?>" name="address" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" class="form-control" value="<?php echo !empty($cusDetails->optional_address)?$cusDetails->optional_address:''; ?>" name="address_optional" id="address2" required placeholder="">
                                </div>

                                <div class="row">

                                    <div class="col-md-8 mb-3">
                                        <label for="zip">ZIP CODE (KINDLY PUT YOUR CORRECT ZIP CODE FOR SHIPPING)</label>
                                        <input type="text" name="zip" class="form-control" id="zipcode" value="<?php echo !empty($cusDetails->zip_code)?$cusDetails->zip_code:''; ?>" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for=""></label>
                                        <button id="checkShip" class="btn-lg btn-block" type="button">CHECK SHIPPING</button>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="country">Country</label>
                                        <select name="country" class="custom-select d-block w-100" id="country" required>
                                            <option value="">Choose...</option>
                                            <?php if(!empty($countries)): foreach($countries as $con): ?>
                                                <option value="<?php echo $con->countries_id ; ?>"><?php echo $con->name; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="state">State</label>
                                        <select id="state" name="state" class="custom-select d-block w-100" required>
                                            <option value="">Please Select Country First</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="state">City</label>
                                        <select id="city" name="city" class="custom-select d-block w-100" required>
                                            <option value="">Please Select State First</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div>

                                    
                                </div>
           
                                <input type="hidden" id="cod_check_yes" name="cod_check" value="">
                                <hr class="mb-4">
                                <button style="display:none;" id="placeOrder" class="btn-lg btn-block" type="submit">Place Order (Pay Now)</button>
                                
                            </form>
                                </div>
                            </div>
                            <div class="col-lg-5 mt-3">
                        <div class="cart p-3">
                            <div class="row">
                                <div class="col-10">
                                    <h3>Order Summary</h3>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="<?php echo base_url('cart'); ?>" class="text-center">Edit</a>
                                </div>
                            </div>  
                            <?php if(!empty($this->cart->contents())): foreach($this->cart->contents() as $content): ?>
                                <div class="row cart-item p-4 m-0 border-top">                                  
                                    <div class="col-md-3 col-5">
                                        <a href="<?php echo base_url('product-details/').get_slug_by_id('product',$content['id']);?>" tabindex="-1">
                                            <img class="lazy loaded w-100" src="<?php echo base_url('uploads/product/').$content['image']?>" data-src="<?php echo base_url('uploads/product/').$content['image']?>" data-was-processed="true"></a>
                                        </div>
                                        <div class="col-md-6 col-7 align-self-center">
                                            <h6 class="fw-300"><?php echo $content['name'];  ?></h6>
                                            <h6 class="fw-300">Quantity : <?php echo $content['qty'];  ?></h6>
                                            <h6 class="fw-300">Total Item Weight : <?php echo $content['options']['weight']*$content['qty'];  ?></h6>
                                            <?php if(!empty($content['options']['color'])):?>
                                                <p class="m-0">Color: <?php echo get_name_by_id('product_color',$content['options']['color']);  ?></p>
                                            <?php endif; ?>                                
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <div class="align-self-center"><strong>PRICE</strong><p> <?php echo $this->currency; ?> <?php echo round($content['price'],2);  ?></p></div>
                                        </div>                          
                                    </div>
                                <?php endforeach; endif; ?>

                                <div class="row border-top pt-2 pb-2">
                                    <div class="col-md-6">
                                        <p class="m-0"><strong>Subtotal</strong></p>
                                        <p class="m-0"><strong>Shipping</strong></p>
                                        
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p class="m-0"><?php echo $this->currency; ?> <?php echo round((get_sub_total()),2); ?></p>
                                        <p class="m-0 ship">Please select destination</p>
                                    </div>
                                </div>
                                <hr>
                                
                                <p class="m-0"><strong>DISCOUNT COUPON</strong></p>
                                <div class="col-md-12 mb-3 p-0">
                                    <input type="text" id="couponcode" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Valid coupon is required.
                                    </div>
                                </div>
                                <button id="apply-coupon" class="btn-lg btn-block" type="submit">Discount</button>
                                
                                <hr>
                                <h5>Discount Amount : <?php echo $this->currency; ?> <?php echo round(str_replace(',','',get_discounted_amount()),2); ?></h5>
                                <div class="row border-top pt-2 pb-2 ">
                                    <div class="col-md-7">
                                        <h5>TOTAL</h5>
                                    </div>
                                    <div class=" col-md-5 text-right">
                                        <p class="m-0 finalValue"><strong><?php echo $this->currency; ?> <?php echo round(str_replace(',','',get_grand_total()),2); ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        <section class="bestseller">
      <div class="container">
        <div class="slider">
            
         <?php if(!empty($products)): foreach($products as $pro): ?>
          <div class="product text-center p-2">
              <div class="product-image">
                 <img alt="A lazy image " class="mb-2 d-inline img-fluid lazy" src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" data-src="<?php echo base_url('uploads/product/').$pro->product_image; ?>">
              </div>
              <div class="short-description ">
                <h4><?php echo $pro->product_name; ?></h4>
                <p> <?php echo ($pro->product_discounted_price > $pro->product_regular_price)? $this->currency.$pro->product_discounted_price:$this->currency.$pro->product_regular_price ?>
                <?php if($pro->product_discounted_price > 0): ?>
                 <strike><?php echo $this->currency.$pro->product_regular_price; ?></strike>
               <?php endif; ?>
               </p>
              </div>
               <button class="cart_btn" data-proqty="1" data-proid="<?php echo $pro->product_id; ?>">ADD TO CART</button>
            </div>
            <?php endforeach; endif; ?>
        </div>
      </div>
    </section>