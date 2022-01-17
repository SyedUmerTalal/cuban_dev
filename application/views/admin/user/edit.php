<?php if(!empty($records)): foreach($records as $record): ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    <div class="content">
                        <form role="form" action="<?php echo base_url('update_data/user/5');?>" method="post" enctype="multipart/form-data"> 
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Bussniess Name</label>
                                        <input type="text" name="admin_bussniess" class="form-control" placeholder="Bussniess" value="<?php echo !empty($record->admin_bussniess)?$record->admin_bussniess:''?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="user_name" class="form-control" placeholder="Username" value="<?php echo !empty($record->user_name)?$record->user_name:''?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="user_email" class="form-control" placeholder="Email" value="<?php echo !empty($record->user_email)?$record->user_email:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="user_address" class="form-control" placeholder="Home Address" value="<?php echo !empty($record->user_address)?$record->user_address:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                         <div class="form-group">
                        <label>Profile Picture<br/> (<span class="text-danger">Use Good Quality Images</span>)</label>
                        <div class="input-group-btn">
                          <div class="image-upload">                      
                            <img class="imgpath" src="<?php echo !empty($record->user_image)?base_url('uploads/profile/').$record->user_image:base_url('assets/img/placeholder.png')?>">
                            <div class="file-btn">
                              <input type="text" class="imageselect btn" id="user_image" data-toggle="modal" data-target="#exampleModal" name="user_image" value="<?php echo $record->user_image;?>" readonly>
                              <label for="user_image" class="btn btn-info">Upload</label>
                            </div>
                          </div>
                        </div>
                        <?php echo form_error("user_image"); ?>
                      </div>
                        </div>  
                    </div>
                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="<?php echo base_url('assets/img/cover.jpg');?>" alt="...">
            </div>
            <div class="content">
                <div class="author">
                   <a href="#">
                    <img class="avatar border-gray" src="<?php echo base_url('uploads/profile/').$record->user_image;?>" alt="...">

                    <h4 class="title"><?php echo $record->user_name;?><br>
                    </h4>
                </a>
            </div>
            <p class="description text-center"><?php echo $record->user_email;?><br>
            </p>
        </div>
        <hr>
        <div class="text-center">
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card">
        <div class="header">
            <h4 class="title">Update Password</h4>
        </div>
        <div class="content">
            <form role="form" action="<?php echo base_url('admin/admin_update_password');?>" method="post" enctype="multipart/form-data"> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" name="cnf_password" class="form-control" placeholder="Confirm New Password" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Update Password</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
</div>
<?php endforeach; endif; ?>