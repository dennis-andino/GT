<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Historial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Historial</li>
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
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Tutorias Solicitadas</h5>
                        </div>
                        <div class="card-body">
                            <table id="tutoriastbl" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Tema</th>
                                    <th>Fecha</th>
                                    <th>hora</th>
                                    <th>tutor</th>
                                    <th>Seccion</th>
                                    <th>calificar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($history)){
                                    while ($onetutorial=$history->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?=$onetutorial->coursename?></td>
                                            <td><?=$onetutorial->subject?></td>
                                            <td><?=$onetutorial->reservdate?></td>
                                            <td><?=$onetutorial->schedule?></td>
                                            <td><?=$onetutorial->tutor?></td>
                                            <?php
                                            if($onetutorial->modalidad=='Presencial'):?>
                                            <td><?=$onetutorial->space?></td>
                                                <?php elseif($onetutorial->modalidad=='Virtual' && ($onetutorial->status==1 || $onetutorial->status==0)): ?>
                                                <td><a href="<?=$onetutorial->space?>">Aula virtual</a></td>
                                                    <?php else:?>
                                                <td>Aula Virtual no programada</td>
                                            <?php endif; ?>
                                                <?php
                                                if($onetutorial->score==0 && $onetutorial->status==2):?>
                                                    <td><button type="button"  value="<?=$onetutorial->id?>" class="btn btn-block btn-info btn-xs edit">Calificar</button></td>
                                                    <?php elseif ($onetutorial->status==-1):?>
                                                    <td><span class="btn btn-block btn-secondary btn-xs disabled ">Necesita aprobacion</span></td>
                                                <?php elseif ($onetutorial->status==3):?>
                                                    <td><span class="btn btn-block btn-secondary btn-xs disabled ">Cancelada</span></td>
                                                <?php else:?>
                                                    <td><span class="btn btn-block btn-secondary btn-xs disabled ">No permitido</span></td>
                                                <?php endif; ?>
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
                <div class="col-lg-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Tutorias como invitado</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Tema</th>
                                    <th>Fecha</th>
                                    <th>hora</th>
                                    <th>tutor</th>
                                    <th>Seccion</th>
                                    <th>calificar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($historicguest)){
                                    while ($onetutorial=$historicguest->fetch_object()) {?>
                                        <tr>
                                            <td><?=$onetutorial->coursename?></td>
                                            <td><?=$onetutorial->subject?></td>
                                            <td><?=$onetutorial->reservdate?></td>
                                            <td><?=$onetutorial->schedule?></td>
                                            <td><?=$onetutorial->tutor?></td>
                                            <?php
                                            if($onetutorial->modalidad=='Presencial'):?>
                                                <td><?=$onetutorial->space?></td>
                                            <?php elseif($onetutorial->modalidad=='Virtual' && ($onetutorial->status==1 || $onetutorial->status==0)): ?>
                                                <td><a href="<?=$onetutorial->space?>">Aula virtual</a></td>
                                            <?php else:?>
                                                <td>Aula Virtual no programada</td>
                                            <?php endif; ?>
                                                <td><span class="btn btn-block btn-secondary btn-xs disabled ">Calificado</span></td>
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
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- modal -->
<div class="modal fade" id="modalcalification" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Calificacion de Tutoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'tutorials/setScore'?>" method="POST">
                    <input type="hidden" id="idtut" name="idtut">
                    <div class="form-group">
                        <label for="score">Como califica la tutoria recibida?</label>
                        <select class="custom-select"  name="score" required>
                            <option value="" selected>elija una opcion</option>
                            <option value="4">Excelente</option>
                            <option value="3">Muy Buena</option>
                            <option value="2">Regular</option>
                            <option value="1">Mala</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea class="form-control" rows="2"  id="stucomment" name="stucomment" placeholder="Comentarios sobre su experiencia en la tutoria"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click','.edit',function(){
            var id=$(this).val();
            $('#modalcalification').modal('show');
            $('#idtut').val(id);
        });
    });
</script>

<?php if(isset($_SESSION['alert'])):?>
    <script> swal("<?=$_SESSION['alert']['title']?>","<?=$_SESSION['alert']['msj']?>","<?=$_SESSION['alert']['type']?>");</script>
    <?php unset($_SESSION['alert']);
endif; ?>