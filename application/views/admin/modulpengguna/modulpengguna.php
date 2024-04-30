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
    $('#list_alumni').DataTable(
    //     {
    //     searching: false,
    //     "processing": true,
    //     "serverSide": true,
    //     "responsive": true,
    //     "order": [],
    //     "ajax": {
    //         'url': '<?php echo base_url('admin/ModulPengguna/listpenilaian') ?>',
    //         'type': 'POST'
    //     },
    //     "columnDefs": [{
    //         'target': [0],
    //         'orderable': false
    //     }]
    // }
);
    $(document).ready(function() {

        $('#spinner').hide();

        $('#excel').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url('admin/ModulPengguna/importPenilaiain') ?>',
                type: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#spinner').show();
                    $('#submit').hide();
                },
                complete: function() {
                    $('#spinner').hide();
                    $('#submit').show();
                },
                success: function(data, xhr) {
                    swal(data)
                        .then((value) => {
                            location.reload();
                        });
                },
                error: function(xhr, status, error) {
                    console.log(xhr.status)
                    console.log(xhr.responseText);
                    alert("Error Kode : " + xhr.status + "; Ada NISN yang duplicate antara tabel alumni yang di database dan table di file excle");
                }
            });
        });
    });
</script>

</html>