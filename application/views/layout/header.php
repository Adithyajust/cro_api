<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url() ?>" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('panduan') ?>" class="nav-link">Panduan Sistem</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-success" href="<?php echo base_url('profile') ?>">
          <i class="fas fa-user"></i> <?php echo $this->session->userdata('nama'); ?> 
          ( <?php echo $this->session->userdata('akses_level'); ?> )
        </a>
      </li>
      <li class="nav-item text-danger">
        <a class="nav-link text-danger" href="<?php echo base_url('login/logout') ?>">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->