<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/management/addManagement" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>First Name<span class="required">*</span></label>
                                                    <input type="text"  name="first_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="First Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input type="text"  name="last_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Role <span class="required">*</span></label>
                                                    <input type="text"  name="role" required="" class="form-control border-none input-flat  bg-ash" placeholder="Role">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Mobile <span class="required">*</span></label>
                                                    <input type="text"  name="mobile" required=""  pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Mobile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Available Time <span class="required">*</span></label>
                                                    <input type="text"  name="available_time" required="" class="form-control border-none input-flat  bg-ash" placeholder="Available Time">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Management</button>
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
