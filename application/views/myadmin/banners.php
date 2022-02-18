<?php include 'header-top.php';?>

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
                <!-- /# row -->
                <section id="main-content">
                    <!---system messages---->                    
                    <?php include 'system_msgs.php';?>
                    <!---/system messages---->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="addbtn">
                                <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Adminity/popup/myadmin/addBanner');" class="btn btn-primary" >Add Banner</button>
                             </div>
                             <div class="card alert">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR.</th>
                                                    <th>Banner Name</th>
                                                    <th>Description</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sr=1; foreach($banners_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                     <td><?php echo $row->banner_name;?></td>
                                                    <td><?php echo $row->description;?></td>
                                                    <td><?php echo $row->start_date;?></td>
                                                    <td><?php echo $row->end_date;?></td>
                                                    <td style="text-align: left">
                                                                                                              
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Adminity/popup/myadmin/editBanner/<?php echo $row->banner_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-pencil-alt ti-pencil-al fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        
                                                        <a  href="<?php echo base_url(); ?>Adminity/banners/delete/<?php echo $row->banner_id;?>" class="table-link danger">
                                                        <span class="fa-stack" onclick="return checkDelete();">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-close ti-clos fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $sr++; }?>    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

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
    <script>
       $(document).ready(function() {
           function hidetab(){    
            $('#mssg').hide();
          }
            setTimeout(hidetab,4000);
       });
    </script>

</body>


</html>