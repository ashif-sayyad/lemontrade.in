<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/financials/addFinance" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Month<span class="required">*</span></label>
                                                    <select required="" name="month" class="form-control">
                                                        <option value=''>--Select Month--</option>
                                                        <option value='January'>January</option>
                                                        <option value='February'>February</option>
                                                        <option value='March'>March</option>
                                                        <option value='April'>April</option>
                                                        <option value='May'>May</option>
                                                        <option value='June'>June</option>
                                                        <option value='July'>July</option>
                                                        <option value='August'>August</option>
                                                        <option value='September'>September</option>
                                                        <option value='October'>October</option>
                                                        <option value='November'>November</option>
                                                        <option value='December'>December</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Year <span class="required">*</span></label>
                                                    <input type="text"  name="year" required="" maxlength="4" pattern= "[0-9]{4,4}" class="form-control border-none input-flat  bg-ash" placeholder="Year">
                                            </div>
                                        </div>
                                    </div>
                                   
                                       <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <br>
                                                    <label>Select : <span class="required">*</span>&nbsp;&nbsp;</label> 
                                                    <input type="radio"  name="type" value="Bill" required="" class="border-none input-flat  bg-ash" placeholder="Bill">
                                                    <label>Bill <span class="required"></span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio"  name="type" value="Expenses" required="" class="border-none input-flat  bg-ash" placeholder="Bill">
                                                    <label>Expenses <span class="required"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>File <span class="required">*</span></label>
                                                    <input type="file"  name="financials" required="" class="form-control border-none input-flat  bg-ash" placeholder="financials">
                                            </div>
                                        </div>
                                    </div>
                                    
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Financial</button>
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
