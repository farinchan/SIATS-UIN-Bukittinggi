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
            padding: 0px;
        }

        .table-custom {
            border: 1px solid black;
            margin: 2;
        }

        .container-t {
            margin: 0px;
            padding-bottom: 1cm;
            padding-left: 1cm;
            padding-right: 1cm;
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
            padding-left: 5px;
            padding-right: 5px;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <img src="<?= base_url("assets/report/header.png") ?>" class="img-fluid img-header" alt="...">
    <div class="container-t">
        <p class="text-center calibri mt-3">LAPORAN REKAPITULASI DATA ALUMNI</p>
        <p class="text-center calibri-bold">PENDIDIKAN TEKNIK INFORMATIKA DAN KOMPUTER</p>
        <p class="text-center calibri">UNIVERSITAS ISLAM NEGERI SJECH M. DJAMIL DJAMBEK BUKITTINGGI</p>
        <br>
        <table border="1" class=".table-custom">
            <thead>
                <tr>
                    <th class="text-center table-custom">NO</th>
                    <th class="text-center table-custom">NIA</th>
                    <th class="text-center table-custom">NAMA LENGKAP</th>
                    <th class="text-center table-custom">TAHUN MASUK</th>
                    <th class="text-center table-custom">TAHUN LULUS</th>
                    <th class="text-center table-custom">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($alumni as $x) { ?>
                    <tr>
                        <td class="text-center table-custom"><?= $i ?></td>
                        <td class="text-center table-custom"><?= $x->nisn ?></td>
                        <td class="table-custom"><?= $x->nama_alumni ?></td>
                        <td class="text-center table-custom" style="width: 60px;">20<?= substr($x->nisn,2,2)  ?></td>
                        <td class="text-center table-custom" style="width: 60px;"><?= $x->tahun_lulus ?></td>
                        <td class="text-center table-custom" style="width: 90px;"><?php if ($x->status_alumni != "bekerja") {
                            echo "Tidak Bekerja";
                        } else {
                            echo "Bekerja";
                        } ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php } ?>

            </tbody>
        </table>
        <br>
        <br>
<table>
    <tr>
        <td style="width: 350px;"></td>
        <td>Bukittinggi, <?= $tanggal_sekarang; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>Ka. Prodi PTIK</td>
    </tr>
    <tr>
        <td></td>
        <td style="height: 80px;"></td>
    </tr>
    <tr>
        <td></td>
        <td ><b>Hari Antoni Musril, M.Kom</b></td>
    </tr>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>