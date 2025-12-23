<!-- INTRO SECTION -->
<div class="intro intro-single route bg-image" 
     style="background-image: url('<?= base_url(); ?>assets_frontend/img/background.jpg');">

  <div class="intro-overlay"></div>

  <div class="intro-content d-flex align-items-center">
    <div class="container text-center">

      <h2 class="intro-title mb-3">Detail Portfolio</h2>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= base_url(); ?>">Portofolio</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
      </nav>

    </div>
  </div>
</div>
<!-- END INTRO SECTION -->


<!-- PORTFOLIO DETAIL SECTION -->
<section class="page-section py-5" id="portfolio-detail">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-8">

        <?php if (!empty($portfolio)): 
            $p = $portfolio[0];
        ?>

        <!-- ALERT JIKA DRAFT -->
        <?php if(strtolower($p->portfolio_status) != 'publish'): ?>
          <div class="alert alert-warning text-center">
            Portofolio belum dipublikasikan.
          </div>
        <?php endif; ?>

        <article class="page-article mb-4">

          <!-- Judul -->
          <header class="text-center mb-4">
            <h1 class="page-title"><?= $p->portfolio_judul ?></h1>
            <div class="title-line"></div>

            <p class="text-muted mt-2" style="font-size:15px;">
              <?= $p->kategori_nama ?: 'Uncategorized'; ?>
            </p>
          </header>

          <!-- Gambar -->
          <?php if (!empty($p->portfolio_gambar) && file_exists(FCPATH."gambar/portfolio/".$p->portfolio_gambar)): ?>
            <div class="post-thumb mb-4 text-center">
              <img src="<?= base_url('gambar/portfolio/'.$p->portfolio_gambar); ?>" 
                   alt="<?= $p->portfolio_judul; ?>" 
                   class="img-fluid rounded">
            </div>
          <?php elseif(!empty($p->portfolio_gambar)): ?>
            <div class="post-thumb mb-4 text-center">
              <span class="text-warning">Gambar tidak ditemukan</span>
            </div>
          <?php endif; ?>

          <!-- Deskripsi -->
          <div class="article-content" style="font-size:17px; line-height:1.75; color:#444;">
            <?= nl2br($p->portfolio_deskripsi); ?>
          </div>

        </article>

        <?php else: ?>
          <div class="text-center py-5">
            <h4 class="text-muted">Portfolio tidak ditemukan.</h4>
          </div>
        <?php endif; ?>

      </div>

    </div>
  </div>
</section>
<!-- END PORTFOLIO DETAIL -->


<!-- STYLE – SAME DESIGN SYSTEM AS BLOG/PAGE -->
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
.intro-content { position: relative; z-index: 2; }
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
.breadcrumb a { color: #ddd; transition: 0.25s; }
.breadcrumb a:hover { color: #00aaff; }
.breadcrumb-item.active { color: #fff; }

/* PAGE SECTION */
.page-section {
    background: #f7f7f7;
}

/* CONTENT BOX */
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

/* GARIS BIRU */
.title-line {
    width: 70px;
    height: 4px;
    background: #00aaff;
    margin: 0 auto;
    border-radius: 3px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .intro-title { font-size: 34px; }
    .page-title { font-size: 26px; }
}
</style>
