
  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
<section class="about">
  <div class="container">
    <div class="row">
      <?php $this->load->view('front/customer/side-nav'); ?>
      <div class="col-sm-10">

        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="header">
                    <h4 class="title">Edit Profile</h4>
                  </div>
                  <div class="content">
                    <form role="form" action="<?php echo base_url('customer-profile');?>" method="post" enctype="multipart/form-data"> 
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="customer_first_name" class="form-control" placeholder="first name" value="<?php echo $customerDetails->customer_first_name?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="customer_last_name" class="form-control" placeholder="last name" value="<?php echo $customerDetails->customer_last_name?>">
                          </div>
                        </div>
                     
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="customer_address" class="form-control" placeholder="Home Address" value="<?php echo $customerDetails->customer_address?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="customer_phone_number" class="form-control" placeholder="Home Address" value="<?php echo $customerDetails->customer_phone_number?>">
                          </div>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div>



              <div class="col-md-12">
                <div style="margin-top: 20px;" class="">
                  <div class="header">
                    <h4 class="title">Update Password</h4>
                  </div>
                  <div class="content">
                    <form role="form" action="<?php echo base_url('customer-profile');?>" method="post" enctype="multipart/form-data"> 
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


      </div>
    </div>
  </div>
</section>