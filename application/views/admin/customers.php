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
        <section class="tab-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-10">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-10">
                        <h3>ग्राहक</h3>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper mb-10">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a routerLink="/">डॅशबोर्ड</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    ग्राहक
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="breadcrumb-wrapper mb-10">
                        <button class="btn btn-sm btn-outline-primary" (click)="newCustomerModal()"><i class="lni lni-circle-plus"></i> नवीन ग्राहक</button>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-10">
                        <div class="table-wrapper table-responsive">
                            <table class="table table-bordered table-striped" #dataTable>
                                <thead>
                                    <tr>
                                        <th>
                                            <h6>अ.न.</h6>
                                        </th>
                                        <th>
                                            <h6>ग्राहकाचे नाव</h6>
                                        </th>
                                        <th>
                                            <h6>मोबाईल</h6>
                                        </th>
                                        <th>
                                            <h6>ठिकाण</h6>
                                        </th>
                                        <th>
                                            <h6>कृती</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <tr *ngFor="let cust of customerData; let i = index">
                                        <td>
                                            {{i+1}}
                                        </td>
                                        <td>
                                            {{cust.customer_name}}
                                        </td>
                                        <td>
                                            {{cust.mobile}}
                                        </td>
                                        <td>
                                            {{cust.village}}
                                        </td>
                                        <td>
                                            <div class="action">
                                                <button class="text-primary" (click)="editCustomerModal(cust.id)">
                                                    <i class="lni lni-pencil-alt"></i>
                                                </button>
                                                <button class="text-danger" (click)="isdelete(cust.id)">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- end table row -->
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
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