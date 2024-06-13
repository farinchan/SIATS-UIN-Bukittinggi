<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/partisi/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('admin/partisi/navbar.php'); ?>
        <?php $this->load->view('admin/partisi/sidebar.php'); ?>
        <?php if ($this->uri->segment(3) == 'ftik') : ?>
            <?php $this->load->view('admin/modulstatistik/content_ftik.php'); ?>
        <?php elseif ($this->uri->segment(3) == 'febi') : ?>
            <?php $this->load->view('admin/modulstatistik/content_febi.php'); ?>
        <?php elseif ($this->uri->segment(3) == 'fuad') : ?>
            <?php $this->load->view('admin/modulstatistik/content_fuad.php'); ?>
        <?php elseif ($this->uri->segment(3) == 'syariah') : ?>
            <?php $this->load->view('admin/modulstatistik/content_syariah.php'); ?>
        <?php elseif ($this->uri->segment(3) == 'pascasarjana') : ?>
            <?php $this->load->view('admin/modulstatistik/content_pascasarjana.php'); ?>
        <?php endif; ?>
        <?php $this->load->view('admin/partisi/footer.php') ?>

    </div>
    <?php $this->load->view('admin/partisi/js.php') ?>

    <?php if ($this->uri->segment(3) == 'ftik') { ?>
        <?php $this->load->view('admin/modulstatistik/stat_ftik.php'); ?>
    <?php } ?>
    <?php if ($this->uri->segment(3) == 'febi') { ?>
        <?php $this->load->view('admin/modulstatistik/stat_febi.php'); ?>
    <?php } ?>
    <?php if ($this->uri->segment(3) == 'fuad') { ?>
        <?php $this->load->view('admin/modulstatistik/stat_fuad.php'); ?>
    <?php } ?>
    <?php if ($this->uri->segment(3) == 'syariah') { ?>
        <?php $this->load->view('admin/modulstatistik/stat_syariah.php'); ?>
    <?php } ?>
    <?php if ($this->uri->segment(3) == 'pascasarjana') { ?>
        <?php $this->load->view('admin/modulstatistik/stat_pasca.php'); ?>
    <?php } ?>


</body>

</html>