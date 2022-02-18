<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/events/addEvents" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Date<span class="required">*</span></label>
                                                    <input type="date"  name="date" required="" min="<?php echo date('Y-m-d');?>" class="form-control border-none input-flat  bg-ash" placeholder="Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Summary <span class="required">*</span></label>
                                                    <input type="text"  name="summary" required="" maxlength="25" class="form-control border-none input-flat  bg-ash" placeholder="Summary">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Description" rows="2" name="description"></textarea>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Image <span class="required"></span></label>
                                                    <input type="file"  name="image" class="form-control border-none input-flat  bg-ash" placeholder="Image">
                                            </div>
                                        </div>
                                    </div>
                                    
                                         
                                                                        
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Event</button>
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
