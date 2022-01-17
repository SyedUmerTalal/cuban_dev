<?php if(!empty($records)): foreach($records as $record): ?>
<div class="content">
  <div class="container-fluid">
    <div>
      <h2 style="display:inline-block;">
        Developer
      </h2>
      <h3 class="box-title" style="display:inline-block;">Edit Data</h3>
    </div>
    <div class="col-md-6">
      <form role="form" action="<?php echo site_url('update_data/developer/'.$record->developer_id.'');?>" method="post" enctype="multipart/form-data">           
        <div class="box-body"> 

          <div class="form-group">
            <label>Navigation Upper Gradient Colour</label>
            <input type="color" class="form-control" id="developer_nav_color" name="developer_nav_color" value="<?php echo !empty($record->developer_nav_color)?$record->developer_nav_color:''?>" required>
            <?php echo form_error('developer_nav_color'); ?>
          </div>

          <div class="form-group">
            <label>Navigation Lower Gradient Colour</label>
            <input type="color" class="form-control" id="developer_nav_gradient" name="developer_nav_gradient" value="<?php echo !empty($record->developer_nav_gradient)?$record->developer_nav_gradient:''?>" required>
            <?php echo form_error('developer_nav_gradient'); ?>
          </div>

          <div class="form-group">
            <label>Content Background Image<br/> (<span class="text-danger">IMAGE SHOULD BE 708px in WIDTH and 472px IN HEIGHT</span>)</label>
            <div class="input-group-btn">
              <div class="image-upload">                      
                <img class="imgpath" src="<?php echo !empty($record->developer_content_image)?base_url('uploads/developer/').$record->developer_content_image:base_url('assets/img/placeholder.png')?>">
                <div class="file-btn">
                  <input type="text" class="imageselect btn" id="developer_content_image" data-toggle="modal" data-target="#exampleModal" name="developer_content_image" value="<?php echo $record->developer_content_image;?>" readonly>
                  <label for="developer_content_image" class="btn btn-info">Upload</label>
                </div>
              </div>
            </div>
            <?php echo form_error("developer_content_image"); ?>
          </div>  

          <div class="form-group">
            <label>Login Background Image<br/> (<span class="text-danger">Use Good Quality Images</span>)</label>
            <div class="input-group-btn">
              <div class="image-upload">                      
                <img class="imgpath" src="<?php echo !empty($record->developer_login_background)?base_url('uploads/developer/').$record->developer_login_background:base_url('assets/img/placeholder.png')?>">
                <div class="file-btn">
                  <input type="text" class="imageselect btn" id="developer_login_background" data-toggle="modal" data-target="#exampleModal" name="developer_login_background" value="<?php echo $record->developer_login_background;?>" readonly>
                  <label for="developer_login_background" class="btn btn-info">Upload</label>
                </div>
              </div>
            </div>
            <?php echo form_error("developer_login_background"); ?>
          </div>
          
          <div class="form-group">
            <label>Navigation Background Image <br/><span class="text-danger">NAV IMAGE SHOULD BE 210px in WIDTH and 472px IN HEIGHT<br/>Dont use color image for better results (Convert it to black and white)</span></label>
            <div class="input-group-btn">
              <div class="image-upload">                      
                <img class="imgpath" src="<?php echo !empty($record->developer_nav_image)?base_url('uploads/developer/').$record->developer_nav_image:base_url('assets/img/placeholder.png')?>">
                <div class="file-btn">
                  <input type="text" class="imageselect btn" value="<?php echo $record->developer_nav_image;?>" id="developer_nav_image" data-toggle="modal" data-target="#exampleModal" name="developer_nav_image" value="<?php echo $record->developer_nav_image;?>" readonly>
                  <label for="developer_nav_image" class="btn btn-info">Upload</label>
                </div>
              </div>
            </div>
            <?php echo form_error("developer_nav_image"); ?>
          </div>
          
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?php echo base_url('admin')?>" class="btn btn-danger">Dashboard</a>
        </div>    
      </form>  
    </div>
  </div>
</div>
<?php endforeach; endif;?> 