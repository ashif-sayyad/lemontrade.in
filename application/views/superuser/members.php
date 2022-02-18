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
                                <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/addMember');" class="btn btn-primary" >Add Member</button>
                                <!--<button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/addTenantss');" class="btn btn-secondary" >Add Tenant</button>-->
                                <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/uploadMember');" class="btn btn-warning" >Upload Member List</button>
                                <a href="<?php echo base_url();?>assets/uploads/downloads/FormatFile.xlsx" class="btn btn-success" >Download File</a>
                             </div>
                             <div class="card alert">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR.</th>
                                                    <th>Wing</th>
                                                    <th>Floor No</th>
                                                    <th>Flat No</th>
                                                    <th>Name</th>
                                                    <th>Owner</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sr=1; foreach($member_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $row->wing;?></td>
                                                    <td><?php echo $row->floor_no;?></td>
                                                    <td><?php echo $row->flat_no;?></td>
                                                    <td><?php echo ucwords($row->first_name.' '.$row->last_name);?></td>
                                                    <td><?php echo $row->owner;?></td>
                                                    <td><?php echo $row->mobile;?></td>
                                                    <td><?php echo $row->email;?></td>
                                                    <td style="text-align: left">
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/viewMember/<?php echo $row->member_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-eye ti-eyes fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/editMember/<?php echo $row->member_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-pencil-alt ti-pencil-al fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <?php if($row->owner=='Yes'){?>
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/addTenantss/<?php echo $row->member_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-plus ti-eyes fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        </a>
                                                        <a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>Superuser/popup/superuser/viewTenantList/<?php echo $row->member_id;?>');" class="table-link">
                                                        <span  class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="ti-eye  fa-stack-1x fa-inverse" style="background-color: blueviolet"></i>
                                                        </span>
                                                        </a>
                                                        <?php } else{}?>
                                                        
                                                        <a  href="<?php echo base_url(); ?>Superuser/members/delete/<?php echo $row->member_id;?>" class="table-link danger">
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