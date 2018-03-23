<html>
  <head>
    <title href="<?php echo base_url(); ?>">Raffleet</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Raffleet</a>
      </div>
      <div id="navbar">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="<?php echo base_url(); ?>">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(!$this->session->userdata('logged_in')) : ?>
            <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
            <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
            <li><a href="<?php echo base_url(); ?>raffles/index">All Raffles</a></li>
            <li><a href="<?php echo base_url(); ?>raffles/user_list">My Raffles</a></li>
            <li><a href="<?php echo base_url(); ?>requests/user_list">My Requests</a></li>
            <li><a href="<?php echo base_url(); ?>users/edit">Account</a></li>
            <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>



  <div class="container">
    <!-- Flash message -->
    <?php if($this->session->flashdata('user_registered')) : ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('login_failed')) : ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('user_logged_in')) : ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('user_loggedout')) : ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('raffle_created')) : ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('raffle_created').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('account_updated')) : ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('account_updated').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('join_requested')) : ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('join_requested').'</p>'; ?>
    <?php endif; ?>