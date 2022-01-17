<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->settings->site_title?></title>
    <link rel="icon" href="<?php echo base_url('uploads/settings/').$this->settings->fav_icon_image;?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/')?>css/vendor.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/')?>css/style.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  </head>
  <body class="lazy" data-bg="url(<?php echo base_url('assets/front/')?>img/bg.png)">
    <header>
      <nav>
        <div class="container">
          <div class="row">
            <div class="col-4 d-block d-lg-none">
              <a href="<?php echo base_url('');?>"><img class="logo " src="<?php echo base_url('uploads/settings/')?>logo.png">
              </a> 
            </div>
            <div class="col-lg-11 nav-bar">
              <ul class="list-unstyled d-lg-flex justify-content-between align-items-center text">
                <li>
                  <a href="<?php echo base_url('');?>">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url('gallery');?>">Gallery</a>
                </li>
                <li>
                  <a href="<?php echo base_url('products');?>">Products</a>
                </li>
                <li class="d-none d-lg-block">
                  <a href="<?php echo base_url('');?>"><img class="logo " src="<?php echo base_url('uploads/settings/')?>logo.png">
                </li>
                <li>
                  <a href="<?php echo base_url('products');?>"> Natural-bold-dramatic</a>
                </li>
                <li>
                  <a href="<?php echo base_url('contact');?>">Contact us</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-1 col-4 align-self-center">
              <ul class="list-unstyled d-flex justify-content-between">
                <li>
                  <a href="<?php echo base_url('login-signup');?>"><span class="icon-user"></span></a>
                </li>
                <li>
                  <a href="<?php echo base_url('cart');?>" class="position-relative"><span class="icon-shopping-cart"></span>
                  <p class="cart-count itemInCart"></p></a>
                </li>
              </ul>
            </div>
            <div class="col-1 col-md-2 d-lg-none align-self-center">
                <h5 class="nav-open text-right m-0">☰</h5>
              </div>
          </div>
        </div>
      </nav>
    </header>