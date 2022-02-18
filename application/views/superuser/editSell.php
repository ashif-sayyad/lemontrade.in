<?php $data_info = $this->db->get_where('selling', array('selling_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?>
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                    <form action="<?php echo base_url();?>Superuser/sell/editSell/<?php echo $row['selling_id'];?>" method="post" enctype="multipart/form-data">   
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
                                                    <label>Type <span class="required">*</span></label>
                                                    <select  id="mode" class="form-control border-none input-flat  bg-ash" name="type">
                                                        <option value="Sell" <?php if($row['type'] =='Sell'){echo 'selected';}?>>Sell</option>
                                                        <option value="Buy" <?php if($row['type'] =='Buy'){echo 'selected';}?>>Buy</option>
                                                    </select>    
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
                                    
                                    <div class="col-md-6" id="imgs">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Image <span class="required"></span></label>
                                                    <input type="file"  name="image"  class="form-control border-none input-flat  bg-ash" placeholder="Image">
                                            </div>
                                        </div>
                                    </div>
                                   
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update Buy/Sell</button>
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

    
    <script type="text/javascript">
           
$('#mode').change(function(){
    $mode = $('#mode').val();
    if($mode=='Buy'){
        $('#imgs').hide();
    }else if($mode=='Sell'){
        $('#imgs').show();
    }
});
</script>