<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard_admin') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fa fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($menu == 'dashboard'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard_admin') ?>">  <!--buat kasih link isi sesuai direktori-->
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            
            <!-- Nav Item - Tables -->
            <li class="nav-item <?php if($menu == 'barang'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('admin/data_barang') ?>">     <!--buat kasih link isi sesuai direktori-->
                    <i class="fas fa-database"></i>    <!--ganti icon data barang pake database-->
                    <span>Data Barang</span></a>
            </li>
            <li class="nav-item <?php if($menu == 'pelanggan'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('admin/data_pelanggan') ?>">    <!--buat kasih link isi sesuai direktori-->
                    <i class="fas fa-fw fa-users"></i>    <!--ganti icon invoice barang pake file-invoice-->
                    <span>Data Pelanggan</span></a>
            </li>
            <li class="nav-item <?php if($menu == 'invoice'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('admin/invoice') ?>">    <!--buat kasih link isi sesuai direktori-->
                    <i class="fas fa-fw fa-file-invoice"></i>    <!--ganti icon invoice barang pake file-invoice-->
                    <span>Pesanan</span></a>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    <div class="navbar">

                        <li class="nav-item no-arrow mx-1">
                            <a class="nav-link" title="Keranjang Belanja" href="<?php echo base_url('admin/invoice/filter') ?>" >
                                <i class="fas fa-bell fa-fw" aria-hidden="true"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $jumlah_menunggu ?></span>
                            </a>
                            
                        </li>


                            <div class="topbar-divider d-none d-sm-block"></div>

                            <ul class="na navbar-nav navbar-right">
                                <?php if($this->session->userdata('username')) { ?>
                                    <li><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
                                    <li class="ml-2"><?php echo anchor('auth/logout','Logout') ?></li>
                                <?php } else { ?>
                                    <li><?php echo anchor('auth/login','Login') ?></li>

                                <?php } ?>
                                
                            </ul>
                        </div>   

                    </ul>

                </nav>