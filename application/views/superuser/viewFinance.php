<?php $data_info = $this->db->get_where('financials', array('financial_id' => $param2))->result_array();
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
                                        <h4>Financial Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <td><?php echo $row['month'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <td><?php echo $row['year'];?></td>
                                        </tr>
                                       <tr>
                                            <th>Type</th>
                                            <td><?php echo $row['type'];?></td>
                                        </tr>
                                        <tr>
                                            <th>File</th>
                                            <td><?php if(!empty($row['file'])){ ?>
                                                <a target="_blank" href="<?php echo base_url().'assets/uploads/financials/'.$row['file'];?>">View</a></td>
                                            <?php }else{
                                                echo 'File Not Available';
                                            }?>
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