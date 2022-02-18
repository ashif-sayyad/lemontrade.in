<?php $member_info = $this->db->get_where('members', array('member_id' => $param2))->result_array();
 foreach ($member_info as $row) {
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
                                        <h4>Member Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
                                        <tr>
                                            <th>Member Name</th>
                                            <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Wing</th>
                                            <td><?php echo $row['wing'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Floor No</th>
                                            <td><?php echo $row['floor_no'];?></td>
                                        </tr>
                                         <tr>
                                            <th>Flat Type</th>
                                            <td><?php echo $row['flat_type'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Flat No</th>
                                            <td><?php echo $row['flat_no'];?></td>
                                        </tr>                                        
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $row['email'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td><?php echo $row['mobile'];?></td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Parking Allotted</th>
                                            <td><?php echo $row['parking_allotted'];?></td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Parking No</th>
                                            <td><?php echo $row['parking_no'];?></td>
                                        </tr>
                                        
                                         <tr>
                                            <th>Owner</th>
                                            <td><?php echo $row['owner'];?></td>
                                        </tr>
<!--                                         <tr>
                                            <th>Tenant Name</th>
                                            <td><?php echo $row['tenant_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Tenant Email</th>
                                            <td><?php echo $row['tenant_email'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Tenant Mobile</th>
                                            <td><?php echo $row['tenant_mobile'];?></td>
                                        </tr>-->
                                         <tr>
                                            <th>Since</th>
                                            <td><?php echo $row['since'];?></td>
                                        </tr>
                                         <tr>
                                            <th>Police Verified</th>
                                            <td><?php echo $row['police_verified'];?></td>
                                        </tr>
                                         <tr>
                                            <th>Agreement</th>
                                            <td><?php echo $row['agreement'];?></td>
                                        </tr>
                                         <tr>
                                            <th>End Period</th>
                                            <td><?php echo $row['end_period'];?></td>
                                        </tr>
                                         <tr>
                                            <th>No.Of Vehicles</th>
                                            <td><?php echo $row['vehicles'];?></td>
                                        </tr>
                                        <tr>
                                            <table class="table table-bordered table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Two Wheelers
                                                    </th>
                                                    <th>
                                                        Four Wheelers
                                                    </th>
                                                    <th style="text-align: left">
                                                        Bicycles
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <tr>
                                                     <td>
                                                         <?php echo $row['two_wheeler_1'];?>&nbsp;
                                                     </td>
                                                     <td>
                                                        <?php echo $row['four_wheeler_1'];?>&nbsp;
                                                     </td>
                                                     <td>
                                                         <?php echo $row['bicycle_1'];?>&nbsp;
                                                     </td>                                                
                                                </tr>
                                                <tr>
                                                     <td>
                                                         <?php echo $row['two_wheeler_2'];?>&nbsp;
                                                     </td>
                                                     <td>
                                                         <?php echo $row['four_wheeler_2'];?>&nbsp;
                                                     </td>
                                                     <td>
                                                         <?php echo $row['bicycle_2'];?>&nbsp;
                                                     </td>                                                
                                                </tr>
                                                 <tr>
                                                     <td>
                                                         <?php echo $row['two_wheeler_3'];?>&nbsp;
                                                     </td>
                                                     <td>
                                                         <?php echo $row['four_wheeler_3'];?>&nbsp;
                                                     </td>
                                                     <td>
                                                         <?php echo $row['bicycle_3'];?>&nbsp;
                                                     </td>                                                
                                                </tr>
                                                 <tr>
                                                     <td>
                                                         <?php echo $row['two_wheeler_4'];?>&nbsp;
                                                     </td>
                                                     <td>
                                                         &nbsp;
                                                     </td>
                                                     <td>
                                                         &nbsp;
                                                     </td>                                                
                                                </tr>
                                            </tbody>
                                           
                                            
                                        </table>
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