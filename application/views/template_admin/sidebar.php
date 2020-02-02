
    <!-- Sidebar -->
    <?php if($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) : ?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BPS ADMIN MONITORING</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if($this->uri->segment(1) == "home") : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('home'); ?>">
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
          <?php if($this->uri->segment(1) != "home" &&  $this->uri->segment(1) != "listkegiatan" &&  $this->uri->segment(1) != "profile" && $this->uri->segment(1) != "update" && $this->uri->segment(1) != "detailkegiatan" && $this->uri->segment(1) != "editpejabat" && $this->uri->segment(1) != "editadmin" && $this->uri->segment(1) != "editseksi" && $this->uri->segment(1) != "editkegiatan" && $this->uri->segment(1) != "editjabatan" && $this->uri->segment(1) != "editmitra" && $this->uri->segment(1) != "edituser") : ?>
          <li class="nav-item active">
          <?php else :?> 
          <li class="nav-item"> 
          <?php endif;?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Kelola Data</span>
        </a>
        <?php if($this->uri->segment(1) != "home" &&  $this->uri->segment(1) != "listkegiatan" &&  $this->uri->segment(1) != "profile" && $this->uri->segment(1) != "update" && $this->uri->segment(1) != "detailkegiatan" && $this->uri->segment(1) != "editpejabat" && $this->uri->segment(1) != "editadmin" && $this->uri->segment(1) != "editseksi" && $this->uri->segment(1) != "editkegiatan" && $this->uri->segment(1) != "editjabatan" && $this->uri->segment(1) != "editmitra" && $this->uri->segment(1) != "edituser") :?>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
        <?php else : ?>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
        <?php endif; ?>
          <?php if($this->session->userdata('id_role') == 1) : // master : ?>
            <?php // $i biasa tanpa => ambil value dari key $i => ambil keynya saja
            foreach($listmenu as $key => $value) :?>
              <?php if($this->uri->segment(1) == $value) : ?>
                <a class="collapse-item active" href="<?= base_url($value); ?>"><i class="fas fa-fw fa-user-plus"></i> <?= $key ?></a>
              <?php else : ?>
                <a class="collapse-item" href="<?= base_url($value); ?>"><i class="fas fa-fw fa-user-plus"></i> <?= $key ?></a>
              <?php endif;?>
            <?php endforeach; ?>

          <?php else : // ROLE ADMIN?>
            <?php  // $i biasa tanpa => ambil value dari key, $i => ambil keynya saja
              foreach($listmenu as $key => $value) :?>
              <?php if($key != "Kelola Admin") : ?>
                <?php if($this->uri->segment(1) == $value) :?>
                  <a class="collapse-item active" href="<?= base_url($value); ?>"><i class="fas fa-fw fa-user-plus"></i> <?= $key ?></a>
                <?php else : ?>
                  <a class="collapse-item" href="<?= base_url($value); ?>"><i class="fas fa-fw fa-user-plus"></i> <?= $key ?></a>
              <?php endif; endif; endforeach; ?>
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
      <?php if($this->uri->segment(1) == "listkegiatan") : ?>
      <li class="nav-item active">
      <?php else :?>
      <li class="nav-item">
      <?php endif;?>
        <a class="nav-link" href="<?= base_url('listkegiatan') ?>">
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
