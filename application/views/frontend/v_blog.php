<!-- Intro Section -->
<div class="intro intro-single route bg-image"
     style="background-image: url('<?= base_url('assets_frontend/img/overlay-bg.jpg'); ?>')">

    <div class="overlay-mf"></div>

    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">

                <h2 class="intro-title mb-4">Artikel Blog</h2>

                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('blog'); ?>">Berita</a>
                    </li>
                    <li class="breadcrumb-item active">Artikel</li>
                </ol>

            </div>
        </div>
    </div>

</div>
<!-- End Intro Section -->


<!-- Blog Section -->
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">

            <!-- Blog Content -->
            <div class="col-md-8">

                <?php foreach ($artikel as $a) { ?>
                <div class="post-box">

                    <!-- Thumbnail -->
                    <div class="post-thumb">
                        <?php if ($a->artikel_sampul != "") { ?>
                            <img src="<?= base_url('gambar/artikel/'.$a->artikel_sampul); ?>"
                                 class="img-fluid"
                                 alt="<?= $a->artikel_judul ?>">
                        <?php } ?>
                    </div>

                    <!-- Meta & Title -->
                    <div class="post-meta">
                        <a href="<?= base_url($a->artikel_slug); ?>">
                            <h1 class="article-title"><?= $a->artikel_judul; ?></h1>
                        </a>

                        <ul>
                            <li>
                                <span class="ion-ios-person"></span>
                                <a href="#"><?= $a->pengguna_nama; ?></a>
                            </li>

                            <li>
                                <span class="ion-pricetag"></span>
                                <a href="<?= base_url($a->kategori_slug); ?>">
                                    <?= $a->kategori_nama; ?>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <?php } ?>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <?= $this->pagination->create_links(); ?>
                </nav>

            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>

        </div>
    </div>
</section>
<!-- End Blog Section -->
