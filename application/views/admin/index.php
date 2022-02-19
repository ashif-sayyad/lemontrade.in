<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="image/x-icon" href="<?php echo base_url(); ?>themes/login/falcon.png" rel="shortcut icon" />
    <title>लेमन ट्रेडिंग कंपनी | डॅशबोर्ड</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/styles.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/lineicons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/main.css" />
  </head>
  <body>
        <!-- ======== sidebar-nav start =========== -->
    <?php include 'contents/sidebar.php'; ?>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <?php include 'contents/header.php'; ?>
        <!-- ========== header end ========== -->

        <!-- ========== tab components start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-10">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-10">
                                <h3>डॅशबोर्ड</h3>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper mb-10">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <a>डॅशबोर्ड</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New Orders</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +2.00%
                                    <span class="text-gray">(30 days)</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-dollar"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Income</h6>
                                <h3 class="text-bold mb-10">$74,567</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +5.45%
                                    <span class="text-gray">Increased</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Expense</h6>
                                <h3 class="text-bold mb-10">$24,567</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -2.00%
                                    <span class="text-gray">Expense</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="lni lni-user"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New User</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -25.00%
                                    <span class="text-gray"> Earning</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card-style mb-30">
                            <div class="title d-flex flex-wrap justify-content-between">
                                <div class="left">
                                    <h6 class="text-medium mb-10">Yearly subscription</h6>
                                    <h3 class="text-bold">$245,479</h3>
                                </div>
                                <div class="right">
                                    <div class="select-style-1">
                                        <div class="select-position select-sm">
                                            <select class="light-bg">
                                                <option value="">Yearly</option>
                                                <option value="">Monthly</option>
                                                <option value="">Weekly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end select -->
                                </div>
                            </div>
                            <!-- End Title -->
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="Chart1" style="width: 846px; height: 400px; display: block;" width="846" height="400" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- End Chart -->
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-5">
                        <div class="card-style mb-30">
                            <div class="
                title
                d-flex
                flex-wrap
                align-items-center
                justify-content-between
              ">
                                <div class="left">
                                    <h6 class="text-medium mb-30">Sales/Revenue</h6>
                                </div>
                                <div class="right">
                                    <div class="select-style-1">
                                        <div class="select-position select-sm">
                                            <select class="light-bg">
                                                <option value="">Yearly</option>
                                                <option value="">Monthly</option>
                                                <option value="">Weekly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end select -->
                                </div>
                            </div>
                            <!-- End Title -->
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="Chart2" style="width: 100%; height: 400px; display: block;" width="579" height="400" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- End Chart -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== tab components end ========== -->

        <!-- ========== footer start =========== -->
        <?php include 'contents/footer.php'; ?>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== --> 

    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?php echo base_url(); ?>themes/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/dynamic-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/fullcalendar.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/jvectormap.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/world-merc.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/polyfill.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/main.js"></script>
  </body>
</html>