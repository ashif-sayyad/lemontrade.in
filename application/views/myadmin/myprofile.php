
<?php include 'header-top.php';?>

<body>

    <!-- # sidebar -->
    <?php include 'sidebar.php';?>
    <!-- /# sidebar -->


    <!-- # header -->
    <?php include 'header.php';?>
    <!-- /# header -->
    
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
               <!---page title-->
                <?php include 'page-title.php';?>
                <!---/page-title--->
                <!-- /# row -->
                <section id="main-content">
                     <!---system messages---->                    
                    <?php include 'system_msgs.php';?>
                    <!---/system messages---->
                    <?php foreach($admin_info as $row){?>
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="user-profile">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="user-photo m-b-30">
                                                    <img class="img-responsive" src="<?php echo base_url();?>assets/uploads/profile/<?php echo $row->profile_pic;?>" onerror="this.onerror=null;this.src='<?php echo base_url();?>mypanel/assets/img/logo.png';" alt="Admin Image Not Set" />
                                                </div>
                                                <div class="user-work">
                                                    <div class="work-content">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Adminity/popup/myadmin/changeAdminImage/<?php echo $row->admin_id;?>');"><i class="ti-image"></i> Change Image</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="user-profile-name"><?php echo $row->first_name.' '.$row->last_name;?></div>
                                                <div class="user-Location"><i class="ti-location-pin"></i> <?php echo $row->city;?>, <?php echo $row->state;?></div>
                                                <div class="user-job-title">Administrator</div>
                                               <div class="custom-tab user-profile-tab">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tabpanel" data-toggle="tab">Profile Setting</a></li>
                                                         <li role="presentation" class=""><a href="#2" aria-controls="1" role="tabpanel" data-toggle="tab">Password Setting</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane active" id="1">
                                                            <div class="contact-information">
                                                                <div class="user-job-title">Contact information</div>
                                                                <div class="phone-content">
                                                                    <span class="contact-title">Phone:</span>
                                                                    <span class="phone-number"><?php echo $row->mobile;?></span>
                                                                </div>
                                                                <div class="address-content">
                                                                    <span class="contact-title">Address:</span>
                                                                    <span class="mail-address"><?php echo $row->address;?>-<?php echo $row->pincode;?>, <?php echo $row->city;?>, <?php echo $row->state;?></span>
                                                                </div>
                                                                <div class="email-content">
                                                                    <span class="contact-title">Email:</span>
                                                                    <span class="contact-email"><?php echo $row->email;?></span>
                                                                </div>
                                                                <div class="website-content">
                                                                    <span class="contact-title">Website:</span>
                                                                    <span class="contact-website"><?php echo $row->website;?></span>
                                                                </div>
                                                                <div class="skype-content">
                                                                    <span class="contact-title">Skype:</span>
                                                                    <span class="contact-skype"><?php echo $row->skype_id;?></span>
                                                                </div>
                                                            </div>
                                                            <div class="basic-information">
                                                                <div class="user-job-title">Basic information</div>
                                                                <div class="birthday-content">
                                                                    <span class="contact-title">Birthday:</span>
                                                                    <span class="birth-date"><?php echo $row->DOB;?></span>
                                                                </div>
                                                                <div class="gender-content">
                                                                    <span class="contact-title">Gender:</span>
                                                                    <span class="gender"><?php echo $row->gender;?></span>
                                                                </div>
                                                            </div>
                                                             <button type="button" class="btn btn-primary" data-toggle="modal" onclick="showProfileModal('<?php echo base_url();?>Adminity/popup/myadmin/changeAdminProfile/<?php echo $row->admin_id;?>');"><i class="ti-pencil-alt"></i> Upadate Profile</button>
                                                        </div>
                                                          <div role="tabpanel" class="tab-pane" id="2">
                                                              <form action="<?php echo base_url();?>Adminity/profile/updateAdminPassword/<?php echo $row->admin_id;?>" method="post">
                                                            <div class="contact-information">
                                                                <div class="user-job-title">Change Password</div>
                                                                <div class="phone-content">
                                                                    <div class="col-lg-4">
                                                                        <div class="basic-form">
                                                                            <div class="form-group">
                                                                        <span class="contact-title">Current Password:</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                    
                                                                    <div class="col-lg-8">
                                                                        <div class="basic-form">
                                                                            <div class="form-group">
                                                                                <input type="password" name="old_password" id="old_password" required="" class="form-control" placeholder="Current Password"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="phone-content">
                                                                    <div class="col-lg-4">
                                                                        <div class="basic-form">
                                                                            <div class="form-group">
                                                                    <span class="contact-title">New Password:</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <div class="basic-form">
                                                                            <div class="form-group">
                                                                                <input type="password" name="password" id="password" required="" class="form-control" placeholder="New Password"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="phone-content">
                                                                    <div class="col-lg-4">
                                                                        <div class="basic-form">
                                                                            <div class="form-group">
                                                                    <span class="contact-title">Confirm Password:</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <div class="basic-form">
                                                                            <div class="form-group">
                                                                                <input type="password" name="confirm" id="confirm" required="" class="form-control" placeholder="Confirm Password"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary" onclick=""><i class="ti-key"></i> Change Password</button>
                                                            </div>
                                                              </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                
                    <?php } ?>
                    <!-- /# row -->
                    <!--FOOTER CONTENTS--->
                     <?php include 'footer-contents.php';?>
                    <!---/FOOTER CONTENTS-->
                </section>
            </div>
        </div>
    </div>



     <!-- # footer -->
    <?php include 'footer.php';?>
    <!-- /# footer -->

    <script>
       $(document).ready(function() {
           function hidetab(){    
            $('#mssg').hide();
          }
            setTimeout(hidetab,4000);
       });
    </script>
</body>


</html>