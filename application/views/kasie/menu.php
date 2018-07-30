<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li>
            <a href="<?php echo base_url();?>admin/utama">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Data Absensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/absensi/rekap"><i class="fa fa-circle-o"></i> Rekap Absensi</a></li>
            <li><a href="<?php echo base_url();?>admin/absensi/masuk"><i class="fa fa-circle-o"></i> Absensi Masuk</a></li>
            <li><a href="<?php echo base_url();?>admin/absensi/pulang"><i class="fa fa-circle-o"></i> Absensi Pulang</a></li>
            <li><a href="<?php echo base_url();?>admin/absensi/terlambat"><i class="fa fa-circle-o"></i> Absensi Terlambat</a></li>
            <li><a href="<?php echo base_url();?>admin/absensi/kosong"><i class="fa fa-circle-o"></i> Absensi Kosong</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Data Lembur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/spkl"><i class="fa fa-circle-o"></i> Approve SPKL</a></li>
            <li><a href="<?php echo base_url();?>admin/rpkl"><i class="fa fa-circle-o"></i> Approve RPKL</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Data Cuti</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/cuti/approve_admin"><i class="fa fa-circle-o"></i> Approve Cuti</a></li>
            <li><a href="<?php echo base_url();?>admin/cuti/rekap"><i class="fa fa-circle-o"></i> Rekapitulasi Cuti</a></li>
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
            <li><a href="<?php echo base_url();?>admin/upah/rekap"><i class="fa fa-circle-o"></i> Rekap</a></li>
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
            <li><a href="<?php echo base_url();?>admin/penilaian1"><i class="fa fa-circle-o"></i> Penilaian User</a></li>
            <li><a href="<?php echo base_url();?>admin/penilaian2"><i class="fa fa-circle-o"></i> Penilaian SHU</a></li>
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
              <a href="<?php echo base_url();?>admin/karyawan/profile"><i class="fa fa-circle-o"></i> Data Pribadi</a>
            </li>
            <li>
              <a href="<?php echo base_url();?>admin/karyawan/keluarga"><i class="fa fa-circle-o"></i> Keluarga</a>
            </li>
            <li>
              <a href="<?php echo base_url();?>admin/karyawan/kelengkapan"><i class="fa fa-circle-o"></i> Kelengkapan</a>
            </li>
            <li>
              <a href="<?php echo base_url();?>admin/karyawan/pelatihan"><i class="fa fa-circle-o"></i> Pelatihan</a>
            </li>
          </ul>
        </li>

        <!--Logout-->
        <li>
          <a href="<?php echo base_url();?>admin/utama/logout">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>

      </ul>