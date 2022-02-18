<?php include 'header-top.php';?>
<style>
    .highcharts-credits{
        display: none;
    }
</style>
<body>
    <!-- # sidebar -->
    <?php include 'sidebar.php';?>
    <!-- /# sidebar -->


    <!-- # header -->
    <?php include 'header.php';?>
    <!-- /# header -->
    
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
             
                <!---page title-->
                <?php include 'page-title.php';?>
              <!---/page-title--->
                               
                <section id="main-content">
                       <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i style="width:95px;" class="fa fa-building-o color-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Societies</div>
                                        <div class="stat-digit"><?php  $this->db->from('society');
                                                         $this->db->where('is_active',1);
                                                      echo $this->db->count_all_results(); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Members</div>
                                        <div class="stat-digit"><?php  $this->db->from('members');
                                                                 $this->db->where('is_active',1);
                                                      echo $this->db->count_all_results(); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-gallery color-pink border-pink"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Banners</div>
                                        <div class="stat-digit"><?php  $this->db->from('banners');
                                                         $this->db->where('is_active',1);
                                                      echo $this->db->count_all_results(); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                      <div class="row">
                          <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-media-center-alt color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Ad's</div>
                                        <div class="stat-digit"><?php  $this->db->from('ads');
                                                             $this->db->where('is_active',1);
                                                      echo $this->db->count_all_results(); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          
                        <div class="col-lg-4">
                            <div class="card">
                                <a href="<?php echo base_url();?>Adminity/profile">
                                    <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-settings color-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Profile</div>
                                        <div class="stat-digit"></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <a href="<?php echo base_url();?>Adminity/logout">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-power-off color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Logout</div>
                                        <div class="stat-digit"></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        
                    </div>          
                 
                   </section>
                    <!-- /# row -->
                    <!--FOOTER CONTENTS--->
                     <?php include 'footer-contents.php';?>
                    <!---/FOOTER CONTENTS-->
               
            </div>
        </div>
    </div>

  

     <!-- # footer -->
    <?php include 'footer.php';?>
    <!-- /# footer -->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/chart-js/chartjs-init.js"></script>


     <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.init.js"></script>

</body>


</html>