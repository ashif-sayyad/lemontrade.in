<html>
<?php include 'header-top.php';?>
    
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>mypanel/assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>mypanel/assets/js/bootstrap-3.3.2.min.js"></script>
<link href="<?php echo base_url()?>mypanel/assets/css/bootstrap-multiselect.css" rel="stylesheet" />
<!--<link href="http://davidstutz.de/bootstrap-multiselect/docs/css/bootstrap-3.3.2.min.css" rel="stylesheet" />-->

<style>
    .multiselect-container>li>a>label {
      padding: 4px 20px 4px 30px;
}
</style>
<body>
<?php
$members_info = $this->db->get_where('members', array('society_id' => $this->session->userdata('log_admin_id'),'is_active'=>1))->result();
$this->db->group_by('wing');
$wing_info = $this->db->get_where('members', array('society_id' => $this->session->userdata('log_admin_id'),'is_active'=>1))->result();?>

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
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/complaints/addComplaint" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Subject<span class="required">*</span></label>
                                                    <input type="text"  name="subject" required="" maxlength="30" class="form-control border-none input-flat  bg-ash" placeholder="Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Description <span class="required">*</span></label>
                                                    <textarea  name="summary" required="" class="form-control border-none input-flat  bg-ash" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>For<span class="required">*</span></label>
                                                      <select class="form-control etype" name="show_for" id="forval">
                                                    <option value="All">All</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="Wing">Wing</option>                                                 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6" id="showmembers" style="display:none;">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Members<span class="required">*</span></label>
                                                    <br>
                                                    <select id="chkveg" style="width:100%" name="members[]" class="form-control" multiple="multiple">

                                                        <?php foreach($members_info as $member){?>
                                                        <option value='<?php echo $member->member_id;?>'><?php echo $member->first_name." ".$member->last_name;?></option>
                                                        <?php } ?>

                                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6" id="showwings" style="display:none;">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Wings<span class="required">*</span></label>
                                                    <br>
                                                    <select id="chkwing" style="width:100%" name="wings[]" class="form-control" multiple="multiple">

                                                        <?php foreach($wing_info as $wing){?>
                                                        <option value='<?php echo $wing->wing;?>'><?php echo $wing->wing;?></option>
                                                        <?php } ?>

                                                        </select>                                                    
                                                        <!--<input type="button" id="btnget" value="Get Selected Values" />-->
                                                        
                                            </div>
                                        </div>
                                    </div>
                                                                        
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
     </section>
                 <!--FOOTER CONTENTS--->
                     <?php include 'footer-contents.php';?>
                    <!---/FOOTER CONTENTS-->
            </div>
        </div>
    </div>

<script type="text/javascript">
       $(document).ready(function() {
           function hidetab(){    
            $('#mssg').hide();
          }
            setTimeout(hidetab,4000);
       });
    
$('#forval').change(function(){
    $for = $('#forval').val();
    if($for=='Personal'){
        $('#showwings').hide();
        $('#showmembers').show();
    }else if($for=='Wing'){
        $('#showmembers').hide();
        $('#showwings').show();
    }else{
         $('#showmembers').hide();
        $('#showwings').hide();
    }
});

$(function() {

    $('#chkveg').multiselect({

        includeSelectAllOption: true
    });
    $('#chkwing').multiselect({

        includeSelectAllOption: true
    });
    $('#btnget').click(function(){

        alert($('#chkveg').val());
    });
});

</script>

     <!-- # footer -->
    <?php // include 'footer.php';?>
    <!-- /# footer -->
   
   

</body>


</html>

