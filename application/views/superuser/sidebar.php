<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                     <li class="label">Super User</li>
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
                            
                            <?php if($page_title=='Members'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/members"><i class="ti-user"></i>Members</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/members"><i class="ti-user"></i>Members</a>
                                </li>
                            </ul>
                            </li>
                            
                            
                            <?php if($page_title=='Notice Board'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/noticeboard"><i class="ti-clipboard"></i>Notice Board</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/noticeboard"><i class="ti-clipboard"></i>Notice Board</a>
                                </li>
                            </ul>
                            </li> 
                            <?php if($page_title=='Management'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/management"><i class="fa fa-users"></i>Management</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/management"><i class="fa fa-users"></i>Management</a>
                                </li>
                            </ul>
                            </li>
                            <?php if($page_title=='Emergency Contact'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/emergency"><i class="ti-mobile"></i>Emergency Contact</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/emergency"><i class="ti-mobile"></i>Emergency Contact</a>
                                </li>
                            </ul>
                            </li>
                            
                            <?php if($page_title=='Society Events'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/events"><i class="ti-bell"></i>Society Events</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/events"><i class="ti-bell"></i>Society Events</a>
                                </li>
                            </ul>
                            </li>
                            
                             <?php if($page_title=='Near By Events'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/nearbyevents"><i class="ti-alarm-clock"></i>Near By Events</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/nearbyevents"><i class="ti-alarm-clock"></i>Near By Events</a>
                                </li>
                            </ul>
                            </li>
                            
                             <?php if($page_title=='Gallery'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/gallery"><i class="ti-gallery"></i>Gallery</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/gallery"><i class="ti-gallery"></i>Gallery</a>
                                </li>
                            </ul>
                            </li>
                            
                            <?php if($page_title=='Complaints'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/complaints"><i class="ti-comment-alt"></i>Complaints</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/complaints"><i class="ti-comment-alt"></i>Complaints</a>
                                </li>
                            </ul>
                            </li> 
                            
                            <?php if($page_title=='Polls'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/polls"><i class="ti-thumb-up"></i>Polls</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/polls"><i class="ti-thumb-up"></i>Polls</a>
                                </li>
                            </ul>
                            </li>
                            
                            <?php if($page_title=='Buy/Sell'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/sell"><i class="ti-shopping-cart-full"></i>Buy/Sell</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/sell"><i class="ti-shopping-cart-full"></i>Buy/Sell</a>
                                </li>
                            </ul>
                            </li>
                            
                             <?php if($page_title=='Payments'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/payments"><i class="fa fa-inr"></i>Payments</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/payments"><i class="fa fa-inr"></i>Payments</a>
                                </li>
                            </ul>
                            </li>
                            
                             <!--<li class="label">Next Phase</li>-->
                             <?php if($page_title=='Financials'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="<?php echo base_url();?>Superuser/financials"><i class="fa fa-inr"></i>Financials</a>
                                 <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/financials"><i class="fa fa-inr"></i>Financials</a>
                                </li>
                            </ul>
                            </li>
                            <?php if($page_title=='Monitor Society'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                                <a href="#"><i class="ti-settings"></i>Monitor Society</a>
                                 <ul>
                                <li>
                                    <a href="#"><i class="ti-settings"></i>Monitor Society</a>
                                </li>
                            </ul>
                            </li>
                            
                     <li class="label">My Profile</li>
                      <?php if($page_title=='Profile Setting'){?>
                            <li class="active">
                            <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>Superuser/profile" class="">
                            <i class="ti-settings"></i> Profile Setting</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url();?>Superuser/profile"><i class="ti-settings"></i> Profile Setting</a>
                                </li>
                            </ul>
                    </li>
                   
                    <li><a href="<?php echo base_url();?>Adminity/logout"><i class="ti-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>