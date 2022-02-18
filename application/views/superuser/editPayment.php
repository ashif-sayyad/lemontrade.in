<?php $data_info = $this->db->get_where('payments', array('payment_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?><section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/payments/editPayment/<?php echo $row['payment_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Name<span class="required">*</span></label>
                                                    <input type="text"  name="name" value="<?php echo $row['name'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Bank Name <span class="required">*</span></label>
                                                    <input type="text"  name="bank_name" value="<?php echo $row['bank_name'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Bank Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Account No <span class="required">*</span></label>
                                                    <input type="text"  name="account_no" value="<?php echo $row['account_no'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Account No">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>IFSC <span class="required">*</span></label>
                                                    <input type="text"  name="IFSC" value="<?php echo $row['IFSC'];?>" required=""  class="form-control border-none input-flat  bg-ash" placeholder="IFSC">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>MICR <span class="required"></span></label>
                                                    <input type="text"  name="MICR" value="<?php echo $row['MICR'];?>"  class="form-control border-none input-flat  bg-ash" placeholder="MICR">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>UPI <span class="required"></span></label>
                                                    <input type="text"  name="UPI" value="<?php echo $row['UPI'];?>" class="form-control border-none input-flat  bg-ash" placeholder="UPI">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Branch Address <span class="required">*</span></label>
                                                    <input type="text"  name="address" value="<?php echo $row['address'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Branch Address">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Payment</button>
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
