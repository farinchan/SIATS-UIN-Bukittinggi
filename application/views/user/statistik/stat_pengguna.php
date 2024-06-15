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
        <?php $this->load->view('user/statistik/content_stat_pengguna.php') ?>
    </main>

    <?php $this->load->view('user/partisi/footer.php') ?>
    <?php $this->load->view('user/partisi/js.php') ?>
    <script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
    <script>
        $(document).ready(function() {



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
                colors: ['#FF4560','#FEB019','#00E396','#008FFB', ],
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
            };


            var chartetika = new ApexCharts(document.querySelector("#chartetika"), pieOptions);
            chartetika.render();

            var p5chart = new ApexCharts(document.querySelector("#p5chart"), pieOptions);
            p5chart.render();

            var p6chart = new ApexCharts(document.querySelector("#p6chart"), pieOptions);
            p6chart.render();

            var p7chart = new ApexCharts(document.querySelector("#p7chart"), pieOptions);
            p7chart.render();

            var p8chart = new ApexCharts(document.querySelector("#p8chart"), pieOptions);
            p8chart.render();

            var p9chart = new ApexCharts(document.querySelector("#p9chart"), pieOptions);
            p9chart.render();

            var p10chart = new ApexCharts(document.querySelector("#p10chart"), pieOptions);
            p10chart.render();

            updateDataAlumni();

            function updateDataAlumni() {
                $.ajax({
                    url: '<?php echo base_url('main/StatPengguna'); ?>',
                    type: 'GET',
                    success: function(response) {

                        console.log(response);

                        var pertanyaan3Result = [];
                        pertanyaan3Result.push(response.pertanyaan3.filter(function(item) {
                            return item.value == "1 Bulan";
                        })[0]);
                        pertanyaan3Result.push(response.pertanyaan3.filter(function(item) {
                            return item.value == "2 Bulan";
                        })[0]);
                        pertanyaan3Result.push(response.pertanyaan3.filter(function(item) {
                            return item.value == "3 Bulan";
                        })[0]);
                        pertanyaan3Result.push(response.pertanyaan3.filter(function(item) {
                            return item.value == "4 Bulan";
                        })[0]);
                        pertanyaan3Result.push(response.pertanyaan3.filter(function(item) {
                            return item.value == "5 Bulan";
                        })[0]);
                        pertanyaan3Result.push(response.pertanyaan3.filter(function(item) {
                            return item.value == "6 - 18 Bulan";
                        })[0]);
                        pertanyaan3Result.push(response.pertanyaan3.filter(function(item) {
                            return item.value == "> 18 Bulan";
                        })[0]);

                        // Start - Pertanyaan 1 - Status Pekerjaan

                        document.getElementById("tabel_status_pekerjaan").innerHTML = pertanyaan3Result.map(function(item, i) {
                            console.log(item);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')

                        chartStatusBekerja.updateSeries([{
                            data: pertanyaan3Result.map(function(item) {
                                return item.jumlah;
                            })
                        }]);

                        chartStatusBekerja.updateOptions({
                            xaxis: {
                                categories: pertanyaan3Result.map(function(item) {
                                    return item.value;
                                })
                            }
                        });

                        // End - Pertanyaan 1 - Status Pekerjaan

                        function sortingJawaban(pertanyan) {
                            var result = [];
                            result.push(pertanyan.filter(function(item) {
                                return item.value == "1 - Kurang";
                            })[0]);
                            result.push(pertanyan.filter(function(item) {
                                return item.value == "2 - Cukup";
                            })[0]);
                            result.push(pertanyan.filter(function(item) {
                                return item.value == "3 - Baik";
                            })[0]);
                            result.push(pertanyan.filter(function(item) {
                                return item.value == "4 - Sangat Baik";
                            })[0]);
                            return result;
                        }

                        // Start - Pertanyaan 4 - etika
                        var pertayaan4Result = sortingJawaban(response.pertanyaan4);
                        console.log("pertayaan4Result", pertayaan4Result);
                        document.getElementById("tabel_etika").innerHTML = pertayaan4Result.map(function(item, i) {
                            console.log(response.pertanyaan4);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')

                        chartetika.updateOptions({
                            series: pertayaan4Result.map(function(item) {
                                return item.jumlah;
                            }),
                            labels: pertayaan4Result.map(function(item) {
                                return item.value;
                            }),
                        });
                        // End - Pertanyaan 4 - etika

                        // Start - Pertanyaan 5 - Keahlian pada Bidang Ilmu
                        var pertanyaan5Result = sortingJawaban(response.pertanyaan5);
                        document.getElementById("tabel_keahlian_bidang_ilmu").innerHTML = pertanyaan5Result.map(function(item, i) {
                            console.log(response.pertanyaan5);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')
                        p5chart.updateOptions({
                            series: pertanyaan5Result.map(function(item) {
                                return item.jumlah;
                            }),
                            labels: pertanyaan5Result.map(function(item) {
                                return item.value;
                            }),
                        });
                        // End - Pertanyaan 5 - Keahlian pada Bidang Ilmu

                        // Start - Pertanyaan 6 - Kemampuan Berbahasa Asing
                        var pertanyaan6Result = sortingJawaban(response.pertanyaan6);
                        document.getElementById("tabel_kemampuan_berbahasa_asing").innerHTML = pertanyaan6Result.map(function(item, i) {
                            console.log(response.pertanyaan6);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')

                        p6chart.updateOptions({
                            series: pertanyaan6Result.map(function(item) {
                                return item.jumlah;
                            }),
                            labels: pertanyaan6Result.map(function(item) {
                                return item.value;
                            }),
                        });
                        // End - Pertanyaan 6 - Kemampuan Berbahasa Asing

                        // Start - Pertanyaan 7 - Penggunaan Teknologi Informasi
                        var pertanyaan7Result = sortingJawaban(response.pertanyaan7);
                        document.getElementById("tabel_penggunaan_teknologi_informasi").innerHTML = pertanyaan7Result.map(function(item, i) {
                            console.log(response.pertanyaan7);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')
                        p7chart.updateOptions({
                            series: pertanyaan7Result.map(function(item) {
                                return item.jumlah;
                            }),
                            labels: pertanyaan7Result.map(function(item) {
                                return item.value;
                            }),
                        });
                        // End - Pertanyaan 7 - Penggunaan Teknologi Informasi
                        
                        // Start - Pertanyaan 8 - Kemampuan Berkomunikasi
                        var pertanyaan8Result = sortingJawaban(response.pertanyaan8);
                        document.getElementById("tabel_kemampuan_berkomunikasi").innerHTML = pertanyaan8Result.map(function(item, i) {
                            console.log(response.pertanyaan8);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')
                        p8chart.updateOptions({
                            series: pertanyaan8Result.map(function(item) {
                                return item.jumlah;
                            }),
                            labels: pertanyaan8Result.map(function(item) {
                                return item.value;
                            }),
                        });
                        // End - Pertanyaan 8 - Kemampuan Berkomunikasi

                        // Start - Pertanyaan 9 - Kerjasama
                        var pertanyaan9Result = sortingJawaban(response.pertanyaan9);
                        document.getElementById("tabel_kerjasama").innerHTML = pertanyaan9Result.map(function(item, i) {
                            console.log(response.pertanyaan9);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')
                        p9chart.updateOptions({
                            series: pertanyaan9Result.map(function(item) {
                                return item.jumlah;
                            }),
                            labels: pertanyaan9Result.map(function(item) {
                                return item.value;
                            }),
                        });
                        // End - Pertanyaan 9 - Kerjasama

                        // Start - Pertanyaan 10 - Pengembangan Diri
                        var pertanyaan10Result = sortingJawaban(response.pertanyaan10);
                        document.getElementById("tabel_pengembangan_diri").innerHTML = pertanyaan10Result.map(function(item, i) {
                            console.log(response.pertanyaan10);
                            return `<tr>
                                <td>${item.value}</td>
                                <td>${item.jumlah}</td>
                            </tr>`;
                        }).join('')
                        p10chart.updateOptions({
                            series: pertanyaan10Result.map(function(item) {
                                return item.jumlah;
                            }),
                            labels: pertanyaan10Result.map(function(item) {
                                return item.value;
                            }),
                        });
                        // End - Pertanyaan 10 - Pengembangan Diri



                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.log("Data Alumni Error : " + error.message);
                    }


                });

            }

        });
    </script>

</body>

</html>