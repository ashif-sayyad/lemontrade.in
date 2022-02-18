<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <form action="<?php echo base_url();?>Superuser/polls/addPoll" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    
                                    
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Summary <span class="required">*</span></label>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <input type="text"  name="summary" required="" class="form-control border-none input-flat  bg-ash" placeholder="Poll Summary">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Start Date <span class="required">*</span></label>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <input type="date"  name="start_date" value="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>" required="" min="<?php echo date('Y-m-d');?>" class="form-control border-none input-flat  bg-ash" placeholder="Start_date">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>End Date <span class="required">*</span></label>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <input type="date"  name="end_date" required="" min="<?php echo date('Y-m-d');?>" class="form-control border-none input-flat  bg-ash" placeholder="End_date">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12" id="invoice_entry" style="margin-bottom: 10px">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label class="col-md-3">Answer Option <span class="required">*</span></label>
                                                <div  class="col-md-7">                                                                       
                                                    <input type="text" name="anwsers[]" required="" class="form-control border-none input-flat bg-ash" placeholder="Answer Radio Option">
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
                                                    <i class="ti-plus"></i> Add More Option
                                                </button>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Wings <span class="required">*</span></label>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <input type="text"  name="wings" required="" class="form-control border-none input-flat  bg-ash" placeholder="Wing">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Flat Type <span class="required">*</span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" name="for_flatType">
                                                        <option value="1 RK">1 RK</option>
                                                        <option value="1 BHK">1 BHK</option>
                                                        <option value="2 BHK">2 BHK</option>
                                                        <option value="3 BHK">3 BHK</option>
                                                        <option value="4 BHK">4 BHK</option>
                                                        <option value="Other">Other</option>
                                                    </select>    
                                            </div>
                                        </div>
                                    </div>-->
                                    
                                                                        
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Poll</button>
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
<script>

    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry').html();
        //$('#invoice_entry_temp').remove();
    });

    function add_entry()
    {
        
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
    
    </script>
   

 