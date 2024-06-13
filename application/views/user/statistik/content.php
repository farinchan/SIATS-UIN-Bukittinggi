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
                        <h5 class="card-title">Data Statistik Alumni</h5> <br>
                        <p class="card-subtitle mb-2 text-muted">Alumni adalah mahasiswa yang telah mengikuti dan menyelesaikan pendidikan di perguruan tinggi</p>
                    </div>

                    <div class="card-body pt-0">
                        <div class="dropdown-divider"></div>
                        <div class="row my-6">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><b>Dari tahun kelulusan</b></label>
                                    <select class="form-control" id="tahunDariSelect">
                                        <?php foreach ($tahun_lulus as $tahun) : ?>
                                            <option <?= $tahun->tahun_lulus == "2007" ? "selected" : "" ?> value="<?php echo $tahun->tahun_lulus; ?>"><?php echo $tahun->tahun_lulus; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><b>Sampai tahun kelulusan</b></label>
                                    <select class="form-control" id="tahunSampaiSelect">
                                        <?php foreach ($tahun_lulus as $tahun) : ?>
                                            <option <?= $tahun->tahun_lulus == "2024" ? "selected" : "" ?> value="<?php echo $tahun->tahun_lulus; ?>"><?php echo $tahun->tahun_lulus; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><b>Jenjang</b></label>
                                    <select class="form-control" id="jenjangSelect">
                                        <option value="0" selected>-Semua-</option>
                                        <?php foreach ($jenjang as $jenjang) : ?>
                                            <option value="<?php echo $jenjang->jenjang; ?>"><?php echo $jenjang->jenjang; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><b>Fakultas</b></label>
                                    <select class="form-control" id="fakultasSelect">
                                        <option value="0" selected>-Semua-</option>
                                        <?php foreach ($fakultas as $fakultas) : ?>
                                            <option value="<?php echo $fakultas->fakultas; ?>"><?php echo $fakultas->fakultas; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><b>Program Studi</b></label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>-Semua-</option>
                                        <!-- <?php foreach ($prodi as $prodi) : ?>
                                                <option><?php echo $prodi->nama; ?></option>
                                            <?php endforeach; ?> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <h1 align="center" style="font-size: 5em;" class="total_data" id="total_data">-</h1>
                                <h3 align="center">TOTAL ALUMNI</h3>
                                <!-- <p align="center"><button class="btn btn-success">Unduh Excel</button></p> -->
                            </div>
                            <div class="col-md-9">
                                <div id="chart"> </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-md-12">
                <div class="card card-margin">

                    <div class="card-header no-border">
                        <h5 class="card-title">Data Statistik Tracer Study Alumni</h5> <br>
                        <p class="card-subtitle mb-2 text-muted">Status Alumni Saat ini</p>
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
                        <h5 class="card-title">Data Statistik Tracer Study Alumni</h5> <br>
                        <p class="card-subtitle mb-2 text-muted">Statistik apabila status alumni Bekerja/Wirausaha.</p>
                    </div>

                    <div class="card-body pt-0">
                        <div class="dropdown-divider"></div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Berapa bulan waktu untuk mendapatkan pekerjaan pertama</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartMendapatKerja"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_mendapat_kerja">
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
                                        <b><small>rata-rata penghasilan Alumni per bulan</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartPenghasilan"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_penghasilan">
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
                                        <b><small>Kategori tempat bekerja</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartKategori"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_kategori">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <b><small>Apa tingkat tempat kerja Alumni</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartTingkatKerja"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_tingkat_kerja">
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
                                        <b><small>Kesesuaian bidang kerja dengan kompetensi bidang studi yang ditamatkan</small></b>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartKompetensi"></div>
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabel_kompetensi">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2"></div>

                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</section>