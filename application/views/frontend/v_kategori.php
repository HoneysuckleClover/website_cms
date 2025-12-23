<!-- INTRO SECTION -->
<div class="intro intro-single route bg-image" 
     style="background-image: url('<?= base_url(); ?>assets_frontend/img/background.jpg');">

  <div class="intro-overlay"></div>

  <div class="intro-content d-flex align-items-center">
    <div class="container text-center">

      <h2 class="intro-title mb-3">Kategori Artikel</h2>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= base_url('blog'); ?>">Kategori</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Artikel</li>
        </ol>
      </nav>

    </div>
  </div>
</div>
<!-- END INTRO SECTION -->

<!-- Blog Single Section -->
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">

            <!-- Kolom Artikel -->
            <div class="col-md-8">

                <!-- Jika tidak ada artikel -->
                <?php if (count($artikel) == 0) { ?>
                    <center>
                        <h3>Belum Ada Artikel Pada Kategori Ini.</h3>
                    </center>
                <?php } ?>

                <!-- Loop Artikel -->
                <?php foreach ($artikel as $a) { ?>
                    <div class="post-box">

                        <!-- Thumbnail -->
                        <div class="post-thumb">
                            <?php if ($a->artikel_sampul != "") { ?>
                                <img src="<?php echo base_url('gambar/artikel/' . $a->artikel_sampul); ?>"
                                     class="img-fluid"
                                     alt="<?php echo $a->artikel_judul; ?>">
                            <?php } ?>
                        </div>

                        <!-- Informasi Artikel -->
                        <div class="post-meta">
                            <a href="<?php echo base_url($a->artikel_slug); ?>">
                                <h1 class="article-title">
                                    <?php echo $a->artikel_judul; ?>
                                </h1>
                            </a>

                            <ul>
                                <li>
                                    <span class="ion-ios-person"></span>
                                    <a href="#">
                                        <?php echo $a->pengguna_nama; ?>
                                    </a>
                                </li>

                                <li>
                                    <span class="ion-pricetag"></span>
                                    <a href="<?php echo base_url('kategori/' . $a->kategori_slug); ?>">
                                        <?php echo $a->kategori_nama; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                <?php } ?>

                <!-- Pagination -->
                <nav aria-label="Navigasi halaman artikel">
                    <?php echo $this->pagination->create_links(); ?>
                </nav>

            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>

        </div>
    </div>
</section>
<!-- End Blog Single Section -->

<!-- STYLING -->
<style>
/* INTRO SECTION */
.intro-single {
    position: relative;
    background-size: cover;
    background-position: center;
    padding: 130px 0 110px;
    color: #fff;
}
.intro-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.65);
}
.intro-content {
    position: relative;
    z-index: 2;
}
.intro-title {
    font-size: 42px;
    font-weight: 700;
    color: #fff;
}

/* Breadcrumb */
.breadcrumb {
    background: transparent;
    margin: 0;
    font-size: 15px;
}
.breadcrumb a {
    color: #ddd;
    transition: 0.25s;
}
.breadcrumb a:hover {
    color: #00aaff;
}
.breadcrumb-item.active {
    color: #fff;
}

/* PAGE / BLOG LIST */
.page-section {
    background: #f7f7f7;
}
.page-article {
    background: #fff;
    padding: 35px 30px;
    border-radius: 8px;
    box-shadow: 0 3px 18px rgba(0,0,0,0.08);
}
.page-title {
    font-size: 30px;
    font-weight: 700;
    color: #111;
}

/* Garis kecil */
.title-line {
    width: 70px;
    height: 4px;
    background: #00aaff;
    margin: 0 auto;
    border-radius: 3px;
}
</style>

