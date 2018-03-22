
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap UI Kit">
  <meta name="keywords" content="ui kit">
  <meta name="author" content="UIdeck">

  <title>About Us - Helium Bootstrap 4 UI Kit</title>


  <!-- Fonts icons -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/css/font-awesome.min.css';?>">

	<div class="content">
	  <div id="register-form">
      <h3 class="log-title">Register</h3>
      <div class="form-group">
        <input type="text" class="form-control" id="email" placeholder="Email" required data-error="*Please fill out this field">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="username" placeholder="Username" required>
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="password" placeholder="Password" required data-error="*Please fill out this field">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="cpassword" placeholder="Confirm Password" required>
        <div class="help-block with-errors"></div>
      </div>

      <div class="log-line reg-form-1 no-margin">
        <div class="pull-left">
          <div class="checkbox checkbox-primary space-bottom">
            <label class="hide"><input type="checkbox"></label>
            <input id="checkbox2" type="checkbox">
            <label for="checkbox2"><span><a href="#" style="color:darkblue">Terms & Conditions</a></span></label>
          </div>
        </div>
        <div class="pull-right">
          <button type="submit" id="reg-submit" class="btn btn-md btn-common btn-log" style="color:darkblue;  border: 2px solid darkblue">Register</button>
          <div id="msgSubmit" class="h3 text-center hidden"></div>
          <div class="clearfix"></div>
        </div>

      </div>
      <a href="#" class="forgot-password" style="color:darkblue">Already Have an Account? Sign In</a>
    </div>
  </div>
    
</div>
	<script src="<?php echo base_url().'/assets/js/jquery.min.js';?>"></script>
  <script src="<?php echo base_url().'/assets/js/tether.min.js';?>"></script>
  <script src="<?php echo base_url().'/assets/js/bootstrap.min.js';?>"></script>
  <script src="<?php echo base_url().'/assets/js/owl.carousel.min.js';?>"></script>
  <script src="<?php echo base_url().'/assets/js/jquery.countTo.js';?>"></script>

  <script src="<?php echo base_url().'/assets/js/form-validator.min.j';?>"></script>
  <script src="<?php echo base_url().'/assets/js/contact-form-script.js';?>"></script>
  <script src="<?php echo base_url().'/assets/js/main.js';?>"></script>

  <script type="text/javascript">
    $('.timer').countTo({
      refreshInterval: 60,
      formatter: function(value, options) {
        return value.toFixed(options.decimals);
      },
    });
  </script>
