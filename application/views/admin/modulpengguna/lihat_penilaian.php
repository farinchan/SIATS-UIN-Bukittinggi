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
                                <label>Lembaga yang Bapak/Ibu kelola bergerak dalam bidang apa ?</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan1 ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Adakah alumni dari Jurusan kami yang bekerja pada lembaga Bapak/Ibu ?</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan2 ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Bagaimanakah kinerja alumni tersebut menurut Bapak/Ibu ?</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan3 ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Bidang yang kurang dikuasai alumni kami adalah</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan4 ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Perlukah diadakan mata kuliah – mata kuliah pilihan baru/ ketrampilan/kompetensi tambahan untuk mengantipasi kemajuan di bidang yang Bapak/Ibu kelola ?</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan5 ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tuliskan saran-saran umum Bapak/Ibu demi perbaikan program studi kami yang berkaitan dengan peningkatan kualitas lulusannya</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan6 ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Berikan saran bagi peningkatan kualitas lulusan Program Studi kami supaya lebih dekat dengan kebutuhan/tuntutan dunia kerja (mohon melihat dokumen akademik yang kami sertakan). Bapak/Ibu dapat memanfaatkan halaman sebalik jika space berikut ini kurang</label>
                                <label>Fasilitas/Laboratorium:</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan7_1 ?>" readonly>
                                <label>Kualitas Dosen:</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan7_2 ?>" readonly>
                                <label>Kurikulum :</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan7_3 ?>" readonly>
                                <label>Kualitas Layanan Administrasi:</label>
                                <input type="text" class="form-control" value="<?= $data_penilaian->pertanyaan7_4 ?>" readonly>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </section>
</div>