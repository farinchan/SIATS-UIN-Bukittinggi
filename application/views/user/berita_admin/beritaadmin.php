<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php foreach ($web as $x) : ?>

        <?php if (isset($title)) { ?>
            <title><?= $title ?> - <?php echo $x->nama_website; ?></title>

            <meta content="<?= substr(strip_tags($description), 0, 200);  ?> " name="description">
            <meta content="<?= $title ?>" name="keywords">
        <?php } else { ?>
            <title><?php echo $this->session->flashdata('location'); ?> - <?php echo $x->nama_website; ?></title>

        <?php } ?>

        <!-- Favicons -->
        <link href="<?php echo base_url('assets/img/' . $x->logo) ?>" rel="icon" type="image/gif" sizes="16x16">
    <?php endforeach; ?>

    <?php if (isset($title)) { ?>

        <meta content="<?= substr(strip_tags($description), 0, 200);  ?> " name="description">
        <meta content="<?= $title ?>" name="keywords">
    <?php } ?>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mycss.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/leaflet/leaflet-search/dist/leaflet-search.src.css" />
    <style>
        #map {
            height: 550px;
        }
    </style>
    </style>

    <!-- css untuk select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <?php $this->load->view('user/partisi/navbar.php') ?>

    <main id="main">
        <?php echo $content; ?>
    </main>

    <?php $this->load->view('user/partisi/footer.php') ?>
    <?php $this->load->view('user/partisi/js.php') ?>
    <script>
        $('#pagination').on('click', 'a', function(e) {
            e.preventDefault();
            var pageno = $(this).attr('data-ci-pagination-page');
            loadPagination(pageno);
        });

        loadPagination(0);

        function loadPagination(pagno) {
            $.ajax({
                url: 'listberitadmin/' + pagno,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#pagination').html(response.pagination);
                    createList(response.result, response.row);
                }
            });
        }

        function createList(result, sno) {
            sno = Number(sno);
            $('#databerita').empty();
            for (index in result) {
                var judul_berita = result[index].judul_berita;
                var isi_berita = result[index].isi_berita;
                var gambar_berita = result[index].gambar_berita;
                var tanggal_posting = result[index].tanggal_posting;
                var total_dilihat = result[index].total_dilihat;
                var id_berita = result[index].id_berita;

                sno += 1;
                var html = '';
                var OriginalString = removeTags(isi_berita);
                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                const Datetime = new Date(tanggal_posting);

                html += '<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">';
                html += '<div class="member"><div class="member-img">';
                html += '<img src="<?php echo base_url('assets/berita/'); ?>' + gambar_berita + '" class="img-fluid" alt="">';
                html += '<div class="social">';
                html += '<a href="https://twitter.com/share?url=<?php echo base_url('main/bacaberita/'); ?>' + id_berita + '"><i class="fab fa-twitter-square"></i></a>';
                html += '<a href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=' + judul_berita + '&amp;p[url]=<?php echo base_url('main/bacaberita/'); ?>' + id_berita + '"&amp;&p[images][0]=<?php echo base_url('assets/berita/'); ?>' + gambar_berita + '"><i class="fab fa-facebook-square"></i></a>';
                html += '<a target="BLANK" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url('main/bacaberita/'); ?>' + id_berita + '"&title=' + judul_berita + '"><i class="fab fa-linkedin"></i></a>';
                html += '</div></div>';
                html += '<div class="member-info">';
                html += '<a href="<?php echo base_url('main/beritadmin/') ?>' + id_berita + '" id="populer">' + judul_berita + '</a>';
                html += '<span id="card-donasi"><i class="far fa-calendar-alt"></i> ' + Datetime.getDate() + ' ' + monthNames[Datetime.getMonth()] + ' ' + Datetime.getFullYear() + ' &bull; <i class="fas fa-bolt"></i> dilihat ' + total_dilihat + '</span>';
                html += '<p id="card-donasi">' + OriginalString.substr(0, 60) + '...</p>';
                html += '</div></div></div>';

                $('#databerita').append(html);

            }
        }

        function removeTags(str) {
            if ((str === null) || (str === ''))
                return false;
            else
                str = str.toString();
            return str.replace(/(<([^>]+)>)/ig, '');
        }
    </script>
</body>

</html>