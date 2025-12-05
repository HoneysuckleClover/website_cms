<!-- Footer Section -->
<footer class="footer bg-dark text-light pt-5 pb-4">
    <div class="container text-center">

        <!-- Social Icons -->
        <div class="socials mb-3">
            <ul class="list-inline">
                <?php if (!empty($pengaturan->link_facebook)) : ?>
                    <li class="list-inline-item">
                        <a href="<?= $pengaturan->link_facebook ?>" target="_blank" class="social-icon">
                            <i class="ion-social-facebook"></i>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($pengaturan->link_instagram)) : ?>
                    <li class="list-inline-item">
                        <a href="<?= $pengaturan->link_instagram ?>" target="_blank" class="social-icon">
                            <i class="ion-social-instagram"></i>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($pengaturan->link_twitter)) : ?>
                    <li class="list-inline-item">
                        <a href="<?= $pengaturan->link_twitter ?>" target="_blank" class="social-icon">
                            <i class="ion-social-twitter"></i>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($pengaturan->link_github)) : ?>
                    <li class="list-inline-item">
                        <a href="<?= $pengaturan->link_github ?>" target="_blank" class="social-icon">
                            <i class="ion-social-github"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Copyright -->
        <p class="mb-1">&copy; <?= date("Y") ?> <strong><?= $pengaturan->nama ?></strong>. All Rights Reserved.</p>

        <!-- Credits -->
        <p class="mb-0">Designed by <a href="https://bootstrapmade.com/" target="_blank" class="text-light">BootstrapMade</a></p>

    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<style>
.footer {
    background-color: #111;
    color: #ddd;
}

.footer a {
    color: #ddd;
    text-decoration: none;
    transition: color 0.3s;
}

.footer a:hover {
    color: #007bff;
}

.socials ul {
    padding: 0;
    margin: 0;
}

.socials ul li {
    display: inline-block;
    margin: 0 8px;
}

.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #222;
    color: #fff;
    transition: all 0.3s;
    font-size: 18px;
}

.social-icon:hover {
    background-color: #007bff;
    color: #fff;
    transform: translateY(-3px);
}

.back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #007bff;
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.3s;
    z-index: 999;
}

.back-to-top:hover {
    background: #0056b3;
}
</style>
