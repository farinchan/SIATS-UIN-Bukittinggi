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
        <p class="text-center calibri-bold">ALUMNI</p>
        <!-- <p class="text-center calibri-bold">PENDIDIKAN TEKNIK INFORMATIKA DAN KOMPUTER</p> -->
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
                    <td>Jelaskan status Anda saat ini ?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->p1 ?></b></td>
                </tr>
                <tr>
                    <td>2. </td>
                    <td>Dalam berapa bulan anda mendapatkan pekerjaan / Berapa bulan waktu untuk mendapatkan pekerjaan pertama?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->p2 ?></b></td>
                </tr>
                <tr>
                    <td>3. </td>
                    <td>Berapa rata-rata penghasilan Anda per bulan?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->p3 ?></b></td>
                </tr>
                <tr>
                    <td>4. </td>
                    <td>Kategori tempat bekerja</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->p4 ?></b></td>
                </tr>
                <tr>
                    <td>5. </td>
                    <td>Apa tingkat tempat kerja Anda?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->p5 ?></b></td>
                </tr>
                <tr>
                    <td>6. </td>
                    <td>Kesesuaian bidang kerja dengan kompetensi bidang studi yang ditamatkan?</td>
                </tr>
                <tr>
                    <td style="width: 20px;"></td>
                    <td><b><?= $tracer->p6 ?></b></td>
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