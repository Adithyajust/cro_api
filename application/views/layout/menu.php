 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="<?php echo base_url() ?>assets/admin/dist/img/logo_bg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Onpremise BRICASH</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="<?php echo base_url('profile') ?>" class="d-block"><?php echo $this->session->userdata('nama'); ?>
           <br><small>(<?php echo $this->session->userdata('akses_level'); ?>)</small>
         </a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!-- Dashboard Page -->
         <!--  <li class="nav-item">
            <a href="<?php echo base_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          <?php if ($this->session->userdata('akses_level') == "Admin_atm" || $this->session->userdata('akses_level') == "Admin") { ?>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
             <p>
               Dashboard
               <i class="fas fa-angle-left right"></i>
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo base_url('dashboard/dashboarding') ?>" class="nav-link">
                 <i class="fas fa-circle nav-icon"></i>
                 <p>Dashboard prem Kanca</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url('dashboard') ?>" class="nav-link">
                 <i class="fas fa-circle nav-icon"></i>
                 <p>Tiket O/C Premises</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url('dasher/dash_komkanca') ?>" class="nav-link">
                 <i class="fas fa-circle nav-icon"></i>
                 <p>Dashboard Komplain BRI</p>
               </a>
             </li>
           </ul>
         </li>
          <?php } ?>
         <!-- menu transaksi -->
         <?php if ($this->session->userdata('akses_level') == "Admin") { ?>
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                 Transaksi Admin
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">2</span>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url('Tiket-Premise-Cur') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Open Current Premises</p>
                 </a>
               </li>
               <?php if ($this->session->userdata('idsr') == '' || $this->session->userdata('idsr') == 53) { ?>
                 <li class="nav-item">
                   <a href="<?php echo base_url('tiketflm') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Open Tiket FLM</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('tiket_komplain/komp_month') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Open Tiket Komplain</p>
                   </a>
                 </li>
               <?php } ?>
               <li class="nav-item">
                 <a href="<?php echo base_url('Verifpremis') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Verifikasi Tiket Premises</p>
                 </a>
               </li>
             </ul>
           </li>
           <?php if ($this->session->userdata('idsr') == '' || $this->session->userdata('idsr') == 53) { ?>
             <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-users"></i>
                 <p>
                   Upload Tiket
                   <i class="fas fa-angle-left right"></i>
                   <span class="badge badge-info right">2</span>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                 <li class="nav-item">
                   <a href="<?php echo base_url('tiket_bulkflm') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Upload Tiket Bulk FLM</p>
                   </a>
                 </li>
                 <!-- <li class="nav-item"> -->
                  <!--  <a href="<?php echo base_url('flm_synergy') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Upload GET Bulk FLM</p>
                   </a> -->
                   <!-- <a href="<?php echo base_url('cron') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Upload GET Bulk FLM</p>
                   </a> -->
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('Tiket_bulkomplian') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Upload Tiket Bulk Komplain</p>
                   </a>
                 </li>
               </ul>
             </li>
           <?php } ?>
         <?php } ?>

         <?php if ($this->session->userdata('akses_level') == "Admin_atm") { ?>
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                 Transaksi Admin
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">2</span>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url('tiket_komplain/komp_month') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Open Tiket Komplain</p>
                 </a>
               </li>
             </ul>
           </li>
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                 Upload Tiket
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">2</span>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url('tiket_bulkflm') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Upload Tiket Bulk FLM</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url('Tiket_bulkomplian') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Upload Tiket Bulk Komplain</p>
                 </a>
               </li>
             </ul>
           </li>
         <?php } ?>
         <!-- Menu admin -->
         <!-- menu transaksi -->
         <?php if ($this->session->userdata('akses_level') == "Teknisi") { ?>
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                 Menu Teknisi
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">2</span>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url('Trxpremise') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Job Onpremises</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url('TRX-FLM') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Job FLM</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url('trxkomplain') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Job Komplain BRI</p>
                 </a>
               </li>
             </ul>
           </li>
           <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                 Close Tiket
                 <i class="fas fa-angle-left right"></i>
                 <!-- <span class="badge badge-info right">2</span> -->
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url('trxpremisedone') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Close Onpremises</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url('trxflmdone') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Close FLM</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url('trxkomplaindone') ?>" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Close Komplain</p>
                 </a>
               </li>
             </ul>
           </li>
         <?php } ?>
         <!-- Menu admin -->
         <?php if ($this->session->userdata('akses_level') == "Admin") { ?>
           <?php if ($this->session->userdata('idsr') == '' || $this->session->userdata('idsr') == 53) { ?>
             <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-users"></i>
                 <p>
                   Tabel Master
                   <i class="fas fa-angle-left right"></i>
                   <span class="badge badge-info right">6</span>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                 <li class="nav-item">
                   <a href="<?php echo base_url('project') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Data Project</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('mapping') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Data Mapping Wilayah</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('kanwil') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Data Kanwil</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('user') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Data User</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('mesins') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Data Mesin</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('merk') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Data Merk</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('type') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Data Type</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('Kelola') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Master Kelola</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="<?php echo base_url('services') ?>" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Master Service</p>
                   </a>
                 </li>
               </ul>
             </li>
           <?php } ?>
         <?php } ?>
         <?php if ($this->session->userdata('akses_level') == "Admin") { ?>
           <!-- ---------------------------------------------------------------------- -->
           <!-- PANDUAN SISTEM -->
           <li class="nav-item">
             <a href="<?php echo base_url('panduan') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Buku Panduan
               </p>
             </a>
           </li>
           <!-- <li class="nav-item">
            <a href="<?php echo base_url('qrcode') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                QRcode
              </p>
            </a>
          </li> -->
           <!-- PANDUAN SISTEM -->
           <!-- <li class="nav-item">
             <a href="<?php echo base_url('laporan') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Laporan CRM
               </p>
             </a>
           </li> -->
           <li class="nav-item">
             <a href="<?php echo base_url('Laporancrm') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Laporan CRM
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="<?php echo base_url('cetak_lap') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Cetak Laporan
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="<?php echo base_url('laporan_atm/filter_laporan_atm') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Laporan Komplain ATM
               </p>
             </a>
           </li>
           <!-- --------------------------------------------------------------------------------- -->
         <?php } ?>


         <?php if ($this->session->userdata('akses_level') == "Admin_atm") { ?>
           <!-- ---------------------------------------------------------------------- -->
           <!-- PANDUAN SISTEM -->
           <li class="nav-item">
             <a href="<?php echo base_url('panduan') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Buku Panduan
               </p>
             </a>
           </li>
           <!-- <li class="nav-item">
            <a href="<?php echo base_url('qrcode') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                QRcode
              </p>
            </a>
          </li> -->
           <!-- PANDUAN SISTEM -->
           <li class="nav-item">
             <a href="<?php echo base_url('laporan') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Laporan
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="<?php echo base_url('cetak_lap') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Cetak Laporan
               </p>
             </a>
           </li>
           <!-- --------------------------------------------------------------------------------- -->
         <?php } ?>
         <?php if ($this->session->userdata('akses_level') == "Agent_briit") { ?>
           <!-- ---------------------------------------------------------------------- -->
           <!-- PANDUAN SISTEM -->
           <li class="nav-item">
             <a href="<?php echo base_url('Verifikasi2') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Verifikasi BRIIT
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="<?php echo base_url('Verifikasi3') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Verifikasi Pencarian
               </p>
             </a>
           </li>
           <!-- PANDUAN SISTEM -->
           <li class="nav-item">
             <a href="<?php echo base_url('panduan') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Buku Panduan
               </p>
             </a>
           </li>
           <!-- laporan Briit -->
           <li class="nav-item">
             <a href="<?php echo base_url('laporan_briit') ?>" class="nav-link">
               <i class="nav-icon fas fa-book"></i>
               <p>
                 Laporan
               </p>
             </a>
           </li>
           
           <!-- --------------------------------------------------------------------------------- -->
         <?php } ?>
         <!-- Logout -->
         <li class="nav-item">
           <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>
               Signout
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark"><?php echo $title ?></h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
             <li class="breadcrumb-item active"><?php echo $title ?></li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title"><?php echo $title ?></h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <!-- message sukses -->
               <?php
                if ($this->session->flashdata('Sukses')) {
                ?>

                 <div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <i class="icon fas fa-check"></i>
                   <?php echo $this->session->flashdata('Sukses'); ?>
                 </div>

               <?php } ?>
               <?php echo validation_errors('<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>', '</div>') ?>