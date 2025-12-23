<!-- INTRO SECTION -->
<div class="intro intro-single route bg-image" 
     style="background-image: url(<?= base_url(); ?>assets_frontend/img/services.jpg);">

  <div class="intro-overlay"></div>

  <div class="intro-content d-flex align-items-center">
    <div class="container text-center">

      <h2 class="intro-title mb-3">Halaman</h2>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Halaman</li>
        </ol>
      </nav>

    </div>
  </div>
</div>
<!-- END INTRO SECTION -->


<!-- BLOG / PAGE CONTENT -->
<section class="page-section py-5">
  <div class="container">

    <!-- Not Found Message -->
    <?php if (count($halaman) == 0) { ?>
      <div class="text-center py-5">
        <h3 class="text-muted">Halaman tidak ditemukan</h3>
      </div>
    <?php } ?>

    <!-- Loop Konten Halaman -->
    <?php foreach ($halaman as $h) { ?>
      <article class="page-article">

        <header class="text-center mb-4">
          <h1 class="page-title"><?= $h->halaman_judul; ?></h1>
          <div class="title-line"></div>
        </header>

        <div class="page-content">
          <?= $h->halaman_konten; ?>
        </div>

      </article>
    <?php } ?>

  </div>
</section>
<!-- END BLOG / PAGE CONTENT -->


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
    background: rgba(0,0,0,0.65); /* overlay lebih gelap dan elegan */
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

/* PAGE CONTENT */
.page-section {
    background: #f7f7f7;
}

.page-article {
    background: #fff;
    padding: 40px 35px;
    border-radius: 8px;
    box-shadow: 0 3px 18px rgba(0,0,0,0.08);
}

.page-title {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #111;
}

/* Garis kecil di bawah judul */
.title-line {
    width: 70px;
    height: 4px;
    background: #00aaff;
    margin: 0 auto 20px;
    border-radius: 3px;
}

.page-content {
    font-size: 17px;
    color: #333;
    line-height: 1.7;
}
</style>
