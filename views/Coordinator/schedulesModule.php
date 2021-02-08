<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Horarios</h1>
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
                            <h5 class="m-0">Programación de Horarios por tutor y asignatura</h5>
                        </div>
                        <div class="card-header" style="background-color: #FBFCFC !important;">
                            <form action="<?=base_url.'schedule/createScheBytut'?>" method="POST">
                                <div class="row">
                                    <div class="form-group col-2">
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
                                    <div class="form-group col-2">
                                        <select class="form-control form-control-sm" id="campus"  readonly="true">
                                            <option value="" selected>Seleccionar campus</option>
                                            <?php
                                            while ($campu=$campus->fetch_object()){?>
                                             <option value="<?=$campu->id?>"><?=$campu->description?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <select class="form-control form-control-sm" id="career"  readonly="true">
                                            <option value="" selected>Seleccionar carrera</option>
                                            <?php
                                            while ($career=$careers->fetch_object()){?>
                                                <option value="<?=$career->id?>"><?=$career->description?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <select class="form-control form-control-sm" style="background: #EBEDEF;" id="courses" name="courses" required>
                                            <option value="" selected>Seleccionar asignatura</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <select class="form-control form-control-sm" style="background: #EBEDEF;" id="tutors" name="tutors" required>
                                            <option value="" selected>Seleccionar tutor</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar programación</button>
                                    </div>

                                </div>
                            </form>
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
                                                <button type="submit" name="action" value="1"  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Habilitar horario"><i class="fas fa-check-circle"></i></button>
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
                <?php
                if(isset($_SESSION['schedules'])){?>
                <div class="col-lg-3">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Horarios</h5>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newGeneralSch"><i class="fas fa-plus-square"></i></button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hora inicial</th>
                                    <th>Hora final</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $schedules = $_SESSION['schedules'];
                                foreach($schedules as $schedule){ ?>
                                <tr>
                                    <td><?=$schedule['id']?></td>
                                    <td><span id="sta<?=$schedule['id']?>"><?=$schedule['starttime']?></span></td>
                                    <td><span id="fin<?=$schedule['id']?>"><?=$schedule['finishtime']?></span></td>
                                    <td>
                                        <?php
                                        if($schedule['availability']==1){ ?>
                                        <form action="<?=base_url.'schedule/activateSched'?>" method="POST" style="display: inline-block;">
                                            <input type="hidden" id="idsched" name="idsched" value="<?=$schedule['id']?>">
                                            <button type="submit"  name="action" value="0" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deshabilitar horario"><i class="fas fa-times-circle"></i></button>
                                        </form>
                                            <?php }else{ ?>
                                        <form action="<?=base_url.'schedule/activateSched'?>" method="POST" style="display: inline-block;">
                                            <input type="hidden" id="idsched" name="idsched" value="<?=$schedule['id']?>">
                                            <button type="submit"  name="action" value="1"  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Habilitar horario"><i class="fas fa-check-circle"></i></button>
                                        </form>
                                        <?php
                                        }
                                        ?>
                                            <button type="button" value="<?=$schedule['id']?>" class="btn btn-warning btn-sm edit"><i class="fas fa-history"></i></button>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
                <!-- /.col-md-6 -->
            </div>

        </div>
    </div>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="newGeneralSch" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'schedule/create'?>" method="POST">
                    <div class="row">
                    <div class="form-group col-6">
                        <label for="starttime">Hora inicial (24H)</label>
                        <input type="time" class="form-control" id="starttime" name="starttime" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="finishtime">Hora final (24H)</label>
                        <input type="time" class="form-control" id="finishtime" name="finishtime"  required>
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edicion de Horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'schedule/edit'?>" method="POST">
                    <input type="hidden" id="schidedit" name="schidedit">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="sttime">Hora Inicial (24H)</label>
                            <input type="time" class="form-control" id="sttime" name="sttime"  required>
                        </div>
                        <div class="form-group col-6">
                            <label for="fntime">Hora Final (24H)</label>
                            <input type="time" class="form-control" id="fntime" name="fntime"  required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
$(document).on('click','.edit',function(){
var id=$(this).val();
var starttime=$('#sta'+id).text();
var finishtime=$('#fin'+id).text();
    $('#edit').modal('show');
    $('#schidedit').val(id);
$('#sttime').val(starttime);
$('#fntime').val(finishtime);

});
});
</script>
<script>
    $(document).ready(function () {
        $("#campus").change(function () {
            $("#campus option:selected").each(function () {
                id_campus = $(this).val();
                $.post("<?=base_url?>users/getTutorByCampus", {
                    idcampus: id_campus
                }, function (data) {
                    $("#tutors").html(data);
                });
            });
        });
    });
</script>
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
