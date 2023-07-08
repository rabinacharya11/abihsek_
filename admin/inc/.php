<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url ?>admin" class="brand-link text-sm">
    <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 2.5rem;height: 2.5rem;max-height: unset">
    <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2" alt="User Image" style="height: 2rem;object-fit: cover">
      </div>
      <div class="info">
        <a href="<?php echo base_url ?>admin/?page=user" class="d-block"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="./" class="nav-link nav-home">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li> 
        <li class="nav-header">Contents</li>
        <li class="nav-item">
          <a href="<?php echo base_url ?>admin/?page=about" class="nav-link nav-about">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>About</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url ?>admin/?page=education" class="nav-link nav-education">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>Educational Attainment</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url ?>admin/?page=work" class="nav-link nav-work">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>Work</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url ?>admin/?page=project" class="nav-link nav-project">
            <i class="nav-icon fas fa-tasks"></i>
            <p>Project</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url ?>admin/?page=contact" class="nav-link nav-contact">
            <i class="nav-icon fas fa-id-card"></i>
            <p>Contact</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $(document).ready(function(){
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    page = page.split('/');
    page = page[0];
    if(s != '')
      page = page + '_' + s;

    if($('.nav-link.nav-'+page).length > 0){
      $('.nav-link.nav-'+page).addClass('active');
      if($('.nav-link.nav-'+page).hasClass('tree-item')){
        $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active');
        $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open');
      }
      if($('.nav-link.nav-'+page).hasClass('nav-is-tree')){
        $('.nav-link.nav-'+page).parent().addClass('menu-open');
      }
    }
  });
</script>
