<!DOCTYPE HTML>
<html>
<head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <title>Seller Home</title>

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
   
<script>
window.onload = function () {
    var chart = new Chartist.Line('.ct-svg-chart', {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        series: [
    [1, 5, 2, 5, 4, 3],
    [2, 3, 4, 8, 1, 2]
  ]
    }, {
        low: 0,
        showArea: true,
        showPoint: false,
        fullWidth: true
    });

    chart.on('draw', function (data) {
        if (data.type === 'line' || data.type === 'area') {
            data.element.animate({
                d: {
                    begin: 2000 * data.index,
                    dur: 2000,
                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint 
                }
            });
        }
    });
    var chart = new Chartist.Pie('.ct-donute-chart-new', {
        labels: ['90%'],
      series: [180]
    }, {
      donut: true,
      total: 200,
      low:0,
      showLabel: true
});

    chart.render();

}
</script>
<style type="text/css">
.ct-donute-chart-new .ct-label {
    font-size: 30px;
    color: red !important;
}
.ct-series-a .ct-slice-donut {
  stroke: #19B5FE;
}

.btn-primary{
        background-color: #19B5FE;
        border: 0 none;
    }
.btn-primary:hover{
     background-color: #1F4788;
        border: 0 none;
}
.ct-series-a .ct-line,
.ct-series-a .ct-point {
  stroke: #19B5FE;
}
</style>
</head>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li><a href="<?php echo base_url(); ?>users/home">Home</a></li>
                        <?php if($this->session->userdata('role') === 'Admin') : ?>
                            <li><a href="<?php echo base_url(); ?>raffles/sellers">My Sellers</a></li>
                            <li><a href="<?php echo base_url(); ?>tickets/view">Ticket List</a></li>
                            <li><a href="<?php echo base_url(); ?>requests/raffle_requests">Raffle Requests</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo base_url(); ?>tickets/sell_tickets">Sell Tickets</a></li>
                        <?php if($this->session->userdata('role') === 'Admin') : ?>
                            <li><a href="<?php echo base_url(); ?>raffles/settings">Raffle Settings</a></li>
                        <?php endif; ?>  
                        <li><a href="<?php echo base_url(); ?>users/edit">Profile</a></li> 
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Home</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $tickets_left; ?></h2>
                                    <p class="m-b-0">My Tickets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $tickets_sold; ?></h2>
                                    <p class="m-b-0">Tickets I've Sold</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $money_user_raised; ?></h2>
                                    <p class="m-b-0">I've Raised</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $money_raised; ?></h2>
                                    <p class="m-b-0">Total Money Raised</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row bg-white m-l-0 m-r-0 box-shadow" style="height: 60%;">-->

                    <!-- column -->
                <div class="row" style="max-height: 40%; padding-bottom: 100px;">
                    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Ticket Sales</h4>
                                <div class="ct-svg-chart"></div>
                            </div>
                        </div>

                    </div>


                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">My Sales</h4>
                                <div class="ct-donute-chart-new"></div>
                            </div>
                        </div>
                    </div>
                <!-- column -->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="card-title m-t-15">Requests</h3>
                                <div class="form-validation">
                                    <?php echo form_open('requests/request_tickets'); ?>
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-type">Type<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control">
                                                        <option>Request Tickets</option>
                                                        <option>Reduce Tickets</option>
                                                        <!--<option>Leave Raffle</option>-->
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-quantity">Quantity <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-quantity" name="val-quantity" placeholder="10">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"><a data-toggle="modal" data-target="#modal-terms" href="#">Email Response?</a></label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-conEmail">
                                                    <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1">
                                                    <span class="css-control-indicator"></span> Yes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-inverse">Clear</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h4>Past Requests</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="height:310px;overflow:auto;">
                                    <table class="table">
                                        <tbody>
                                            <?php foreach($requests as $request) : ?>
                                            <tr>
                                                <td>
                                                    <?php if($request['Type'] === 'Ticket_Alloc') : ?>
                                                        <?php echo 'Ticket Allocation'; ?>
                                                    <?php else : ?>
                                                        <?php echo $request['Type']; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($request['Type'] === 'Ticket_Alloc') : ?>
                                                        <?php echo $request['Quantity']; ?>
                                                    <?php else : ?>
                                                        <?php echo '-'; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo substr($request['RequestDate'], 0, 10); ?></td>
                                                <td>
                                                    <?php if(!$request['Resolved']) : ?>
                                                        <?php echo 'Pending'; ?>
                                                    <?php elseif($request['Resolved'] and !$request['Approved']) : ?>
                                                        <?php echo 'Denied'; ?>
                                                    <?php elseif($request['Resolved'] and $request['Approved']) : ?>
                                                        <?php echo 'Approved'; ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>












    


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
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>