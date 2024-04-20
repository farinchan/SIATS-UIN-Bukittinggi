<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Data Penilaian Terhadap Pengguna Lulusan</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Penilaian Pengguna</li>
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
                    <h6>Data Seluruh Penilaian Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-default">Import</button>
                        <a href="<?php echo base_url('admin/ModulAlumni/exportalumni') ?>" type="button" class="btn btn-secondary btn-sm">Export</a>
                    </div>
                    <table class="table table-bordered table-striped" id="list_alumni">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Instansi/Lembaga</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">No Faximile</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tanggal penilaian</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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