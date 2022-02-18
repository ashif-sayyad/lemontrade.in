<?php include 'header-top.php';?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <?php $data_info = $this->db->get_where('polls', array('poll_id' => $param2))->result_array();
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
                                        <h4>Poll Information</h4>                                        
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
                                            <th>Start Date</th>
                                            <td><?php echo $row['start_date'];?></td>
                                        </tr>
                                         <tr>
                                            <th>End Date</th>
                                            <td><?php echo $row['end_date'];?></td>
                                        </tr>
                                         <?php   //echo $row['medicine_entries']; 
                                            $ans_entries   = json_decode($row['answers']);
                                            $i = 1;
                                            foreach ($ans_entries as $ans)
                                            { ?>
                                       <tr>
                                           <th class="text-center">Option <?php echo $i++; ?></th>
                                           
                                           <td>
                                               <?php echo $ans->radio;?>
                                                
                                           </td>
                                           

                                        </tr>
                                        
                                        <?php } 
                                        ?>
                                        <tr>
                                            <th>Vote Graph</th>
                                            <td style="width:75%">
                                                <div style="width:50%;" id="highchartdiv"></div>
                                                
                                        </tr>
                                       
                                       
                                    </thead>
                                    
                                </table>                                   
                                    <div class="modal-footer">
                                        <button type="button" onClick="PrintElem('main-content')" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-printer"></i> Print</button>
                                            <!--<button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>-->
                                        </div> 
                                </div>                                
                              
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>
  
  

        <?php include'footer.php';?>
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

<script>
	$(document).ready(function() {
		
Highcharts.chart('highchartdiv', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 40,
            beta: 0
        }
    },
    title: {
        text: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
             credits: {
      enabled: false
  },
    series: [{
        type: 'pie',
        name: 'Percentage',
        data: [ <?php $test_info = $this->admin->get_poll_count($row['poll_id']);
  foreach ($test_info as $row) {     
     $d = $this->admin->get_poll_vote_count($row['poll_id'],$row['vote']);?>   
<?php echo "['".$row['vote']." ( $d ) ',". $d."]";?>,

<?php } ?>
                         
        ]
    }]
});
});
	</script>
</body>

</html>