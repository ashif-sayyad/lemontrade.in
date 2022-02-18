<?php include 'header-top.php';
$society_id = $this->session->userdata('log_admin_id');
?>

<body>
    <style>
        .stat-widget-one .stat-content {
    margin-left: 10px;    
        }
        
    </style>
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
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Members</div>
                                        <div class="stat-digit">
                                            <?php   
                                                    $this->db->where('society_id',$society_id);
                                                    $this->db->where('is_active',1);
                                                    $this->db->from('members');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-clipboard color-pink border-pink"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Notice Board</div>
                                        <div class="stat-digit">
                                            <?php  
                                                    $this->db->where('society_id',$society_id);
                                                     $this->db->where('is_active',1);
                                                    $this->db->from('noticeboard');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                           <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-users color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Management</div>
                                        <div class="stat-digit">
                                            <?php  
                                                    $this->db->where('society_id',$society_id);
                                                     $this->db->where('is_active',1);
                                                    $this->db->from('management');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                           <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-mobile color-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Em. Contacts</div>
                                        <div class="stat-digit">
                                            <?php   $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('emergency_contact');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                      <div class="row">
                          <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-bell" style="color:green; border-color: green"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Society Events</div>
                                        <div class="stat-digit">                                            
                                            <?php  $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('society_events');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-alarm-clock" style="color: brown; border-color: brown"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Near By Events</div>
                                        <div class="stat-digit">                                            
                                            <?php  $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('nearbyevents');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-gallery" style="color: blue; border-color: blue"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Gallery</div>
                                        <div class="stat-digit">                                            
                                            <?php  $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('gallery');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          
                           <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-comment-alt" style="color: coral; border-color: coral"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Complaints</div>
                                        <div class="stat-digit">                                            
                                            <?php  $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('suggestion');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    
                    <div class="row">
                         <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-thumb-up" style="color: blueviolet; border-color: blueviolet"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Polls</div>
                                        <div class="stat-digit">                                            
                                            <?php  $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('polls');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-shopping-cart-full" style="color: darkcyan; border-color: darkcyan"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Buy/Sell</div>
                                        <div class="stat-digit">                                            
                                            <?php 
                                            $date = date('Y-m-d');
                                            $this->db->where('society_id',$society_id);
                                            $this->db->where('posted_till >=',$date);
                                                    $this->db->where('is_active',1);
                                                    $this->db->from('selling');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr" style="width:95px; text-align: center;color:fuchsia; border-color: fuchsia;"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Payments</div>
                                        <div class="stat-digit">                                            
                                            <?php  $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('payments');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="card">
                                    <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i style="width:95px; text-align: center;color: lime;border-color: lime;" class="fa fa-inr"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Financial</div>
                                        <div class="stat-digit">
                                            <?php  $this->db->where('society_id',$society_id);
                                             $this->db->where('is_active',1);
                                                    $this->db->from('financials');
                                                    echo $this->db->count_all_results(); ?>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- /# row -->
                   
                </section>
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