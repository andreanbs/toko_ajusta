<div class="container-fluid">   <!--ini adalah class container fluid-->

    <!--paste source code yg udah di copy dari https://getbootstrap.com/docs/5.3/components/carousel/ pilih yang ada indikatornya-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo base_url('assets/img/pertukangan1.jpg') ?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url('assets/img/pertukangan2.jpg') ?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url('assets/img/ajusta.jpg') ?>" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
        data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" 
      data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row text-center mt-4">   <!-- class row supaya 1 baris, tambahin text-center supaya ada di tengah, tambahin margin top mt-4 biar gk mepet-->
        
        <?php foreach ($van_belt_mitsuboshi as $brg) : ?> 

    <!--paste source code yg udah di copy dari https://getbootstrap.com/docs/5.3/components/card/#about-->
            <div class="card ml-3 mb-3" style="width: 16rem;">    <!--ukuran dikecilin jadi 16rem, kasih margin biar gk mepet tambahin ml-3-->
              <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5> <!--masukin nama_brgnya sepatu, rapiin jarak paek mb-1-->
                 <!-- <small><?php echo $brg->keterangan ?></small><br> -->
                <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($brg->harga, 0,',','.')  ?></span>
                <?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?> <!--tambahin btn-sm buat ngecilin ukuran-->
                <?php echo anchor('dashboard/detail/' .$brg->id_brg,'<div class="btn btn-sm btn-success">Detail</div>') ?>
              </div>
            </div>

            <?php endforeach; ?>     
    </div>
</div>