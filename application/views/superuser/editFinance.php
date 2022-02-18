<?php $data_info = $this->db->get_where('financials', array('financial_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?>
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                    <form action="<?php echo base_url();?>Superuser/financials/editFinance/<?php echo $row['financial_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Month<span class="required">*</span></label>
                                                    <select required="" name="month" class="form-control">
                                                        <option value=''>--Select Month--</option>
                                                        <option value='January'<?php if($row['month']=='January'){ echo 'selected';} ?>>January</option>
                                                        <option value='February'<?php if($row['month']=='February'){ echo 'selected';} ?>>February</option>
                                                        <option value='March'<?php if($row['month']=='March'){ echo 'selected';} ?>>March</option>
                                                        <option value='April'<?php if($row['month']=='April'){ echo 'selected';} ?>>April</option>
                                                        <option value='May'<?php if($row['month']=='May'){ echo 'selected';} ?>>May</option>
                                                        <option value='June'<?php if($row['month']=='June'){ echo 'selected';} ?>>June</option>
                                                        <option value='July'<?php if($row['month']=='July'){ echo 'selected';} ?>>July</option>
                                                        <option value='August'<?php if($row['month']=='August'){ echo 'selected';} ?>>August</option>
                                                        <option value='September'<?php if($row['month']=='September'){ echo 'selected';} ?>>September</option>
                                                        <option value='October'<?php if($row['month']=='October'){ echo 'selected';} ?>>October</option>
                                                        <option value='November'<?php if($row['month']=='November'){ echo 'selected';} ?>>November</option>
                                                        <option value='December'<?php if($row['month']=='December'){ echo 'selected';} ?>>December</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Year <span class="required">*</span></label>
                                                    <input type="text"  name="year" value="<?php echo $row['year'];?>" required="" maxlength="4" pattern= "[0-9]{4,4}" class="form-control border-none input-flat  bg-ash" placeholder="Year">
                                            </div>
                                        </div>
                                    </div>
                                   
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <br>
                                                    <label>Select : <span class="required">*</span>&nbsp;&nbsp;</label> 
                                                    <input type="radio"  name="type" value="Bill" <?php if($row['type']=='Bill'){ echo 'checked';} ?> required="" class="border-none input-flat  bg-ash" placeholder="Bill">
                                                    <label>Bill <span class="required"></span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio"  name="type" value="Expenses" <?php if($row['type']=='Expenses'){ echo 'checked';} ?> required="" class="border-none input-flat  bg-ash" placeholder="Bill">
                                                    <label>Expenses <span class="required"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>File <span class="required"></span></label>
                                                    <input type="file"  name="financials"  class="form-control border-none input-flat  bg-ash" placeholder="financials">
                                            </div>
                                        </div>
                                    </div>
                                    
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Financial</button>
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
 <?php }?>