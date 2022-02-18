<?php $data_info = $this->db->get_where('noticeboard', array('notice_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?>
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                    <form action="<?php echo base_url();?>Superuser/noticeboard/editNotice/<?php echo $row['notice_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Start Date<span class="required">*</span></label>
                                                    <input type="date"  name="start_date" readonly="" value="<?php echo $row['start_date'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Start Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>End Date <span class="required">*</span></label>
                                                    <input type="date"  name="end_date" readonly="" value="<?php echo $row['end_date'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="End Date">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Notice No <span class="required">*</span></label>
                                                    <input type="text"  name="notice_no" value="<?php echo $row['notice_no'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Notice No">
                                            </div>
                                        </div>
                                    </div>
                                    
                                   <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Summary <span class="required">*</span></label>
                                                    <input type="text"  name="summary" value="<?php echo $row['summary'];?>" required="" maxlength="30" class="form-control border-none input-flat  bg-ash" placeholder="Summary">
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
                                                    <label>Browse <span class="required"></span></label>
                                                    <input type="file"  name="notice" class="form-control border-none input-flat  bg-ash" placeholder="Notice">
                                            </div>
                                        </div>
                                    </div>
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Notice</button>
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