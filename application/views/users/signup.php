
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
  position: absolute;
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
}
a.btn{
  width: 100% !important;
  margin: 0 auto;
}

</style>

  <title>Join Raffle</title>

<?php if($this->session->flashdata('user_registered')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>
  <!-- Fonts icons -->
  <link rel="stylesheet" href="<?php echo base_url().'/assets/css/font-awesome.min.css';?>">

<?php echo form_open('users/register'); ?>
	<div class="content" style="margin-left: 30%;">
	  <div id="register-form" style="overflow:auto;">
      <h3 class="log-title">Join Raffle</h3>
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Name" required data-error="*Please fill out this field">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="address" placeholder="Address" required data-error="*Please fill out this field">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="phone" placeholder="Phone" required data-error="*Please fill out this field">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required data-error="*Please fill out this field">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="cpassword" name="password2" placeholder="Confirm Password" required>
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" id="quantity" name="ticket_quantity" min="1" max="<?php echo $tickets_available; ?>" placeholder="Number of Tickets Requested" required>
        <div class="help-block with-errors"></div>
      </div>
      <div class="log-line reg-form-1 no-margin">
        <div class="">
          <button type="submit" class="btn btn-block" style="color:#003399;  border: 2px solid darkblue;">Register</button>
          <div id="msgSubmit" class="h3 text-center hidden"></div>
          <div class="clearfix"></div>
        </div>
      <a href="<?php echo base_url(); ?>users/login" style="color:darkblue">Already Have an Account? Login</a>
      </div>
    </div>
  </div>
<?php echo form_close(); ?>   

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
