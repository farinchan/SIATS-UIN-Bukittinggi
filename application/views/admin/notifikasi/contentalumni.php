<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Notifikasi Kepada Alumni</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Notifikasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                Notifikasi Cepat
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card text-white bg-warning mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="<?php echo base_url('assets/admin/') ?>dist/img/user-form.png" width="100">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5 class="card-title">Melengkapi Data</h5>
                                                        <p class="card-text">Mengirimkan notifikasi via email dan whatsapp kepada Alumni yang belum Melengkapi data .</p>
                                                        <div class="row">
                                                            <button type="button" id="notifikasicepat1" class="btn btn-danger" style="float: right;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinnerNC1"></span> Kirim Notifikasi</button>
                                                            <button type="button" class="btn btn-outline-danger waves-effect px-3 mx-2"><i class="fas fa-cogs" aria-hidden="true"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-white bg-success mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="<?php echo base_url('assets/admin/') ?>dist/img/donation.png" width="100">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5 class="card-title">Kontributor Donasi</h5>
                                                        <p class="card-text">Mengirimkan Kontributor Donasi Sebulan Terakhir via email dan whatsapp kepada Semua Alumni </p>
                                                        <div class="row">
                                                            <a href="#" class="btn btn-danger">Kirim Notifikasi</a>
                                                            <button type="button" class="btn btn-outline-danger waves-effect px-3 mx-2"><i class="fas fa-cogs" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-sm-4">
                                        <div class="card text-white bg-primary mb-3">
                                            <div class="card-header">Header</div>
                                            <div class="card-body">
                                                <h5 class="card-title">Warning card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                Kirim Notifikasi
                            </div>
                            <div class="card-body">

                                <form id="kirim_notifikasi" method="post">
                                    <div class="mb-3 row">
                                        <label for="nama_alumni" class="col-lg-2 col-form-label">Subjek Notifikasi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="labelNotifikasi" name="labelNotifikasi" placeholder="Label" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_alumni" class="col-lg-2 col-form-label">Kirim Kepada</label>
                                        <div class="col-sm-10">
                                            <select id="mySelect2" multiple="multiple" class="form-control" multiple></select>
                                            <input type="hidden" id="kirim_multiple" name="kirim_multiple">
                                        </div>
                                    </div>
                                    <div id="searchResults"></div>
                                    
                                    <div class="mb-3 row">
                                        <label for="nama_alumni" class="col-lg-2 col-form-label">Dikirim Untuk</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" id="dikirim_untuk">
                                                <option value="alumni">Alumni</option>
                                                <option value="atasan_alumni">Atasan Dari Alumni</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nama_alumni" class="col-sm-2 col-form-label">Kirim Via</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="wacb" name="wacb">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Whatsapp
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="emailcb" name="emailcb">
                                                <label class="form-check-label" for="defaultCheck2">
                                                    Email
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nama_alumni" class="col-sm-2 col-form-label">Isi Notifikasi</label>
                                        <div class="col-sm-10">
                                            <textarea id="isi_notifikasi" class="form-control" name="isinotifikasi" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="float: right;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span> Kirim</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h6>Riwayat Pengiriman Notifikasi</h6>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped" id="tabel-log">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Subjek</th>
                                            <th scope="col">Isi</th>
                                            <th scope="col">Kepada</th>
                                            <th scope="col">Pengirim</th>
                                            <th scope="col">WA</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($log_notifikasi as $x) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $x->label; ?></td>
                                                <td><?php echo $x->isi; ?></td>
                                                <td>
                                                    dikirim untuk <b><?php echo $x->status_kepada; ?></b> dari :
                                                    <ul>
                                                        <?php
                                                        $kepada = json_decode($x->kepada);
                                                        foreach ($kepada as $y) { ?>
                                                            <li><?= $y ?></li>
                                                        <?php  } ?>
                                                    </ul>

                                                </td>
                                                <td><b><?php echo $x->pengirim; ?></b></td>
                                                <td>
                                                    <center>
                                                        <?php if ($x->wa_status) { ?>
                                                            <i class="fas fa-check-square text-success fa-lg"></i>
                                                        <?php } else { ?>
                                                            <i class="fas fa-times-circle text-danger fa-lg"></i>
                                                        <?php }  ?>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php if ($x->email_status) { ?>
                                                            <i class="fas fa-check-square text-success fa-lg"></i>
                                                        <?php } else { ?>
                                                            <i class="fas fa-times-circle text-danger fa-lg"></i>
                                                        <?php }  ?>
                                                    </center>
                                                </td>
                                                <td><?php echo $x->created_at; ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>