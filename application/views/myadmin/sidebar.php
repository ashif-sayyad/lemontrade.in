<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                     <li class="label">App Admin</li>
                     <?php if($page_title=='Dashboard'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Dashboard </a>
                             <ul>
                                <li>
                                    <a href="<?php echo base_url();?>"><i class="ti-home"></i> Dashboard</a>
                                </li>
                            </ul>
                       
                    </li>
                    
                     <!--<li class="label">Basic</li>-->
                   
                        <?php if($page_title=='Society'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Adminity/society"><i class="fa fa-building-o"></i>Society</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Adminity/society"><i class="fa fa-building-o"></i>Society</a>
                                </li>
                            </ul>
                            </li>
                            
                    <!--         <?php if($page_title=='Members'){?>
                           <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="#"><i class="ti-user"></i>Members</a>
                                 <ul>
                                <li>
                                    <a href="#"><i class="ti-user"></i>Members</a>
                                </li>
                            </ul>
                            </li>-->
                            
                            
                            <?php if($page_title=='Manage Banners'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Adminity/banners"><i class="ti-gallery"></i>Manage Banners</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Adminity/banners"><i class="ti-gallery"></i>Manage Banners</a>
                                </li>
                            </ul>
                            </li> 
                            <?php if($page_title=='Manage Ads'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Adminity/ads"><i class="ti-layout-media-center-alt"></i>Manage Ad's</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Adminity/ads"><i class="ti-layout-media-center-alt"></i>Manage Ad's</a>
                                </li>
                            </ul>
                            </li>
                                                                
                     <li class="label">My Profile</li>
                      <?php if($page_title=='Profile Setting'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Adminity/profile" class="">
                            <i class="ti-settings"></i> Profile Setting</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Adminity/profile"><i class="ti-settings"></i> Profile Setting</a>
                                </li>
                            </ul>
                    </li>
                   
                    <li><a href="<?php echo base_url();?>Adminity/logout"><i class="ti-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>