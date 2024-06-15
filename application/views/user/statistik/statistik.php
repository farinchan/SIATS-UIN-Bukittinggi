<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('user/partisi/head.php') ?>
<style>
    .card-margin {
        margin-bottom: 1.875rem;
    }

    .card {
        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid #e6e4e9;
        border-radius: 8px;
    }

    .card .card-header.no-border {
        border: 0;
    }

    .card .card-header {
        background: none;
        padding: 0 0.9375rem;
        /* font-weight: 500; */
        /* display: flex; */
        align-items: center;
        min-height: 50px;
    }

    .card .card-header h5.card-title {
        margin-top: 20px;
        margin-bottom: 0;
        font-size: 1.0625rem;
        font-weight: 900;
        color: #32325d;
    }

    .card .card-header .card-subtitle {
        font-size: 0.8125rem;
        color: #8898aa;
        margin-bottom: 0;
        margin-top: -20px;
    }

    .card-header:first-child {
        border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
    }

    .select2-hidden-accessible {
        border: 0 !important;
        clip: rect(0 0 0 0) !important;
        height: 1px !important;
        margin: -1px !important;
        overflow: hidden !important;
        padding: 0 !important;
        position: absolute !important;
        width: 1px !important
    }

    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
    }

    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0;
        padding: 6px 12px;
        height: 34px
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #aaa;
        border-radius: 4px
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 28px;
        user-select: none;
        -webkit-user-select: none
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-right: 10px
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 0;
        padding-right: 0;
        height: auto;
        margin-top: -3px
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 28px
    }

    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0 !important;
        padding: 6px 12px;
        height: 40px !important
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 6px !important;
        right: 1px;
        width: 20px
    }
</style>

<body>

    <?php $this->load->view('user/partisi/navbar.php') ?>

    <main id="main">
        <?php $this->load->view('user/statistik/content.php') ?>
    </main>

    <?php $this->load->view('user/partisi/footer.php') ?>
    <?php $this->load->view('user/partisi/js.php') ?>
    <script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
    <script>
        $(document).ready(function() {
            const tahunDariSelect = document.getElementById('tahunDariSelect');
            const tahunSampaiSelect = document.getElementById('tahunSampaiSelect');
            const fakultasSelect = document.getElementById('fakultasSelect');
            const jenjangSelect = document.getElementById('jenjangSelect');
            const prodiSelect = document.getElementById('prodiSelect');

            var options = {
                series: [{
                    name: 'Jumlah Alumni',
                    data: []
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        borderRadiusApplication: 'end',
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: true
                },
                legend: {
                    show: true,
                },
                xaxis: {
                    categories: [],
                }
            };
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();

            var status_bekerja = {
                series: [{
                    name: 'Jumlah',
                    data: []
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        columnWidth: '55%',
                        endingShape: 'rounded',
                        borderRadius: 4,
                        borderRadiusApplication: 'end',
                    },

                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    title: {
                        text: 'Jumlah'
                    },
                    categories: [],
                },
                yaxis: {

                    reversed: true

                },
                fill: {
                    opacity: 1
                },
            };

            var chartStatusBekerja = new ApexCharts(document.querySelector("#chartStatusBekerja"), status_bekerja);
            chartStatusBekerja.render();

            var pieOptions = {
                series: [],
                colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#546E7A', '#26a69a', '#D10CE8 ', '#FFD700', '#FF6347', '#FF8C00', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500', '#FFD700', '#FF4500', '#FF1493', '#FF00FF', '#FF69B4', '#FFB6C1', '#FFA07A', '#FFA500'],
                chart: {
                    height: 380,
                    type: 'pie',
                },
                labels: [],
                legend: {
                    position: 'bottom'
                },

                dataLabels: {
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex];
                    },
                },


                // responsive: [{
                //     breakpoint: 480,
                //     options: {
                //         chart: {
                //             width: 200
                //         },
                //         legend: {
                //             position: 'bottom'
                //         }
                //     }
                // }]
            };

            var chartMendapatKerja = new ApexCharts(document.querySelector("#chartMendapatKerja"), pieOptions);
            chartMendapatKerja.render();

            var chartPenghasilan = new ApexCharts(document.querySelector("#chartPenghasilan"), pieOptions);
            chartPenghasilan.render();

            var chartKategori = new ApexCharts(document.querySelector("#chartKategori"), pieOptions);
            chartKategori.render();

            var chartTingkatKerja = new ApexCharts(document.querySelector("#chartTingkatKerja"), pieOptions);
            chartTingkatKerja.render();

            var chartKompetensi = new ApexCharts(document.querySelector("#chartKompetensi"), pieOptions);
            chartKompetensi.render();

            updateDataAlumni();

            function updateDataAlumni() {
                $.ajax({
                    url: '<?php echo base_url('main/statAjax'); ?>',
                    type: 'GET',
                    data: {
                        'tahun_dari': tahunDariSelect.value,
                        'tahun_sampai': tahunSampaiSelect.value,
                        'jenjang': jenjangSelect.value,
                        'fakultas': fakultasSelect.value,
                        'prodi': prodiSelect.value
                    },
                    success: function(response) {

                        console.log(response);
                        document.getElementById("total_data").innerHTML = response["total_data_alumni"];

                        chart.updateSeries([{
                            data: response.data_alumni.map(function(item) {
                                return item.jumlah_alumni;
                            }),
                        }]);
                        chart.updateOptions({
                            xaxis: {
                                categories: response.data_alumni.map(function(item) {
                                    return item.nama;
                                })
                            }
                        });



                        // Start - Pertanyaan 1 - Status Pekerjaan
                        let datap1 = []
                        let categoriesp1 = []
                        data = 0
                        response.data_tracer.p1.forEach(element => {
                            if (element.value == "Bekerja (Penuh/ Paruh Waktu)" || element.value == "Wiraswasta" || element.value == "Melanjutkan Pendidikan" || element.value == "Sedang Mencari Kerja") {
                                datap1.push(element.jumlah);
                                categoriesp1.push(element.value);
                            } else {
                                data = data + element.jumlah;
                            }
                        });
                        categoriesp1.push("lainnya");
                        datap1.push(data);

                        document.getElementById("tabel_status_pekerjaan").innerHTML = categoriesp1.map(function(item, i) {
                            console.log(item);
                            return `<tr>
                                <td>${item}</td>
                                <td>${datap1[i]}</td>
                            </tr>`;
                        }).join('')

                        chartStatusBekerja.updateSeries([{
                            data: datap1,
                        }]);

                        chartStatusBekerja.updateOptions({
                            xaxis: {
                                categories: categoriesp1
                            }
                        });

                        // End - Pertanyaan 1 - Status Pekerjaan

                        var p2Result = [];
                        p2Result.push(response.data_tracer.p2.filter(function(item) {
                            return item.value == "1 Bulan";
                        })[0]);
                        p2Result.push(response.data_tracer.p2.filter(function(item) {
                            return item.value == "2 Bulan";
                        })[0]);
                        p2Result.push(response.data_tracer.p2.filter(function(item) {
                            return item.value == "3 Bulan";
                        })[0]);
                        p2Result.push(response.data_tracer.p2.filter(function(item) {
                            return item.value == "4 Bulan";
                        })[0]);
                        p2Result.push(response.data_tracer.p2.filter(function(item) {
                            return item.value == "5 Bulan";
                        })[0]);
                        p2Result.push(response.data_tracer.p2.filter(function(item) {
                            return item.value == "6 - 18 Bulan";
                        })[0]);
                        p2Result.push(response.data_tracer.p2.filter(function(item) {
                            return item.value == "> 18 Bulan";
                        })[0]);
                        console.log(p2Result);

                        // Start - Pertanyaan 2 - Mendapat Pekerjaan
                        let datap2 = []
                        let categoriesp2 = []
                        p2Result.forEach(element => {
                            if (element.value == "1 Bulan" || element.value == "2 Bulan" || element.value == "3 Bulan" || element.value == "4 Bulan" || element.value == "5 Bulan" || element.value == "6 Bulan" || element.value == "6 - 18 Bulan" || element.value == "> 18 Bulan") {
                                datap2.push(element.jumlah);
                                categoriesp2.push(element.value);
                            }
                        });

                        document.getElementById("tabel_mendapat_kerja").innerHTML = categoriesp2.map(function(item, i) {
                            console.log(datap2[i]);
                            return `<tr>
                                <td>${item}</td>
                                <td>${datap2[i]}</td>
                            </tr>`;
                        }).join('')

                        chartMendapatKerja.updateOptions({
                            series: datap2,
                            labels: categoriesp2,
                            legend: {
                                position: 'right'
                            }
                        });
                        // End - Pertanyaan 2 - Mendapat Pekerjaan

                        // Start - Pertanyaan 3 - Penghasilan Pekerjaan
                        let datap3 = []
                        let categoriesp3 = []
                        console.log(response.data_tracer.p3);
                        response.data_tracer.p3.forEach(element => {
                            datap3.push(element.jumlah);
                            categoriesp3.push(element.value);

                        });

                        document.getElementById("tabel_penghasilan").innerHTML = categoriesp3.map(function(item, i) {
                            console.log(datap3[i]);
                            return `<tr>
                                <td>${item}</td>
                                <td>${datap3[i]}</td>
                            </tr>`;
                        }).join('')


                        chartPenghasilan.updateOptions({
                            series: datap3,
                            labels: categoriesp3
                        });
                        // End - Pertanyaan 3 - Penghasilan Pekerjaan

                        // Start - Pertanyaan 4 - Kategori Pekerjaan
                        // let datap4 = []
                        // let categoriesp4 = []
                        // response.data_tracer.p4.forEach(element => {
                        //     if (element.value == "Institusi/Organisasi Multilateral" || element.value == "Lembaga Pemerintah/BUMN/BUMD" || element.value == "Perusahaan Swasta" || element.value == "Wirausaha") {
                        //         datap4.push(element.jumlah);
                        //         categoriesp4.push(element.value);
                        //     }
                        // });

                        // document.getElementById("tabel_kategori").innerHTML = categoriesp4.map(function(item, i) {
                        //     return `<tr>
                        //         <td>${item}</td>
                        //         <td>${datap4[i]}</td>
                        //     </tr>`;
                        // }).join('')

                        // chartKategori.updateOptions({
                        //     series: datap4,
                        //     labels: categoriesp4
                        // });
                        // End - Pertanyaan 4 - Kategori Pekerjaan

                        // Start - Pertanyaan 5 - Tingkat Tempat Kerja
                        let datap5 = []
                        let categoriesp5 = []
                        console.log(response.data_tracer.p5);
                        response.data_tracer.p5.forEach(element => {
                            datap5.push(element.jumlah);
                            categoriesp5.push(element.value);

                        });

                        document.getElementById("tabel_tingkat_kerja").innerHTML = categoriesp5.map(function(item, i) {
                            console.log(datap5[i]);
                            return `<tr>
                                <td>${item}</td>
                                <td>${datap5[i]}</td>
                            </tr>`;
                        }).join('')


                        chartTingkatKerja.updateOptions({
                            series: datap5,
                            labels: categoriesp5
                        });
                        // End - Pertanyaan 5 - Tingkat Tempat Kerja

                        // Start - Pertanyaan 6 - kesesuaian Kompetensi
                        let datap6 = []
                        let categoriesp6 = []
                        console.log(response.data_tracer.p6);
                        response.data_tracer.p6.forEach(element => {
                            datap6.push(element.jumlah);
                            categoriesp6.push(element.value);

                        });

                        document.getElementById("tabel_kompetensi").innerHTML = categoriesp6.map(function(item, i) {
                            console.log(datap6[i]);
                            return `<tr>
                                <td>${item}</td>
                                <td>${datap6[i]}</td>
                            </tr>`;
                        }).join('')


                        chartKompetensi.updateOptions({
                            series: datap6,
                            labels: categoriesp6
                        });
                        // End - Pertanyaan 6 - kesesuaian Kompetensi

                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.log("Data Alumni Error : " + error.message);
                    }


                });

            }

            var pilJenjang = "0";
             var pilFakultas = "0";

            function UpdateProdi() {
                $.ajax({
                url: '<?php echo base_url('main/getProdiList'); ?>' + '?fakultas=' + pilFakultas + '&jenjang=' + pilJenjang,
                type: 'GET',
                success: function(response) {
                    console.log("Data Prodi : " + response);
                    prodiSelect.innerHTML = '<option value="0" selected >Semua Prodi</option>';
                    prodiSelect.innerHTML += response.prodi.map(function(item) {
                        return `<option value="${item.kode}"> ${item.jenjang} - ${item.nama}</option>`;
                    }).join('');
                },
                error: function(xhr, status, error) {
                    // Handle the error here
                    console.log("Data Prodi Error : " + error.message);
                }
            });
            }

           

            tahunDariSelect.addEventListener('change', function() {
                updateDataAlumni()
            });

            tahunSampaiSelect.addEventListener('change', function() {
                updateDataAlumni()
            });

            fakultasSelect.addEventListener('change', function() {
                pilFakultas = fakultasSelect.value;
                UpdateProdi();
                updateDataAlumni()
            });

            jenjangSelect.addEventListener('change', function() {
                pilJenjang = jenjangSelect.value;
                UpdateProdi();
                updateDataAlumni()
            });

            prodiSelect.addEventListener('change', function() {
                updateDataAlumni()
            });
            

        });
    </script>

</body>

</html>