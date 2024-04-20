<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Program Studi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Program Studi</li>
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
                                <h6>Program studi</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal">Tambah</button>
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-default">Import</button>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal tambah prodi manual -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?php echo base_url('admin/ModulSetting/addprodi') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="kode">kode Program Studi</label>
                                                        <input type="text" pattern="^\S+$" class="form-control" id="kode" name="kode" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Nama Program Studi</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fakultas">Fakultas</label>
                                                        <input type="text" class="form-control" id="fakultas" name="fakultas" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenjang">Jenjang</label>
                                                        <input type="text" class="form-control" id="jenjang" name="jenjang" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal tambah import Prodi -->
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Import Excel</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form enctype="multipart/form-data" action="<?php echo base_url('admin/ModulSetting/importprodi') ?>" method="post">
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

                                <table class="table table-bordered table-striped" id="tabel-admin">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Nama Program studi</th>
                                            <th scope="col">Fakultas</th>
                                            <th scope="col">Jenjang</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data as $x) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $x->kode; ?></td>
                                                <td><?php echo $x->nama; ?></td>
                                                <td><?php echo $x->fakultas; ?></td>
                                                <td><?php echo $x->jenjang; ?></td>
                                                <td>
                                                    <?php if ($this->session->userdata('username_session') != $x->kode) { ?>
                                                        <a data-toggle="modal" data-target="#modalhapus<?php echo $x->kode; ?>" class="badge bg-danger "><i class="fas fa-trash-alt" aria-hidden="true"> Hapus</i></a>
                                                    <?php } ?>
                                                </td>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modalhapus<?php echo $x->kode; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Apakah anda Yakin Ingin Menghapus Program Studi ini? <b><?php echo $x->nama; ?></b>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                                                <a href="<?= base_url("admin/ModulSetting/deleteprodi/" . $x->kode) ?>" class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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