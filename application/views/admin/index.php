
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-5 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>!-->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    
                      
                          <div class="bg-overlay"style="background:white;"></div>
                          <?php if ($this->session->flashdata('login_failed')): ?>
                              <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
                          <?php else: ?>
                            <h3 class="text-center m-t-10 text-white"><strong><img src="<?php echo base_url();?>assets/img/ccm.jpg" class="img-fluid" alt="logo_image" width="150px" height="50px"></strong> </h3>
                          <?php endif; ?> 
                    
                  </div>
                  <?php echo form_open('login/index');?>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Enter Email Address..."style="border-color:#1cc88a;">
                      <?php echo form_error('username');?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="Password" placeholder="Password" style="border-color:#1cc88a;">
                      <?php echo form_error('Password');?>
                    </div>
                    <div class="form-group" >
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck"  >
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    
                    <input class="btn btn-primary btn-user btn-block" type="submit" value="Login">
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
