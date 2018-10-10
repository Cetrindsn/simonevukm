<!--SIDENAV-->

           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                     <li>
                        <a href="<?php echo site_url('Welcome/manajer_index') ?>"><i class="fa fa-desktop"></i> Dasbor</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> Anggota<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url('manajer/anggota')?>">Daftar Anggota</a>
                            </li>
                        </ul>
                      </li>
                    <li>
                        <a href="#"><i class="fa fa-star"></i> Nilai<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="<?php echo site_url('manajer/nilai'); ?>">Nilai Anggota Divisi</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('manajer/chart'); ?>">Keaktifan Anggota Divisi</a>
                            </li>
                        </ul>
                      </li>

                    <li>
                        <a href="#"><i class="fa fa-calendar-o"></i> Kegiatan Umum<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url('manajer/kegiatan'); ?>">Daftar Kegiatan Umum</a>
                            </li>
                        </ul>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-gavel"></i> Pelatihan Divisi<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="<?php echo site_url('manajer/pelatihan'); ?>">Daftar Pelatihan Divisi</a>
                              </li>
                          </ul>
                        </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
