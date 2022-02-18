<?php //$event_info = $this->db->get_where('society_events', array('society_id' => $this->session->userdata('log_admin_id'),'is_active'=>1))->result();?>
<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/gallery/addGallery" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
<!--                                    <div class="col-md-12">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label class="col-md-3">Event<span class="required">*</span></label>
                                                    <div  class="col-md-8"> 
                                                        <select required="" name="event_id" class="form-control">
                                                        <option value=''>--Select Event--</option>
                                                        <?php foreach($event_info as $evt){?>
                                                        <option value='<?php echo $evt->event_id;?>'><?php echo $evt->summary;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                                    
                                            </div>
                                        </div>
                                    </div>-->
                                    
                                     <div class="col-md-12">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label class="col-md-3">Album Name <span class="required">*</span></label>
                                                     <div  class="col-md-8"> 
                                                         <input type="text"  name="summary"  required="" maxlength="20" class="form-control border-none input-flat  bg-ash" placeholder="Album Name">
                                                     </div>
                                            </div>
                                        </div>
                                    </div>
                                      
                                    
                                    <div class="col-md-12" id="invoice_entry" style="margin-bottom: 10px">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label class="col-md-3">Upload Image <span class="required">*</span></label>
                                                <div  class="col-md-7">                                                                       
                                                    <input type="file" name="gallery[]" required="" class="form-control border-none input-flat bg-ash" placeholder="Image">
                                                 </div>
                                                <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">
                                                            <i class="ti-trash"></i>
                                                        </button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <center>
                                                    <button type="button" class="btn btn-info"
                                                        onClick="add_entry()">
                                                    <i class="ti-plus"></i> Add More Image
                                                </button>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                     
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                           <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-upload"></i> Upload Gallery</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

   <script>

    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry').html();
        //$('#invoice_entry_temp').remove();
    });
    var count = 0;
    function add_entry()
    {
        if(count < 9) {
        $("#invoice_entry").append(blank_invoice_entry);
        count++;
        }
    }

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
    
    </script>
   

 