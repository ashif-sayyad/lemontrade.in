<?php $admin_info = $this->db->get_where('admin', array('admin_id' => $param2))->result_array();
 foreach ($admin_info as $row) {

?>
<!-- Styles -->
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Change Profile Info</h4>                                        
                                    </div>
                                </div>
                                <form action="<?php echo base_url();?>Adminity/profile/updateAdminProfile/<?php echo $row['admin_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>First Name <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="first_name" required="" class="form-control" value="<?php echo $row['first_name'];?>" placeholder="Name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Last Name <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="last_name" required="" class="form-control" value="<?php echo $row['last_name'];?>" placeholder="Name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Email <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="email" name="admin_email" required="" readonly class="form-control" value="<?php echo $row['email'];?>" placeholder="Email Address"/>
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Contact No <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="admin_mobile_no" required="" class="form-control" pattern="[0-9]{10,10}" maxlength="10" minlength="10" value="<?php echo $row['mobile'];?>" placeholder="Contact Number"/>
                                                </div>
                                            </div>
                                        </div>                                        
                                                                            
                                            <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Date of Birth </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="date" name="DOB" placeholder="Date Of Birth" value="<?php echo $row['DOB'];?>" class="form-control calendar bg-ash" placeholder="dd/mm/yyyy" id="text-calendar">
                                               
                                                </div>
                                            </div>
                                        </div> 
                                        
                                         <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Gender</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="radio" style="width:10%" name="gender" <?php if($row['gender']=='Male'){echo'checked';} ?> value="Male"><span style="">Male</span>
                                                    <input type="radio" style="width:10%" name="gender" <?php if($row['gender']=='Female'){echo'checked';} ?> value="Female"><span style="">Female</span>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="col-md-8">&nbsp;</div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>State</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                     <input type="text" name="state" class="form-control" value="<?php echo $row['state'];?>" placeholder="State"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>City</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                     <input type="text" name="city" class="form-control" value="<?php echo $row['city'];?>" placeholder="City"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <textarea name="admin_address" class="form-control" placeholder="Address"><?php echo $row['address'];?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Pincode</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                     <input type="text" name="pincode"  pattern="[0-9]{6,6}" maxlength="6" class="form-control" value="<?php echo $row['pincode'];?>" placeholder="Pincode"/>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Website</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                     <input type="text" name="website"  class="form-control" value="<?php echo $row['website'];?>" placeholder="Website"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Skype ID:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                     <input type="text" name="skype_id"  class="form-control" value="<?php echo $row['skype_id'];?>" placeholder="skype id"/>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Profile</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
              
   </section>
 <?php } ?>

<!--    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/moment.latest.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/semantic.ui.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/prism.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
     scripit init
    <script src="<?php echo base_url();?>mypanel/assets/js/lib/calendar-2/pignose.init.js"></script>
     scripit init-->