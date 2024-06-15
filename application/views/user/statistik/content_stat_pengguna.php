<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="<?php echo base_url('main'); ?>">Home</a></li>
                <li>Statistik Alumni</li>
            </ol>
            <?php $this->load->view('user/partisi/cariberita.php') ?>
        </div>
    </div>
</section>
<section class="inner-page">
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div class="card card-margin">

                    <div class="card-header no-border">
                        <h5 class="card-title">Data Status Pekerjaan Alumni Saat Ini</h5> <br>
                        <p class="card-subtitle mb-2 text-muted"> lama Alumni sudah bergabung di Lembaga/Perusahaan yang Bapak/Ibu pimpin</p>
                    </div>

                    <div class="card-body pt-0">
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-md-7">
                                <div id="chartStatusBekerja"></div>
                            </div>
                            <div class="col-md-5">
                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">Status Alumni</th>
                                                    <th scope="col">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabel_status_pekerjaan">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="card card-margin">

                    <div class="card-header no-border">
                        <h5 class="card-title">Penilaian Alumni</h5> <br>
                        <p class="card-subtitle mb-2 text-muted">Bagaimana penilaian kepuasan pengguna lulusan pada aspek di bawah ini? (Nilai 4 - 1)</p>
                    </div>

                    <div class="card-body pt-0">
                        <div class="dropdown-divider"></div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Etika</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartetika"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_etika">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Keahlian pada Bidang Ilmu</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="p5chart"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_keahlian_bidang_ilmu">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Kemampuan Berbahasa Asing</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="p6chart"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_kemampuan_berbahasa_asing">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Penggunaan Teknologi Informasi</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="p7chart"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_penggunaan_teknologi_informasi">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Kemampuan Berkomunikasi</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="p8chart"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_kemampuan_berkomunikasi">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Kerjasama</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="p9chart"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_kerjasama">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Pengembangan Diri</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="p10chart"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_pengembangan_diri">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</section>