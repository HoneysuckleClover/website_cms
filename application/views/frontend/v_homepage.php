<!-- Intro Section -->
<section id="home" class="intro" style="background: url('<?= base_url("assets_frontend/img/intro-bg.jpg") ?>') center/cover no-repeat; padding: 150px 0; text-align:center; color:#fff;">
    <div style="background: rgba(0,0,0,0.5); padding:50px 0;">
        <h2 style="font-size:2rem; margin-bottom:15px;">Selamat Datang</h2>
        <h1 style="font-size:3rem; margin-bottom:20px; font-weight:bold;"><?= $pengaturan->nama; ?></h1>
        <p style="font-size:1.2rem;">
            <span class="text-slider-items">CEO DevFolio, Web Developer, Web Designer, Frontend Developer, Graphic Designer</span>
            <strong class="text-slider"></strong>
        </p>
    </div>
</section>

<!-- Services Section -->
<section id="services" style="padding:80px 0; background:#f9f9f9; text-align:center;">
    <h3 style="font-size:2rem; margin-bottom:10px;">Layanan</h3>
    <p style="margin-bottom:40px;">Layanan Yang Kami Tawarkan</p>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px;">
        <?php 
        $layanan = [
            ["ion-monitor", "Web Design"],
            ["ion-code-working", "Web Development"],
            ["ion-camera", "Photography"],
            ["ion-android-phone-portrait", "Responsive Design"],
            ["ion-paintbrush", "Graphic Design"],
            ["ion-stats-bars", "Marketing Services"]
        ];
        foreach ($layanan as $l): ?>
        <div style="flex:1 1 250px; max-width:250px; background:#fff; padding:20px; border-radius:10px; text-align:center;">
            <div style="font-size:2.5rem; color:#007bff; margin-bottom:15px;">
                <i class="<?= $l[0] ?>"></i>
            </div>
            <h4 style="margin-bottom:10px;"><?= $l[1] ?></h4>
            <p style="font-size:0.95rem; color:#555;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, provident vitae!</p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Counter Section -->
<section id="counter" style="padding:60px 0; background: url('<?= base_url("assets_frontend/img/counters-bg.jpg") ?>') center/cover no-repeat; color:#fff; text-align:center;">
    <div style="background: rgba(0,0,0,0.5); padding:50px 0; display:flex; flex-wrap:wrap; justify-content:center; gap:40px;">
        <?php 
        $counter = [
            ["ion-checkmark-round", "450", "WORKS COMPLETED"],
            ["ion-ios-calendar-outline", "15", "YEARS OF EXPERIENCE"],
            ["ion-ios-people", "550", "TOTAL CLIENTS"],
            ["ion-ribbon-a", "36", "AWARD WON"]
        ];
        foreach ($counter as $c): ?>
        <div style="flex:1 1 150px; max-width:150px;">
            <div style="font-size:2rem; margin-bottom:10px;"><i class="<?= $c[0] ?>"></i></div>
            <h2 style="margin:0; font-size:2rem;"><?= $c[1] ?></h2>
            <p style="margin:0; font-size:0.9rem;"><?= $c[2] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" style="padding:80px 0; text-align:center;">
    <h3 style="font-size:2rem; margin-bottom:10px;">Portfolio</h3>
    <p style="margin-bottom:40px;">Proyek-proyek Terbaru Kami</p>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
        <?php for ($i=1; $i<=6; $i++):
            $img = base_url("assets_frontend/img/work-$i.jpg"); ?>
        <div style="flex:1 1 300px; max-width:300px; overflow:hidden; border-radius:10px; position:relative;">
            <img src="<?= $img ?>" alt="Portfolio <?= $i ?>" style="width:100%; display:block; transition:transform 0.3s;">
            <div style="position:absolute; bottom:0; width:100%; background:rgba(0,0,0,0.6); color:#fff; padding:10px; text-align:left;">
                <h4 style="margin:0;">Project Title <?= $i ?></h4>
                <p style="margin:0; font-size:0.85rem;">Web Design / 18 Sep 2018</p>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" style="padding:80px 0; background:#f9f9f9; text-align:center;">
    <h3 style="font-size:2rem; margin-bottom:40px;">Testimonials</h3>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px;">
        <?php 
        $testimonials = [
            ["Fatkhurrochman", "testimonial-2.jpg", "Website yang menarik, dibangun dengan framework CodeIgniter."],
            ["Muhammad Abdul Muin", "testimonial-4.jpg", "Website yang responsive, menggunakan tampilan fleksibel pada semua device."]
        ];
        foreach($testimonials as $t): ?>
        <div style="flex:1 1 300px; max-width:300px; background:#fff; padding:20px; border-radius:10px; text-align:center;">
            <img src="<?= base_url("assets_frontend/img/".$t[1]) ?>" alt="<?= $t[0] ?>" style="width:80px; height:80px; border-radius:50%; margin-bottom:15px;">
            <h4 style="margin-bottom:10px;"><?= $t[0] ?></h4>
            <p style="font-size:0.9rem; color:#555;"><?= $t[2] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" style="padding:80px 0; text-align:center;">
    <h3 style="font-size:2rem; margin-bottom:10px;">Berita</h3>
    <p style="margin-bottom:40px;">Artikel Terbaru Dari Kami</p>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
        <?php foreach($artikel as $a): ?>
        <div style="flex:1 1 300px; max-width:300px; background:#fff; border-radius:10px; overflow:hidden; text-align:left; display:flex; flex-direction:column;">
            <?php if(!empty($a->artikel_sampul)): ?>
            <div style="width:100%; height:180px; overflow:hidden;">
                <img src="<?= base_url("gambar/artikel/$a->artikel_sampul") ?>" 
                     alt="<?= $a->artikel_judul ?>" 
                     style="width:100%; height:100%; object-fit:cover; display:block;">
            </div>
            <?php else: ?>
            <div style="width:100%; height:180px; background:#ddd;"></div>
            <?php endif; ?>
            <div style="padding:15px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <h4 style="margin-bottom:10px; font-size:1.1rem;">
                        <a href="<?= base_url($a->artikel_slug) ?>" style="color:#007bff; text-decoration:none;">
                            <?= $a->artikel_judul ?>
                        </a>
                    </h4>
                    <p style="font-size:0.85rem; color:#555;"><?= substr(strip_tags($a->artikel_isi ?? ''),0,80) ?>...</p>
                </div>
                <span style="font-size:0.8rem; color:#999;">By <?= $a->pengguna_nama ?> | <?= date('d M Y', strtotime($a->artikel_tanggal)) ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
