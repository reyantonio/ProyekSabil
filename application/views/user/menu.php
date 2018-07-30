<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li>
            <a href="<?php echo base_url();?>user/utama">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <!--Menu Absensi-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Data Absensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>user/absensi/rekap"><i class="fa fa-circle-o"></i> Rekap Absensi</a></li>
            <li><a href="<?php echo base_url();?>user/absensi/terlambat"><i class="fa fa-circle-o"></i> Absensi Terlambat</a></li>
            <li><a href="<?php echo base_url();?>user/absensi/kosong"><i class="fa fa-circle-o"></i> Absensi Kosong</a></li>
          </ul>
        </li>

        <!--Menu Lembur-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Data Lembur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>user/spkl"><i class="fa fa-circle-o"></i> Pengajuan SPKL</a></li>
            <li><a href="<?php echo base_url();?>user/rpkl"><i class="fa fa-circle-o"></i> Pengajuan RPKL</a></li>
          </ul>
        </li>

        <!--Menu Cuti-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Data Cuti</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url();?>user/cuti/pengajuan"><i class="fa fa-circle-o"></i> Pengajuan</a>
            </li>
            <li>
              <a href="<?php echo base_url();?>user/cuti/rekap"><i class="fa fa-circle-o"></i> Konfirmasi</a>
            </li>
          </ul>
        </li>
        
        <!--Menu Upah-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o"></i> <span>Data Upah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Detail</a></li>
            <li><a href="<?php echo base_url();?>user/upah/rekap"><i class="fa fa-circle-o"></i> Rekap</a></li>
          </ul>
        </li>
        
        <!--Menu Penilaian-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Data Penilaian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>user/penilaian/user"><i class="fa fa-circle-o"></i> Penilaian User</a></li>
            <li><a href="<?php echo base_url();?>user/penilaian/shu"><i class="fa fa-circle-o"></i> Penilaian SHU</a></li>
          </ul>
        </li>

         <!--Menu Karyawan-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-o"></i> <span>Data Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url();?>user/utama/profile"><i class="fa fa-circle-o"></i> Profile</a>
            </li>
            <li>
              <a href="<?php echo base_url();?>user/utama/keluarga"><i class="fa fa-circle-o"></i> Keluarga</a>
            </li>
            <li>
              <a href="<?php echo base_url();?>user/utama/pelatihan"><i class="fa fa-circle-o"></i> Pelatihan</a>
            </li>
          </ul>
        </li>

        <!--Logout-->
        <li>
          <a href="<?php echo base_url();?>user/utama/logout">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>

      </ul>
    
