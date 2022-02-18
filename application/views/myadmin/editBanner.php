<?php $banners_info = $this->db->get_where('banners', array('banner_id' => $param2))->result_array();
 foreach ($banners_info as $row) {
?>
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                        <form action="<?php echo base_url();?>Adminity/banners/editBanner/<?php echo $row['banner_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Banner Name <span class="required">*</span></label>
                                                    <input type="text"  name="banner_name" value="<?php echo $row['banner_name'];?>"  required="" class="form-control border-none input-flat  bg-ash" placeholder="Banner Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Start Date<span class="required">*</span></label>
                                                    <input type="date"  name="start_date" value="<?php echo $row['start_date'];?>"  required="" class="form-control border-none input-flat  bg-ash" placeholder="Start Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>End Date <span class="required">*</span></label>
                                                    <input type="date"  name="end_date" value="<?php echo $row['end_date'];?>"  required="" class="form-control border-none input-flat  bg-ash" placeholder="End Date">
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
                                                         
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Banner</button>
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
 <?php } ?>