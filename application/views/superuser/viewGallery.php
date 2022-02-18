<?php $data_info = $this->db->get_where('gallery', array('gallery_id' => $param2))->result_array();
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
                                        <h4>Gallery Information</h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                     <table class="table table-bordered" style="">
                                    <thead>
<!--                                        <tr>
                                            <th>Event</th>
                                            <td><?php echo $this->admin->get_event_name($row['event_id']);?></td>
                                        </tr>-->
                                        <tr>
                                            <th>Album Name</th>
                                            <td><?php echo $row['summary'];?></td>
                                        </tr>
                                           
                                             <?php   //echo $row['medicine_entries']; 
                                            $img_entries   = json_decode($row['media_path']);
                                            $i = 1;
                                            foreach ($img_entries as $img)
                                            { ?>
                                       <tr>
                                           <th class="text-center"><?php echo $i++; ?></th>
                                           
                                           <td>
                                               <a target="_blank" href="<?php echo base_url().'assets/uploads/gallery/'.$img->img;?>">
                                                <img style="width:100%" src="<?php echo base_url().'assets/uploads/gallery/'.$img->img;?>">
                                                 </a>
                                           </td>
                                           

                                        </tr>
                                        
                                        <?php } 
                                        ?>
                                            
<!--                                        <tr>
                                            <th>File</th>
                                            <td><?php if(!empty($row['file'])){ ?>
                                                <a target="_blank" href="<?php echo base_url().'assets/uploads/financials/'.$row['file'];?>">View</a></td>
                                            <?php }else{
                                                echo 'File Not Available';
                                            }?>
                                        </tr>-->
                                       
                                       
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