<?php $page = $this->session->userdata('page') ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU NAVIGASI</li>
      <li <?php if($page == "home"){ ?> class="active" <?php } ?>>
        <a href="<?php echo site_url('Home') ?>">
          <i class="fa fa-home"></i> <span>Beranda</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Kelola User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('Pemilik') ?>"><i class="fa fa-user-secret"></i>Data Pemilik</a></li>
          <li><a href="<?php echo site_url('Pencari') ?>"><i class="fa fa-user-o"></i>Data Pencari</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>