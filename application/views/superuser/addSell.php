<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/sell/addSell" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                  
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Summary <span class="required">*</span></label>
                                                    <input type="text"  name="summary" required="" class="form-control border-none input-flat  bg-ash" placeholder="Summary">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Type <span class="required">*</span></label>
                                                    <select id="mode" class="form-control border-none input-flat  bg-ash" name="type">
                                                        <option value="Sell">Sell</option>
                                                        <option value="Buy">Buy</option>
                                                    </select>    
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Days <span class="required">*</span></label>
                                                <br>
                                                <input type='radio' value="5" name='days'> 5 Days
                                                <input type='radio' value="10" name='days'> 10 Days
                                            </div>
                                        </div>
                                     </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control border-none input-flat bg-ash"  placeholder="Enter Description" rows="2" name="description"></textarea>
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
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Buy/Sell</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

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