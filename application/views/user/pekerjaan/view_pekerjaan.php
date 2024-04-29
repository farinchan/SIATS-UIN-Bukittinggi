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
                                                <th scope="row">Status Anda Saat Ini?</th>
                                                <td><?php echo $pekerjaan['p1']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1. Dalam berapa bulan anda mendapatkan pekerjaan / Berapa bulan waktu untuk mendapatkan pekerjaan pertama?</th>
                                                <td><?php echo $pekerjaan['p2']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2. Berapa rata-rata penghasilan Anda per bulan?</th>
                                                <td><?php echo $pekerjaan['p3']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3. Kategori tempat bekerja?</th>
                                                <td><?php echo $pekerjaan['p3']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4. Apa tingkat tempat kerja Anda?</th>
                                                <td><?php echo $pekerjaan['p4']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5. Kesesuaian bidang kerja dengan kompetensi bidang studi yang ditamatkan?</th>
                                                <td><?php echo $pekerjaan['p4']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php else : ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row">NIA</th>
                                                <td><?php echo $data_profil[0]->nisn ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Anda Saat Ini?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1. Dalam berapa bulan anda mendapatkan pekerjaan / Berapa bulan waktu untuk mendapatkan pekerjaan pertama?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2. Berapa rata-rata penghasilan Anda per bulan?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3. Kategori tempat bekerja?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4. Apa tingkat tempat kerja Anda?</th>
                                                <td> - </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5. Kesesuaian bidang kerja dengan kompetensi bidang studi yang ditamatkan?</th>
                                                <td> - </td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <form action="<?php echo base_url('main/ubahpekerjaan_action') ?>" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tracer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="nisn" value="<?php echo $_SESSION['nisn_session']; ?>">
                    <?php if ($pekerjaan_tersedia) : ?>
                        <div id="form-group-container">
                            <div class="form-group mb-4 mt-1">
                                <label for="p1">Jelaskan status Anda saat ini</label>
                                <select class="form-control" required name="p1" id="p1">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Bekerja (Penuh/ Paruh Waktu)" <?= ($pekerjaan['p1'] == 'Bekerja (Penuh/ Paruh Waktu)') ? 'selected' : ''; ?>>Bekerja (Penuh/ Paruh Waktu)</option>
                                    <option value="Wiraswasta" <?= ($pekerjaan['p1'] == 'Wiraswasta') ? 'selected' : ''; ?>>Wiraswasta</option>
                                    <option value="Melanjutkan Pendidikan" <?= ($pekerjaan['p1'] == 'Melanjutkan Pendidikan') ? 'selected' : ''; ?>>Melanjutkan Pendidikan</option>
                                    <option value="Sedang Mencari Kerja" <?= ($pekerjaan['p1'] == 'Sedang Mencari Kerja') ? 'selected' : ''; ?>>Sedang Mencari Kerja</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p2">1. Dalam berapa bulan anda mendapatkan pekerjaan / Berapa bulan waktu untuk mendapatkan pekerjaan pertama ? </label>
                                <select class="form-control" required name="p2" id="p2">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="< 6 Bulan" <?= ($pekerjaan['p2'] == '< 6 Bulan') ? 'selected' : ''; ?>>< 6 Bulan</option>
                                    <option value="6 - 18 Bulan" <?= ($pekerjaan['p2'] == '6 - 18 Bulan') ? 'selected' : ''; ?>>6 - 18 Bulan</option>
                                    <option value="> 18 Bulan" <?= ($pekerjaan['p2'] == '> 18 Bulan') ? 'selected' : ''; ?>>> 18 Bulan</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p3">2. Berapa rata-rata penghasilan Anda per bulan ?</label>
                                <select class="form-control" required name="p3" id="p3">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="< Rp2.000.000,00" <?= ($pekerjaan['p3'] == '< Rp2.000.000,00') ? 'selected' : ''; ?>>< Rp2.000.000,00</option>
                                    <option value="Rp2.000.000,00 - Rp5.000.000,00" <?= ($pekerjaan['p3'] == 'Rp2.000.000,00 - Rp5.000.000,00') ? 'selected' : ''; ?>>Rp2.000.000,00 - Rp5.000.000,00</option>
                                    <option value="> Rp5.000.000,00" <?= ($pekerjaan['p3'] == '> Rp5.000.000,00') ? 'selected' : ''; ?>>> Rp5.000.000,00</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p4">3. Kategori tempat bekerja?</label>
                                <select class="form-control" required name="p4" id="p4">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Institusi/Organisasi Multilateral" <?= ($pekerjaan['p4'] == 'Institusi/Organisasi Multilateral') ? 'selected' : ''; ?>>Institusi/Organisasi Multilateral</option>
                                    <option value="Lembaga Pemerintah/BUMN/BUMD" <?= ($pekerjaan['p4'] == 'Lembaga Pemerintah/BUMN/BUMD') ? 'selected' : ''; ?>>Lembaga Pemerintah/BUMN/BUMD</option>
                                    <option value="Perusahaan Swasta" <?= ($pekerjaan['p4'] == 'Perusahaan Swasta') ? 'selected' : ''; ?>>Perusahaan Swasta</option>
                                    <option value="Wirausaha" <?= ($pekerjaan['p4'] == 'Wirausaha') ? 'selected' : ''; ?>>Wirausaha</option>
                                    <option value="Yang lain" <?= ($pekerjaan['p4'] == 'Yang lain') ? 'selected' : ''; ?>>Yang lain</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p5">4. Apa tingkat tempat kerja Anda?</label>
                                <select class="form-control" required name="p5" id="p5">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Lokal/wilayah/wiraswasta tidak berbadan hukum/tidak berizin" <?= ($pekerjaan['p5'] == 'Lokal/wilayah/wiraswasta tidak berbadan hukum/tidak berizin') ? 'selected' : ''; ?>>Lokal/wilayah/wiraswasta tidak berbadan hukum/tidak berizin</option>
                                    <option value="Nasional/wiraswasta berbadan hukum/berizin" <?= ($pekerjaan['p5'] == 'Nasional/wiraswasta berbadan hukum/berizin') ? 'selected' : ''; ?>>Nasional/wiraswasta berbadan hukum/berizin</option>
                                    <option value="Multinasional/internasional" <?= ($pekerjaan['p5'] == 'Multinasional/internasional') ? 'selected' : ''; ?>>Multinasional/internasional</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p6">5. Kesesuaian bidang kerja dengan kompetensi bidang studi yang ditamatkan?</label>
                                <select class="form-control" required name="p6" id="p6">
                                    <option value="" disabled selected>==Click for option==</option>
                                    <option value="Sesuai" <?= ($pekerjaan['p6'] == 'Sesuai') ? 'selected' : ''; ?>>Sesuai</option>
                                    <option value="Tidak Sesuai" <?= ($pekerjaan['p6'] == 'Tidak Sesuai') ? 'selected' : ''; ?>>Tidak Sesuai</option>
                                </select>
                            </div>


                        </div>
                    <?php else : ?>
                        <div id="form-group-container">
                            <div class="form-group mb-4 mt-1">
                                <label for="p1">Jelaskan status Anda saat ini</label>
                                <select class="form-control" required name="p1" id="p1">
                                    <option value="" disabled selected>Pilih Options</option>
                                    <option value="Bekerja (Penuh/ Paruh Waktu)">Bekerja (Penuh/ Paruh Waktu)</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Melanjutkan Pendidikan">Melanjutkan Pendidikan</option>
                                    <option value="Sedang Mencari Kerja">Sedang Mencari Kerja</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p2">1. Dalam berapa bulan anda mendapatkan pekerjaan / Berapa bulan waktu untuk mendapatkan pekerjaan pertama ?</label>
                                <select class="form-control" required name="p2" id="p2">
                                    <option value="" disabled selected>Pilih opsi</option>
                                    <option value="< 6 Bulan">< 6 Bulan</option>
                                    <option value="6 - 18 Bulan">6 - 18 Bulan</option>
                                    <option value="> 18 Bulan">> 18 Bulan</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p3">2. Berapa rata-rata penghasilan Anda per bulan ?</label>
                                <select class="form-control" required name="p3" id="p3">
                                    <option value="" disabled selected>Pilih opsi</option>
                                    <option value="< Rp2.000.000,00">< Rp2.000.000,00</option>
                                    <option value="Rp2.000.000,00 - Rp5.000.000,00">Rp2.000.000,00 - Rp5.000.000,00</option>
                                    <option value="> Rp5.000.000,00">> Rp5.000.000,00</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p4">3. Kategori tempat bekerja ?</label>
                                <select class="form-control" required name="p4" id="p4">
                                    <option value="" disabled selected>Pilih opsi</option>
                                    <option value="Institusi/Organisasi Multilateral">Institusi/Organisasi Multilateral</option>
                                    <option value="Lembaga Pemerintah/BUMN/BUMD">Lembaga Pemerintah/BUMN/BUMD</option>
                                    <option value="Perusahaan Swasta">Perusahaan Swasta</option>
                                    <option value="Wirausaha">Yang lain</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p5">4. Apa tingkat tempat kerja Anda ?</label>
                                <select class="form-control" required name="p5" id="p5">
                                    <option value="" disabled selected>Pilih opsi</option>
                                    <option value="Lokal/wilayah/wiraswasta tidak berbadan hukum/tidak berizin">Lokal/wilayah/wiraswasta tidak berbadan hukum/tidak berizin</option>
                                    <option value="Nasional/wiraswasta berbadan hukum/berizin">Nasional/wiraswasta berbadan hukum/berizin</option>
                                    <option value="Multinasional/internasional">Multinasional/internasional</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 mt-1">
                                <label for="p6">5. Kesesuaian bidang kerja dengan kompetensi bidang studi yang ditamatkan ?</label>
                                <select class="form-control" required name="p6" id="p6">
                                    <option value="" disabled selected>Pilih opsi</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
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