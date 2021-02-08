<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Horarios de atención a tutorías</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Horarios</li>
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
                <div class="col-lg-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Programación de horarios actual</h5>
                        </div>
                        <div class="card-body">
                            <table id="maintable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Horario</th>
                                    <th>Asignatura</th>
                                    <th>Tutor</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($scheduleBytut)){
                                    while($sched=$scheduleBytut->fetch_object()){?>
                                        <tr>
                                            <td><?=$sched->id?></td>
                                            <td><?=$sched->schedule?></td>
                                            <td><?=$sched->coursename?></td>
                                            <td><?=$sched->tutor?></td>
                                            <td>
                                                <form action="<?=base_url.'schedule/actSchedByTut'?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idschedoff" name="idschedoff" value="<?=$sched->id?>">
                                                    <?php
                                                    if($sched->availability==1){?>
                                                        <button type="submit" name="action" value="0" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Deshabilitar Horario"><i class="fas fa-times-circle"></i></button>
                                                        <?php
                                                    }else{?>
                                                        <button type="submit" name="action" value="1"  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Habilitar Horario"><i class="fas fa-check-circle"></i></button>
                                                        <?php
                                                    }
                                                    ?>
                                                </form>
                                                <form action="<?=base_url.'schedule/deleteScheByTut'?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idschedelete" name="idschedelete" value="<?=$sched->id?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar horario"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if(isset($_SESSION['schedules']) && $_SESSION['schedules'] && isset($_SESSION['careers']) && $_SESSION['careers']): ?>
                <div class="col-lg-3">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Programación de horarios</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url.'schedule/createScheBytut'?>" method="POST">
                                <input type="hidden" name="tutors" value="<?=$_SESSION['id']?>">
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" style="background: #EBEDEF;" id="horas" name="horas" required>
                                            <option value="" selected>Seleccionar horario</option>
                                            <?php
                                            $schedules = $_SESSION['schedules'];
                                            foreach($schedules as $schedule){ ?>
                                                <option value="<?=$schedule['id']?>"><?=$schedule['starttime'].'-'.$schedule['finishtime']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="career"  readonly="true">
                                            <option value="" selected>Seleccionar carrera</option>
                                            <?php
                                            foreach ($_SESSION['careers'] as $career){?>
                                                <option value="<?=$career['id']?>"><?=$career['description']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" style="background: #EBEDEF;" id="courses" name="courses" required>
                                            <option value="" selected>Seleccionar asignatura</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar programación</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <!-- /.col-md-6 -->
            </div>

        </div>
    </div>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function () {
        $("#career").change(function () {
            $("#career option:selected").each(function () {
                id_career= $(this).val();
                $.post("<?=base_url?>courses/getCourseByCareer", {
                    idcareer: id_career
                }, function (data) {
                    $("#courses").html(data);
                });
            });
        });
    });
</script>