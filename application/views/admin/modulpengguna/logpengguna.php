<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Update Alumni</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Alumni</li>
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
                                <h6>Data Seluruh Alumni</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="list_log_update_alumni">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIA</th>
                                            <th scope="col">Nama Alumni</th>
                                            <th scope="col">Pesan</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($log_update_alumni as $x) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $x->nisn; ?></td>
                                                <td><?php echo $x->nama; ?></td>
                                                <td>
                                                    <?php if ($x->pesan_update == "Sudah Melakukan Update Data Profil") { ?>
                                                        <span class="badge badge-info"><?php echo $x->pesan_update; ?></span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success"><?php echo $x->pesan_update; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $x->waktu_update; ?></td>
                                                <td><a href="<?= base_url("admin/ModulAlumni/lihat/") . $x->nisn; ?>" class="badge bg-secondary "><i class="fas fa-eye" aria-hidden="true"> Lihat</i></a></td>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Excel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="excel" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="excel" required accept=".xls, .xlsx">
                            <label class="custom-file-label" for="customFile">Klik disini</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" disabled id="spinner">
                        Loading...
                    </button>
                    <button type="submit" class="btn btn-primary" id="submit">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>