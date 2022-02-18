<?php $data_info = $this->db->get_where('emergency_contact', array('contact_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?><section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/emergency/editEmergency/<?php echo $row['contact_id'];?>" method="post" enctype="multipart/form-data">   
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
                                                    <label>Contact For <span class="required">*</span></label>
                                                    <input type="text"  name="contact_for" value="<?php echo $row['contact_for'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Contact For">
                                            </div>
                                        </div>
                                    </div>
                                   
                                   <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Mobile <span class="required">*</span></label>
                                                    <input type="text"  name="mobile" value="<?php echo $row['mobile'];?>" required=""  pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Mobile">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Alternate Mobile <span class="required"></span></label>
                                                    <input type="text"  name="alternate_mobile" value="<?php echo $row['alternate_mobile'];?>"  pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Alternate Mobile">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Emergency</button>
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
