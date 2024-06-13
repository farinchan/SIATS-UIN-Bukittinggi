<section id="portofolio" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h3>Informasi / <span>Berita Alumni</span></h3>
                </div>
                <div class="row">
                    <?php foreach ($listberita as $berita) : ?>
                        <?php
                        $originalDate = $berita->tanggal_posting;
                        $newDate = date("d F Y", strtotime($originalDate));
                        ?>
                        <div class=" col-md-12" data-aos="fade-up" data-aos-delay="100">
                            <div style="height: 200px;" class="member">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="member-img">
                                            <img style="height: 200px; width: 200; object-fit: cover;" src="<?php echo base_url('assets/berita/' . $berita->gambar_berita); ?>" class="img-fluid" alt="">
                                            <div class="social">
                                                <a href="http://twitter.com/share?text=text goes here&url=<?php echo base_url('main/bacaberita/' . $berita->id_berita); ?>"><i class="fab fa-twitter-square"></i></a>
                                                <a target="BLANK" href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $berita->judul_berita; ?>&amp;p[summary]=<?php echo substr(strip_tags($berita->isi_berita), 0, 100); ?>&amp;p[url]=<?php echo base_url('main/bacaberita/' . $berita->id_berita); ?>&amp;&p[images][0]=<?php echo base_url('assets/berita/' . $berita->gambar_berita); ?>"><i class="fab fa-facebook-square"></i></a>
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url('main/bacaberita/' . $berita->id_berita); ?>&title=<?php echo $berita->judul_berita; ?>"><i class="fab fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="member-info">
                                            <a href="<?php echo base_url('main/bacaberita/' . $berita->id_berita); ?>" id="populer"><?php echo $berita->judul_berita; ?></a><br>
                                            <span id="card-donasi"><i class="far fa-calendar-alt"></i> <?php echo $newDate; ?> &bull; <i class="fas fa-bolt"></i> dilihat <?php echo $berita->total_dilihat; ?></span>
                                            <p style="font-style:normal;"><?php echo substr(strip_tags($berita->isi_berita), 0, 100) . "..."; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="col">
                <div class="section-title">
                    <h3>Informasi / <span>Berita Admin</span></h3>
                </div>

                <div class="row">
                    <?php foreach ($listberitaadmin as $berita) : ?>
                        <?php
                        $originalDate = $berita->tanggal_posting;
                        $newDate = date("d F Y", strtotime($originalDate));
                        ?>
                        <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                            <div style="height: 200px;" class="member">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="member-img">
                                            <img style="height: 200px; width: 200; object-fit: cover;" src="<?php echo base_url('assets/berita/' . $berita->gambar_berita); ?>" class="img-fluid rounded" alt="">
                                            <div class="social">
                                                <a href="http://twitter.com/share?text=text goes here&url=<?php echo base_url('main/bacaberita/' . $berita->id_berita); ?>"><i class="fab fa-twitter-square"></i></a>
                                                <a target="BLANK" href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $berita->judul_berita; ?>&amp;p[summary]=<?php echo substr(strip_tags($berita->isi_berita), 0, 100); ?>&amp;p[url]=<?php echo base_url('main/bacaberita/' . $berita->id_berita); ?>&amp;&p[images][0]=<?php echo base_url('assets/berita/' . $berita->gambar_berita); ?>"><i class="fab fa-facebook-square"></i></a>
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url('main/bacaberita/' . $berita->id_berita); ?>&title=<?php echo $berita->judul_berita; ?>"><i class="fab fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="member-info">
                                            <a href="<?php echo base_url('main/beritadmin/' . $berita->id_berita); ?>" id="populer"><?php echo $berita->judul_berita; ?></a><br>
                                            <span id="card-donasi"><i class="far fa-calendar-alt"></i> <?php echo $newDate; ?> &bull; <i class="fas fa-bolt"></i> dilihat <?php echo $berita->total_dilihat; ?></span>
                                            <p style="font-style:normal;"><?php echo substr(strip_tags($berita->isi_berita), 0, 100) . "..."; ?></p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <p style="float: right;"><a href="<?php echo base_url('main/bacaberita') ?>">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a></p>

    </div>

</section>