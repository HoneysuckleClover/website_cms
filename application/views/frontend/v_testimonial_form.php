<section style="
    padding:100px 20px;
    min-height:100vh;
    background:#f9f9f9;
">
    <div style="
        max-width:600px;
        margin:auto;
        background:#fff;
        padding:35px;
        border-radius:16px;
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
    ">
        <h2 style="text-align:center; margin-bottom:10px;">
            Kirim Testimonial
        </h2>
        <p style="text-align:center; color:#777; margin-bottom:30px;">
            Ceritakan pengalaman Anda bersama kami
        </p>

        <form action="<?= base_url('testimonial/kirim') ?>"
              method="post"
              enctype="multipart/form-data">

            <!-- Nama -->
            <label>Nama</label>
            <input type="text" name="nama" required
                   placeholder="Nama lengkap Anda"
                   style="width:100%; padding:12px;
                          margin:8px 0 18px;
                          border-radius:8px;
                          border:1px solid #ddd;">

            <!-- Isi -->
            <label>Testimonial</label>
            <textarea name="isi" required
                      placeholder="Tuliskan pengalaman Anda..."
                      style="width:100%; padding:12px;
                             height:120px;
                             margin:8px 0 18px;
                             border-radius:8px;
                             border:1px solid #ddd;"></textarea>

            <!-- Foto -->
            <label>Foto (opsional)</label>
            <input type="file" name="foto" accept="image/*"
                   style="margin-bottom:25px;">

            <!-- Tombol -->
            <button type="submit"
                    style="
                      width:100%;
                      padding:14px;
                      background:#007bff;
                      color:#fff;
                      border:none;
                      border-radius:30px;
                      font-size:1rem;
                      cursor:pointer;
                    ">
                Kirim Testimonial
            </button>
        </form>
    </div>
</section>
