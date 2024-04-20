<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="<?php echo base_url('main'); ?>">Home</a></li>
                <li>Pekerjaan</li>
            </ol>
            <?php $this->load->view('user/partisi/cariberita.php') ?>
        </div>
    </div>
</section>
<section class="inner-page">
    <div class="container">
        <h2 style="margin-top: -30px;">Selamat Datang <?php echo $_SESSION['nama_session']; ?> </h2>
        <div class="row">
            <div class="col-sm-4">
                <section id="team" class="team section-bg" style="background-color: white;">
                    <div data-aos="fade-up" style="margin-top: -20px;">
                        <?php $this->load->view('user/alumni_dashboard/foto_profil.php'); ?>
                        <div class="card mt-4">
                            <div class="card-header" style="background-color: white;">
                                Menu Alumni
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="<?php echo base_url('main/profil'); ?>" class="list-group-item list-group-item-action" aria-current="true">
                                        Data Pribadi
                                    </a>
                                    <a href="<?php echo base_url('main/pekerjaan'); ?>" class="list-group-item list-group-item-action">Data Tracer<span style="float: right;" class="badge bg-primary rounded-pill"></span></a>

                                    <a href="<?php echo base_url('main/berita'); ?>" class="list-group-item list-group-item-action">Kontribusi Berita <span style="float: right;" class="badge bg-primary rounded-pill"><?php echo $total_berita ?></span></a>
                                    <a href="<?php echo base_url('main/pesan'); ?>" class="list-group-item list-group-item-action">Pesan Pribadi <?php if ($pesan_belum_terbaca == 0) {
                                                                                                                                                    } else { ?><span style="float: right;" class="badge bg-primary rounded-pill"><?php echo "New"; ?></span> <?php } ?></a>
                                    <a href="<?php echo base_url('main/alumnidonasi') ?>" class="list-group-item list-group-item-action">Kontribusi Donasi <span style="float: right;" class="badge bg-primary rounded-pill"><?php echo $total_donasi ?></span></a>
                                    <a href="<?php echo base_url('main/alumnilisttopik') ?>" class="list-group-item list-group-item-action">Topik Dibuat <span style="float: right;" class="badge bg-primary rounded-pill"><?php echo $totaltopik; ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <div class="col-sm-8">
                <section id="team" class="team section-bg" style="background-color: white;">
                    <div data-aos="fade-up" style="margin-top: -20px;">
                        <div class="card">
                            <div class="card-header" style="background-color: white;">
                                Data Tracer Saya
                                <a href="#" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php if ($pekerjaan_tersedia) : ?>
                                        <!-- <?php echo implode(" ", $pekerjaan);  ?> -->
                                        <tbody>
                                            <tr>
                                                <th scope="row">NIA</th>
                                                <td><?php echo $data_profil[0]->nisn ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1. Apakah saudara/i sudah mendapatkan pekerjaan ?</th>
                                                <td><?php echo $pekerjaan['mendapatkan_pekerjaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2. Mohon dituliskan nama lembaga/instansi tempat saudara bekerja?</th>
                                                <td><?php echo $pekerjaan['tempat_kerja']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3. Dari mana saudara mendapatkan informasi tentang pekerjaan pertama yang saudara peroleh ?</th>
                                                <td><?php echo $pekerjaan['sumber_informasi_pekerjaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4. Mohon menuliskan nama lengkap atasan langsung anda dilokasi kerja</th>
                                                <td><?php echo $pekerjaan['nama_atasan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5. Mohon menuliskan Kontak atasan langsung yang anda yang dapat dihubungi dilokasi kerja</th>
                                                <td>

                                                    <b>Whatsapp Atasan : </b><?php echo $pekerjaan['wa_atasan']; ?>

                                                    <br>
                                                    <b>Email Atasan : </b><?php echo $pekerjaan['email_atasan']; ?>

                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">6. Setelah lulus, berapa lama saudara menunggu untuk mendapatkan pekerjaan pertama?</th>
                                                <td><?php echo $pekerjaan['lama_menganggur']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7. Seberapa besat tingkat relevansi bidang kerja dengan latar belakang pendidikan anda.</th>
                                                <td><?php echo $pekerjaan['relevansi_bidang_kerja']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8. Berapa gaji Saudara per bulan untuk pekerjaan pertama ?</th>
                                                <td><?php echo $pekerjaan['gaji_pertama_bekerja']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9. Permasalahan apa saja yang saudara hadapi dalam rangka memperoleh pekerjaan?</th>
                                                <td><?php echo $pekerjaan['permasalahan_pekerjaan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10. Mohon dituliskan narasikan singkat terkait bidang kerja anda sekarang?</th>
                                                <td><?php echo $pekerjaan['narasi_bidang_kerja'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11. Berikan masukan saudara/i untuk peningkatan kualitas skill mahasiswa sesuai pengalaman anda bekerja saat ini!</th>
                                                <td><?php echo $pekerjaan['masukan_skill_mahasiswa']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12. Berikan masukan saudara/i untuk peningkatan kualitas prodi PTIK ke depannya..?</th>
                                                <td><?php echo $pekerjaan['masukan_prodi_ptik']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">113. Berikan penilaian terhadap kondisi penyelenggaraan pendidikan dan pembelajaran pada program studi (kampus) Saudara. Diukur atas dasar kebutuhan di Sekolah</th>
                                                <td>1 = sangat rendah; 5 = sangat tinggi</td>
                                                <table style="margin-left: 50px;">
                                                    <th>
                                                    <td style="width: 30px;">1</td>
                                                    <td style="width: 30px;">2</td>
                                                    <td style="width: 30px;">3</td>
                                                    <td style="width: 30px;">4</td>
                                                    <td style="width: 30px;">5</td>
                                                    </th>
                                                    <tr>
                                                        <td>a. Kegiatan akademik secara umum</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_a'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_a'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_a'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_a'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_a'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Isi mata kuliah</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_b'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_b'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_b'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_b'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_b'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Kompetensi dosen</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_c'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_c'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_c'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_c'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_c'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Pelayanan/bimbingan Dosen terhadap Mahasiswa</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_d'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_d'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_d'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_d'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_d'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Isi mata kuliah teori</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_e'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_e'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_e'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_e'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_e'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Isi mata kuliah praktek</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_f'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_f'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_f'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_f'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_f'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>g. Kualitas pembelajaran</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_g'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_g'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_g'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_g'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_g'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>h. Sistem penilaian</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_h'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_h'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_h'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_h'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_h'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>i. Kesempatan terlibat dalam proyek penelitian dosen</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_i'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_i'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_i'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_i'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_i'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>j. Kualitas sarana dan prasarana akademik</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_j'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_j'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_j'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_j'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_j'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>k. Kesempatan untuk memperoleh pengalaman kerja (praktek)</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_k'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_k'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_k'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_k'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_k'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>l. Kesempatan ikut menentukan kebijakan yang berdampak terhadap kebijakan institut</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_l'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_l'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_l'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_l'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_l'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>m. Suasana akademik</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_m'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_m'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_m'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_m'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_m'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>n. Fasilitas dan kumpulan buku pada perpustakaan</td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_n'] == '1' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_n'] == '2' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_n'] == '3' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_n'] == '4' ? 'checked' : ""; ?>></td>
                                                        <td><input class="form-check-input" type="radio" disabled <?php echo $pekerjaan['penilaian_n'] == '5' ? 'checked' : ""; ?>></td>
                                                    </tr>

                                                </table>
                                            </tr>
                                        </tbody>
                                    <?php else : ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row">NIA</th>
                                                <td><?php echo $data_profil[0]->nisn ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1. Apakah saudara/i sudah mendapatkan pekerjaan ?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2. Mohon dituliskan nama lembaga/instansi tempat saudara bekerja?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3. Dari mana saudara mendapatkan informasi tentang pekerjaan pertama yang saudara peroleh ?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4. Mohon menuliskan nama lengkap atasan langsung anda dilokasi kerja</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5. Mohon menuliskan Kontak atasan langsung yang anda yang dapat dihubungi dilokasi kerja</th>
                                                <td>

                                                    <b>Whatsapp Atasan : </b>-

                                                    <br>
                                                    <b>Email Atasan : </b>-

                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6. Setelah lulus, berapa lama saudara menunggu untuk mendapatkan pekerjaan pertama?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7. Seberapa besat tingkat relevansi bidang kerja dengan latar belakang pendidikan anda.</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8. Berapa gaji Saudara per bulan untuk pekerjaan pertama ?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9. Permasalahan apa saja yang saudara hadapi dalam rangka memperoleh pekerjaan?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10. Mohon dituliskan narasikan singkat terkait bidang kerja anda sekarang?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11. Berikan masukan saudara/i untuk peningkatan kualitas skill mahasiswa sesuai pengalaman anda bekerja saat ini!</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12. Berikan masukan saudara/i untuk peningkatan kualitas prodi PTIK ke depannya..?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    13. Berikan penilaian terhadap kondisi penyelenggaraan pendidikan dan pembelajaran pada program studi (kampus) Saudara. Diukur atas dasar kebutuhan di Sekolah
                                                </th>
                                                <td rowspan="2">1 = sangat rendah; 5 = sangat tinggi</td>
                                                <table style="margin-left: 50px;">
                                                    <th>
                                                    <td style="width: 30px;">1</td>
                                                    <td style="width: 30px;">2</td>
                                                    <td style="width: 30px;">3</td>
                                                    <td style="width: 30px;">4</td>
                                                    <td style="width: 30px;">5</td>
                                                    </th>
                                                    <tr>
                                                        <td>a. Kegiatan akademik secara umum</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Isi mata kuliah</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Kompetensi dosen</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Pelayanan/bimbingan Dosen terhadap Mahasiswa</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Isi mata kuliah teori</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Isi mata kuliah praktek</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>g. Kualitas pembelajaran</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>h. Sistem penilaian</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>i. Kesempatan terlibat dalam proyek penelitian dosen</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>j. Kualitas sarana dan prasarana akademik</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>k. Kesempatan untuk memperoleh pengalaman kerja (praktek)</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>l. Kesempatan ikut menentukan kebijakan yang berdampak terhadap kebijakan institut</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>m. Suasana akademik</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td>n. Fasilitas dan kumpulan buku pada perpustakaan</td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                        <td><input class="form-check-input" type="radio" disabled></td>
                                                    </tr>

                                                </table>
                                            </tr>

                                        </tbody>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- Button trigger modal
<button type="button" class="btn btn-primary">
  Launch demo modal
</button> -->
Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <form action="<?php echo base_url('main/ubahpekerjaan_action') ?>" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Halo Apa Kabar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="nisn" value="<?php echo $_SESSION['nisn_session']; ?>">
                    <?php if ($pekerjaan_tersedia) : ?>
                        <div id="form-group-container">
                            <div class="form-group mb-4 mt-1">
                                <label for="mendapatkan_pekerjaan">1. Apakah saudara/i sudah mendapatkan pekerjaan ?</label>
                                <select class="form-control" required name="mendapatkan_pekerjaan" id="mendapatkan_pekerjaan">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="sudah" <?= ($pekerjaan['mendapatkan_pekerjaan'] == 'sudah') ? 'selected' : ''; ?>>Sudah</option>
                                    <option value="belum" <?= ($pekerjaan['mendapatkan_pekerjaan'] == 'belum') ? 'selected' : ''; ?>>Belum</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 ">
                                <label for="tempat_kerja">2. Mohon dituliskan nama lembaga/instansi tempat saudara bekerja?</label>
                                <input type="text" required class="form-control" name="tempat_kerja" id="tempat_kerja" aria-describedby="helpId" placeholder="Masukkan Tempat Kerja" value="<?= $pekerjaan['tempat_kerja']; ?>">
                            </div>
                            <div class="form-group mb-4">
                                <label for="sumber_informasi_pekerjaan">3. Dari mana saudara mendapatkan informasi tentang pekerjaan pertama yang saudara peroleh ?</label>
                                <select class="form-control" required name="sumber_informasi_pekerjaan" id="sumber_informasi_pekerjaan">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Iklan" <?= ($pekerjaan['sumber_informasi_pekerjaan'] == 'Iklan') ? 'selected' : ''; ?>>Iklan</option>
                                    <option value="Teman" <?= ($pekerjaan['sumber_informasi_pekerjaan'] == 'Teman') ? 'selected' : ''; ?>>Teman</option>
                                    <option value="Keluarga" <?= ($pekerjaan['sumber_informasi_pekerjaan'] == 'Keluarga') ? 'selected' : ''; ?>>Keluarga</option>
                                    <option value="Pengguna kerja (Employer)" <?= ($pekerjaan['sumber_informasi_pekerjaan'] == 'Pengguna kerja (Employer)') ? 'selected' : ''; ?>>Pengguna kerja (Employer)</option>
                                    <option value="Mencari sendiri" <?= ($pekerjaan['sumber_informasi_pekerjaan'] == 'Mencari sendiri') ? 'selected' : ''; ?>>Mencari sendiri: browsing di internet dan sebagainya</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 ">
                                <label for="tempat_kerja">4. Mohon menuliskan nama lengkap atasan langsung anda dilokasi kerja.</label>
                                <input type="text" required class="form-control" name="nama_atasan" id="nama_atasan" aria-describedby="helpId" placeholder="Masukkan Nama Atasan Anda" value="<?= $pekerjaan['nama_atasan']; ?>">
                            </div>
                            <div class="form-group mb-4 ">
                                <label for="tempat_kerja">5. Mohon menuliskan Kontak atasan langsung yang anda yang dapat dihubungi dilokasi kerja.</label>
                                <div class="row mx-1">
                                    <div class="col">
                                        <label for="tempat_kerja">Nomor Whatsapp Atasan Anda</label>
                                        <input type="text" required class="form-control" name="wa_atasan" id="wa_atasan" aria-describedby="helpId" placeholder="Masukkan No Whatsapp Atasan Anda" value="<?= $pekerjaan['wa_atasan']; ?>">
                                    </div>
                                    <div class="col">
                                        <label for="tempat_kerja">Email Atasan Anda</label>
                                        <input type="text" required class="form-control" name="email_atasan" id="email_atasan" aria-describedby="helpId" placeholder="Masukkan No Email Atasan Anda" value="<?= $pekerjaan['email_atasan']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="lama_menganggur">6. Setelah lulus, berapa lama saudara menunggu untuk mendapatkan pekerjaan pertama?</label>
                                <select class="form-control" required name="lama_menganggur" id="lama_menganggur">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Sebelum Lulus Sudah Mendapat Pekerjaan" <?= ($pekerjaan['lama_menganggur'] == 'Sebelum Lulus Sudah Mendapat Pekerjaan') ? 'selected' : ''; ?>>Sebelum Lulus Sudah Mendapat Pekerjaan</option>
                                    <option value="0 Bulan" <?= ($pekerjaan['lama_menganggur'] == '0 Bulan') ? 'selected' : ''; ?>>0 Bulan</option>
                                    <option value="1 - 3 Bulan" <?= ($pekerjaan['lama_menganggur'] == '1 - 3 Bulan') ? 'selected' : ''; ?>>1 - 3 Bulan</option>
                                    <option value="6 - 12 bulan" <?= ($pekerjaan['lama_menganggur'] == '6 - 12 bulan') ? 'selected' : ''; ?>>6 - 12 bulan</option>
                                    <option value="12 - 18 Bulan" <?= ($pekerjaan['lama_menganggur'] == '12 - 18 Bulan') ? 'selected' : ''; ?>>12 - 18 Bulan</option>
                                    <option value="> 18 Bulan" <?= ($pekerjaan['lama_menganggur'] == '> 18 Bulan') ? 'selected' : ''; ?>>> 18 Bulan</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="relevansi_bidang_kerja">7. Seberapa besat tingkat relevansi bidang kerja dengan latar belakang pendidikan anda?</label>
                                <select class="form-control" required name="relevansi_bidang_kerja" id="relevansi_bidang_kerja">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Rendah" <?= ($pekerjaan['relevansi_bidang_kerja'] == 'Rendah') ? 'selected' : ''; ?>>Rendah (Ex: Berdagang, Staf Administrasi, Guru Bidang Studi Lain, etc)</option>
                                    <option value="Sedang" <?= ($pekerjaan['relevansi_bidang_kerja'] == 'Sedang') ? 'selected' : ''; ?>>Sedang (Ex: Programmer, Desainrer, Teknisi Komputer, . etc)</option>
                                    <option value="Tinggi" <?= ($pekerjaan['relevansi_bidang_kerja'] == 'Tinggi') ? 'selected' : ''; ?>>Tinggi (Ex : Guru TIK, Tutor, Pelatih / Trainer Teknologi, etc)</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="gaji_pertama_bekerja">8. Berapa gaji Saudara per bulan untuk pekerjaan pertama ?</label>
                                <select class="form-control" required name="gaji_pertama_bekerja" id="gaji_pertama_bekerja">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="< Rp. 1.000.000,-" <?= ($pekerjaan['gaji_pertama_bekerja'] == '< Rp. 1.000.000') ? 'selected' : ''; ?>>
                                        < Rp. 1.000.000,-</option>
                                    <option value="Rp. 1.000.000 - < Rp. 2.000.000" <?= ($pekerjaan['gaji_pertama_bekerja'] == 'Rp. 1.000.000 - < Rp. 2.000.000') ? 'selected' : ''; ?>>Rp. 1.000.000 - < Rp. 2.000.000</option>
                                    <option value="Rp. 2.000.000 - < Rp. 3.000.000" <?= ($pekerjaan['gaji_pertama_bekerja'] == 'Rp. 2.000.000 - < Rp. 3.000.000') ? 'selected' : ''; ?>>Rp. 2.000.000 - < Rp. 3.000.000</option>
                                    <option value="Rp. 3.000.000 - < Rp. 4.000.000" <?= ($pekerjaan['gaji_pertama_bekerja'] == 'Rp. 3.000.000 - < Rp. 4.000.000') ? 'selected' : ''; ?>>Rp. 3.000.000 - < Rp. 4.000.000</option>
                                    <option value="Rp. 4.000.000 - < Rp. 5.000.000" <?= ($pekerjaan['gaji_pertama_bekerja'] == 'Rp. 4.000.000 - < Rp. 5.000.000') ? 'selected' : ''; ?>>Rp. 4.000.000 - < Rp. 5.000.000</option>
                                    <option value="> Rp. 5.000.000" <?= ($pekerjaan['gaji_pertama_bekerja'] == '> Rp. 5.000.000') ? 'selected' : ''; ?>> > Rp. 5.000.000</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="permasalahan_pekerjaan">9. Permasalahan apa saja yang saudara hadapi dalam rangka memperoleh pekerjaan?</label>
                                <textarea class="form-control" name="permasalahan_pekerjaan" id="permasalahan_pekerjaan" rows="3" placeholder="Masukkan Permasalahan dalam rangka memperoleh Bidang Pekerjaan"><?= $pekerjaan['permasalahan_pekerjaan']; ?></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="narasi_bidang_kerja">10. Mohon dituliskan narasikan singkat terkait bidang kerja anda sekarang..?</label>
                                <textarea class="form-control" name="narasi_bidang_kerja" id="narasi_bidang_kerja" rows="3" placeholder="narasikan singkat terkait bidang kerja anda"><?= $pekerjaan['narasi_bidang_kerja']; ?></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="masukan_skill_mahasiswa">11. Berikan masukan saudara/i untuk peningkatan kualitas skill mahasiswa sesuai pengalaman anda bekerja saat ini!</label>
                                <textarea class="form-control" name="masukan_skill_mahasiswa" id="masukan_skill_mahasiswa" rows="3" placeholder="Berikan masukan saudara/i untuk peningkatan kualitas skill mahasiswa sesuai pengalaman anda bekerja saat ini"><?= $pekerjaan['masukan_skill_mahasiswa']; ?></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="masukan_prodi_ptik">12. Berikan masukan saudara/i untuk peningkatan kualitas prodi PTIK ke depannya?</label>
                                <textarea class="form-control" name="masukan_prodi_ptik" id="masukan_prodi_ptik" rows="3" placeholder="Berikan masukan saudara/i untuk peningkatan kualitas prodi PTIK ke depannya"><?= $pekerjaan['masukan_prodi_ptik']; ?></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="penilaian">Berikan penilaian terhadap kondisi penyelenggaraan pendidikan dan pembelajaran pada program studi (kampus) Saudara. Diukur atas dasar kebutuhan di Sekolah </label>
                                <label for="penilaian"><i>1 = sangat rendah; 5 = sangat tinggi</i></label>
                                <table style="margin-left: 50px;">
                                    <th>
                                    <td style="width: 30px;">1</td>
                                    <td style="width: 30px;">2</td>
                                    <td style="width: 30px;">3</td>
                                    <td style="width: 30px;">4</td>
                                    <td style="width: 30px;">5</td>
                                    </th>
                                    <tr>
                                        <td>a. Kegiatan akademik secara umum</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="1" <?php echo $pekerjaan['penilaian_a'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="2" <?php echo $pekerjaan['penilaian_a'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="3" <?php echo $pekerjaan['penilaian_a'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="4" <?php echo $pekerjaan['penilaian_a'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="5" <?php echo $pekerjaan['penilaian_a'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>b. Isi mata kuliah</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="1" <?php echo $pekerjaan['penilaian_b'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="2" <?php echo $pekerjaan['penilaian_b'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="3" <?php echo $pekerjaan['penilaian_b'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="4" <?php echo $pekerjaan['penilaian_b'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="5" <?php echo $pekerjaan['penilaian_b'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>c. Kompetensi dosen</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="1" <?php echo $pekerjaan['penilaian_c'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="2" <?php echo $pekerjaan['penilaian_c'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="3" <?php echo $pekerjaan['penilaian_c'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="4" <?php echo $pekerjaan['penilaian_c'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="5" <?php echo $pekerjaan['penilaian_c'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>d. Pelayanan/bimbingan Dosen terhadap Mahasiswa</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="1" <?php echo $pekerjaan['penilaian_d'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="2" <?php echo $pekerjaan['penilaian_d'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="3" <?php echo $pekerjaan['penilaian_d'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="4" <?php echo $pekerjaan['penilaian_d'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="5" <?php echo $pekerjaan['penilaian_d'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>e. Isi mata kuliah teori</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="1" <?php echo $pekerjaan['penilaian_e'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="2" <?php echo $pekerjaan['penilaian_e'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="3" <?php echo $pekerjaan['penilaian_e'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="4" <?php echo $pekerjaan['penilaian_e'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="5" <?php echo $pekerjaan['penilaian_e'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>f. Isi mata kuliah praktek</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="1" <?php echo $pekerjaan['penilaian_f'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="2" <?php echo $pekerjaan['penilaian_f'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="3" <?php echo $pekerjaan['penilaian_f'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="4" <?php echo $pekerjaan['penilaian_f'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="5" <?php echo $pekerjaan['penilaian_f'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>g. Kualitas pembelajaran</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="1" <?php echo $pekerjaan['penilaian_g'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="2" <?php echo $pekerjaan['penilaian_g'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="3" <?php echo $pekerjaan['penilaian_g'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="4" <?php echo $pekerjaan['penilaian_g'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="5" <?php echo $pekerjaan['penilaian_g'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>h. Sistem penilaian</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="1" <?php echo $pekerjaan['penilaian_h'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="2" <?php echo $pekerjaan['penilaian_h'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="3" <?php echo $pekerjaan['penilaian_h'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="4" <?php echo $pekerjaan['penilaian_h'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="5" <?php echo $pekerjaan['penilaian_h'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>i. Kesempatan terlibat dalam proyek penelitian dosen</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="1" <?php echo $pekerjaan['penilaian_i'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="2" <?php echo $pekerjaan['penilaian_i'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="3" <?php echo $pekerjaan['penilaian_i'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="4" <?php echo $pekerjaan['penilaian_i'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="5" <?php echo $pekerjaan['penilaian_i'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>j. Kualitas sarana dan prasarana akademik</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="1" <?php echo $pekerjaan['penilaian_j'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="2" <?php echo $pekerjaan['penilaian_j'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="3" <?php echo $pekerjaan['penilaian_j'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="4" <?php echo $pekerjaan['penilaian_j'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="5" <?php echo $pekerjaan['penilaian_j'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>k. Kesempatan untuk memperoleh pengalaman kerja (praktek)</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="1" <?php echo $pekerjaan['penilaian_k'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="2" <?php echo $pekerjaan['penilaian_k'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="3" <?php echo $pekerjaan['penilaian_k'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="4" <?php echo $pekerjaan['penilaian_k'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="5" <?php echo $pekerjaan['penilaian_k'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>l. Kesempatan ikut menentukan kebijakan yang berdampak terhadap kebijakan institut</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="1" <?php echo $pekerjaan['penilaian_l'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="2" <?php echo $pekerjaan['penilaian_l'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="3" <?php echo $pekerjaan['penilaian_l'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="4" <?php echo $pekerjaan['penilaian_l'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="5" <?php echo $pekerjaan['penilaian_l'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>m. Suasana akademik</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="1" <?php echo $pekerjaan['penilaian_m'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="2" <?php echo $pekerjaan['penilaian_m'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="3" <?php echo $pekerjaan['penilaian_m'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="4" <?php echo $pekerjaan['penilaian_m'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="5" <?php echo $pekerjaan['penilaian_m'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>
                                    <tr>
                                        <td>n. Fasilitas dan kumpulan buku pada perpustakaan</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="1" <?php echo $pekerjaan['penilaian_n'] == '1' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="2" <?php echo $pekerjaan['penilaian_n'] == '2' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="3" <?php echo $pekerjaan['penilaian_n'] == '3' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="4" <?php echo $pekerjaan['penilaian_n'] == '4' ? 'checked' : ""; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="5" <?php echo $pekerjaan['penilaian_n'] == '5' ? 'checked' : ""; ?>></td>
                                    </tr>

                                </table>
                            </div>

                        </div>
                    <?php else : ?>
                        <div id="form-group-container">
                            <div class="form-group mb-4 mt-1">
                                <label for="mendapatkan_pekerjaan">1. Apakah saudara/i sudah mendapatkan pekerjaan ?</label>
                                <select class="form-control" required name="mendapatkan_pekerjaan" id="mendapatkan_pekerjaan">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="sudah">Sudah</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 ">
                                <label for="tempat_kerja">2. Mohon dituliskan nama lembaga/instansi tempat saudara bekerja?</label>
                                <input type="text" required class="form-control" name="tempat_kerja" id="tempat_kerja" aria-describedby="helpId" placeholder="Masukkan Tempat Kerja">
                            </div>
                            <div class="form-group mb-4">
                                <label for="lama_menganggur">Setelah lulus, berapa lama Saudara menunggu untuk mendapatkan
                                    pekerjaan pertama?</label>
                                <select class="form-control" required name="lama_menganggur" id="lama_menganggur">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Sudah bekerja sebelum lulus">Sudah bekerja sebelum lulus</option>
                                    <option value="Kurang dari 3 bulan">Kurang dari 3 bulan</option>
                                    <option value="3 - 6 bulan">3 - 6 bulan</option>
                                    <option value="6 - 12 bulan">6 - 12 bulan</option>
                                    <option value="1 - 2 tahun">1 - 2 tahun</option>
                                    <option value="Lebih dari 2 tahun">Lebih dari 2 tahun</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="sumber_informasi_pekerjaan">3. Dari mana saudara mendapatkan informasi tentang pekerjaan pertama yang saudara peroleh ?</label>
                                <select class="form-control" required name="sumber_informasi_pekerjaan" id="sumber_informasi_pekerjaan">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Iklan">Iklan</option>
                                    <option value="Teman">Teman</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Pengguna kerja (Employer)">Pengguna kerja (Employer)</option>
                                    <option value="Mencari sendiri: browsing di internet dan sebagainya">Mencari sendiri: browsing di internet dan sebagainya</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 ">
                                <label for="tempat_kerja">4. Mohon menuliskan nama lengkap atasan langsung anda dilokasi kerja.</label>
                                <input type="text" required class="form-control" name="nama_atasan" id="nama_atasan" aria-describedby="helpId" placeholder="Masukkan Nama Atasan Anda">
                            </div>
                            <div class="form-group mb-4 ">
                                <label for="tempat_kerja">5. Mohon menuliskan Kontak atasan langsung yang anda yang dapat dihubungi dilokasi kerja.</label>
                                <div class="row mx-1">
                                    <div class="col">
                                        <label for="tempat_kerja">Nomor Whatsapp Atasan Anda</label>
                                        <input type="text" required class="form-control" name="wa_atasan" id="wa_atasan" aria-describedby="helpId" placeholder="Masukkan No Whatsapp Atasan Anda">
                                    </div>
                                    <div class="col">
                                        <label for="tempat_kerja">Email Atasan Anda</label>
                                        <input type="text" required class="form-control" name="email_atasan" id="email_atasan" aria-describedby="helpId" placeholder="Masukkan No Email Atasan Anda" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="lama_menganggur">6. Setelah lulus, berapa lama saudara menunggu untuk mendapatkan pekerjaan pertama?</label>
                                <select class="form-control" required name="lama_menganggur" id="lama_menganggur">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Sebelum Lulus Sudah Mendapat Pekerjaan">Sebelum Lulus Sudah Mendapat Pekerjaan</option>
                                    <option value="0 Bulan">0 Bulan</option>
                                    <option value="1 - 3 Bulan">1 - 3 Bulan</option>
                                    <option value="6 - 12 bulan">6 - 12 bulan</option>
                                    <option value="12 - 18 Bulan">12 - 18 Bulan</option>
                                    <option value="> 18 Bulan">> 18 Bulan</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="relevansi_bidang_kerja">7. Seberapa besat tingkat relevansi bidang kerja dengan latar belakang pendidikan anda?</label>
                                <select class="form-control" required name="relevansi_bidang_kerja" id="relevansi_bidang_kerja">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Rendah">Rendah (Ex: Berdagang, Staf Administrasi, Guru Bidang Studi Lain, etc)</option>
                                    <option value="Sedang">Sedang (Ex: Programmer, Desainrer, Teknisi Komputer, . etc)</option>
                                    <option value="Tinggi">Tinggi (Ex : Guru TIK, Tutor, Pelatih / Trainer Teknologi, etc)</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="gaji_pertama_bekerja">8. Berapa gaji Saudara per bulan untuk pekerjaan pertama ?</label>
                                <select class="form-control" required name="gaji_pertama_bekerja" id="gaji_pertama_bekerja">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="< Rp. 1.000.000,-">
                                        < Rp. 1.000.000,-</option>
                                    <option value="1.000.000 - < 2.000.000">1.000.000 - < 2.000.000</option>
                                    <option value="2.000.000 - < 3.000.000">2.000.000 - < 3.000.000</option>
                                    <option value="3.000.000 - < 4.000.000">3.000.000 - < 4.000.000</option>
                                    <option value="4.000.000 - < 5.000.000">4.000.000 - < 5.000.000</option>
                                    <option value="> 5.000.000"> > 5.000.000</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="permasalahan_pekerjaan">9. Permasalahan apa saja yang saudara hadapi dalam rangka memperoleh pekerjaan?</label>
                                <textarea class="form-control" name="permasalahan_pekerjaan" id="permasalahan_pekerjaan" rows="3" placeholder="Masukkan Permasalahan dalam rangka memperoleh Bidang Pekerjaan"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="narasi_bidang_kerja">10. Mohon dituliskan narasikan singkat terkait bidang kerja anda sekarang..?</label>
                                <textarea class="form-control" name="narasi_bidang_kerja" id="narasi_bidang_kerja" rows="3" placeholder="narasikan singkat terkait bidang kerja anda"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="masukan_skill_mahasiswa">11. Berikan masukan saudara/i untuk peningkatan kualitas skill mahasiswa sesuai pengalaman anda bekerja saat ini!</label>
                                <textarea class="form-control" name="masukan_skill_mahasiswa" id="masukan_skill_mahasiswa" rows="3" placeholder="Berikan masukan saudara/i untuk peningkatan kualitas skill mahasiswa"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="masukan_prodi_ptik">12. Berikan masukan saudara/i untuk peningkatan kualitas prodi PTIK ke depannya?</label>
                                <textarea class="form-control" name="masukan_prodi_ptik" id="masukan_prodi_ptik" rows="3" placeholder="Berikan masukan saudara/i untuk peningkatan kualitas prodi PTIK ke depannya"></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="penilaian">Berikan penilaian terhadap kondisi penyelenggaraan pendidikan dan pembelajaran pada program studi (kampus) Saudara. Diukur atas dasar kebutuhan di Sekolah </label>
                                <label for="penilaian"><i>1 = sangat rendah; 5 = sangat tinggi</i></label>
                                <table style="margin-left: 50px;">
                                    <th>
                                    <td style="width: 30px;">1</td>
                                    <td style="width: 30px;">2</td>
                                    <td style="width: 30px;">3</td>
                                    <td style="width: 30px;">4</td>
                                    <td style="width: 30px;">5</td>
                                    </th>
                                    <tr>
                                        <td>a. Kegiatan akademik secara umum</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_a" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>b. Isi mata kuliah</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_b" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>c. Kompetensi dosen</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_c" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>d. Pelayanan/bimbingan Dosen terhadap Mahasiswa</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_d" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>e. Isi mata kuliah teori</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_e" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>f. Isi mata kuliah praktek</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_f" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>g. Kualitas pembelajaran</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_g" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>h. Sistem penilaian</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_h" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>i. Kesempatan terlibat dalam proyek penelitian dosen</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_i" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>j. Kualitas sarana dan prasarana akademik</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_j" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>k. Kesempatan untuk memperoleh pengalaman kerja (praktek)</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_k" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>l. Kesempatan ikut menentukan kebijakan yang berdampak terhadap kebijakan institut</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_l" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>m. Suasana akademik</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_m" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td>n. Fasilitas dan kumpulan buku pada perpustakaan</td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="1"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="2"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="3"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="4"></td>
                                        <td><input class="form-check-input" type="radio" name="penilaian_n" value="5"></td>
                                    </tr>

                                </table>
                            </div>


                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>