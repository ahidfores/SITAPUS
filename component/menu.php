<?php session_start();?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
                  <li><a href="./"><i class="fa fa-home"></i> Beranda </a></li>
                  <?php }?>
                  
                  <li ><a><i class="fa fa-book"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
                      <li><a href="?module=nasabah">Data Siswa</a></li>
                      <li><a href="?module=pegawai">Data Pegawai</a></li>
                      <?php }?>
                      <?php if ($_SESSION['leveluser'] == 'user'){ ?>
                        <li><a href="?module=nasabah3">Profil</a></li> 
                     <!-- <li><a href="?module=nasabah2">Cari Data Siswa</a></li>-->
                     
                      <?php }?>
                    </ul>
                  </li>
                  
                  <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
                    <li ><a><i class="fa fa-book"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                  <li><a href="?module=transaksi"><i class="fa fa-dollar"></i> T-Tabungan </a> </li>
                 
                  <li><a href="?module=t_infaq"><i class="fa fa-dollar"></i> T-Infaq </a>    </li>
                  </ul>
                  </li>
              

                  <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
                 
                 <li><a  href="?module=sekolah"> <i class="fa fa-book"> </i> Data Sekolah </a></li>
               
               <?php }?>

                   <?php }?>
                  <li><a><i class="fa fa-print"></i> Laporan Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
                      <li><a href="?module=laporan-transaksi"> T-Tabungan</a></li>
                      <li><a href="?module=laporan_transaksi_infaq">T-Infaq</a></li>
                      <?php }?>
                      <?php if ($_SESSION['leveluser'] == 'user'){ ?>
                      <li><a href="?module=laporan_transaksi_nasabah"> T-Tabungan</a></li>
                      <li><a href="?module=laporan_transaksi_infaq_nasabah">T-Infaq</a></li>
                      <?php }?>
                    </ul>
                  </li>
                
                  </ul>
                </li>
                  
               
              </div>
            </div>
