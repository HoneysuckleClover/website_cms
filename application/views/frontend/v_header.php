<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= $pengaturan->nama; ?> - <?= $pengaturan->deskripsi; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?= $meta_keyword; ?>">
    <meta name="description" content="<?= $meta_description; ?>">
    <meta name="theme-color" content="#343a40">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('gambar/website/'.$pengaturan->logo); ?>">

    <!-- CSS Vendor -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets_frontend/css/styles.css'); ?>">

    <style>
    /* NAVBAR FULL BLACK */
    .navbar-trans {
        background: #000 !important; /* hitam solid */
        padding: 16px 0;
        transition: all 0.25s ease;
    }

    /* Tidak perlu lagi efek scrolled, tapi tetap saya biarkan kalau ingin dipakai */
    .navbar.scrolled {
        background: #000 !important;
        padding: 12px 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    .navbar .nav-link {
        color: #ffffff !important;
        font-weight: 500;
        letter-spacing: 0.3px;
        transition: color 0.25s ease;
    }

    .navbar .nav-link:hover {
        color: #00aaff !important;
    }

    .navbar-brand {
        font-weight: 700;
        color: #fff !important;
        letter-spacing: 0.4px;
    }

    /* Toggle Icon */
    .navbar-toggler span {
        width: 26px;
        height: 3px;
        margin: 5px;
        background: #fff;
        display: block;
        transition: 0.3s;
    }

    body {
        padding-top: 0; /* ditimpa JS */
    }
</style>

</head>

<body id="page-top">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md fixed-top navbar-trans" id="mainNav">
        <div class="container">

            <!-- Logo -->
            <a href="<?= base_url(); ?>" class="d-flex align-items-center text-decoration-none">
                <img src="<?= base_url('gambar/website/'.$pengaturan->logo); ?>" 
                     width="32" class="mr-2" alt="Logo">
                <span class="navbar-brand mb-0"><?= $pengaturan->nama; ?></span>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarDefault" aria-controls="navbarDefault"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('page/tentang-kami'); ?>">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('page/layanan'); ?>">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('page/kontak'); ?>">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('blog'); ?>">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#'); ?>">Login</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- JS Vendor -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- NAVBAR EFFECT -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nav = document.getElementById("mainNav");

            // Atur padding top otomatis
            document.body.style.paddingTop = nav.offsetHeight + "px";

            // Efek scroll
            window.addEventListener("scroll", function () {
                if (window.scrollY > 60) {
                    nav.classList.add("scrolled");
                } else {
                    nav.classList.remove("scrolled");
                }
            });
        });
    </script>

</body>
</html>
