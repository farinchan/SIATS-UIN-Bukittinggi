<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Konfigurasi Notifikasi</h1>
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
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url("admin/ModulNotifikasi/NotificationConfiguration") ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfigurasi Notifikasi</h5>

                                </div>
                                <div class="modal-body">
                                    <div class="mb-3 row">
                                        <label for="wa_url" class="col-sm-2 col-form-label">Whatsapp API Url</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="wa_url" id="wa_url" placeholder="Whatsapp URL" value="<?php echo $notifikasi_configuration->wa_url; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="wa_apikey" class="col-sm-2 col-form-label">Whatsapp ApiKey</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="wa_apikey" id="wa_apikey" placeholder="API Key" value="<?php echo $notifikasi_configuration->wa_apikey; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="wa_sender" class="col-sm-2 col-form-label">Whatsapp Sender</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="wa_sender" id="wa_sender" placeholder="No Whatsapp Sender" value="<?php echo $notifikasi_configuration->wa_sender; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="smtp_host" class="col-sm-2 col-form-label">SMTP Host</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="smtp_host" id="smtp_host" placeholder="SMTP Host" value="<?php echo $notifikasi_configuration->smtp_host; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="smtp_port" class="col-sm-2 col-form-label">SMTP Port</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="smtp_port" id="smtp_port" placeholder="SMTP Port" value="<?php echo $notifikasi_configuration->smtp_port; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="smtp_user" class="col-sm-2 col-form-label">SMTP User</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="smtp_user" id="smtp_user" placeholder="SMTP Username" value="<?php echo $notifikasi_configuration->smtp_user; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="smtp_pass" class="col-sm-2 col-form-label">SMTP Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="smtp_pass" id="smtp_pass" placeholder="SMTP Password" value="<?php echo $notifikasi_configuration->smtp_pass; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url("admin/ModulNotifikasi/NotificationConfiguration1") ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pesan Otomatis Tracer kepada Alumni</h5>

                                </div>
                                <div class="modal-body">
                                   
                                    <div class="mb-3 row">
                                        <div class="custom-control custom-switch">

                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="pesan_otomatis" <?php if ($notifikasi_configuration->pesan_otomatis) { ?> checked <?php } ?>>
                                            <label class="custom-control-label" for="customSwitch1">Pesan Otomatis</label>
                                            <i data-toggle="tooltip" data-placement="right" title="Kirimkan Pesan otomatis Jika Alumni Mengupdate Data Tracernya" class="fas fa-info-circle"></i>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-2 col-form-label">Subjek</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pesan_otomatis_label" id="pesan_otomatis_label" placeholder="Subjek Pesan" value="<?php echo $notifikasi_configuration->pesan_otomatis_label; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="wa_url" class="col-sm-2 col-form-label">Isi Pesan</label>
                                        <div class="col-sm-10">
                                            <textarea rows="6" class="form-control" name="pesan_otomatis_isi" id="pesan_otomatis_isi"><?php echo $notifikasi_configuration->pesan_otomatis_isi; ?></textarea>
                                            <table>
                                            <tr>
                                                <td><b>[nama_alumni]</b></td>
                                                <td> : </td>
                                                <td>Menampilkan Nama Alumni</td>
                                            </tr>
                                        </table>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url("admin/ModulNotifikasi/NotificationConfiguration2") ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pesan Otomatis Tracer Kepada Atasan dari Alumni</h5>

                            </div>
                            <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="pesan_otomatis_atasan" <?php if ($notifikasi_configuration->pesan_otomatis_atasan) { ?> checked <?php } ?>>
                                        <label class="custom-control-label" for="customSwitch1">Pesan Otomatis</label>
                                        <i data-toggle="tooltip" data-placement="right" title="Kirimkan Pesan otomatis kepada atasan langsung dari alumni jika Alumni Mengupdate Data Tracernya" class="fas fa-info-circle"></i>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-sm-2 col-form-label">Subjek</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pesan_otomatis_label" id="pesan_otomatis_label" placeholder="Subjek Pesan" value="<?php echo $notifikasi_configuration->pesan_otomatis_atasan_label; ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="wa_url" class="col-sm-2 col-form-label">Isi Pesan</label>
                                    <div class="col-sm-10">
                                        <textarea rows="6" class="form-control" name="pesan_otomatis_atasan_isi" id="pesan_otomatis_atasan_isi"><?php echo $notifikasi_configuration->pesan_otomatis_atasan_isi; ?></textarea>
                                        <table>
                                            <tr>
                                                <td><b>[nama_alumni]</b></td>
                                                <td> : </td>
                                                <td>Menampilkan Nama Alumni</td>
                                            </tr>
                                            <tr>
                                                <td><b>[nama_atasan]</b></td>
                                                <td> : </td>
                                                <td>Menampilkan Nama atasan</td>
                                            </tr>
                                            <tr>
                                                <td><b>[wa_atasan]</b></td>
                                                <td> : </td>
                                                <td>Menampilkan Nomor Whatsapp atasan</td>
                                            </tr>
                                            <tr>
                                                <td><b>[email_atasan]</b></td>
                                                <td> : </td>
                                                <td>Menampilkan Email atasan</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>