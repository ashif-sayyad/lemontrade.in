<?php $data_info = $this->db->get_where('noticeboard', array('notice_id' => $param2))->result_array();
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
                                        <h4>Notice Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Notice No</th>
                                            <td><?php echo $row['notice_no'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Summary</th>
                                            <td><?php echo $row['summary'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Start Date</th>
                                            <td><?php echo $row['start_date'];?></td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td><?php echo $row['end_date'];?></td>
                                        </tr>
                                         <tr>
                                            <th>Description</th>
                                            <td><?php echo $row['description'];?></td>
                                        </tr>
                                        <tr>
                                            <th>File</th>
                                            <td><?php if(!empty($row['file'])){ ?>
                                                <a target="_blank" href="<?php echo base_url().'assets/uploads/notice/'.$row['file'];?>">View</a></td>
                                            <?php }else{
                                                echo 'No File Available';
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