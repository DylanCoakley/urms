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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets3/images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>

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
    var chart = new Chartist.Line('.ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        series: [
                [10, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
                [4, 5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
                [5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
                [3, 4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
            ]
    }, {
        low: 0,
    });
    chart.render
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
                        <li><a href="http://localhost/ci/pages/view/admin">Home</a></li>
                        <li><a href="http://localhost/ci/pages/view/adminSeller">Sellers</a></li>
                        <li><a href="http://localhost/ci/pages/view/adminTickets">Tickets</a></li>
                        <li><a href="http://localhost/ci/pages/view/adminRequest">Requests</a></li>
                        <li><a href="http://localhost/ci/pages/view/sell">Sell Tickets</a></li>
                        <li><a href="http://localhost/ci/pages/view/raffle">Raffle</a></li>
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
                    <h3 class="text-primary">Tickets</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Logout</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <button type="search" class="btn btn-primary" style="margin-bottom: 20px">Search</button>
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label" for="val-id">ID</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="val-id" name="val-id" placeholder="Ticket val-id">
                                            </div>
                                            <label class="col-lg-1 col-form-label" for="val-name">Seller Name</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="val-name" name="val-sname" placeholder="Seller Name">
                                            </div>
                                            <label class="col-lg-1 col-form-label" for="val-bname">Buyer Name</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="val-bname" name="val-bname" placeholder="Buyer Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-addr">Address</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="val-addr" name="val-addr" placeholder="123 Main St.">
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-location">Location</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="val-location" name="val-location" placeholder="Antigonish">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Buyer Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Location</th>
                                                <th>Seller Name</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Buyer Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Location</th>
                                                <th>Seller Name</th>
                                                <th>Update</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td contenteditable="true">Tiger Nixon</td>
                                                <td contenteditable="true">System Architect</td>
                                                <td contenteditable="true">Edinburgh</td>
                                                <td contenteditable="true">61</td>
                                                <td contenteditable="true">2011/04/25</td>
                                                <td contenteditable="true">$320,800</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true">Garrett Winters</td>
                                                <td contenteditable="true">Accountant</td>
                                                <td contenteditable="true">Tokyo</td>
                                                <td contenteditable="true">63</td>
                                                <td contenteditable="true">2011/07/25</td>
                                                <td contenteditable="true">$170,750</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true">Ashton Cox</td>
                                                <td contenteditable="true">Junior Technical Author</td>
                                                <td contenteditable="true">San Francisco</td>
                                                <td contenteditable="true">66</td>
                                                <td contenteditable="true">2009/01/12</td>
                                                <td contenteditable="true">$86,000</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true">Cedric Kelly</td>
                                                <td contenteditable="true">Senior Javascript Developer</td>
                                                <td contenteditable="true">Edinburgh</td>
                                                <td contenteditable="true">22</td>
                                                <td contenteditable="true">2012/03/29</td>
                                                <td contenteditable="true">$433,060</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true">Airi Satou</td>
                                                <td contenteditable="true">Accountant</td>
                                                <td contenteditable="true">Tokyo</td>
                                                <td contenteditable="true">33</td>
                                                <td contenteditable="true">2008/11/28</td>
                                                <td contenteditable="true">$162,700</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true">Brielle Williamson</td>
                                                <td contenteditable="true">Integration Specialist</td>
                                                <td contenteditable="true">New York</td>
                                                <td contenteditable="true">61</td>
                                                <td contenteditable="true">2012/12/02</td>
                                                <td contenteditable="true">$372,000</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true"Herrod Chandler</td>
                                                <td contenteditable="true">Sales Assistant</td>
                                                <td contenteditable="true">San Francisco</td>
                                                <td contenteditable="true">59</td>
                                                <td contenteditable="true">2012/08/06</td>
                                                <td contenteditable="true">$137,500</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true">Rhona Davidson</td>
                                                <td contenteditable="true">Integration Specialist</td>
                                                <td contenteditable="true">Tokyo</td>
                                                <td contenteditable="true">55</td>
                                                <td contenteditable="true">2010/10/14</td>
                                                <td contenteditable="true">$327,900</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
                                            <tr>
                                                <td contenteditable="true">Colleen Hurst</td>
                                                <td contenteditable="true">Javascript Developer</td>
                                                <td contenteditable="true">San Francisco</td>
                                                <td contenteditable="true">39</td>
                                                <td contenteditable="true">2009/09/15</td>
                                                <td contenteditable="true">$205,500</td>
                                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                                            </tr>
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

    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets3/js/lib/datatables/datatables-init.js"></script>

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