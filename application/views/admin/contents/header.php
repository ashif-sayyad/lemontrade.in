<header class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-6">
        <div class="header-left d-flex align-items-center">
          <div class="menu-toggle-btn mr-10">
            <button id="menu-toggle" class="main-btn dark-btn btn-hover">
              <i class="lni lni-chevron-left me-2"></i> मेनु
            </button>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-7 col-6">
        <div class="header-right">
          <!-- profile start -->
          <div class="profile-box ml-15">
            <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="profile-info">
                <div class="info">
                  <h6>असिफ सय्यद</h6>
                  <div class="image">
                    <img src="<?php echo base_url(); ?>themes/images/profile/profile-image.png" alt="" />
                    <span class="status"></span>
                  </div>
                </div>
              </div>
              <i class="lni lni-chevron-down"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
              <li>
                <a href="<?php echo base_url(); ?>profile">
                  <i class="lni lni-user"></i> प्रोफाइल पहा
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>settings"> <i class="lni lni-cog"></i> सेटिंग्ज </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>dashboard/logout"> <i class="lni lni-exit"></i> लॉगऑऊट </a>
              </li>
            </ul>
          </div>
          <!-- profile end -->
        </div>
      </div>
    </div>
  </div>
</header>