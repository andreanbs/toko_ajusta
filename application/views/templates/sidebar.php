<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center 
            justify-content-center" href="<?php echo base_url('dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">AJUSTA TIRTAMAS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($menu == 'dashboard'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                KATEGORI
            </div>

            

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php if($menu == 'tukang'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('kategori/alat_pertukangan') ?>">
                    <i class="fas fa-light fa-hammer"></i>
                    <span>Alat Pertukangan</span></a>
            </li>

             <li class="nav-item <?php if($menu == 'perlengkapan'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('kategori/perlengkapan_safety') ?>">
                   <i class="fas fa-fw fa-thin fa-hammer"></i>
                    <span>Perlengkapan Safety</span></a>
            </li>

            <li class="nav-item <?php if($menu == 'van_belt_mitsuboshi'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('kategori/van_belt_mitsuboshi') ?>">
                    <i class="fas fa-fw fa-solid fa-screwdriver"></i>
                    <span>Van Belt Mitsuboshi</span></a>
            </li>

            <li class="nav-item <?php if($menu == 'bearing'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('kategori/bearing_laher') ?>">
                    <i class="fas fa-fw fa-futbol"></i>
                    <span>Bearing Laher</span></a>
            </li>

            <li class="nav-item <?php if($menu == 'elektrik'){ echo 'active'; }?>">
                <a class="nav-link" href="<?php echo base_url('kategori/electrical') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Electrical</span></a>
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
                    <?php if($menu == 'dashboard'){ ?>
                    <!-- Topbar Search -->
                    <form action="<?php echo base_url('dashboard') ?>"  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control bg-light border-0 small" placeholder="Cari Kategori"
                                aria-label="Search" aria-describedby="basic-addon2" value="<?php if(!empty($_GET['search'])){ echo $_GET['search']; } ?>">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <?php if($menu == 'dashboard'){ ?>    
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form action="<?php echo base_url('dashboard') ?>" class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control bg-light border-0 small"
                                            placeholder="Cari Kategori" aria-label="Search"
                                            aria-describedby="basic-addon2"  value="<?php if(!empty($_GET['search'])){ echo $_GET['search']; } ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <?php } ?>

                        <div class="navbar">
                            <li class="nav-item no-arrow mx-1">
                            <a class="nav-link" title="Riwayat Pembelian" href="<?php echo base_url('dashboard/riwayat_belanja') ?>" >
                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                            </a>
                            
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item no-arrow mx-1">
                            <a class="nav-link" title="Keranjang Belanja" href="<?php if(!empty($this->cart->total_items())) { echo base_url('dashboard/detail_keranjang');  }else{echo '#'; }?>" >
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?= $this->cart->total_items() ?></span>
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
                <!-- End of Topbar -->