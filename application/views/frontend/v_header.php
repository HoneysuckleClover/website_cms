<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= $pengaturan->nama; ?> - <?= $pengaturan->deskripsi; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?= $meta_keyword; ?>">
    <meta name="description" content="<?= $meta_description; ?>">
    <meta name="theme-color" content="#343a40">

    <!-- Favicons -->
    <link rel="icon" href="<?= base_url('gambar/website/'.$pengaturan->logo); ?>">

    <!-- CSS Vendor -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets_frontend/css/styles.css'); ?>">

    <style>
        /* Navbar Translucent & Scroll Effect */
        .navbar-trans {
            background-color: transparent;
            transition: background-color 0.3s ease, padding 0.3s ease;
            padding: 15px 0;
        }

        .navbar.scrolled {
            background-color: rgba(0, 0, 0, 0.85);
            padding: 10px 0;
        }

        /* Navbar Toggler */
        .navbar-toggler span {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px;
            background-color: #fff;
            transition: 0.3s;
        }

        /* Konten tidak tertabrak navbar */
        body {
            padding-top: 0; /* akan di-set otomatis via JS */
        }
    </style>
</head>

<body id="page-top">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md fixed-top navbar-trans" id="mainNav">
        <div class="container">

            <!-- Logo -->
            <img src="<?= base_url('gambar/website/'.$pengaturan->logo); ?>" 
                 width="32" class="mr-2" alt="Logo">

            <a class="navbar-brand" href="#page-top"><?= $pengaturan->nama; ?></a>

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
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('login'); ?>">Login</a></li>
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

    <!-- Navbar Scroll Effect & Padding Otomatis -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nav = document.getElementById("mainNav");
            const navHeight = nav.offsetHeight;
            document.body.style.paddingTop = navHeight + "px";

            window.addEventListener("scroll", function () {
                if (window.scrollY > 50) {
                    nav.classList.add("scrolled");
                } else {
                    nav.classList.remove("scrolled");
                }
            });
        });
    </script>

</body>
</html>
