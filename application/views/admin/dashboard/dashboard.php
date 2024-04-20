<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/partisi/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('admin/partisi/navbar.php'); ?>
        <?php $this->load->view('admin/partisi/sidebar.php'); ?>

        <?php $this->load->view('admin/dashboard/content.php'); ?>
        <?php $this->load->view('admin/partisi/footer.php') ?>

    </div>
    <?php $this->load->view('admin/partisi/js.php') ?>
    <script>
        $('#Loglogin').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "pageLength": 6,
            "lengthChange": false,
            "searching": false,
            "order": [],
            "ajax": {
                'url': '<?php echo base_url('admin/dashboard/loglogin') ?>',
                'type': 'POST'
            },
            "columnDefs": [{
                'target': [0],
                'orderable': false
            }]
        });
    </script>

    <script>
        $(document).ready(function() {
            // Mengirim permintaan AJAX ke server saat halaman HTML pertama kali dimuat
            console.log("<?php echo base_url(); ?>admin/dashboard/gisalumniget?filter=true")
            $.ajax({
                url: "<?php echo base_url(); ?>admin/dashboard/gisalumniget?filter=true",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var tahunkelulusan = <?php echo json_encode($lulus); ?>;

                    var map = L.map('map').setView([-0.36076903180249653, 117.42046949636378], 5);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '<a href="https://ikapetikom.or.id/">IKAPETIKOM</a> Ikatan Alumni Pendidkan Teknik Informatika dan Komputer',
                        maxZoom: 19,
                    }).addTo(map);

                    // START - MARKER UNTUK FUNGSI SEARCH
                    /*
                    note : jika ingin memakai fungsi search harap comment fitur group marker
                    */
                    // var markersLayer = new L.LayerGroup();
                    // map.addLayer(markersLayer);

                    // var controlSearch = new L.Control.Search({
                    //     position: 'topright',
                    //     layer: markersLayer,
                    //     initial: false,
                    //     zoom: 12,
                    //     marker: false
                    // });

                    // map.addControl(controlSearch);

                    // var UserMarker = L.icon({
                    //     iconUrl: '<?= base_url() ?>assets/user/placeholder.png',
                    //     iconSize: [28, 30], // size of the icon
                    // });
                    // tahunkelulusan.forEach(element => {
                    //     markersGroup = []
                    //     response[element.tahun_lulus].forEach(element => {
                    //         markersLayer.addLayer(L.marker(element["geometry"]["coordinates"], { title: element["properties"]["nama_alumni"], icon: UserMarker }).bindPopup(element["properties"]["popUp"]));
                    //     });
                    // });
                    // END - MARKER UNTUK FUNGSI SEARCH

                    var layerGroup = L.layerGroup().addTo(map);


                    // Tambahkan layer control
                    var baseLayers = {
                        'OpenStreetMap': L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '<a href="https://ikapetikom.or.id/">IKAPETIKOM</a> Ikatan Alumni Pendidkan Teknik Informatika dan Komputer',
                            maxZoom: 19,
                        }),
                        'OpenStreetMap.HOT': L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '<a href="https://ikapetikom.or.id/">IKAPETIKOM</a> Ikatan Alumni Pendidkan Teknik Informatika dan Komputer'
                        }),
                        'openTopoMap': L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '<a href="https://ikapetikom.or.id/">IKAPETIKOM</a> Ikatan Alumni Pendidkan Teknik Informatika dan Komputer'
                        })
                    };

                    var overlayLayers = {}

                    // START - MARKER UNTUK FUNGSI GROUP MARKER (Berdasarkan tahun Lulusan)
                    /*
                    note : jika ingin memakai fungsi group marker harap comment fitur search
                    */
                    var UserMarker = L.icon({
                        iconUrl: '<?= base_url() ?>assets/user/placeholder.png',
                        iconSize: [28, 30], // size of the icon
                    });
                    tahunkelulusan.forEach(element => {
                        markersGroup = []
                        response[element.tahun_lulus].forEach(element => {
                            console.log(element)
                            // console.log(element["geometry"]["coordinates"] + element["properties"]["popUp"]);
                            markersGroup.push(L.marker(element["geometry"]["coordinates"], {
                                title: element["properties"]["nama_alumni"],
                                icon: UserMarker
                            }).bindPopup(element["properties"]["popUp"]));
                        });

                        var layer = L.layerGroup(markersGroup)
                        overlayLayers[' Lulusan ' + element.tahun_lulus] = layer;

                        map.addLayer(layer);
                    });
                    // END - MARKER UNTUK FUNGSI GROUP MARKER (Berdasarkan tahun Lulusan)

                    // START - MARKER UNTUK GEOCODER (Mencari dan Menadai Tempat)
                    var GeocoderCustomMarker = L.icon({
                        iconUrl: '<?= base_url() ?>assets/user/location-pin.png',
                        iconSize: [40, 35], // size of the icon
                    });

                    var geocoder = L.Control.geocoder({
                        defaultMarkGeocode: false,
                        collapsed: false,
                    }).on('markgeocode', function(e) {
                        var latlng = e.geocode.center;
                        var marker = L.marker(latlng, {
                            icon: GeocoderCustomMarker
                        }).addTo(map);
                        marker.bindPopup(e.geocode.html || e.geocode.name).openPopup();
                        map.setView(latlng);
                    });

                    geocoder.addTo(map);
                    // END - MARKER UNTUK GEOCODER (Mencari dan Menadai Tempat)

                    L.control.layers(baseLayers, overlayLayers).addTo(map);


                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                    console.log(`Terjadi kesalahan pada permintaan.`);

                    console.log(error);
                }
            });
        });
    </script>

    <script>
        /*
         * BAR CHART
         * ---------
         */
        $.ajax({
            url: "<?php echo base_url(); ?>admin/dashboard/getCountAlumniByFakultas",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var data = [];
                var ticks = [];


                response.forEach((element, index, arr) => {
                    data.push([index + 1, element.jumlah_alumni]);
                    ticks.push([index + 1, element.fakultas]);
                });

                console.log(ticks);
                var bar_data = {
                    data: data,
                    bars: {
                        show: true
                    }
                }

                $.plot('#bar-chart', [bar_data], {
                    grid: {
                        borderWidth: 1,
                        borderColor: '#f3f3f3',
                        tickColor: '#f3f3f3'
                    },
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: 'center',
                        },
                    },
                    colors: ['#3c8dbc'],
                    xaxis: {
                        ticks: ticks
                    }
                })

            },
            error: function(xhr, status, error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                console.log(`BARCHART : Terjadi kesalahan pada permintaan.`);

                console.log(error);
            }
        });
        /* END BAR CHART */
    </script>

    <script>
        function randomColor() {
            // Generate random values for RGB components
            const r = Math.floor(Math.random() * 256); // Red (0-255)
            const g = Math.floor(Math.random() * 256); // Green (0-255)
            const b = Math.floor(Math.random() * 256); // Blue (0-255)

            // Convert RGB values to HEX format
            const hexR = r.toString(16).padStart(2, '0'); // Convert red to HEX
            const hexG = g.toString(16).padStart(2, '0'); // Convert green to HEX
            const hexB = b.toString(16).padStart(2, '0'); // Convert blue to HEX

            // Combine HEX values into a color string (#RRGGBB)
            const hexColor = `#${hexR}${hexG}${hexB}`;

            return hexColor;
        }

        $.ajax({
            url: "<?php echo base_url(); ?>admin/dashboard/getCountAlumniByfakultasFilter?filter=Tarbiyah dan Ilmu Keguruan",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let labels = []
                let data = []
                let backgroundColor = []
                response.forEach(element => {
                    labels.push(element.jenjang  + " - " + element.nama);
                    data.push(element.jumlah_alumni);
                    backgroundColor.push(randomColor());
                });
                var piedata = {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColor,
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChartftik').get(0).getContext('2d')
                var pieData = piedata;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                console.log(`Pie-chart Tarbiyah dan Ilmu Keguruan : Terjadi kesalahan pada permintaan.`);

                console.log(error);
            }
        });
        $.ajax({
            url: "<?php echo base_url(); ?>admin/dashboard/getCountAlumniByfakultasFilter?filter=Ekonomi dan Bisnis Islam",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let labels = []
                let data = []
                let backgroundColor = []
                response.forEach(element => {
                    labels.push(element.jenjang  + " - " + element.nama);
                    data.push(element.jumlah_alumni);
                    backgroundColor.push(randomColor());
                });
                var piedata = {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColor,
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChartfebi').get(0).getContext('2d')
                var pieData = piedata;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                console.log(`Pie-chart Fakultas Ekonomi dan Bisnis Islam : Terjadi kesalahan pada permintaan.`);

                console.log(error);
            }
        });
        $.ajax({
            url: "<?php echo base_url(); ?>admin/dashboard/getCountAlumniByfakultasFilter?filter=Syariah",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let labels = []
                let data = []
                let backgroundColor = []
                response.forEach(element => {
                    labels.push(element.jenjang  + " - " + element.nama);
                    data.push(element.jumlah_alumni);
                    backgroundColor.push(randomColor());
                });
                var piedata = {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColor,
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChartsyariah').get(0).getContext('2d')
                var pieData = piedata;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                console.log(`Pie-chart Fakultas Syariah : Terjadi kesalahan pada permintaan.`);

                console.log(error);
            }
        });
        $.ajax({
            url: "<?php echo base_url(); ?>admin/dashboard/getCountAlumniByfakultasFilter?filter=Ushuluddin Adab dan Dakwah",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let labels = []
                let data = []
                let backgroundColor = []
                response.forEach(element => {
                    labels.push(element.jenjang  + " - " + element.nama);
                    data.push(element.jumlah_alumni);
                    backgroundColor.push(randomColor());
                });
                var piedata = {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColor,
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChartfuad').get(0).getContext('2d')
                var pieData = piedata;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                console.log(`Pie-chart Fakultas Ushuluddin Adab dan Dakwah : Terjadi kesalahan pada permintaan.`);

                console.log(error);
            }
        });
        $.ajax({
            url: "<?php echo base_url(); ?>admin/dashboard/getCountAlumniByfakultasFilter?filter=Pascasarjana",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let labels = []
                let data = []
                let backgroundColor = []
                response.forEach(element => {
                    labels.push(element.jenjang  + " - " + element.nama);
                    data.push(element.jumlah_alumni);
                    backgroundColor.push(randomColor());
                });
                var piedata = {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColor,
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChartpasca').get(0).getContext('2d')
                var pieData = piedata;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan pada permintaan
                console.log(`Pie-chart Pascasarjana : Terjadi kesalahan pada permintaan.`);

                console.log(error);
            }
        });
    </script>

</body>

</html>