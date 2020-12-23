
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Estadisticas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">estadisticas</li>
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
                        <div class="card-body">
                            <canvas id="byevent"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Eventos por mes</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="bymonth"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>
<script>
    var ctx = document.getElementById('byevent').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Login', 'Registro', 'Error', 'Otros'],
            datasets: [{
                data: [
                   <?=$totalsByType?>
                ],
                backgroundColor: [
                    'rgb(255, 99, 132, 0.5)',
                    'rgb(255, 162, 235, 0.5)',
                    'rgb(255, 206, 86, 0.5)',
                    'rgb(75, 192, 192, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctxx = document.getElementById('bymonth').getContext('2d');
    var myPieChartt = new Chart(ctxx, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril','Mayo', 'Junio', 'Julio', 'Agosto','Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Eventos/Mes',
                data: [<?=$totalsByMonth?>],
                backgroundColor: [
                    'rgb(255, 206, 86, 0.5)',
                    'rgb(75, 192, 192, 0.5)',
                    'rgb(255, 99, 132, 0.5)',
                    'rgb(63, 191, 63, 0.5)',
                    'rgb(128, 128, 0, 0.5)',
                    'rgb(255, 162, 235, 0.5)',
                    'rgb(0, 128, 128, 0.5)',
                    'rgb(0, 255, 255, 0.5)',
                    'rgb(255, 160, 122, 0.5)',
                    'rgb(34, 153, 84, 0.5)',
                    'rgb(165, 105, 189 , 0.5)'

                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(63, 191, 63, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(128, 128, 0, 1)',
                    'rgba(0, 128, 128, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(0, 255, 255, 1)',
                    'rgba(255, 160, 122, 1)',
                    'rgba(34, 153, 84, 1)',
                    'rgba(165, 105, 189, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
