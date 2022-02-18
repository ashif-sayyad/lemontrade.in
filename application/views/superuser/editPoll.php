<?php $data_info = $this->db->get_where('polls', array('poll_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?>
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                    <form action="<?php echo base_url();?>Superuser/polls/editPoll/<?php echo $row['poll_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    
                                   <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Summary <span class="required">*</span></label>
                                                    <input type="text"  name="summary" value="<?php echo $row['summary'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Summary">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Role <span class="required">*</span></label>
                                                    <input type="text"  name="for_role" value="<?php echo $row['for_role'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Role">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Wing <span class="required">*</span></label>
                                                    <input type="text"  name="for_wing" value="<?php echo $row['for_wing'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Wing">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Flat Type <span class="required">*</span></label>
                                                     <select class="form-control border-none input-flat  bg-ash" name="for_flatType">
                                                        <option value="1 RK"  <?php if($row['for_flatType'] =='1 RK'){echo 'selected';}?>>1 RK</option>
                                                        <option value="1 BHK" <?php if($row['for_flatType'] =='1 BHK'){echo 'selected';}?>>1 BHK</option>
                                                        <option value="2 BHK" <?php if($row['for_flatType'] =='2 BHK'){echo 'selected';}?>>2 BHK</option>
                                                        <option value="3 BHK" <?php if($row['for_flatType'] =='3 BHK'){echo 'selected';}?>>3 BHK</option>
                                                        <option value="4 BHK" <?php if($row['for_flatType'] =='4 BHK'){echo 'selected';}?>>4 BHK</option>
                                                        <option value="Other" <?php if($row['for_flatType'] =='Other'){echo 'selected';}?>>Other</option>
                                                    </select> 
                                                    <!--<input type="text"  name="for_flatType" value="<?php echo $row['for_flatType'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Flat Type">-->
                                            </div>
                                        </div>
                                    </div>
                                   
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Poll</button>
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