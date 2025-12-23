<section style="padding:100px 20px; background:#f9f9f9; min-height:100vh;">
    <div style="max-width:1100px; margin:auto; text-align:center;">
        <h2 style="font-size:2.2rem; margin-bottom:10px;">Testimonial</h2>
        <p style="color:#777; margin-bottom:50px;">
            Apa kata mereka tentang kami
        </p>

        <?php if(!empty($testimonial)): ?>
        <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px;">
            <?php foreach($testimonial as $t): ?>

            <?php
            if(!empty($t->testimonial_foto) && file_exists(FCPATH.'gambar/testimonial/'.$t->testimonial_foto)){
                $foto = base_url('gambar/testimonial/'.$t->testimonial_foto);
            } else {
                $foto = base_url('assets_frontend/img/user-default.png');
            }
            ?>

            <div style="
                flex:1 1 300px;
                max-width:300px;
                background:#fff;
                padding:30px;
                border-radius:16px;
                box-shadow:0 8px 20px rgba(0,0,0,0.08);
                text-align:center;
            ">
                <img src="<?= $foto ?>"
                     style="width:90px;height:90px;border-radius:50%;object-fit:cover;margin-bottom:20px;">

                <p style="font-style:italic;color:#555;">
                    “<?= $t->testimonial_isi ?>”
                </p>

                <h4 style="margin-top:18px;font-weight:600;">
                    <?= $t->testimonial_nama ?>
                </h4>
            </div>

            <?php endforeach; ?>
        </div>

        <div style="margin-top:50px;">
            <?= $this->pagination->create_links(); ?>
        </div>

        <?php else: ?>
            <p style="color:#777;">Belum ada testimonial.</p>
        <?php endif; ?>
    </div>
</section>
