<style>
    .modal-body{        
    height:250px !important;
    }
</style>
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
<form action="<?php echo base_url();?>Superuser/import" method="post" enctype="multipart/form-data" accept-charset="utf-8">   
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Upload File <span class="required">*</span></label>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <input type="file"  name="file" id="file" required="" class="form-control border-none input-flat  bg-ash" placeholder="File">
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    </div>  
                                   
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" name="importfile" value="Import" id="importfile-id" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-upload"></i> Upload</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
    </form>
                                </div>                                
                                
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

