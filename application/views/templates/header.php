<html>
	<link href="<?php echo base_url().'/assets/css/bootstrap.min.css';?>" rel="stylesheet">

 	<link href="<?php echo base_url().'/assets/css/jasny-bootstrap.min.css';?>" rel="stylesheet">

 	<link href="<?php echo base_url().'/assets/css/main.css';?>" rel="stylesheet">

 	<link href="<?php echo base_url().'/assets/img/favicon.png';?>" rel="shortcut icon" type="image/x-icon"/>


  <!-- Fonts icons -->
 	<link href="<?php echo base_url().'/assets/css/font-awesome.min.css';?>" rel="stylesheet">

 	<link href="<?php echo base_url().'/assets/css/custom.css';?>" rel="stylesheet">

	<head>
		<div id="headers">
        <!-- Light header -->
        <header id="header-style-1">
          <nav class="navbar navbar-toggleable-sm navbar-light bg-faded">
            <div class="container">
              <a class="navbar-brand" href="index.html"><img src="<?php echo base_url(); ?>assets/img/logo-2.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="services.html">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sliders.html">Team</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/SignUp</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>users/login">Login</a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>users/register">Sign Up</a>
                    </div>
                    <!--
                    <?php if(!$this->session->userdata('logged_in')) : ?>
                      <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
                      <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in')) : ?>
                      <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                    <?php endif; ?>
                    -->
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <div class="container">
            <div class="header-caption">
              <div class="row">
                <div class="col-md-12 header-content">
                  <h3 class="header-title animated fadeInDown"><span class="text-primary">Merry </span> Christmas!!</h3>
                  <h5 class="header-text animated fadeIn">Lorem ipsum dolor sit amet, consectetuer adipiscing elit<br>Lorem ipsum dolor sit amet, consectetuer.</h5>
                  <a href="#" class="page-scroll btn btn-lg btn-default-filled animated fadeInUp">Download Now</a>
                  <a href="#" class="page-scroll btn btn-lg btn-common animated fadeInUp">Explore</a>
                </div>
              </div>
            </div>
          </div>
        </header>
      </div>
	</head>
	<body>