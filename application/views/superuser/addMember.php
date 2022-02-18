<section id="main-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card alert">
<form action="<?php echo base_url();?>Superuser/members/addMember" method="post" enctype="multipart/form-data">   
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>First Name <span class="required">*</span></label>
                                                    <input type="text"  name="first_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="First Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input type="text"  name="last_name" required="" class="form-control border-none input-flat  bg-ash" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Wing<span class="required">*</span></label>
                                                    <input type="text"  name="wing" required="" class="form-control border-none input-flat  bg-ash" placeholder="Wing">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Floor No <span class="required">*</span></label>
                                                    <input type="text"  name="floor_no" required="" class="form-control border-none input-flat  bg-ash" placeholder="Floor No">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Flat Type <span class="required">*</span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" name="flat_type">
                                                        <option value="1 RK">1 RK</option>
                                                        <option value="1 BHK">1 BHK</option>
                                                        <option value="2 BHK">2 BHK</option>
                                                        <option value="3 BHK">3 BHK</option>
                                                        <option value="4 BHK">4 BHK</option>
                                                        <option value="Other">Other</option>
                                                    </select>                                                    
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Flat No <span class="required">*</span></label>
                                                    <input type="text"  name="flat_no" required="" class="form-control border-none input-flat  bg-ash" placeholder="Flat No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email"  name="email" required="" class="form-control border-none input-flat  bg-ash" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Mobile <span class="required">*</span></label>
                                                    <input type="text"  name="mobile" required="" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Mobile">
                                            </div>
                                        </div>
                                    </div>
                                   
                                   
                                   <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Parking Allotted <span class="required">*</span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" name="parking_allotted">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Parking No <span class="required">*</span></label>
                                                    <input type="text"  name="parking_no" class="form-control border-none input-flat  bg-ash" placeholder="Parking No">
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
                                                   <input type="text"  name="vehicles" class="form-control border-none input-flat  bg-ash" placeholder="No.Of Vehicles">
                                                    
                                            </div>
                                        </div>
                                    </div>
<!--                                     <div class="col-md-3">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Owner <span class="required">*</span></label>
                                                    <br>
                                                    <input type="radio"  name="owner" checked="" id="remove_tanent" required="" value="Yes" class="border-none input-flat  bg-ash" placeholder="Owner">Yes
                                                    <input type="radio"  name="owner" required="" id="get_tanent" value="No" class="border-none input-flat  bg-ash" placeholder="Owner">No
                                                    <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hid" style="display: none;background: #ccc;">
                                   
                                    </div>-->
                                   
                                     <input type="hidden" name="owner" value="Yes">
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
                                                         <input type="text" name="two_wheeler_1" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 1" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="four_wheeler_1" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Four Wheeler 1" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="bicycle_1" class="form-control border-none input-flat  bg-ash" placeholder="Bicycle 1" />
                                                     </td>                                                
                                                </tr>
                                                <tr>
                                                     <td>
                                                         <input type="text" name="two_wheeler_2" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 2" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="four_wheeler_2" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Four Wheeler 2" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="bicycle_2" class="form-control border-none input-flat  bg-ash" placeholder="Bicycle 2" />
                                                     </td>                                                
                                                </tr>
                                                 <tr>
                                                     <td>
                                                         <input type="text" name="two_wheeler_3" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 3" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="four_wheeler_3" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Four Wheeler 3" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="bicycle_3" class="form-control border-none input-flat  bg-ash" placeholder="Bicycle 3" />
                                                     </td>                                                
                                                </tr>
                                                 <tr>
                                                     <td>
                                                         <input type="text" name="two_wheeler_4" class="form-control border-none input-flat  bg-ash" maxlength="13" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{4}$" placeholder="Two Wheeler 4" />
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
                                            <button type="submit" class="btn btn-info btn-lg  border-none sbmt-btn"><i class="ti-save"></i> Add Member</button>
                                            <button type="button" class="btn btn-primary btn-lg border-none sbmt-btn" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                                        </div>  
                                   </div>
                                </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    
         
                    
   </section>

<script type="text/javascript">
    $("#get_tanent").click(function(){		
    if ($(this).is(':checked')== true) {            
            //alert('hello');
           $.post("<?php echo base_url();?>superuser/loadTenant", {  }, function(data){
             	$(".hid").html(data);              
            });
            $(".hid").show();    
             
    } else {
            $(".hid").hide();
            $(".hid").html("");
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
