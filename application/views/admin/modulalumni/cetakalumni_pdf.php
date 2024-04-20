<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?>/</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            margin: 0px;
        }

        .container-t {
            margin: 0px;
            padding-bottom: 2cm;
            padding-left: 2cm;
            padding-right: 2cm;
        }

        .img-header {
            margin-top: -45px;
            margin-left: 0;
            margin-right: 0;
        }

        .calibri-bold {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 14;
            font-family: "Calibri", sans-serif;
            font-weight: bold;
        }

        .calibri {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 11;
            font-family: "Calibri", sans-serif;
        }

        td {
            font-size: 11;
            font-family: "Calibri", sans-serif;
        }
    </style>
</head>

<body>
    <img src="<?= base_url("assets/report/header.png") ?>" class="img-fluid img-header" alt="...">
    <div class="container-t">
        <p class="text-center calibri mt-3">D A T A &ensp; T R A C E R &ensp; S T U D Y </p>
        <p class="text-center calibri-bold">ALUMNI PROGRAM STUDI</p>
        <p class="text-center calibri-bold">PENDIDIKAN TEKNIK INFORMATIKA DAN KOMPUTER</p>
        <p class="text-center calibri">UNIVERSITAS ISLAM NEGERI SJECH M. DJAMIL DJAMBEK BUKITTINGGI</p>
        <br>
        <div class="grid-item">
            <table class="table">
                <tr>
                    <td colspan="2"><i>BIODATA ALUMNI</i></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?= $data_profil->nama_alumni ?>
                    <td>
                    <td rowspan="7"> <img style="float: right; margin: 5px;" src="<?= base_url("assets/user/img/") . $data_profil->foto_alumni ?>" alt="" width="100px">
                    </td>
                </tr>
                <tr>
                    <td>NIA</td>
                    <td>:</td>
                    <td><?= $data_profil->nisn ?></td>
                </tr>
                <tr>
                    <td>Tahun Lulus</td>
                    <td>:</td>
                    <td><?= $data_profil->tahun_lulus ?></td>
                </tr>
                <tr>
                    <td>Status Pekerjaan</td>
                    <td>:</td>
                    <td><?= $data_profil->status_alumni ?></td>
                </tr>
                <tr>
                    <td>No Hp / Wa</td>
                    <td>:</td>
                    <td><?= $data_profil->no_wa ?></td>
                </tr>
                <tr>
                    <td style="width: 120px;">Alamat Lengkap</td>
                    <td>:</td>
                    <td><?= $data_profil->detail_alamat ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?= $data_profil->email ?></td>
                </tr>
                <tr>
                    <td>Riwayat Pekerjaan</td>
                    <td>:</td>
                    <td>
                        <table>
                            <?php $i = 1;
                            foreach ($riwayatpekerjaan as $x) : ?>

                                <tr>
                                    <td><b><?= $i ?>. </b></td>
                                    <td>Lembaga</td>
                                    <td>:</td>
                                    <td><?= $x->lembaga; ?></td>
                                </tr>
                                <tr>

                                    <td></td>
                                    <td>Bidang</td>
                                    <td>:</td>
                                    <td><?= $x->bidang_kerja; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Dari</td>
                                    <td>:</td>
                                    <td><?= $x->dari_tahun; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Sampai</td>
                                    <td>:</td>
                                    <td><?= $x->sampai_tahun; ?></td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <?php if ($check_tracer) { ?>
            <table>
                <tr>
                    <td colspan="2"><i>DATA ISIAN TRACER STUDI</i></td>
                </tr>
                <tr>
                    <td style="width: 20px;">1. </td>
                    <td>Apakah saudara/i sudah mendapatkan pekerjaan ?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->mendapatkan_pekerjaan ?></b></td>
                </tr>
                <tr>
                    <td>2. </td>
                    <td>Mohon dituliskan nama lembaga/instansi tempat saudara bekerja?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->tempat_kerja ?></b></td>
                </tr>
                <tr>
                    <td>3. </td>
                    <td>Dari mana saudara mendapatkan informasi tentang pekerjaan pertama yang saudara peroleh ?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->sumber_informasi_pekerjaan ?></b></td>
                </tr>
                <tr>
                    <td>4. </td>
                    <td>Mohon menuliskan nama lengkap atasan langsung anda dilokasi kerja</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->nama_atasan ?></b></td>
                </tr>
                <tr>
                    <td>5. </td>
                    <td>Setelah lulus, berapa lama saudara menunggu untuk mendapatkan pekerjaan pertama?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->lama_menganggur ?></b></td>
                </tr>
                <tr>
                    <td>6. </td>
                    <td>Seberapa besat tingkat relevansi bidang kerja dengan latar belakang pendidikan anda</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->relevansi_bidang_kerja ?></b></td>
                </tr>
                <tr>
                    <td>7. </td>
                    <td>Berapa gaji Saudara per bulan untuk pekerjaan pertama ??</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->gaji_pertama_bekerja ?></b></td>
                </tr>
                <tr>
                    <td>8. </td>
                    <td>Permasalahan apa saja yang saudara hadapi dalam rangka memperoleh pekerjaan?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->permasalahan_pekerjaan ?></b></td>
                </tr>
                <tr>
                    <td>9. </td>
                    <td>Mohon dituliskan narasikan singkat terkait bidang kerja anda sekarang?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->narasi_bidang_kerja ?></b></td>
                </tr>
                <tr>
                    <td>10. </td>
                    <td>Berikan masukan saudara/i untuk peningkatan kualitas skill mahasiswa sesuai pengalaman anda bekerja saat ini!</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->masukan_skill_mahasiswa     ?></b></td>
                </tr>
                <tr>
                    <td>11. </td>
                    <td>Berikan masukan saudara/i untuk peningkatan kualitas prodi PTIK ke depannya..?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->masukan_prodi_ptik ?></b></td>
                </tr>
                <tr>
                    <td>12. </td>
                    <td>Berikan penilaian terhadap kondisi penyelenggaraan pendidikan dan pembelajaran pada program studi (kampus) Saudara. Diukur atas dasar kebutuhan di Sekolah</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td>1 = sangat rendah; 5 = sangat tinggi</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <th>
                                    </th>
                                    <td></td>
                                    <td style="width: 30px;">1</td>
                                    <td style="width: 30px;">2</td>
                                    <td style="width: 30px;">3</td>
                                    <td style="width: 30px;">4</td>
                                    <td style="width: 30px;">5</td>

                                </tr>
                                <tr>
                                    <td>a. </td>
                                    <td>Kegiatan akademik secara umum</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_a == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_a == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_a == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_a == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_a == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>b. </td>
                                    <td>Isi mata kuliah</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_b == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_b == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_b == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_b == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_b == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>c. </td>
                                    <td>Kompetensi dosen</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_c == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_c == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_c == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_c == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_c == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>d. </td>
                                    <td>Pelayanan/bimbingan Dosen terhadap Mahasiswa</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_d == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_d == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_d == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_d == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_d == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>e. </td>
                                    <td>Isi mata kuliah teori</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_e == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_e == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_e == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_e == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_e == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>f. </td>
                                    <td>Isi mata kuliah praktek</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_f == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_f == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_f == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_f == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_f == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>g. </td>
                                    <td>Kualitas pembelajaran</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_g == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_g == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_g == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_g == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_g == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>h. </td>
                                    <td>Sistem penilaian</td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_h == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_h == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_h == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_h == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" disabled <?php echo $tracer->penilaian_h == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>i. </td>
                                    <td>Kesempatan terlibat dalam proyek penelitian dosen</td>
                                    <td><input type="radio" name="penilaian_i" value="1" <?php echo $tracer->penilaian_i == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_i" value="2" <?php echo $tracer->penilaian_i == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_i" value="3" <?php echo $tracer->penilaian_i == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_i" value="4" <?php echo $tracer->penilaian_i == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_i" value="5" <?php echo $tracer->penilaian_i == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>j. </td>
                                    <td>Kualitas sarana dan prasarana akademik</td>
                                    <td><input type="radio" name="penilaian_j" value="1" <?php echo $tracer->penilaian_j == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_j" value="2" <?php echo $tracer->penilaian_j == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_j" value="3" <?php echo $tracer->penilaian_j == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_j" value="4" <?php echo $tracer->penilaian_j == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_j" value="5" <?php echo $tracer->penilaian_j == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>k. </td>
                                    <td>Kesempatan untuk memperoleh pengalaman kerja (praktek)</td>
                                    <td><input type="radio" name="penilaian_k" value="1" <?php echo $tracer->penilaian_k == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_k" value="2" <?php echo $tracer->penilaian_k == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_k" value="3" <?php echo $tracer->penilaian_k == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_k" value="4" <?php echo $tracer->penilaian_k == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_k" value="5" <?php echo $tracer->penilaian_k == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>l. </td>
                                    <td>Kesempatan ikut menentukan kebijakan yang berdampak terhadap kebijakan institut</td>
                                    <td><input type="radio" name="penilaian_l" value="1" <?php echo $tracer->penilaian_l == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_l" value="2" <?php echo $tracer->penilaian_l == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_l" value="3" <?php echo $tracer->penilaian_l == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_l" value="4" <?php echo $tracer->penilaian_l == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_l" value="5" <?php echo $tracer->penilaian_l == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>m. </td>
                                    <td>Suasana akademik</td>
                                    <td><input type="radio" name="penilaian_m" value="1" <?php echo $tracer->penilaian_m == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_m" value="2" <?php echo $tracer->penilaian_m == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_m" value="3" <?php echo $tracer->penilaian_m == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_m" value="4" <?php echo $tracer->penilaian_m == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_m" value="5" <?php echo $tracer->penilaian_m == '5' ? 'checked' : ""; ?>></td>
                                </tr>
                                <tr>
                                    <td>n. </td>
                                    <td>Fasilitas dan kumpulan buku pada perpustakaan</td>
                                    <td><input type="radio" name="penilaian_n" value="1" <?php echo $tracer->penilaian_n == '1' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_n" value="2" <?php echo $tracer->penilaian_n == '2' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_n" value="3" <?php echo $tracer->penilaian_n == '3' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_n" value="4" <?php echo $tracer->penilaian_n == '4' ? 'checked' : ""; ?>></td>
                                    <td><input type="radio" name="penilaian_n" value="5" <?php echo $tracer->penilaian_n == '5' ? 'checked' : ""; ?>></td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        <?php } else { ?>
            <table>
                <tr>
                    <td><i>DATA ISIAN TRACER STUDI</i></td>
                </tr>
                <tr>
                    <td><i><b style="color:red;">Alumni Ini Belum Mengisi Data Tracer</b></i></td>
                </tr>
            </table>
        <?php } ?>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>