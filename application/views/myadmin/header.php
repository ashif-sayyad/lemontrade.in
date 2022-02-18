<?php include 'modal.php';?>
<div class="header">
        <div class="pull-left">
            <div class="logo"><a href="<?php echo base_url();?>Adminity"><img style="height: 50px;margin-top: 3%;" src="<?php echo base_url();?>mypanel/assets/img/logo.png" alt="Smart Residency" /></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>

                <li class="header-icon dib">
                    <img class="avatar-img" src="<?php echo base_url();?>assets/uploads/profile/<?php echo $this->session->userdata('log_image');?>" onerror="this.onerror=null;this.src='<?php echo base_url();?>mypanel/assets/img/logo.png';" alt="App Admin" /> 
                    <span class="user-avatar"><?php echo $this->session->userdata('log_admin_name');?> <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">                        
                        <div class="dropdown-content-body">
                            <ul>
                                <!--<li><a href="<?php echo base_url();?>Adminity/profile"><i class="ti-user"></i> <span>Profile</span></a></li>-->
                                <li><a href="<?php echo base_url();?>Adminity/profile"><i class="ti-settings"></i> <span>Profile Setting</span></a></li>
                                <li><a href="<?php echo base_url();?>Adminity/logout"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>