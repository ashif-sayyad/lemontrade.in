 <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Tenant Name <span class="required">*</span></label>
                                                    <input type="text"  name="tenant_name" required="" value="<?php echo $row['tenant_name'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Tenant Name">
                                            </div>
                                        </div>
                                    </div>
                                          <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Tenant Email <span class="required">*</span></label>
                                                    <input type="email"  name="tenant_email" required="" value="<?php echo $row['tenant_email'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Tenant Email">
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Tenant Mobile <span class="required">*</span></label>
                                                    <input type="text"  name="tenant_mobile" required="" value="<?php echo $row['tenant_mobile'];?>" pattern="[0-9]{10,10}" maxlength="10" minlength="10"  class="form-control border-none input-flat  bg-ash" placeholder="Tenanat Mobile">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Since <span class="required">*</span></label>
                                                    <input type="month"  name="since" required="" value="<?php echo $row['since'];?>" class="form-control border-none input-flat  bg-ash" placeholder="Since">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Police Verified <span class="required">*</span></label>
                                                     <select class="form-control border-none input-flat  bg-ash" required="" name="police_verified">
                                                         <option value="">--Select--</option>
                                                        <option value="Yes" <?php if($row['police_verified']=='Yes'){ echo 'selected'; };?>>Yes</option>
                                                        <option value="No" <?php if($row['police_verified']=='No'){ echo 'selected'; };?>>No</option>
                                                    </select>
                                                   
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                    <label>Agreement <span class="required">*</span></label>
                                                    <select class="form-control border-none input-flat  bg-ash" required="" name="agreement">
                                                        <option value="">--Select--</option>
                                                       <option value="Yes" <?php if($row['agreement']=='Yes'){ echo 'selected'; };?>>Yes</option>
                                                        <option value="No" <?php if($row['agreement']=='No'){ echo 'selected'; };?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>