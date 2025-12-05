<aside class="sidebar">

    <!-- Search Widget -->
    <div class="widget-sidebar mb-4 p-3 rounded bg-white shadow-sm">
        <h5 class="sidebar-title">Search</h5>
        <?php echo form_open(base_url() . 'search'); ?>
        <div class="input-group mt-2">
            <input type="text" name="cari" class="form-control" placeholder="Cari artikel...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="ion-ios-search-strong"></i></button>
            </div>
        </div>
        </form>
    </div>

    <!-- Artikel Terbaru -->
    <div class="widget-sidebar mb-4 p-3 rounded bg-white shadow-sm">
        <h5 class="sidebar-title">Artikel Terbaru</h5>
        <ul class="list-unstyled mt-2">
            <?php
            $artikel = $this->db->query("
                SELECT * FROM artikel, pengguna, kategori
                WHERE artikel_status = 'publish'
                AND artikel_author = pengguna_id
                AND artikel_kategori = kategori_id
                ORDER BY artikel_id DESC
                LIMIT 5
            ")->result();
            foreach ($artikel as $a) {
            ?>
            <li class="mb-2">
                <a href="<?= base_url() . $a->artikel_slug; ?>" class="sidebar-link"><?= $a->artikel_judul; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>

    <!-- Halaman -->
    <div class="widget-sidebar mb-4 p-3 rounded bg-white shadow-sm">
        <h5 class="sidebar-title">Halaman</h5>
        <ul class="list-unstyled mt-2">
            <?php
            $halaman = $this->m_data->get_data('halaman')->result();
            foreach ($halaman as $h) {
            ?>
            <li class="mb-2">
                <a href="<?= base_url() . 'page/' . $h->halaman_slug; ?>" class="sidebar-link"><?= $h->halaman_judul; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>

    <!-- Kategori -->
    <div class="widget-sidebar mb-4 p-3 rounded bg-white shadow-sm">
        <h5 class="sidebar-title">Kategori</h5>
        <ul class="list-unstyled mt-2">
            <?php
            $kategori = $this->m_data->get_data('kategori')->result();
            foreach ($kategori as $k) {
            ?>
            <li class="mb-2">
                <a href="<?= base_url() . 'kategori/' . $k->kategori_slug; ?>" class="sidebar-link"><?= $k->kategori_nama; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>

</aside>

<style>
.sidebar {
    max-width: 300px;
    width: 100%;
}

/* Card widget */
.widget-sidebar {
    background-color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.widget-sidebar:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

/* Widget title */
.sidebar-title {
    font-weight: 700;
    font-size: 1.1rem;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
    color: #007bff;
}

/* Sidebar link */
.sidebar-link {
    color: #333;
    text-decoration: none;
    display: block;
    transition: color 0.3s;
}

.sidebar-link:hover {
    color: #007bff;
    text-decoration: underline;
}

/* List spacing */
.widget-sidebar ul li {
    margin-bottom: 10px;
}

/* Responsive */
@media(max-width:991.98px){
    .sidebar { max-width: 100%; margin-top: 20px; }
}
</style>
