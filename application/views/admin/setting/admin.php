<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Admin</li>
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
                                <h6>administrator</h6>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-user-plus mx-2"></i> Tambah Admin
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah admin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form enctype="multipart/form-data" action="<?php echo base_url('admin/ModulSetting/addadmin') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" pattern="^\S+$" class="form-control" id="username" name="username" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama_admin">Nama Admin</label>
                                                        <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email_admin">Email address</label>
                                                        <input type="email" class="form-control" id="email_admin" name="email_admin" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email_admin">ROLE</label>
                                                        <select class="custom-select rounded-0" id="role" name="role">
                                                            <option value="superadmin">Super Admin</option>
                                                            <option value="admin">Admin Prodi</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email_admin">Program studi</label>
                                                        <select class="custom-select rounded-0" id="prodi" name="prodi"> 
                                                            <?php foreach ($list_prodi as $key) { ?>
                                                                <option value="<?php echo $key->kode; ?>"><?php echo $key->jenjang; ?> <?php echo $key->nama; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto">Foto</label>
                                                        <div class="drop-zone">
                                                            <span class="drop-zone__prompt">Ekstensi yang diterima png,jpg,jpeg,JPG</span>
                                                            <input type="file" id="gambar" name="myFile" class="drop-zone__input" required>
                                                        </div>
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
                                <table class="table table-bordered table-striped" id="tabel-admin">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Nama Admin</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Prodi</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data as $x) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $x->username; ?></td>
                                                <td><?php echo $x->nama_admin; ?></td>
                                                <td><?php echo $x->nama_admin; ?></td>
                                                <td><?php echo $x->role; ?></td>
                                                <td><?php echo $x->nama; ?></td>
                                                <td>********</td>
                                                <td><img src="<?= base_url("assets/admin/profil/" . $x->gambar . "") ?>" class="img-fluid img-thumbnail" width="100" alt="<?php echo $x->gambar; ?>"></td>
                                                <td>
                                                    <?php if ($this->session->userdata('username_session') != $x->username) { ?>
                                                        <a data-toggle="modal" data-target="#modalhapus<?php echo $x->username; ?>" class="badge bg-danger "><i class="fas fa-trash-alt" aria-hidden="true"> Hapus</i></a>
                                                    <?php } ?>
                                                </td>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modalhapus<?php echo $x->username; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    Apakah anda Yakin Ingin Menghapus Akun Admin <b><?php echo $x->username; ?></b>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                                                <a href="<?= base_url("admin/ModulSetting/deleteadmin/" . $x->username) ?>" class="btn btn-danger">Hapus</a>
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