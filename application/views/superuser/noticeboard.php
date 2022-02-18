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
                                <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/addNotice');" class="btn btn-primary" >Add Notice</button>
                             </div>
                             <div class="card alert">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR.</th>
                                                    <th>Notice No</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Summary</th>
                                                    <!--<th>View For</th>-->
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sr=1; foreach($noticeboard_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $row->notice_no;?></td>
                                                    <td><?php echo $row->start_date;?></td>
                                                    <td><?php echo $row->end_date;?></td>
                                                    <td><?php echo $row->summary;?></td>
                                                    <!--<td><?php echo $row->view_for;?></td>-->
                                                    <td style="text-align: left">
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/viewNotice/<?php echo $row->notice_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-eye ti-eyes fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php $today = date('Y-m-d');
                                                        if($row->end_date >= $today){
                                                        ?>
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/editNotice/<?php echo $row->notice_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-pencil-alt ti-pencil-al fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php }?>
                                                        
                                                        <a  href="<?php echo base_url(); ?>Superuser/noticeboard/delete/<?php echo $row->notice_id;?>" class="table-link danger">
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