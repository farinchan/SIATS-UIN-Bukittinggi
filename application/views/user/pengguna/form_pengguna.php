<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <ol>
        <li><a href="<?php echo base_url('main'); ?>">Home</a></li>
        <li>Pengguna </li>
      </ol>
      <?php $this->load->view('user/partisi/cariberita.php') ?>
    </div>
  </div>
</section>
<section class="inner-page">
  <div class="container">
    <h3 style="margin-bottom: 40px;">Penilaian Terhadap Pengguna Lulusan</h3>
    <hr><br>


    <!-- FIXME : Edit Pengguna (Belum Fix) -->
    <form id="penilaian_pengguna" method="post">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">Identitas Pengisi </div>
            <div class="card-body">

              <div class="mb-3 row">
                <label  class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label  class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label  class="col-sm-2 col-form-label">Instansi / Lembaga</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="instansi_lembaga" name="instansi_lembaga" placeholder="Instansi/Lembaga" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label  class="col-sm-2 col-form-label">Alamat Lembaga</label>
                <div class="col-sm-10">
                  <textarea id="alamat_lembaga" class="form-control" name="alamat_lembaga" rows="10" placeholder="Alamat Lembaga, Meliputi RT/RW" required></textarea>
                </div>
              </div>

              <div class="mb-3 row">
                <label  class="col-sm-2 col-form-label">No. Telepon</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No. Telepon" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">No. Faximile </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="no_fax" name="no_fax" placeholder="No. Faximile ">
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
              </div>

            </div>
          </div>
          <div class="card mt-3">
            <div class="card-body">
              <ol>
                <li class="mb-3">
                  <div class="form-group">
                    <label for="pertanyaan1">Lembaga yang Bapak/Ibu kelola bergerak dalam bidang apa</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan1" id="pertanyaan1rb1" value="Pendidikan" checked>
                      <label class="form-check-label" for="pertanyaan1">
                        Pendidikan
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan1" id="pertanyaan1rb2" value="Industri" checked>
                      <label class="form-check-label" for="pertanyaan1">
                        Industri, sebutkan jenis industrinya <input type="text" class="form-control" name="industri" id="industri">
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan1" id="pertanyaan1rb3" value="Jasa" checked>
                      <label class="form-check-label" for="pertanyaan1">
                        Jasa, sebutkan jenis jasanya <input type="text" class="form-control" name="jasa" id="jasa">
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan1" id="pertanyaan1rb4" value="Perdagangan/Bisnis" checked>
                      <label class="form-check-label" for="pertanyaan1">
                        Perdagangan/Bisnis
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan1" id="pertanyaan1rb5" value="Pertanian" checked>
                      <label class="form-check-label" for="pertanyaan1">
                        Pertanian
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan1" id="pertanyaan1rb6" value="Kebudayaan dan Pariwisata" checked>
                      <label class="form-check-label" for="pertanyaan1">
                        Kebudayaan dan Pariwisata
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan1" id="pertanyaan1rb7" value="Lain-lain" checked>
                      <label class="form-check-label" for="pertanyaan1">
                        Lain-lain, sebutkan <input type="text" class="form-control" name="lain-lain" id="lain-lain">
                      </label>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="form-group">
                    <label for="pertanyaan2">Adakah alumni dari Jurusan kami yang bekerja pada lembaga Bapak/Ibu</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan2" id="pertanyaan2rb1" value="ada">
                      <label class="form-check-label" for="pertanyaan2">
                        ada
                        Sebutkan jumlahnya : <input type="number" class="form-control" id="ada"> orang
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan2" id="pertanyaan2rb2" value="tidak ada">
                      <label class="form-check-label" for="pertanyaan2">
                        Tidak Ada
                      </label>
                    </div>
                    <div id="rb_pertanyaan2_tidakada"></div>
                  </div>
                </li>

                <div id="rb_pertanyaan2_ada"></div>

                <li class="mb-3">
                  <div class="form-group">
                    <label for="pertanyaan1">Tuliskan saran-saran umum Bapak/Ibu demi perbaikan program studi kami yang berkaitan dengan peningkatan kualitas lulusannya.</label>
                    <textarea class="form-control" rows="7" placeholder="saran-saran umum Bapak/Ibu" name="pertanyaan6" id="pertanyaan6" required></textarea>
                  </div>
                </li>

                <li class="mb-3">
                  <div class="form-group">
                    <label for="pertanyaan1">Berikan saran bagi peningkatan kualitas lulusan Program Studi kami supaya lebih dekat dengan kebutuhan/tuntutan dunia kerja (mohon melihat dokumen akademik yang kami sertakan). Bapak/Ibu dapat memanfaatkan halaman sebalik jika space berikut ini kurang</label>
                    <label for="pertanyaan1">Fasilitas/Laboratorium:</label>
                    <textarea class="form-control" name="pertanyaan7_1" id="pertanyaan7_1" rows="5" placeholder="Fasilitas/Laboratorium" required></textarea>
                    <label for="pertanyaan1">Kualitas Dosen:</label>
                    <textarea class="form-control" name="pertanyaan7_2" id="pertanyaan7_2" rows="5" placeholder="Kualitas Dosen" required></textarea>
                    <label for="pertanyaan1">Kurikulum :</label>
                    <textarea class="form-control" name="pertanyaan7_3" id="pertanyaan7_3" rows="5" placeholder="Kurikulum" required></textarea>
                    <label for="pertanyaan1">Kualitas Layanan Administrasi:</label>
                    <textarea class="form-control" name="pertanyaan7_4" id="pertanyaan7_4" rows="5" placeholder="Kualitas Layanan Administrasi" required></textarea>
                  </div>
                </li>
              </ol>
            </div>
          </div>

        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">Cari Lulusan</div>
            <div class="card-body">

              <div class="form-group">
                <label class="mb-3" for="exampleFormControlInput1">Cari dan pilih lulusan kami yang bekerja atau belajar di instansi/lembaga yang bapak/ibu kelola</label><br>
                <select id="mySelect2" multiple="multiple" class="form-control mt-3" multiple></select>
              </div>

              <div id="hasil_pencarian_lulusan"></div>

            </div>
          </div>
          <div class="row px-3">
            <button type="submit"  class="btn btn-primary btn-block mt-3" style="float: right;"><i class="fas fa-paper-plane"></i> Selesai & Kirim <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span></button>
          </div>
        </div>

      </div>
    </form>


  </div>
</section>