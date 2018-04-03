<html>
  <link rel="apple-touch-icon" href="apple-icon.png">
    

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/scss/style.css">
  <link href="<?php echo base_url().'/assets/css/bootstrap.min.css';?>" rel="stylesheet">



  <link href="<?php echo base_url().'/assets/css/jasny-bootstrap.min.css';?>" rel="stylesheet">

  <link href="<?php echo base_url().'/assets/css/main.css';?>" rel="stylesheet">



  <!-- Fonts icons -->
  <link href="<?php echo base_url().'/assets/css/font-awesome.min.css';?>" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url(); ?>assets3/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets3/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets3/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets3/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets3/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets3/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets3/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets3/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets3/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets3/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <title>Sell Tickets</title>
 <!--<link href="<?php //echo base_url().'/assets/css/customHead.css';?>" rel="stylesheet"> -->
<style type="text/css">
.navbar{
  background-color: rgba(255, 255, 255, 0);
  max-height: 50px;
}
  .header-nav{
    background-color: transparent;
  }
  
  .background:before {
  content: "";
  position: fixed;
  left: 0;
  right: 0;
  z-index: -1;
  
  display: block;
  background-image: url("<?php echo base_url(); ?>assets/img/snow/snow1.jpg");
  background-size: cover;
  width: 100%;
  height: 100%;
}
.background {
  position: absolute;
  left: 0;
  right: 0;
  z-index: 0;
  margin-left: 20px;
  margin-right: 20px;
  
}
  .content{
    height: 35%;
    margin-left: 50%; 
    padding-top: 50px;
  }
  #navbarCollapse{
    position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      font-size: 30px;
  }
  .navbar-brand{
    position: fixed;
      left: 0;
      top: 0;
      font-size: 30px;
      margin: 0;
  }
  .container{
  height: 35%;
}

.header-title{
  margin: 0px;

  font-size: 15vw;
}
.page-header-title{
  padding-top: 10px;
  padding-bottom: 10px;
}
#headers .header-caption{
  text-align:center;
  position: fixed;
  height:auto;
  top:0;
  bottom:0;
  padding:0
}
.form-group .row{
  margin: 1px;
  padding: 1px;
}
.col-lg-6{
  padding-left: 200px;
  padding-top: 0px;
}
.form-group{
  margin-bottom:0rem;
}
.card-block{
  margin-top: 0px;
  padding-top: 0px;
  margin-bottom: 0px;
  padding-bottom: 0px;
} 
h2{
  font: 400 130px/0.8 'Cookie', Helvetica, sans-serif;
    color: white !important;
  text-shadow: 4px 4px 3px rgba(0,0,0,0.9); 
}

.btn-primary{
        background-color: #19B5FE;
        border: 0 none;
    }
.btn-primary:hover{
     background-color: #1F4788;
        border: 0 none;
}


</style>
  

<div class="background">
  <head>
    <header id="header-nav">
      <nav class="navbar navbar-toggleable-sm navbar-light bg-default" style="margin-bottom:0; padding-bottom:0;">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbar1">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>users/home">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header> 
  </head>

  <body> 
    <?php if($this->session->flashdata('ticket_sale')) : ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('ticket_sale').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('invalid_sale')) : ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('invalid_sale').'</p>'; ?>
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-block">
            <h3 class="card-title m-t-15">Ticket Info</h3>

            <?php echo form_open('tickets/sell_tickets'); ?>
              <div class="form-validation">
                <form class="form-valide" action="#" method="post">
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="val-number">Tickets <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                      <input type="number" class="form-control" min="1" max="50" name="ticket_quantity" placeholder="# of Individual Tickets" required>
                    </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="text" class="form-control" name="name" placeholder="Name" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Phone <span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="text" class="form-control"  name="phone" placeholder="xxx-xxx-xxxx" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Address</label>
                      <div class="col-lg-9">
                          <input type="text" class="form-control" name="address" placeholder="123 Main St.">
                      </div>
                  </div>
                 <!--<div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="val-email">Town <span class="text-danger">*</span></label>
                      <div class="col-lg-9">
                          <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Port Hawkesbury">
                      </div>
                  </div>-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label" for="val-email">Email</label>
                      <div class="col-lg-9">
                          <input type="email" class="form-control" name="email" placeholder="Email">
                      </div>
                  </div>
                  
                  <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-inverse">Clear</button>
                      </div>
                  </div>
                </form>
              </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-block">
                <h3 class="card-title m-t-15">Total Owing</h3>
                <div class="form-validation">
                  <form class="form-valide" action="#" method="post">
                    <div class="form-group row" style="padding-bottom: 10px;">
                      <!--
                        <label class="col-lg-4 col-form-label"><a data-toggle="modal" data-target="#modal-terms" href="#">Email Ticket Confirmaton?</a></label>

                        <div class="col-lg-8">
                            <label class="css-control css-control-primary css-checkbox" for="val-conEmail">
                                <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1">
                                <span class="css-control-indicator"></span> Yes
                            </label>
                        </div>-->
                    </div>
                    <div class="form-group row">
                      <!--<label class="col-lg-4 col-form-label">Books:Ind</label>-->
                      <div class="col-lg-5">
                          <input class="form-control" type="text" value="Books" readonly="">
                      </div>
                      <div class="col-lg-5">
                            <input class="form-control" type="text" value="Individual" readonly="">
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Price $</label>
                          <div class="col-lg-7">
                              <input class="form-control" type="text" value="Price" readonly="">
                          </div>
                      </div>
                      <!--
                      <div class="form-group row">
                        <div class="col-lg-5">
                          <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                        <div class="col-lg-5">
                          <button type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                      -->
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12" >
          <h2  class="header-title animated fadeInDown"  style="font-size:135px !important;">Thank</h2>
          <h2  class="header-title animated fadeInDown" style="font-size:135px !important;text-align: right">You!</h2>
        </div>
      </div>
    </div>
  </body>
</div>


      <script src="<?php echo base_url(); ?>assets2/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets2/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets3/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>assets3/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>assets3/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets3/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="<?php echo base_url(); ?>assets3/js/lib/chartist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/chartist/chartist-init.js"></script>

    <!-- Amchart -->
    <script src="<?php echo base_url(); ?>assets3/js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/morris-chart/morris.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/morris-chart/dashboard1-init.js"></script>

     <script src="<?php echo base_url(); ?>assets3/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets3/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets3/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets3/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url(); ?>assets3/js/lib/calendar-2/pignose.init.js"></script>

    <script src="<?php echo base_url(); ?>assets3/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/scripts.js"></script>

    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets3/js/custom.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>