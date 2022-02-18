<?php $society_info = $this->db->get_where('society', array('society_id' => $param2))->result_array();
 foreach ($society_info as $row) {
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
                                        <h4>Society Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Logo</th>
                                            <td><img height="50" src="<?php echo base_url();?>assets/uploads/logo/<?php echo $row['logo'];?>"></td>
                                        </tr>
                                        <tr>
                                            <th>Society Name</th>
                                            <td><?php echo $row['society_name'];?></td>
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
                                            <th>Space Alloted</th>
                                            <td><?php echo $row['space_allotted'];?></td>
                                        </tr>
                                        <tr>
                                            <th>No.of Users</th>
                                            <td><?php echo $row['no_of_users'];?></td>
                                        </tr>                                        
                                        <tr>
                                            <th>Super User Name</th>
                                            <td><?php echo $row['user_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact No.</th>
                                            <td><?php echo $row['mobile'];?></td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $row['email'];?></td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Address</th>
                                            <td><?php echo $row['address'];?></td>
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