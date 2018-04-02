
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap UI Kit">
  <meta name="keywords" content="ui kit">
  <meta name="author" content="UIdeck">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <title>Request Sent</title>
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


  <!-- Fonts icons -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/css/font-awesome.min.css';?>">

	<div class="content" style="margin-left: 30%; padding-top: 10%">
	  <div id="register-form" style="text-align: center">
      <h3 class="log-title" >Request Sent!</h3>
      <p>You will receive an email when your account has been activated</p>
      <a href="home" class="forgot-password" style="color:darkblue">Go back to Home</a>
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
