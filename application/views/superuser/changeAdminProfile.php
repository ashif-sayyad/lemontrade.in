<?php $admin_info = $this->db->get_where('society', array('society_id' => $param2))->result_array();
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
                                <form action="<?php echo base_url();?>Superuser/profile/updateSuperuserProfile/<?php echo $row['society_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Society Name <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="society_name" required="" class="form-control" value="<?php echo $row['society_name'];?>" placeholder="Society Name"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>User Name <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="user_name" required="" class="form-control" value="<?php echo $row['user_name'];?>" placeholder="User Name"/>
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
                                                    <input type="email" name="email" required="" readonly class="form-control" value="<?php echo $row['email'];?>" placeholder="Email Address"/>
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
                                                    <input type="text" name="mobile" required="" class="form-control" pattern="[0-9]{10,10}" maxlength="10" minlength="10" value="<?php echo $row['mobile'];?>" placeholder="Contact Number"/>
                                                </div>
                                            </div>
                                        </div>                                        
                                       <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>Space Allotted <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="space_allotted" required="" class="form-control" value="<?php echo $row['space_allotted'];?>" placeholder="Space Allotted"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                        <label>No. of Users <span class="required">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <input type="text" name="no_of_users" required="" class="form-control" value="<?php echo $row['no_of_users'];?>" placeholder="No. of Users"/>
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
                                                    <textarea name="address" class="form-control" placeholder="Address"><?php echo $row['address'];?></textarea>
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

