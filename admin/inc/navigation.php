<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo base_url ?>admin" class="brand-link text-sm">
    <!-- Customize the logo and its size -->
    <img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 2.5rem; height: 2.5rem; max-height: unset">
    <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
  </a>

  <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
    <!-- ...existing code... -->

    <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2" alt="User Image" style="height: 2rem; object-fit: cover">
        </div>
        <div class="info">
          <a href="<?php echo base_url ?>admin/?page=user" class="d-block"><?php echo ucwords($_settings->userdata('firstname') . ' ' . $_settings->userdata('lastname')) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Customize the sidebar items/icons as desired -->
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-chart-bar"></i> <!-- Customize the icon here -->
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Contents</li>
          <li class="nav-item dropdown">
            <a href="<?php echo base_url ?>admin/?page=about" class="nav-link nav-about">
              <i class="nav-icon fas fa-info"></i> <!-- Customize the icon here -->
              <p>
                About
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="<?php echo base_url ?>admin/?page=education" class="nav-link nav-education">
              <i class="nav-icon fas fa-graduation-cap"></i> <!-- Customize the icon here -->
              <p>
                Educational Attainment
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="<?php echo base_url ?>admin/?page=work" class="nav-link nav-work">
              <i class="nav-icon fas fa-briefcase"></i> <!-- Customize the icon here -->
              <p>
                Work
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="<?php echo base_url ?>admin/?page=project" class="nav-link nav-project">
              <i class="nav-icon fas fa-tasks"></i> <!-- Customize the icon here -->
              <p>
                Project
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="<?php echo base_url ?>admin/?page=contact" class="nav-link nav-contact">
              <i class="nav-icon fas fa-id-card-alt"></i> <!-- Customize the icon here -->
              <p>
                Contact
              </p>
            </a>
          </li>

          <!-- Volunteer Experience Section -->
          <li class="nav-item dropdown">
            <a href="<?php echo base_url ?>admin/?page=volunteringexperience" class="nav-link nav-volunteer">
              <i class="nav-icon fas fa-hands-helping"></i> <!-- Customize the icon here -->
              <p>
                Volunteer Experience
              </p>
            </a>
          </li>
          </ul>

          <div class="Bottom">
            <hr>
            
        
            <a href="<?php echo base_url ?>help-center" class="nav-link nav-help">
            <i class="nav-icon fas fa-question-circle"></i> <!-- Customize the icon here -->
                Help Center
             </a>
            </li>

          <!-- Logout Section -->
          
            <a href="<?php echo base_url ?>admin/login" class="nav-link nav-logout">
              <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Customize the icon here -->
              Logout
            </a>
          </li>
          </div>
      
      </nav>
    </div>
  </div>
</aside>
