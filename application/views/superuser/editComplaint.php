<?php $data_info = $this->db->get_where('suggestion', array('suggestion_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?><section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/complaints/editComplaint/<?php echo $row['suggestion_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Subject<span class="required">*</span></label>
                                                    <input type="text"  name="subject" value="<?php echo $row['subject'];?>" maxlength="30" required="" class="form-control border-none input-flat  bg-ash" placeholder="subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Description <span class="required">*</span></label>
                                                    <textarea type="text"  name="summary" required="" class="form-control border-none input-flat  bg-ash" placeholder="Description"><?php echo $row['summary'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>For<span class="required">*</span></label>
                                                      <select class="form-control etype" name="show_for" id="">
                                                    <option value="All" <?php if($row['show_for']=='All'){echo 'selected';} ?>>All</option>
                                                    <option value="Personal" <?php if($row['show_for']=='Personal'){echo 'selected';} ?>>Personal</option>
                                                    <option value="Wing" <?php if($row['show_for']=='Wing'){echo 'selected';} ?>>Wing</option>
                                                    <!--<option value="Society" <?php if($row['show_for']=='Society'){echo 'selected';} ?>>Society</option>-->
                                                 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                         
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Status<span class="required">*</span></label>
                                                      <select class="form-control etype" name="complaint_status" id="">
                                                    <option value="Open" <?php if($row['complaint_status']=='Open'){echo 'selected';} ?>>Open</option>
                                                    <option value="Acknowlegde" <?php if($row['complaint_status']=='Acknowlegde'){echo 'selected';} ?>>Acknowlegde</option>
                                                    <option value="Inprogress" <?php if($row['complaint_status']=='Inprogress'){echo 'selected';} ?>>Inprogress</option>
                                                    <option value="Closed" <?php if($row['complaint_status']=='Closed'){echo 'selected';} ?>>Closed</option>
                                                    <option value="Rejected" <?php if($row['complaint_status']=='Rejected'){echo 'selected';} ?>>Rejected</option>
                                                 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Note <span class="required"></span></label>
                                                    <textarea  name="note" class="form-control border-none input-flat  bg-ash" placeholder="Enter Note Here"><?php echo $row['note'];?></textarea>
                                            </div>
                                        </div>
                                    </div>                                 
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update</button>
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