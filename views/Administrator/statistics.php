<style type="text/css">
    .highcharts-figure, .highcharts-data-table table {
        min-width: 320px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }


    input[type="number"] {
        min-width: 50px;
    }
</style>
<script src="<?=base_url?>assets/js/charts/highcharts.js"></script>
<script src="<?=base_url?>assets/js/charts/modules/exporting.js"></script>
<script src="<?=base_url?>assets/js/charts/modules/export-data.js"></script>
<script src="<?=base_url?>assets/js/charts/modules/accessibility.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Estadísticas de eventos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Estadísticas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Eventos por tipo</h5>
                        </div>
                        <!-- aqui primer grafico [por tipo]-->
                        <div class="card-body" id="eventtype"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Eventos por mes</h5>
                        </div>
                        <!-- aqui segundo grafico [por mes]-->
                        <div class="card-body" id="eventmonth"></div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<script>
    $(function() {
        var chartOptions = {
            chart: {
                renderTo: 'eventtype',
                type: 'bar'
            },
            title: {
                text: 'Eventos por tipo'
            },
            xAxis: {
                categories: [<?=$Types?>]
            },
            yAxis: {
                title: 'value'
            },
            series: [{
                name: 'Eventos',
                data: [<?=$totalsByType?>]
            }]
        }

        var chart = new Highcharts.Chart(chartOptions);
    });
</script>
<script>
    $(function() {
        var chartOptions = {
            chart: {
                renderTo: 'eventmonth',
                type: 'line'
            },
            title: {
                text: 'Eventos por mes'
            },
            xAxis: {
                categories: [<?=$Months?>]
            },
            yAxis: {
                title: 'value'
            },
            series: [{
                name: 'Eventos',
                data: [<?=$totalsByMonth?>]
            }]
        }

        var chart = new Highcharts.Chart(chartOptions);
    });
</script>
