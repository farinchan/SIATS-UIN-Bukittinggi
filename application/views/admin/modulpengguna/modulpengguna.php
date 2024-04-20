<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/partisi/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('admin/partisi/navbar.php'); ?>
        <?php $this->load->view('admin/partisi/sidebar.php'); ?>

        <?php $this->load->view('admin/modulpengguna/content.php'); ?>
        <?php $this->load->view('admin/partisi/footer.php') ?>
    </div>
    <?php $this->load->view('admin/partisi/js.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    

</body>

<script>
     $('#list_alumni').DataTable({
            "processing" : true,
            "serverSide" : true,
            "responsive" : true,
            "order" : [],
            "ajax" : {
                'url' : '<?php echo base_url('admin/ModulPengguna/listpenilaian') ?>',
                'type' : 'POST'
            },
            "columnDefs":[
                {
                    'target':[0],
                    'orderable':false
                }
            ]
        });
</script>

</html>