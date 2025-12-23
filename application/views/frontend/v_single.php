<!-- INTRO SECTION -->
<div class="intro intro-single route bg-image" 
     style="background-image: url('<?= base_url(); ?>assets_frontend/img/stats-bg.jpg');">

  <div class="intro-overlay"></div>

  <div class="intro-content d-flex align-items-center">
    <div class="container text-center">

      <h2 class="intro-title mb-3">Detail Artikel</h2>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= base_url('blog'); ?>">Berita</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Artikel</li>
        </ol>
      </nav>

    </div>
  </div>
</div>
<!-- END INTRO SECTION -->


<!-- BLOG DETAIL CONTENT -->
<section class="page-section py-5">
  <div class="container">
    <div class="row">

      <!-- MAIN CONTENT -->
      <div class="col-md-8">

        <?php if (empty($artikel)) { ?>
          <div class="text-center py-5">
            <h4 class="text-muted">Artikel tidak ditemukan</h4>
          </div>
        <?php } ?>

        <?php foreach ($artikel as $a) { ?>
        <article class="page-article mb-4">

          <!-- Thumbnail -->
          <?php if (!empty($a->artikel_sampul)) { ?>
            <div class="post-thumb mb-3">
              <img src="<?= base_url('gambar/artikel/' . $a->artikel_sampul); ?>" 
                   class="img-fluid rounded" 
                   alt="<?= $a->artikel_judul; ?>">
            </div>
          <?php } ?>

          <!-- Header -->
          <header class="mb-4 text-center">
            <h1 class="page-title"><?= $a->artikel_judul; ?></h1>
            <div class="title-line"></div>

            <ul class="list-inline mt-3">
              <li class="list-inline-item">
                <span class="ion-ios-person"></span> <?= $a->pengguna_nama; ?>
              </li>
              <li class="list-inline-item">
                <span class="ion-pricetag"></span>
                <a href="<?= base_url('kategori/' . $a->kategori_slug); ?>">
                  <?= $a->kategori_nama; ?>
                </a>
              </li>
            </ul>
          </header>

          <!-- Article Content -->
          <div class="article-content">
            <?= $a->artikel_konten ? html_entity_decode($a->artikel_konten) : ''; ?>
          </div>

        </article>
        <?php } ?>

      </div>

      <!-- SIDEBAR -->
      <div class="col-md-4">
        <?php $this->load->view('frontend/v_sidebar'); ?>
      </div>

    </div>
  </div>
</section>
<!-- END BLOG DETAIL CONTENT -->



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

/* PAGE SECTION */
.page-section {
    background: #f7f7f7;
}

/* ARTICLE BOX */
.page-article {
    background: #fff;
    padding: 35px 30px;
    border-radius: 8px;
    box-shadow: 0 3px 18px rgba(0,0,0,0.08);
}

/* TITLE */
.page-title {
    font-size: 32px;
    font-weight: 700;
    color: #111;
}

/* Garis kecil di bawah judul */
.title-line {
    width: 70px;
    height: 4px;
    background: #00aaff;
    margin: 0 auto;
    border-radius: 3px;
}

/* Article Content */
.article-content p {
    font-size: 17px;
    line-height: 1.7;
    color: #444;
    margin-bottom: 18px;
}
</style>
