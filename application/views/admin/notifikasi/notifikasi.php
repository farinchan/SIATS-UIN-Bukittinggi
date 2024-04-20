<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/partisi/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('admin/partisi/navbar.php'); ?>
        <?php $this->load->view('admin/partisi/sidebar.php'); ?>

        <?php
        if ($this->session->flashdata('location') == "notifikasi alumni") {
            $this->load->view('admin/notifikasi/contentalumni.php');
        } else if ($this->session->flashdata('location') == "notifikasi pengguna") {
            $this->load->view('admin/notifikasi/contentpengguna.php');
        } else if ($this->session->flashdata('location') == "notifikasi setting") {
            $this->load->view('admin/notifikasi/configuration.php');
        }
        ?>
        <?php $this->load->view('admin/partisi/footer.php') ?>
    </div>
    <?php $this->load->view('admin/partisi/js.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        
        $(document).ready(function() {

            $('#tabel-log').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,

            });

            // console.log("<?php echo base_url('admin/ModulNotifikasi/searchUser'); ?>")
            $("#mySelect2").select2({
                placeholder: "Pilih item...",
                allowClear: true
            });
            $("#mySelect2").select2({

                minimumInputLength: 2,
                // multiple:true,
                // tokenSeparators: [',', ' '], 
                ajax: {
                    url: "<?php echo base_url('admin/ModulNotifikasi/searchUser'); ?>",
                    dataType: 'json',
                    type: "GET",
                    delay: 250,
                    data: function(params) {
                        var query = {
                            keyword: params.term,
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.nia,
                                    text: item.nama + " - " + item.nia,
                                }
                            })
                        };
                    }

                },
            });

            $('#mySelect2').on('change', function() {
                var selectedValues = $(this).val();
                console.log('Selected Values:', selectedValues);
                console.log('Tipe Data', typeof selectedValues);
                document.getElementById("kirim_multiple").value = selectedValues

            });


            //Untuk Pengguna
            // console.log("<?php echo base_url('admin/ModulNotifikasi/searchPengguna'); ?>")
            $("#mySelect2pengguna").select2({
                placeholder: "Pilih item...",
                allowClear: true
            });
            $("#mySelect2pengguna").select2({

                minimumInputLength: 2,
                // multiple:true,
                // tokenSeparators: [',', ' '], 
                ajax: {
                    url: "<?php echo base_url('admin/ModulNotifikasi/searchPengguna'); ?>",
                    dataType: 'json',
                    type: "GET",
                    delay: 250,
                    data: function(params) {
                        var query = {
                            keyword: params.term,
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.nia,
                                    text: item.nama + " - " + item.instansi,
                                }
                            })
                        };
                    }
                },
            });


            $('#mySelect2pengguna').on('change', function() {
                var selectedValues = $(this).val();
                console.log('Selected Values:', selectedValues);
                console.log('Tipe Data', typeof selectedValues);
                document.getElementById("kirim_multiple").value = selectedValues

            });

            var selectElement = document.getElementById("dikirim_untuk");
            selectElement.addEventListener("change", function() {
                var selectedValue = selectElement.value;
                console.log("Nilai yang dipilih: " + selectedValue);
            });

            $('#spinner').hide();

            $('#kirim_notifikasi').submit(function(e) {
                const data = {
                    label_notifikasi: document.getElementById("labelNotifikasi").value,
                    dikirim_untuk: document.getElementById("dikirim_untuk").value,
                    kirim_kepada: "[" + document.getElementById("kirim_multiple").value + "]",
                    whatsapp_notifikasi: document.getElementById("wacb").checked,
                    email_notifikasi: document.getElementById("emailcb").checked,
                    isi_notifikasi: document.getElementById("isi_notifikasi").value,
                }

                console.log(data);

                e.preventDefault();
                $.ajax({
                    url: '<?php echo base_url('admin/ModulNotifikasi/saveNotifikasi') ?>',
                    type: 'POST',
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: "application/json",
                    beforeSend: function() {
                        $('#spinner').show();
                    },
                    complete: function() {
                        $('#spinner').hide();
                    },
                    success: function(data) {
                        $('#kirim_notifikasi').trigger("reset");
                        console.log(data)
                        swal(data["status"]);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log("ERROR");
                        console.log(xhr.responseText);
                    }
                });
            });

            <?php if ($this->uri->segment(3) == "alumni") { ?>

                $('#spinnerNC1').hide();

                document.getElementById("notifikasicepat1").addEventListener("click", function() {
                    $.ajax({
                        url: '<?php echo base_url('admin/ModulNotifikasi/notifikasicepat1') ?>',
                        type: 'POST',
                        beforeSend: function() {
                            $('#spinnerNC1').show();
                        },
                        complete: function() {
                            $('#spinnerNC1').hide();
                        },
                        success: function(data) {
                            console.log(data)
                            swal("Notifikasi Berhasil Dikirim");
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log("ERROR");
                            console.log(xhr.responseText);
                        }
                    });
                });
            <?php } ?>

        });
    </script>

</body>

</html>