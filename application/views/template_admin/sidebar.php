
    <!-- Sidebar -->
    <?php if($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) : ?>
    <ul class="navku navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BPS ADMIN MONITORING</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
        <?php if($this->session->userdata('id_role') == 1) : ?>
          <i class="fas fa-fw fa-desktop"></i>
          <span>Dashboard</span></a>
        <?php else : ?>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        <?php endif;?>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Navigasi Tambah
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Tambah Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <?php if($this->session->userdata('id_role') == 1) : // master : ?>
            <?php // $i biasa tanpa => ambil value dari key $i => ambil keynya saja
              foreach($listmenu as $key => $value) :?>
                <a class="collapse-item" href="<?= $value ?>"><i class="fas fa-fw fa-user-plus"></i> <?= $key ?></a>
            <?php endforeach; ?>

          <?php else :?>
            <?php  // $i biasa tanpa => ambil value dari key, $i => ambil keynya saja
              foreach($listmenu as $key => $value) :?>
              <?php if($key != "Tambah Admin") : ?>
                  <a class="collapse-item" href="<?= $value ?>"><i class="fas fa-fw fa-user-plus"></i> <?= $key ?></a>
              <?php endif; endforeach; ?>
          <?php endif;?>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        List
      </div>

      <!-- Table Kegiatan -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/dataKegiatan') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel Kegiatan</span></a>
      </li>

      <!-- Logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <?php endif;?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
