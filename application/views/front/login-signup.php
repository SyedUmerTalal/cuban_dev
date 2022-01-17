  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 p-0">
          <a href="<?php echo base_url('');?>"><img class="logo " src="<?php echo base_url('uploads/settings/')?>logo.png">
              </a> 
        </div>
        <div class="col-md-6 contact  p-4">
          <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-6 text-left">
                <h4 class="clr-1"><a href="#" class="active" id="login-form-link">Login</a></h4>
              </div>
              <div class="col-6 text-right">
                <h4 class="clr-1"><a href="#" id="register-form-link">Register</a></h4>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="<?php echo base_url('sign-in')?>" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="customer_email" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="customer_password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12">
                        <button type="submit" calue="login">LOG IN </button>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12">
                        <button>REGISTER</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>