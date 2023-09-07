
<body>
  
  <section class="menu menu2 cid-sfyob7RqwJ" once="menu" id="menu2-l">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.html">
                        <img src="<?= base_url();?>asset/assets/images/ajustatirtamas.png" alt="Mobirise" style="height: 3rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7" href="http://localhost/websms3/">AJUSTA TIRTAMAS</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= base_url('homepage') ?>"><span class="mobi-mbri mobi-mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= base_url('auth') ?>"><span class="mobi-mbri mobi-mbri-cart-full mbr-iconfont mbr-iconfont-btn"></span>
                            Belanja</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= base_url('kontak') ?>"><span class="mobi-mbri mobi-mbri-letter mbr-iconfont mbr-iconfont-btn"></span>Contact</a>
                    </li></ul>
                
                <div class="navbar-buttons mbr-section-btn">
                    <?php if (!$this->session->userdata('id_user')) { ?>
                    <?= $tombollogin; ?>
                    <?php } else { ?>
                      <?=   $tombolprofil; ?>
                    <?php } ?>
                    </div>
            </div>
        </div>
    </nav>
</section>
