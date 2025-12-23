<!-- FOOTER -->
<footer class="footer-section pt-5 pb-4">
    <div class="container text-center">

        <!-- Social Icons -->
        <div class="footer-social mb-4">
            <ul class="list-inline">

                <?php if (!empty($pengaturan->link_facebook)) : ?>
                <li class="list-inline-item">
                    <a href="<?= $pengaturan->link_facebook ?>" target="_blank" class="fsocial">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (!empty($pengaturan->link_instagram)) : ?>
                <li class="list-inline-item">
                    <a href="<?= $pengaturan->link_instagram ?>" target="_blank" class="fsocial">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (!empty($pengaturan->link_twitter)) : ?>
                <li class="list-inline-item">
                    <a href="<?= $pengaturan->link_twitter ?>" target="_blank" class="fsocial">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (!empty($pengaturan->link_github)) : ?>
                <li class="list-inline-item">
                    <a href="<?= $pengaturan->link_github ?>" target="_blank" class="fsocial">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>

        <!-- Copyright -->
        <p class="mb-1 small">
            &copy; <?= date("Y") ?> <strong><?= $pengaturan->nama ?></strong>. All Rights Reserved.
        </p>

        <!-- Credits -->
        <p class="mb-0 small text-muted">
            Designed by <a href="https://bootstrapmade.com/" target="_blank" class="footer-credit">BootstrapMade</a>
        </p>

    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="backtotop">
    <i class="fas fa-chevron-up"></i>
</a>

<style>
/* FOOTER BASE */
.footer-section {
    background: #0f0f0f;
    color: #ccc;
    border-top: 1px solid rgba(255,255,255,0.08);
}

.footer-section p {
    color: #ccc;
}

.footer-credit {
    color: #ffffff;
    text-decoration: none;
}

.footer-credit:hover {
    color: #00aaff;
}

/* SOCIAL ICONS */
.fsocial {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    margin: 0 6px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    color: #fff;
    font-size: 18px;
    transition: all 0.35s ease;
}

.fsocial:hover {
    background: #00aaff;
    color: #fff;
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0,170,255,0.35);
}

/* BACK TO TOP */
.backtotop {
    position: fixed;
    bottom: 24px;
    right: 24px;
    width: 42px;
    height: 42px;
    background: #00aaff;
    color: #fff;
    font-size: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 999;
    transition: all 0.35s ease;
    box-shadow: 0 4px 12px rgba(0,170,255,0.35);
}

.backtotop:hover {
    background: #0088cc;
    transform: translateY(-3px);
}
</style>
