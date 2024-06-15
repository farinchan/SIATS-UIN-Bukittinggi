<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Alumni</h1>
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

                <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
                      <input type="text" class="form-control" id="nama_alumni" placeholder="Nama Alumni">
                    </div>
                  </div>

                  <div class="col-md-4 ">
                    <div class="form-group">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Prodi</label>
                      <select id="kode_prodi" class="form-control">
                        <option selected>Semua</option>
                        <?php foreach ($prodi as $p) { ?>
                          <option value="<?= $p->kode ?>"><?= $p->jenjang ?> - <?= $p->nama ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">Kelulusan</label>
                      <select id="tahun_lulus" class="form-control">
                        <option selected>Semua</option>
                        <?php foreach ($tahun_lulus as $tahun) { ?>
                          <option><?= $tahun->tahun_lulus ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="isi_tracer">
                      <label class="form-check-label text-bold" for="autoSizingCheck2">
                        Sudah Mengisi Tracer
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-default">Import</button>
                      <a href="<?php echo base_url('admin/ModulAlumni/exportalumni') ?>" type="button" class="btn btn-secondary btn-sm">Export</a>
                      <a target="_blank" id="tombolcetaklaporan" type="button" class="btn btn-secondary btn-sm">Cetak Laporan</a>
                    </div>
                  </div>
                </div>


                <table class="table table-bordered table-striped" id="list_alumni">
                  <thead>
                    <tr>
                      <th scope="col">NIA</th>
                      <th scope="col">Nama Alumni</th>
                      <th scope="col">Program studi</th>
                      <th scope="col">Jenjang</th>
                      <th scope="col" style="width: 20px;">Kelulusan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Satuan Kerja / Kampus</th>
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