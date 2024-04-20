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

            var list_alumni= "[]"

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

            const pertanyaan2rb1 = document.getElementById('pertanyaan2rb1');
            const pertanyaan2rb2 = document.getElementById('pertanyaan2rb2');
            pertanyaan2rb1.addEventListener('change', UpdatePertanyaan2);
            pertanyaan2rb2.addEventListener('change', UpdatePertanyaan2);

            function UpdatePertanyaan2() {
                var rb_pertanyaan2_ada = document.getElementById('rb_pertanyaan2_ada');
                var rb_pertanyaan2_tidakada = document.getElementById('rb_pertanyaan2_tidakada');

                if (pertanyaan2rb1.checked) {
                    console.log("ada : " + pertanyaan2rb1.checked);
                    rb_pertanyaan2_ada.innerHTML = `
                                        <li class="mb-3">
                                        <div class="form-group">
                                        <label for="pertanyaan3">Bagaimanakah kinerja alumni tersebut menurut Bapak/Ibu ?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan3" id="pertanyaan3rb1" value="Sangat baik">
                                            <label class="form-check-label" for="pertanyaan3">
                                            Sangat baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan3" id="pertanyaan3rb2" value="Baik">
                                            <label class="form-check-label" for="pertanyaan3">
                                            Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan3" id="pertanyaan3rb3" value="Sedang">
                                            <label class="form-check-label" for="pertanyaan3">
                                            Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan3" id="pertanyaan3rb4" value="Jelek">
                                            <label class="form-check-label" for="pertanyaan3">
                                            Jelek
                                            </label>
                                        </div>
                                        </div>
                                    </li>
    
                                    <li class="mb-3">
                                        <div class="form-group">
                                        <label for="pertanyaan4">Bidang yang kurang dikuasai alumni kami adalah</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb1" value="Komunikasi dan presentasi terutama penggunaan Bahasa Inggris" checked>
                                            <label class="form-check-label" for="pertanyaan4">
                                            Komunikasi dan presentasi terutama penggunaan Bahasa Inggris
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb2" value="Komputer atau pemanfaatan IT secara umum" checked>
                                            <label class="form-check-label" for="pertanyaan4">
                                            Komputer atau pemanfaatan IT secara umum
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb3" value="Numerik" checked>
                                            <label class="form-check-label" for="pertanyaan4">
                                            Numerik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb4" value="Memimpin (leadership)" checked>
                                            <label class="form-check-label" for="pertanyaan4">
                                            Memimpin (leadership)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb5" value="Mengembangkan pola kerja" checked>
                                            <label class="form-check-label" for="pertanyaan4">
                                            Mengembangkan pola kerja
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb6" value="Bekerjasama dalam tim" checked>
                                            <label class="form-check-label" for="pertanyaan4">
                                            Bekerjasama dalam tim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan4" id="pertanyaan4rb7" value="Lainnya" checked>
                                            <label class="form-check-label" for="pertanyaan4">
                                            Lainnya, sebutkan
                                            <input type="text" class="form-control" name="lainnyapertanyaan4" id="lainnyapertanyaan4">
                                            </label>
                                        </div>
                                        </div>
                                    </li>
    
                                    <li class="mb-3">
                                        <div class="form-group">
                                        <label for="pertanyaan5">Perlukah diadakan mata kuliah – mata kuliah pilihan baru/ ketrampilan/kompetensi tambahan untuk mengantipasi kemajuan di bidang yang Bapak/Ibu kelola ?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan5" id="pertanyaan5rb1" value="Perlu" checked>
                                            <label class="form-check-label" for="pertanyaan5">
                                            Perlu, sebutkan
                                            <input type="text" class="form-control" name="perlupertanyaan5" id="perlupertanyaan5">
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan5" id="pertanyaan5rb2" value="Tidak Perlu" checked>
                                            <label class="form-check-label" for="pertanyaan5">
                                            Tidak perlu
                                            </label>
                                        </div>
                                        </div>
                                    </li>
                                    `;
                    rb_pertanyaan2_tidakada.innerHTML = ``;
                } else if (pertanyaan2rb2.checked) {
                    console.log("Tidak Ada : " + pertanyaan2rb2.checked);
                    rb_pertanyaan2_tidakada.innerHTML = `
                                        <label for="pertanyaan2">Jika saat ini tidak ada alumni kami yang bekerja pada lembaga ini, sebutkan alasannya</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan2rb2" id="pertanyaan2rb2p1" value="Tidak ada yang melamar">
                                            <label class="form-check-label" for="pertanyaan2">
                                            Tidak ada yang melamar
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan2rb2" id="pertanyaan2rb2p2" value="Kalah bersaing">
                                            <label class="form-check-label" for="pertanyaan2">
                                            Kalah bersaing
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pertanyaan2rb2" id="pertanyaan2rb2p3">
                                            <label class="form-check-label" for="pertanyaan2">
                                            Alasan lainnya (tuliskan) <input type="text" class="form-control" name="pertanyaan2rb2p3lain" id="pertanyaan2rb2p3lain">
                                            </label>
                                        </div>
                                    `;
                    rb_pertanyaan2_ada.innerHTML = ``;


                } else {
                    rb_pertanyaan2_ada.innerHTML = ``;
                    rb_pertanyaan2_tidakada.innerHTML = ``;
                }
            }

            $('#spinner').hide();

            $('#penilaian_pengguna').submit(function(e) {
                e.preventDefault();

                var pertanyaan1 = ""
                if (document.getElementById("pertanyaan1rb1").checked) {
                    pertanyaan1 = "Pendidikan"
                } else if (document.getElementById("pertanyaan1rb2").checked) {
                    pertanyaan1 = "Industri, " + document.getElementById("industri").value
                } else if (document.getElementById("pertanyaan1rb3").checked) {
                    pertanyaan1 = "Jasa, " + document.getElementById("jasa").value
                } else if (document.getElementById("pertanyaan1rb4").checked) {
                    pertanyaan1 = "Perdagangan/Bisnis"
                } else if (document.getElementById("pertanyaan1rb5").checked) {
                    pertanyaan1 = "Pertanian"
                } else if (document.getElementById("pertanyaan1rb6").checked) {
                    pertanyaan1 = "Kebudayaan dan Pariwisata"
                } else if (document.getElementById("pertanyaan1rb7").checked) {
                    pertanyaan1 = "Lain-lain, " + document.getElementById("lain-lain").value
                }

                var pertanyaan2 = ""
                var pertanyaan3 = ""
                var pertanyaan4 = ""
                var pertanyaan5 = ""
                if (document.getElementById("pertanyaan2rb1").checked) {
                    pertanyaan2 = "Ada, " + document.getElementById("ada").value + " Orang"

                    if (document.getElementById("pertanyaan3rb1").checked) {
                        pertanyaan3 = "Sangat baik"
                    } else if (document.getElementById("pertanyaan3rb2").checked) {
                        pertanyaan3 = "Baik"
                    } else if (document.getElementById("pertanyaan3rb3").checked) {
                        pertanyaan3 = "Sedang"
                    } else if (document.getElementById("pertanyaan3rb4").checked) {
                        pertanyaan3 = "Jelek"
                    }


                    if (document.getElementById("pertanyaan4rb1").checked) {
                        pertanyaan4 = "Komunikasi dan presentasi terutama penggunaan Bahasa Inggris"
                    } else if (document.getElementById("pertanyaan4rb2").checked) {
                        pertanyaan4 = "Komputer atau pemanfaatan IT secara umum"
                    } else if (document.getElementById("pertanyaan4rb3").checked) {
                        pertanyaan4 = "Numerik"
                    } else if (document.getElementById("pertanyaan4rb4").checked) {
                        pertanyaan4 = "Memimpin (leadership)"
                    } else if (document.getElementById("pertanyaan4rb5").checked) {
                        pertanyaan4 = "Mengembangkan pola kerja"
                    } else if (document.getElementById("pertanyaan4rb6").checked) {
                        pertanyaan4 = "Bekerjasama dalam tim"
                    } else if (document.getElementById("pertanyaan4rb7").checked) {
                        pertanyaan4 = "Lainnya, " + document.getElementById("lainnyapertanyaan4").value
                    }


                    if (document.getElementById("pertanyaan5rb1").checked) {
                        pertanyaan5 = "Perlu, " + document.getElementById("perlupertanyaan5").value
                    } else if (document.getElementById("pertanyaan5rb2").checked) {
                        pertanyaan5 = "Tidak Perlu"
                    }

                } else if (document.getElementById("pertanyaan2rb2").checked) {
                    if (document.getElementById("pertanyaan2rb2p1").checked) {
                        pertanyaan2 = "Tidak Ada, Tidak ada yang melamar"
                    } else if (document.getElementById("pertanyaan2rb2p2").checked) {
                        pertanyaan2 = "Tidak Ada, Kalah bersaing"
                    } else if (document.getElementById("pertanyaan2rb2p3").checked) {
                        pertanyaan2 = "Tidak Ada, " + document.getElementById("pertanyaan2rb2p3lain").value
                    }
                }




                const data = {
                    nama: document.getElementById("nama").value,
                    jabatan: document.getElementById("jabatan").value,
                    instansi_lembaga: document.getElementById("instansi_lembaga").value,
                    alamat_lembaga: document.getElementById("alamat_lembaga").value,
                    no_telp: document.getElementById("no_telp").value,
                    no_fax: document.getElementById("no_fax").value,
                    email: document.getElementById("email").value,
                    pertanyaan1: pertanyaan1,
                    pertanyaan2: pertanyaan2,
                    pertanyaan3: pertanyaan3,
                    pertanyaan4: pertanyaan4,
                    pertanyaan5: pertanyaan5,
                    pertanyaan6: document.getElementById("pertanyaan6").value,
                    pertanyaan7_1: document.getElementById("pertanyaan7_1").value,
                    pertanyaan7_2: document.getElementById("pertanyaan7_2").value,
                    pertanyaan7_3: document.getElementById("pertanyaan7_3").value,
                    pertanyaan7_4: document.getElementById("pertanyaan7_4").value,
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