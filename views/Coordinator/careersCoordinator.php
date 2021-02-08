<style>
    div.demo{text-align: center; width: 280px; float: left}
    div.demo > p{font-size: 20px}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Carreras y asignaturas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Carreras</li>
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
                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Gestión de Carreras</h5>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newcareer"><i class="fas fa-plus-square"></i> Nueva carrera</button>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="maintable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Carrera</th>
                                    <th>Asignaturas en total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if (isset($listCareers)) {
                                    while ($career = $listCareers->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?= $career->id ?></td>
                                            <td><span id="namecareer<?=$career->id?>"><?= $career->career?></span></td>
                                            <td><input type="text" value="<?= $career->total?>" class="dial" data-width="60%" data-height="60%" readonly></td>
                                            <td>
                                                <button type="button" value="<?= $career->id?>" class="btn btn-warning btn-sm editcareer"><i class="fas fa-edit"></i></button>
                                                <form action="<?= base_url . 'courses/getCoursesByCareer' ?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idcareer" name="idcareer" value="<?=$career->id?>">
                                                    <input type="hidden" id="careername" name="careername" value="<?=$career->career?>">
                                                    <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver clases"><i class="fas fa-info-circle"></i></button>
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
                if(isset($_SESSION['asignatures']) && isset($_SESSION['careername'])){?>
                <div class="col-lg-3">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Asignaturas de <strong><?=$_SESSION['careername']?></strong></h5>
                        </div>
                        <div class="card-header">
                            <button type="button" value="<?=$_SESSION['idcareer']?>" class="btn btn-primary btn-sm float-right new_course"><i class="fas fa-plus-square"></i> Agregar Asignatura</button>
                        </div>
                        <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Asignatura</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                            <?php
                            foreach ($_SESSION['asignatures'] as $course) {?>
                                <tr>
                                    <td><?= $course ['id'] ?></td>
                                    <td><span id="coursename<?=$course ['id']?>"><?=$course ['coursename'] ?></span></td>
                                    <td><button value="<?= $course ['id']?>" class="btn btn-warning btn-sm editcourse"><i class="fas fa-edit"></i></button></td>
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
                  unset($_SESSION['asignatures']);
                }
                ?>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="modal fade" id="newcareer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nueva carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'courses/createCareer'?>" method="POST">
                        <div class="form-group">
                            <label for="newcareername">Nombre</label>
                            <input type="text" class="form-control" id="newcareername" name="newcareername" placeholder="Ejemplo: Ingenieria en Informatica" required>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="newcourse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nueva asignatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'courses/create'?>" method="POST">
                    <input type="hidden"  id="career" name="career" >
                        <div class="form-group">
                            <label for="newcoursename">Nombre de asignatura</label>
                            <input type="text" class="form-control" id="newcoursename" name="newcoursename" placeholder="Ejemplo: Base de datos" required>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editcareer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edición de carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'courses/updateCareer'?>" method="POST">
                    <div class="form-group">
                        <label for="sttime">Nombre</label>
                        <input type="hidden" id="careerid" name="careerid">
                        <input type="text" class="form-control" id="car_name" name="car_name" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Cambiar nombre</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editcourse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edición de asignatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'courses/updateCourse'?>" method="POST">
                    <input type="hidden" id="idcourse" name="idcourse">
                    <div class="form-group">
                        <label for="namecourse">Nombre de asignatura</label>
                        <input type="text" class="form-control" id="namecourse" name="namecourse"  required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Cambiar nombre</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?=base_url?>assets/js/jquery.knob.min.js"></script>
<script>
    $(function(){$(".dial").knob({});});
    $(".dial").knob({'min':-50, 'max':50});
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.editcareer',function(){
            var id=$(this).val();
            var name=$('#namecareer'+id).text();
            $('#editcareer').modal('show');
            $('#careerid').val(id);
            $('#car_name').val(name);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.editcourse',function(){
            var id=$(this).val();
            var name=$('#coursename'+id).text();
            $('#editcourse').modal('show');
            $('#idcourse').val(id);
            $('#namecourse').val(name);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.new_course',function(){
            var id=$(this).val();
            $('#newcourse').modal('show');
            $('#career').val(id);
        });
    });
</script>

