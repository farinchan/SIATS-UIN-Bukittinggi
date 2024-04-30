<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penilaian Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="<?php

                                                                    use GuzzleHttp\Psr7\Uri;

                                                                    echo base_url('admin/ModulPengguna') ?>">Penilaian Pengguna</a></li>
                        <li class="breadcrumb-item">Detail Penilaian</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>



    <section class="content">

        <div class="container-fluid">
            <a href="<?= base_url('admin/ModulPengguna/cetakpenilaian/') ?><?= $this->uri->segment(4) ?>">
                <button type="button" class="btn btn-secondary btn-sm my-3"><i class="fas fa-print mr-3"></i> Cetak Data</button>
            </a>
            <div class="row">
                <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lulusan yang berada pada Instansi/Lembaga ini</h3>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <br>
                                    <?php foreach ($alumni as $alumni_detail) : ?>
                                        <div class="nav-link">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="<?= base_url('assets/user/img/') ?><?= $alumni_detail["foto"] ?>" alt="fotoprofile" class="img-thumbnail">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5 class="card-title"><?= $alumni_detail["nama"] ?></h5>
                                                            <p class="card-text"><?= $alumni_detail["nisn"] ?> - <?= $alumni_detail["tahun_lulus"] ?></p>
                                                            <a href="<?= base_url("admin/ModulAlumni/lihat/" . $alumni_detail["nisn"]) ?>" type="button" class="btn btn-primary btn-sm">Lihat Alumni</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Identitas Pengisi</h3>
                        </div>
                        <div class="card-body">

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama" readonly value="<?= $data_penilaian->nama ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Jabatan" readonly value="<?= $data_penilaian->jabatan ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Instansi / Lembaga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Instansi/Lembaga" readonly value="<?= $data_penilaian->instansi_lembaga ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Alamat lembaga</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" readonly><?= $data_penilaian->alamat_lembaga ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="No Telp" readonly value="<?= $data_penilaian->no_telp ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">No Faximile</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="No Faximile" readonly value="<?= $data_penilaian->no_fax ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Email" readonly value="<?= $data_penilaian->email ?>">
                                </div>
                            </div>

                        </div>

                    </div>



                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Alumni</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan1 ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tahun Lulus Alumni</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan2 ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Berapa lama Alumni sudah bergabung di Lembaga/Perusahaan yang Bapak/Ibu pimpin? (....... bulan)</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan3 ?>" readonly>
                            </div>


                            <div class="form-group">
                                <label>Bagaimana penilaian kepuasan pengguna lulusan pada aspek di bawah ini?</label><br>
                                <label>Etika</label>
                                <input type="text" class="form-control" value="<?php if ($data_penilaian->pertanyaan4 == 4) {
                                                                                    echo "Sangat Baik";
                                                                                } elseif ($data_penilaian->pertanyaan4 == 3) {
                                                                                    echo "Baik";
                                                                                } elseif ($data_penilaian->pertanyaan4 == 2) {
                                                                                    echo "Cukup";
                                                                                } elseif ($data_penilaian->pertanyaan4 == 1) {
                                                                                    echo "Kurang";
                                                                                } ?>" readonly>
                                <label>Keahlian pada Bidang Ilmu</label>
                                <input type="text" class="form-control" value="<?php if ($data_penilaian->pertanyaan5 == 4) {
                                                                                    echo "Sangat Baik";
                                                                                } elseif ($data_penilaian->pertanyaan5 == 3) {
                                                                                    echo "Baik";
                                                                                } elseif ($data_penilaian->pertanyaan5 == 2) {
                                                                                    echo "Cukup";
                                                                                } elseif ($data_penilaian->pertanyaan5 == 1) {
                                                                                    echo "Kurang";
                                                                                } ?>" readonly>
                                <label>Kemampuan Berbahasa Asing</label>
                                <input type="text" class="form-control" value="<?php if ($data_penilaian->pertanyaan6 == 4) {
                                                                                    echo "Sangat Baik";
                                                                                } elseif ($data_penilaian->pertanyaan6 == 3) {
                                                                                    echo "Baik";
                                                                                } elseif ($data_penilaian->pertanyaan6 == 2) {
                                                                                    echo "Cukup";
                                                                                } elseif ($data_penilaian->pertanyaan6 == 1) {
                                                                                    echo "Kurang";
                                                                                } ?>" readonly>
                                <label>Penggunaan Teknologi Informasi</label>
                                <input type="text" class="form-control" value="<?php if ($data_penilaian->pertanyaan7 == 4) {
                                                                                    echo "Sangat Baik";
                                                                                } elseif ($data_penilaian->pertanyaan7 == 3) {
                                                                                    echo "Baik";
                                                                                } elseif ($data_penilaian->pertanyaan7 == 2) {
                                                                                    echo "Cukup";
                                                                                } elseif ($data_penilaian->pertanyaan7 == 1) {
                                                                                    echo "Kurang";
                                                                                } ?>" readonly>
                                <label>Kemampuan Berkomunikasi</label>
                                <input type="text" class="form-control" value="<?php if ($data_penilaian->pertanyaan8 == 4) {
                                                                                    echo "Sangat Baik";
                                                                                } elseif ($data_penilaian->pertanyaan8 == 3) {
                                                                                    echo "Baik";
                                                                                } elseif ($data_penilaian->pertanyaan8 == 2) {
                                                                                    echo "Cukup";
                                                                                } elseif ($data_penilaian->pertanyaan8 == 1) {
                                                                                    echo "Kurang";
                                                                                } ?>" readonly>
                                <label>Kerjasama</label>
                                <input type="text" class="form-control" value="<?php if ($data_penilaian->pertanyaan9 == 4) {
                                                                                    echo "Sangat Baik";
                                                                                } elseif ($data_penilaian->pertanyaan9 == 3) {
                                                                                    echo "Baik";
                                                                                } elseif ($data_penilaian->pertanyaan9 == 2) {
                                                                                    echo "Cukup";
                                                                                } elseif ($data_penilaian->pertanyaan9 == 1) {
                                                                                    echo "Kurang";
                                                                                } ?>" readonly>
                                <label>Pengembangan Diri</label>
                                <input type="text" class="form-control" value="<?php if ($data_penilaian->pertanyaan10 == 4) {
                                                                                    echo "Sangat Baik";
                                                                                } elseif ($data_penilaian->pertanyaan10 == 3) {
                                                                                    echo "Baik";
                                                                                } elseif ($data_penilaian->pertanyaan10 == 2) {
                                                                                    echo "Cukup";
                                                                                } elseif ($data_penilaian->pertanyaan10 == 1) {
                                                                                    echo "Kurang";
                                                                                } ?>" readonly>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </section>
</div>