<!-- v_homepage.php -->

<!-- Intro Section -->
<section id="home" class="intro" style="position:relative; padding:150px 0; text-align:center; color:#fff;">
    <!-- Background Image -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background: url('<?= base_url("assets_frontend/img/testimonials-bg.jpg") ?>') center/cover no-repeat; z-index:1;"></div>
    <!-- Overlay gelap -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5); z-index:2;"></div>

    <!-- Konten teks -->
    <div style="position:relative; z-index:3; padding:50px 20px;">
        <h2 style="font-size:2rem; margin-bottom:15px; color:#fff;">Selamat Datang</h2>
        <h1 style="font-size:3rem; margin-bottom:20px; font-weight:bold; color:#fff;"><?= $pengaturan->nama; ?></h1>
        <p style="font-size:1.2rem; color:#fff;">
            <span id="typing-text" style="color:#fff;"></span>
            <span class="cursor" style="color:#fff;">|</span>
        </p>
    </div>
</section>

<!-- Tambahkan script typing dengan kursor berkedip -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const textItems = [
        "CEO DevFolio",
        "Web Developer",
        "Web Designer",
        "Frontend Developer",
        "Graphic Designer"
    ];
    let index = 0;
    let charIndex = 0;
    let currentText = '';
    let typingSpeed = 100; // kecepatan mengetik
    let pause = 1500; // jeda sebelum ganti teks

    const typingTextEl = document.getElementById('typing-text');

    function type() {
        if(charIndex < textItems[index].length) {
            currentText += textItems[index].charAt(charIndex);
            typingTextEl.textContent = currentText;
            charIndex++;
            setTimeout(type, typingSpeed);
        } else {
            setTimeout(erase, pause);
        }
    }

    function erase() {
        if(charIndex > 0) {
            currentText = currentText.slice(0, -1);
            typingTextEl.textContent = currentText;
            charIndex--;
            setTimeout(erase, typingSpeed / 2);
        } else {
            index = (index + 1) % textItems.length;
            setTimeout(type, 500);
        }
    }

    type();

    // Kursor berkedip
    setInterval(() => {
        const cursor = document.querySelector('.cursor');
        cursor.style.opacity = (cursor.style.opacity == 0 ? 1 : 0);
    }, 500);
});
</script>

<!-- Services Section -->
<section id="services" style="padding:80px 20px; background:#f9f9f9; text-align:center;">
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
        <div style="flex:1 1 250px; max-width:250px; background:#fff; padding:25px; border-radius:12px; text-align:center; transition:transform 0.3s, box-shadow 0.3s; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
            <div style="font-size:2.5rem; color:#007bff; margin-bottom:15px;"><i class="<?= $l[0] ?>"></i></div>
            <h4 style="margin-bottom:10px; font-weight:600;"><?= $l[1] ?></h4>
            <p style="font-size:0.95rem; color:#555;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, provident vitae!</p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Counter Section -->
<section id="counter" style="padding:60px 20px; background: url('<?= base_url("assets_frontend/img/counters-bg.jpg") ?>') center/cover no-repeat; color:#fff; text-align:center;">
    <div style="background: rgba(0,0,0,0.5); padding:50px 20px; display:flex; flex-wrap:wrap; justify-content:center; gap:40px;">
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
<section id="portfolio" style="padding:80px 20px; text-align:center;">
    <h3 style="font-size:2rem; margin-bottom:10px;">Portfolio</h3>
    <p style="margin-bottom:40px;">Proyek-proyek Terbaru Kami</p>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
        <?php if(!empty($portfolio)): ?>
            <?php foreach($portfolio as $p): ?>
            <div style="flex:1 1 300px; max-width:300px; border-radius:12px; overflow:hidden; position:relative; cursor:pointer; transition:transform 0.3s, box-shadow 0.3s; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
                <a href="<?= base_url('portfolio/'.$p->portfolio_slug) ?>" style="display:block; text-decoration:none; color:inherit;">
                    <div style="overflow:hidden;">
                        <img src="<?= base_url("gambar/portfolio/".$p->portfolio_gambar) ?>" 
                             alt="<?= $p->portfolio_judul ?>" 
                             style="width:100%; display:block; transition:transform 0.3s;">
                    </div>
                    <div style="position:absolute; bottom:0; width:100%; background:rgba(0,0,0,0.65); padding:15px; text-align:left;">
                        <h4 style="margin:0; font-size:1.2rem; font-weight:bold; color:#fff;"><?= $p->portfolio_judul ?></h4>
                        <p style="margin:5px 0 0; font-size:0.9rem; color:#ddd;"><?= $p->kategori_nama ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Portfolio belum tersedia.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Portfolio Section -->
<section id="testimonials" style="padding:80px 20px; background:#f9f9f9; text-align:center;">
    <h3 style="font-size:2rem; margin-bottom:40px;">Testimonials</h3>

    <?php if(!empty($testimonial)): ?>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px;">
        <?php foreach($testimonial as $t): ?>

        <?php
        // FOTO AMAN
        if (!empty($t->testimonial_foto) && file_exists(FCPATH.'gambar/testimonial/'.$t->testimonial_foto)) {
            $foto = base_url('gambar/testimonial/'.$t->testimonial_foto);
        } else {
            $foto = base_url('assets_frontend/img/user-default.png');
        }
        ?>

        <div style="
            flex:1 1 280px;
            max-width:280px;
            background:#fff;
            padding:25px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
            text-align:center;
        ">
            <img src="<?= $foto ?>"
                 style="width:80px;height:80px;border-radius:50%;object-fit:cover;margin-bottom:15px;">

            <p style="font-style:italic;color:#555;font-size:.95rem;">
                “<?= word_limiter($t->testimonial_isi, 18) ?>”
            </p>

            <h4 style="margin-top:15px;font-weight:600;color:#333;">
                <?= $t->testimonial_nama ?>
            </h4>
        </div>

        <?php endforeach; ?>
    </div>

    <a href="<?= base_url('testimonial/list') ?>"
       style="
         display:inline-block;
         margin-top:40px;
         padding:12px 30px;
         background:#007bff;
         color:#fff;
         text-decoration:none;
         border-radius:30px;
         font-weight:500;
       ">
       💬 Lihat Semua Testimonial
    </a>

    <a href="<?= base_url('testimonial'); ?>"
   style="
     display:inline-block;
     margin-top:15px;
     padding:12px 30px;
     background:#28a745;
     color:#fff;
     text-decoration:none;
     border-radius:30px;
     font-weight:500;
   ">
   ✍ Kirim Testimoni Anda
    </a>


    <?php else: ?>
        <p style="color:#777;">Belum ada testimonial.</p>
    <?php endif; ?>
</section>


<!-- Blog Section -->
<section id="blog" style="padding:80px 20px; text-align:center;">
    <h3 style="font-size:2rem; margin-bottom:10px;">Berita</h3>
    <p style="margin-bottom:40px;">Artikel Terbaru Dari Kami</p>
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
        <?php if(!empty($artikel)): ?>
            <?php foreach($artikel as $a): ?>
            <div style="flex:1 1 300px; max-width:300px; background:#fff; border-radius:12px; overflow:hidden; text-align:left; display:flex; flex-direction:column; box-shadow:0 5px 15px rgba(0,0,0,0.1); transition:transform 0.3s;">
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
        <?php else: ?>
            <p>Tidak ada artikel terbaru.</p>
        <?php endif; ?>
    </div>
</section>
