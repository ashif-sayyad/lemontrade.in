<!-- Styles -->
   <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
<!--                                <div class="card-body">
                                    <div class="card-header m-b-20">
                                        <h4>Add Society</h4>                                        
                                    </div>
                                </div>-->
<form action="<?php echo base_url();?>Adminity/society/addSociety" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Society Name <span class="required">*</span></label>
                                                    <input type="text"  name="society_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Society Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Start Date<span class="required">*</span></label>
                                                    <input type="date"  name="start_date" required="" class="form-control border-none input-flat  bg-ash" placeholder="Start Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>End Date <span class="required">*</span></label>
                                                    <input type="date"  name="end_date" required="" class="form-control border-none input-flat  bg-ash" placeholder="End Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Space Alloted <span class="required">*</span></label>
                                                    <input type="text"  name="space_allotted" required="" class="form-control border-none input-flat  bg-ash" placeholder="Space Alloted">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>No.of Users <span class="required">*</span></label>
                                                    <input type="text"  name="no_of_users" required="" class="form-control border-none input-flat  bg-ash" placeholder="No.of Users">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Name of Super User <span class="required">*</span></label>
                                                    <input type="text"  name="user_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Name of Super User">
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Contact No.<span class="required">*</span></label>
                                                    <input type="text"  name="mobile" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email"  name="email" required="" class="form-control border-none input-flat  bg-ash" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Password <span class="required">*</span></label>
                                                    <input type="password"  name="password" required="" class="form-control border-none input-flat  bg-ash" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input type="password"  name="confirm_cpass" required="" class="form-control border-none input-flat  bg-ash" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Society Address" rows="2" name="address"></textarea>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Upload Logo <span class="required">*</span></label>
                                                    <input type="file"  name="logo" required="" class="form-control border-none input-flat  bg-ash" placeholder="Logo">
                                            </div>
                                        </div>
                                    </div>
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Society</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

    <!-- scripit init-->
