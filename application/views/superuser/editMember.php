<?php $member_info = $this->db->get_where('members', array('member_id' => $param2))->result_array();
 foreach ($member_info as $row) {
?><section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
<form action="<?php echo base_url();?>Superuser/members/editMember/<?php echo $row['member_id'];?>" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>First Name <span class="required">*</span></label>
                                                    <input type="text"  name="first_name" value="<?php echo $row['first_name'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="First Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input type="text"  name="last_name" value="<?php echo $row['last_name'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Wing<span class="required">*</span></label>
                                                    <input type="text"  name="wing" value="<?php echo $row['wing'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Wing">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Floor No <span class="required">*</span></label>
                                                    <input type="text"  name="floor_no" value="<?php echo $row['floor_no'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Floor No">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Flat Type <span class="required">*</span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" name="flat_type" required="">
                                                        <option value="1 RK"  <?php if($row['flat_type']=='1 RK'){ echo 'selected'; }?>>1 RK</option>
                                                        <option value="1 BHK" <?php if($row['flat_type']=='1 BHK'){ echo 'selected'; }?>>1 BHK</option>
                                                        <option value="2 BHK" <?php if($row['flat_type']=='2 BHK'){ echo 'selected'; }?>>2 BHK</option>
                                                        <option value="3 BHK" <?php if($row['flat_type']=='3 BHK'){ echo 'selected'; }?>>3 BHK</option>
                                                        <option value="4 BHK" <?php if($row['flat_type']=='4 BHK'){ echo 'selected'; }?>>4 BHK</option>
                                                        <option value="Other" <?php if($row['flat_type']=='Other'){ echo 'selected'; }?>>Other</option>
                                                    </select>                                                    
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Flat No <span class="required">*</span></label>
                                                    <input type="text"  name="flat_no" value="<?php echo $row['flat_no'];?>" required="" class="form-control border-none input-flat  bg-ash" placeholder="Flat No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email"  name="email" value="<?php echo $row['email'];?>" readonly="" required="" class="form-control border-none input-flat  bg-ash" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Mobile <span class="required">*</span></label>
                                                    <input type="text"  name="mobile" value="<?php echo $row['mobile'];?>" readonly="" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Mobile">
                                            </div>
                                        </div>
                                    </div>
                                   
                                   
                                   <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Parking Allotted <span class="required">*</span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" required="" name="parking_allotted">
                                                        <option value="Yes" <?php if($row['parking_allotted']=='Yes'){ echo 'selected'; };?>>Yes</option>
                                                        <option value="No" <?php if($row['parking_allotted']=='No'){ echo 'selected'; };?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Parking No <span class="required"></span></label>
                                                    <input type="text"  name="parking_no" value="<?php echo $row['parking_no'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Parking No">
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Parking Type <span class="required">*</span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" name="parking_type">
                                                        <option value="Open">Open</option>
                                                        <option value="Close">Close</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>No.Of Vehicles <span class="required"></span></label>
                                                   <input type="text"  name="vehicles" value="<?php echo $row['vehicles'];?>" class="form-control border-none input-flat  bg-ash" placeholder="No.Of Vehicles">
                                                    
                                            </div>
                                        </div>
                                    </div>
<!--                                     <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Owner <span class="required">*</span></label>
                                                    <br>
                                                    <input type="radio"  name="owner" id="remove_tanent" required="" <?php if($row['owner']=='Yes'){ echo 'checked'; };?> value="Yes" class="border-none input-flat  bg-ash" placeholder="Owner">Yes
                                                    <input type="radio"  name="owner" id="get_tanent" required="" <?php if($row['owner']=='No'){ echo 'checked'; };?> value="No" class="border-none input-flat  bg-ash" placeholder="Owner">No
                                                    <br><br>
                                            </div>
                                        </div>
                                    </div>-->
                                    <input type="hidden" name="owner" value="<?php echo $row['owner'];?>">
                                    <div class="hid" <?php if($row['owner']=='Yes'){ ?> style="display: none;background: #ccc;" <?php } ?>>
<!--                                    <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Tenant Name <span class="required"></span></label>
                                                    <input type="text"  name="tenant_name" value="<?php echo $row['tenant_name'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Tenant Name">
                                            </div>
                                        </div>
                                    </div>
                                          <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Tenant Email <span class="required"></span></label>
                                                    <input type="email"  name="tenant_email" value="<?php echo $row['tenant_email'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Tenant Email">
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Tenant Mobile <span class="required"></span></label>
                                                    <input type="text"  name="tenant_mobile" value="<?php echo $row['tenant_mobile'];?>" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Tenanat Mobile">
                                            </div>
                                        </div>
                                    </div>-->
                                        <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Since <span class="required"></span></label>
                                                    <input type="month"  name="since" value="<?php echo $row['since'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Since">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Police Verified <span class="required"></span></label>
                                                     <select class="form-control border-none input-flat  bg-ash" name="police_verified">
                                                         <option value="">--Select--</option>
                                                        <option value="Yes" <?php if($row['police_verified']=='Yes'){ echo 'selected'; };?>>Yes</option>
                                                        <option value="No" <?php if($row['police_verified']=='No'){ echo 'selected'; };?>>No</option>
                                                    </select>
                                                   
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Agreement <span class="required"></span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" name="agreement">
                                                        <option value="">--Select--</option>
                                                       <option value="Yes" <?php if($row['agreement']=='Yes'){ echo 'selected'; };?>>Yes</option>
                                                        <option value="No" <?php if($row['agreement']=='No'){ echo 'selected'; };?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>End Period <span class="required">*</span></label>
                                                    <input type="month"  name="end_period" value="<?php echo $row['end_period'];?>" class="form-control border-none input-flat  bg-ash" placeholder="End Period">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                   
                                    <div class="col-md-12">
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
                                                         <input type="text" name="two_wheeler_1" value="<?php echo $row['two_wheeler_1'];?>" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 1" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="four_wheeler_1" value="<?php echo $row['four_wheeler_1'];?>" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Four Wheeler 1" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="bicycle_1" value="<?php echo $row['bicycle_1'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Bicycle 1" />
                                                     </td>                                                
                                                </tr>
                                                <tr>
                                                     <td>
                                                         <input type="text" name="two_wheeler_2" value="<?php echo $row['two_wheeler_2'];?>" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 2" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="four_wheeler_2" value="<?php echo $row['four_wheeler_2'];?>" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Four Wheeler 2" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="bicycle_2" value="<?php echo $row['bicycle_2'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Bicycle 2" />
                                                     </td>                                                
                                                </tr>
                                                 <tr>
                                                     <td>
                                                         <input type="text" name="two_wheeler_3" value="<?php echo $row['two_wheeler_3'];?>" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 3" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="four_wheeler_3" value="<?php echo $row['four_wheeler_3'];?>" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Four Wheeler 3" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="bicycle_3" value="<?php echo $row['bicycle_3'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Bicycle 3" />
                                                     </td>                                                
                                                </tr>
                                                 <tr>
                                                     <td>
                                                         <input type="text" name="two_wheeler_4" value="<?php echo $row['two_wheeler_4'];?>" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 4" />
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
                                       
                                    </div>  
                                   
                                                                    
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-pencil-alt"></i> Update</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

 <?php }?>
<script type="text/javascript">
    $("#get_tanent").click(function(){		
    if ($(this).is(':checked')== true) {
        $.post("<?php echo base_url();?>superuser/loadeditTenant", {  }, function(data){
             	$(".hid").html(data);              
            });
            $(".hid").show();
    } else {
            $(".hid").hide();
            $(".hid").html('');
    }	
		
});
$("#remove_tanent").click(function(){		
    if ($(this).is(':checked')== true) {
            $(".hid").hide();
             $(".hid").html('');
    } else {
            $(".hid").show();
    }	
		
});
    </script>
