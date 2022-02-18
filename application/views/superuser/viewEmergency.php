<?php $data_info = $this->db->get_where('emergency_contact', array('contact_id' => $param2))->result_array();
 foreach ($data_info as $row) {
?>
<style>
        .required{
            color:red;
        }
    </style>
    <section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="card-header m-b-0">
                                        <h4>Contact Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $row['name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact For</th>
                                            <td><?php echo $row['contact_for'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td><?php echo $row['mobile'];?></td>
                                        </tr>
                                         <tr>
                                            <th>Alternate Mobile</th>
                                            <td><?php echo $row['alternate_mobile'];?></td>
                                        </tr>
                                       
                                       
                                    </thead>
                                    
                                </table>                                   
                                    <div class="modal-footer">
                                        <button type="button" onClick="PrintElem('main-content')" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-printer"></i> Print</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div> 
                                </div>                                
                              
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

    <!-- scripit init-->
<?php }?>
<script type="text/javascript">
 function PrintElem(el){
    
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
        
	window.print();
        
	document.body.innerHTML = restorepage;
        window.location.reload();
      // return true;
}
</script>  