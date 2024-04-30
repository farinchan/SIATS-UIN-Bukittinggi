<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('user/partisi/head.php') ?>

<body>

    <?php $this->load->view('user/partisi/navbar.php') ?>

    <main id="main">
        <?php $this->load->view('user/pengguna/form_pengguna.php') ?>
    </main>

    <?php $this->load->view('user/partisi/footer.php') ?>
    <?php $this->load->view('user/partisi/js.php') ?>
    <script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // console.log("<?php echo base_url('main/searchUserForPengguna'); ?>")
            $("#mySelect2").select2({
                placeholder: "Pilih item...",
                allowClear: true
            });
            $("#mySelect2").select2({

                minimumInputLength: 2,
                // multiple:true,
                // tokenSeparators: [',', ' '], 
                ajax: {
                    url: "<?php echo base_url('main/searchUserForPengguna'); ?>",
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

            var list_alumni = "[]"

            $('#mySelect2').on('change', function() {
                var hasil = document.getElementById('hasil_pencarian_lulusan');
                var selectedValues = String($(this).val());

                list_alumni = "[" + selectedValues + "]"
                console.log('Selected Values:', selectedValues);

                console.log(`<?php echo base_url('main/getLulusan?filter='); ?>[${selectedValues}]`);

                $.ajax({
                    type: "GET",
                    url: `<?php echo base_url('main/getLulusan?filter='); ?>[${selectedValues}]`, // Gantilah dengan URL target Anda
                    contentType: "application/json",
                    dataType: "json",
                    success: function(response) {
                        hasil.innerHTML = ''
                        response.forEach(element => {
                            hasil.innerHTML += `
                                <div class="card mt-3">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <img src="<?= base_url('assets/user/img/') ?>${element.foto}" alt="fotoprofile" class="img-thumbnail">
                                        </div>
                                        <div class="col-md-8">
                                        <h5 class="card-title">${element.nama}</h5>
                                        <p>${element.nisn} - Angkatan ${element.tahun_lulus}</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                `;
                        });
                        console.log("Respons dari server:", response);
                    },
                    error: function(error) {
                        console.error("Terjadi kesalahan:", error);
                    }
                });


            });

            $('#spinner').hide();

            $('#penilaian_pengguna').submit(function(e) {
                e.preventDefault();

                var pertanyaan2 = ""

                if (document.getElementById("pertanyaan2rb1").checked) {
                    pertanyaan2 = "2021"
                } else if (document.getElementById("pertanyaan2rb2").checked) {
                    pertanyaan2 = "2020"
                }else if (document.getElementById("pertanyaan2rb3").checked) {
                    pertanyaan2 = "2019"
                }else if (document.getElementById("pertanyaan2rb4").checked) {
                    pertanyaan2 = document.getElementById("pertanyaan2rb4yl").value
                }

                const data = {
                    nama: document.getElementById("nama").value,
                    jabatan: document.getElementById("jabatan").value,
                    instansi_lembaga: document.getElementById("instansi_lembaga").value,
                    alamat_lembaga: document.getElementById("alamat_lembaga").value,
                    no_telp: document.getElementById("no_telp").value,
                    no_fax: document.getElementById("no_fax").value,
                    email: document.getElementById("email").value,
                    pertanyaan1: document.getElementById("pertanyaan1").value,
                    pertanyaan2: pertanyaan2,
                    pertanyaan3:  document.querySelector('input[name="pertanyaan3"]:checked').value,
                    pertanyaan4:  document.querySelector('input[name="pertanyaan4"]:checked').value,
                    pertanyaan5:  document.querySelector('input[name="pertanyaan5"]:checked').value,
                    pertanyaan6:  document.querySelector('input[name="pertanyaan6"]:checked').value,
                    pertanyaan7:  document.querySelector('input[name="pertanyaan7"]:checked').value,
                    pertanyaan8:  document.querySelector('input[name="pertanyaan8"]:checked').value,
                    pertanyaan9:  document.querySelector('input[name="pertanyaan9"]:checked').value,
                    pertanyaan10:  document.querySelector('input[name="pertanyaan10"]:checked').value,
                    alumni_list: list_alumni,
                }


                $.ajax({
                    url: '<?php echo base_url('main/penilaianpengguna') ?>',
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
                        $('#penilaian_pengguna').trigger("reset");
                        console.log(data)
                        swal("Berhasil Disimpan, terima kasih kepada bapak/ibu yang telah mengisi penilaian pengguna");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log("ERROR");
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>


</body>

</html>