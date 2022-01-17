<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url('uploads/settings/').$this->settings->fav_icon_image;?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo ucwords(str_replace(str_split('-_'),'&nbsp;', $this->uri->segment(2)? $this->uri->segment(2):$this->uri->segment(1)));; ?></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url('assets/admin/');?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin/');?>assets/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/admin/');?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/admin/');?>assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('assets/admin/');?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css">
    <script src="<?php echo base_url('assets/admin/');?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/');?>assets/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/admin/');?>assets/js/jquery.dataTables.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body style="background-image: url('<?php echo base_url('uploads/developer/').$this->developer->developer_content_image;?>');background-size:cover;">
    <?php if($this->session->flashdata('msg') == 1):?>
      <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
      <?php elseif($this->session->flashdata('msg') == 2):?>
        <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php endif;?>
    <?php $map="";if(!empty($this->uri->segment(2))){
        $dir = "uploads"."/".str_replace("-","_",$this->uri->segment(2)); 
        $map = scan_images_by_date($dir); } ?>
        <style>
        .setting{padding: 5px;}.imgsetting{border: 4px solid #dedede;width: 200px;height:100px;}
        .asd{background-color:#e4e4e4;padding: 3px;}.myCustomButton{color: #fff;background-color: #dc3545;border-color: #dc3545;}
        .myCustomButton:hover{color: #fff;background-color: #dc3545;border-color: #dc3545;}
    </style>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div style="background:url('<?php echo base_url('assets/img/modelhead.jpg');?>');" class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add a new media or select current</h5>
            <hr>
            <div class="form-group">
                <label>Import To Media Library</label>
                <div class="input-group-btn">
                 <div class="image-upload">                      
                  <img  src="<?php echo base_url('assets/img/placeholder.png')?>">
                  <div class="file-btn">
                    <form id="imageupload" action="<?php echo base_url("admin/photo_upload");?>">
                        <input type="file" id="selectedimage" name="selectedimage" required>
                        <label class="btn btn-info changeabletext">Upload</label>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
    <div class="row uploaded_images_main">
        <?php if(!empty($map)): foreach($map as $k):?>
            <div class="col-sm-2 setting">
                <div class="asd">
                    <button class="selectimage cbselect" data-path="<?php echo base_url().'uploads'.'/'.str_replace('-','_',$this->uri->segment(2)).'/'.$k ;?>" data-image="<?php echo $k ;?>" type="button">Select</button>
                    <button class="deletephoto cbs" data-id="<?php echo 'uploads'.'/'.str_replace('-','_',$this->uri->segment(2)).'/'.$k ;?>" type="button"><b><i class="fa fa-trash" aria-hidden="true"></i></b></button>
                    <img for="asd" src="<?php echo base_url($dir).'/'.$k;?>" class="img-responsive imgsetting" />
                </div>
            </div>
        <?php  endforeach; else: ?>
        <h3>Image Folder Not Exists</h3>
    <?php endif;?>
</div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
    <div class="wrapper">