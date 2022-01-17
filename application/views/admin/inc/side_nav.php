<div class="sidebar" data-color="purple" data-image="<?php echo base_url('uploads/developer/').$this->developer->developer_nav_image;?>">
    <style>
        .sidebar:after {background: linear-gradient(to bottom, <?php echo $this->developer->developer_nav_color;?> 0%, <?php echo $this->developer->developer_nav_gradient;?> 133%) !important;}
    </style>
    <div class="sidebar-wrapper">
        <div class="logo"><a href="#" class="simple-text"><img style="max-width:200px;" class="img-responsive" src="<?php echo base_url('uploads/settings/').$this->settings->header_logo_image;?>"></a></div>
        <ul class="nav">
            <li class="active"><a href="<?php echo base_url('admin');?>"><i class="pe-7s-graph"></i><p>Dashboard</p></a></li>
            <li><a href="<?php echo base_url('admin/profile');?>"><i class="pe-7s-user"></i><p>User Profile</p></a></li>
            
            <li><a href="<?php echo base_url('edit/settings/1');?>"><i class="pe-7s-config"></i><p>Site Settings</p></a></li>
            <!--<li><a href="<?php echo base_url('list/product');?>"><i class="pe-7s-config"></i><p>Product Settings</p></a></li>-->


            <li class="dropdown">
              <a href="#" class="dropdown-toggle bcktrans" data-toggle="collapse" data-target="#demo1">
                <i class="pe-7s-note2"></i>
                <p>
                    Pages Setting
                    <b class="caret"></b>
                </p>
            </a>
            <ul id="demo1" class="collapse">
                <li><a href="<?php echo base_url('edit/about_page/1');?>">About Page</a></li>
                <li><a href="<?php echo base_url('edit/gallery_page/1');?>">Gallery Page</a></li>
                <li><a href="<?php echo base_url('list/gallery_page_images');?>">Gallery Page Images</a></li>
                <li><a href="<?php echo base_url('edit/policy_page/1');?>">Policy Page</a></li>
                <li><a href="<?php echo base_url('edit/terms_page/1');?>">Terms/Condition Page</a></li>
                <li><a href="<?php echo base_url('edit/faq_page/1');?>">FAQ's Page</a></li>
                <li><a href="<?php echo base_url('edit/contact_page/1');?>">Contact Page</a></li>
                <li><a href="<?php echo base_url('edit/home_page/1');?>">Home Page</a></li>
                <li><a href="<?php echo base_url('list/home_page_feedback');?>">Home Page Feedback</a></li>


                <li><a href="<?php echo base_url('edit/term_page/1');?>">Terms & Conditions</a></li>  
            </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle bcktrans" data-toggle="collapse" data-target="#demo6">
            <i class="pe-7s-box2"></i><p>Inventory<b class="caret"></b></p></a>
            <ul id="demo6" class="collapse">
               
                <li><a href="<?php echo base_url('list/category');?>">Category Settings</a></li> 
                <li><a href="<?php echo base_url('list/product');?>">Product Settings</a></li>
                <li><a href="<?php echo base_url('list/coupon');?>">Discount Coupon</a></li>
            </ul>
        </li>
       

        

        <?php if($this->session->userdata("user_id") == 5): ?>
            <li><a href="<?php echo base_url('general-edit/developer/1');?>"><i class="pe-7s-config"></i><p>Developer Settings</p></a></li>
        <?php endif; ?>
    </ul>
</div>
</div>

<style type="text/css">
    .dropdown-menu li a
    {
        color:#000 !important;
    }
    .bcktrans
    {
        background: rgba(255, 255, 255, 0.14);
    }
    .collapse li a
    {
        font-size: 16px;
    }
</style>