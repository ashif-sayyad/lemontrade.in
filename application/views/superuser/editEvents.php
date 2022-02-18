<?php $data_info = $this->db->get_where('society_events', array('event_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?><section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/events/editEvents/<?php echo $row['event_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Date<span class="required">*</span></label>
                                                    <input type="date"  name="date" value="<?php echo $row['date'];?>" required="" min="<?php echo date('Y-m-d');?>" class="form-control border-none input-flat  bg-ash" placeholder="Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Summary <span class="required">*</span></label>
                                                    <input type="text"  name="summary" value="<?php echo $row['summary'];?>"  maxlength="25" required="" class="form-control border-none input-flat  bg-ash" placeholder="Summary">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Description" rows="2" name="description"><?php echo $row['description'];?></textarea>
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
<!--                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Image <span class="required"></span></label>
                                                    <input type="file"  name="image" class="form-control border-none input-flat  bg-ash" placeholder="Image">
                                            </div>
                                        </div>
                                    </div>-->
                                                                                                            
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Event</button>
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