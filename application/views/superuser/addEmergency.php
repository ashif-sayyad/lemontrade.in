<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/emergency/addEmergency" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Name<span class="required">*</span></label>
                                                    <input type="text"  name="name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Contact For <span class="required">*</span></label>
                                                    <input type="text"  name="contact_for" required="" class="form-control border-none input-flat  bg-ash" placeholder="Contact For">
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
                                                    <label>Alternate Mobile <span class="required"></span></label>
                                                    <input type="text"  name="alternate_mobile"  pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Alternate Mobile">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Emergency</button>
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
