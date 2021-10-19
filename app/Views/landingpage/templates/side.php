<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Pengumuman</h3>
            <?php foreach ($pengumuman as $pengumuman) : ?>
                <div class="media post_item">
                    <div class="media-body">
                        <a href="<?= base_url(); ?>/pengumuman/detailpengumuman/<?= $pengumuman['id_pengumuman']; ?>">
                            <h3><?= $pengumuman['judul_pengumuman']; ?></h3>
                        </a>
                        <p><?= $pengumuman['created_at']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <div class="media post_item">
                <div class="media-body">
                    <a href="<?= base_url(); ?>/pengumuman">
                        <h3>Semua Pengumuman..</h3>
                    </a>
                </div>
            </div>
        </aside>

        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Paket Wisata</h4>
            <?php foreach ($paket as $paket) : ?>
                <div class="media post_item ml-4">
                    <div class="media-body">
                        <a href="<?= base_url(); ?>/paket">
                            <h6 class=""><?= $paket['nama_paket']; ?></h6>
                        </a>
                        <hr class="divider d-none d-md-block">
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>

        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Destinasi Wisata</h4>
            <?php foreach ($wisata as $wisata) : ?>
                <div class="media post_item ml-4">
                    <div class="media-body">
                        <a href="<?= base_url(); ?>/wisata/detailwisata/<?= $wisata['id_wisata']; ?>">
                            <h6 class=""><?= $wisata['nama_wisata']; ?></h6>
                        </a>
                        <hr class="divider d-none d-md-block">
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>
    </div>
</div>