<?php $data_info = $this->db->get_where('selling', array('selling_id' => $param2))->result_array();
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
                                        <h4>Buy/Sell Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Summary</th>
                                            <td><?php echo $row['summary'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><?php echo $row['description'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td><?php echo $row['type'];?></td>
                                        </tr>
                                         <tr>
                                            <th>Posted On</th>
                                            <td><?php echo $row['posted_on'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Days</th>
                                            <td><?php echo $row['days'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Posted Till</th>
                                            <td><?php echo $row['posted_till'];?></td>
                                        </tr>
                                       <tr>
                                            <th>Image</th>
                                            <td><?php if(!empty($row['image'])){ ?>
                                                <a target="_blank" href="<?php echo base_url().'assets/uploads/selling/'.$row['image'];?>">View</a></td>
                                            <?php }else{
                                                echo 'Image Not Available';
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