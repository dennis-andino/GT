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
                    <h1 class="m-0 text-dark">Evaluaciones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Evaluaciones</li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Comentarios sobre tutorias</h5>
                        </div>
                        <div class="card-body">
                            <div class="direct-chat-messages">
                                <?php
                                if(isset($comments)){
                                    $position=true;
                                    $commentnumber=1;
                                    if($comments->num_rows>0){
                                        $commentnumber=$comments->num_rows;
                                    }
                                    $scoretotal=0;
                                    while ($comment = $comments->fetch_object()) {
                                        if(!empty($comment->stucomment)){
                                        if($position){?>
                                            <div class="direct-chat-msg">
                                                <!-- /.direct-chat-infos -->
                                                <i class="fab fa-snapchat"></i>
                                                <!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                    <?php
                                                        echo $comment->stucomment;
                                                    $scoretotal+=$comment->score;
                                                    ?>
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            <?php
                                            $position=false;
                                        }else{
                                            $position=true;?>
                                            <div class="direct-chat-msg right">
                                                <!-- /.direct-chat-infos -->
                                                <i class="fab fa-snapchat direct-chat-img"></i>
                                                <!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                    <?php echo $comment->stucomment;
                                                    $scoretotal+=$comment->score;
                                                    ?>
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            <?php

                                        }
                                    }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Grafica de Evaluacion</h5>
                        </div>
                        <div class="card-body" id="student_evaluation">

                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>

        </div>
    </div>
    <!-- /.content -->
</div>
<script type="text/javascript">
    Highcharts.chart('student_evaluation', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Evaluacion de la accion tutorial segun Estudiantes'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Porcentaje',
            colorByPoint: true,
            data:  [<?=$evaluation?>]
        }]
    });
</script>