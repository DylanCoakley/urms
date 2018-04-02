
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap UI Kit">
  <meta name="keywords" content="ui kit">
  <meta name="author" content="UIdeck">
  <style type="text/css">
    .header-nav{
  background-color: transparent;
}

.button{
  background-color: blue
  color: darkblue;
  border: 3px solid green;
}
#pull-right{
  color: darkblue;
}

.background:before {
  content: "";
  position: fixed;
  left: 0;
  right: 0;
  z-index: -1;
  
  display: block;
  background-image: url("<?php echo base_url(); ?>assets/img/snow/snow2.jpg");
  background-size: cover;
  width: 100%;
  height: 100%;

  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
 
  filter: blur(5px);
}

.background {
  position: fixed;
  left: 0;
  right: 0;
  z-index: 0;
  margin-left: 20px;
  margin-right: 20px;
  
}
.navbar{
  background-color: rgba(255, 255, 255, 0);
  color: red;
}


.content{
  
  
  margin: auto;
    width: 40%;
    height: 40%;
  
}

  </style>

  <title>Login</title>


  <!-- Fonts icons -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/css/font-awesome.min.css';?>">

	<div class="content" style="margin-left: 30%; padding-top: 50px">
    <div id="login-form">
      <h3 class="log-title">Log In</h3>
      <div class="form-group">
        <input type="text" class="form-control" id="email" placeholder="Email" required data-error="*Please fill out this field">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="password" placeholder="Password" required>
        <div class="help-block with-errors"></div>
      </div>
      <div class="log-line" style="padding-right: 50px;">
        <div class="pull-right">
          <button type="submit" id="log-submit" class="btn btn-md btn-common btn-log " style="width:150%;color:darkblue; border: 2px solid darkblue">Log In</button>
          <div id="msgSubmit" class="h3 text-center hidden"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <a href="signup" class="forgot-password" style="color:darkblue">New Seller? Request to Join Raffle</a>
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



