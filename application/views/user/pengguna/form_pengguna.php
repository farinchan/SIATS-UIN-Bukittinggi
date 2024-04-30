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
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Instansi / Lembaga</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="instansi_lembaga" name="instansi_lembaga" placeholder="Instansi/Lembaga" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alamat Lembaga</label>
                <div class="col-sm-10">
                  <textarea id="alamat_lembaga" class="form-control" name="alamat_lembaga" rows="10" placeholder="Alamat Lembaga, Meliputi RT/RW" required></textarea>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">No. Telepon</label>
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
                  <label class="mb-3"><b>Identitas Alumni</b></label>

                  <div class="form-group mb-2">
                    <label for="pertanyaan1">Nama Alumni</label>
                    <input class="form-control" type="text" name="pertanyaan1" id="pertanyaan1">
                  </div>
                  <div class="form-group mb-2">
                    <label for="pertanyaan2">Tahun Lulus Alumni</label>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan2" id="pertanyaan2rb1" value="2021">
                      <label class="form-check-label" for="pertanyaan2">
                        2021
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan2" id="pertanyaan2rb2" value="2020">
                      <label class="form-check-label" for="pertanyaan2">
                        2020
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan2" id="pertanyaan2rb3" value="2019">
                      <label class="form-check-label" for="pertanyaan2">
                        2019
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan2" id="pertanyaan2rb4" value="ada">
                      <label class="form-check-label" for="pertanyaan2">
                        Yang lain : <input type="number" class="form-control" id="pertanyaan2rb4yl">
                      </label>
                    </div>
                  </div>
                </li>

                <li class="mb-3">
                  <label class="mb-3"><b>Status Pekerjaan Alumni Saat Ini</b></label>
                  <div class="form-group mb-2">
                    <label for="pertanyaan3">Berapa lama Alumni sudah bergabung di Lembaga/Perusahaan yang Bapak/Ibu pimpin? (....... bulan)</label>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan3" id="pertanyaan3rb1" value="2021">
                      <label class="form-check-label" for="pertanyaan3">
                        < 6 Bulan </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan3" id="pertanyaan3rb2" value="2020">
                      <label class="form-check-label" for="pertanyaan3">
                        6 - 18 Bulan
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pertanyaan3" id="pertanyaan3rb3" value="2019">
                      <label class="form-check-label" for="pertanyaan3">
                        > 18 Bulan
                      </label>
                    </div>
                  </div>
                </li>




                <li class="mb-3">
                  <label class="mb-3"><b>Penilaian Alumni</b></label>
                  <div class="form-group mb-2">
                    <span>
                      <label>Bagaimana penilaian kepuasan pengguna lulusan pada aspek di bawah ini? (Nilai 4 - 1)</label>
                      Catatan Penilaian: <br>
                      4 = Sangat Baik <br>
                      3 = Baik <br>
                      2 = Cukup <br>
                      1 = Kurang <br>
                    </span>
                    <table>
                      <thead>
                        <td style="width: 300px;"></td>
                        <td style="width: 70px;"> 4</td>
                        <td style="width: 70px;"> 3</td>
                        <td style="width: 70px;"> 2</td>
                        <td style="width: 70px;"> 1</td>
                      </thead>

                      <tr style="height: 35px;">
                        <td> <label for="pertanyaan3">Etika</label>
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb1" value="4">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb2" value="3">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb3" value="2">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb4" value="1">
                        </td>
                      </tr>

                      <tr style="height: 35px;">
                        <td> <label for="pertanyaan5">Keahlian pada Bidang Ilmu</label>
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan5" id="pertanyaan5rb1" value="4">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan5" id="pertanyaan5rb2" value="3">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan5" id="pertanyaan5rb3" value="2">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan5" id="pertanyaan5rb4" value="1">
                        </td>
                      </tr>

                      <tr style="height: 35px;">
                        <td> <label for="pertanyaan6">Kemampuan Berbahasa Asing</label>
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan6" id="pertanyaan6rb1" value="4">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan6" id="pertanyaan6rb2" value="3">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan6" id="pertanyaan6rb3" value="2">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan6" id="pertanyaan6rb4" value="1">
                        </td>
                      </tr>

                      <tr style="height: 35px;">
                        <td> <label for="pertanyaan7">Penggunaan Teknologi Informasi</label>
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan7" id="pertanyaan7rb1" value="4">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan7" id="pertanyaan7rb2" value="3">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan7" id="pertanyaan7rb3" value="2">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan7" id="pertanyaan7rb4" value="1">
                        </td>
                      </tr>

                      <tr style="height: 35px;">
                        <td> <label for="pertanyaan8">Kemampuan Berkomunikasi</label>
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan8" id="pertanyaan8rb1" value="4">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan8" id="pertanyaan8rb2" value="3">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan8" id="pertanyaan8rb3" value="2">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan8" id="pertanyaan8rb4" value="1">
                        </td>
                      </tr>

                      <tr style="height: 35px;">
                        <td> <label for="pertanyaan9">Kerjasama</label>
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan9" id="pertanyaan9rb1" value="4">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan9" id="pertanyaan9rb2" value="3">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan9" id="pertanyaan9rb3" value="2">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan9" id="pertanyaan9rb4" value="1">
                        </td>
                      </tr>

                      <tr style="height: 35px;">
                        <td> <label for="pertanyaan10">Pengembangan Diri</label>
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan10" id="pertanyaan10rb1" value="4">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan10" id="pertanyaan10rb2" value="3">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan10" id="pertanyaan10rb3" value="2">
                        </td>
                        <td>
                          <input class="form-check-input" type="radio" name="pertanyaan10" id="pertanyaan10rb4" value="1">
                        </td>
                      </tr>


                    </table>
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
            <button type="submit" class="btn btn-primary btn-block mt-3" style="float: right;"><i class="fas fa-paper-plane"></i> Selesai & Kirim <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span></button>
          </div>
        </div>

      </div>
    </form>


  </div>
</section>