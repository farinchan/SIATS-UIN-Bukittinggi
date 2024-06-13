<script>
    $.ajax({
        url: "<?php echo base_url(); ?>admin/ModulStatistik/grafikTracerAlumniPasca?filter=101",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let labels = [];
            let data1 = [];
            let data2 = [];
            response.angakatan.forEach(element => {
                labels.push(element.tahun);
                data1.push(element.jumlah_alumni);
                data2.push(element.jumlah_tracer);
            });
            var areaChartData = {
                labels: labels,
                datasets: [{
                        label: 'Alumni sudah mengisi tracer study',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: data2
                    },
                    {
                        label: 'Jumlah alumni',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: data1
                    },
                ]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart101').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        },
        error: function(xhr, status, error) {
            // Handle any errors that occur during the AJAX request

        }
    });
    $.ajax({
        url: "<?php echo base_url(); ?>admin/ModulStatistik/grafikTracerAlumniPasca?filter=102",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let labels = [];
            let data1 = [];
            let data2 = [];
            response.angakatan.forEach(element => {
                labels.push(element.tahun);
                data1.push(element.jumlah_alumni);
                data2.push(element.jumlah_tracer);
            });
            var areaChartData = {
                labels: labels,
                datasets: [{
                        label: 'Alumni sudah mengisi tracer study',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: data2
                    },
                    {
                        label: 'Jumlah alumni',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: data1
                    },
                ]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart102').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        },
        error: function(xhr, status, error) {
            // Handle any errors that occur during the AJAX request

        }
    });
    $.ajax({
        url: "<?php echo base_url(); ?>admin/ModulStatistik/grafikTracerAlumniPasca?filter=103",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let labels = [];
            let data1 = [];
            let data2 = [];
            response.angakatan.forEach(element => {
                labels.push(element.tahun);
                data1.push(element.jumlah_alumni);
                data2.push(element.jumlah_tracer);
            });
            var areaChartData = {
                labels: labels,
                datasets: [{
                        label: 'Alumni sudah mengisi tracer study',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: data2
                    },
                    {
                        label: 'Jumlah alumni',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: data1
                    },
                ]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart103').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        },
        error: function(xhr, status, error) {
            // Handle any errors that occur during the AJAX request

        }
    });
</script>