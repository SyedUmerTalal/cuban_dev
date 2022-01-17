<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->settings->site_title; ?></title>
  <link rel="icon" href="<?php echo base_url('uploads/settings/').$this->settings->fav_icon_image;?>" type="image/gif" sizes="16x16">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?php echo base_url('assets/admin/');?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <style>
  .toast-top-right{ top:43% !important; right:39% !important;background-color: #20a9d2!important}
    .vl {border-left: 3px solid green;height:100px;}
  .white{background-color:#ffffffd6;padding: 36px;border: 1px solid red;}.btn{border-radius: 0px;}.center{text-align: center;}
  .gap{padding-top:110px;}.form-control{border-radius: 0px !important;border: 1px solid #675e5e;}
</style>
</head>
<body class="hold-transition login-page" style="background-image: url('<?php echo base_url("uploads/developer/").$this->developer->developer_login_background;?>');background-repeat:no-repeat;background-size: cover;background-position: center;height: 100vh;">
   <?php if($this->session->flashdata('msg') == 1):?>
      <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
      <?php elseif($this->session->flashdata('msg') == 2):?>
        <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php endif;?>
  <div class="container gap">
    <div class="col-md-offset-4 col-sm-offset-4  col-sm-4 col-md-4 white">

      <div align="center" data-tilt>

        <img style="width: 200px;" src="<?php echo base_url("uploads/settings/").$this->settings->header_logo_image;?>" alt="IMG">
      </div>
      <h2 class="center"><b><span style="color:red;">Admin</span> Pannel</b></h2>
      <p class="login-box-msg center"><b>Sign in to start your session</b></p>
      <form action="<?php echo base_url('admin/login');?>" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $this->input->cookie('master_admin_email');?>">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $this->input->cookie('master_admin_password');?>">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember" type="true" value="yes"> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
     <a href="<?php echo base_url('forget-password');?>">I forgot my password</a><br>
    </div>
  </div>

</body>
<script src="<?php echo base_url('assets/admin/');?>assets/js/tilt.jquery.min.js"></script>
</html>
