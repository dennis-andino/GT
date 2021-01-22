<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestion de secciones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Secciones</li>
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
                            <h5 class="m-0">Secciones</h5>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newseccion"><i class="fas fa-plus-square"></i> Nueva Seccion</button>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tutoriastbl" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($listSections)) {
                                    while ($section = $listSections->fetch_object()) { ?>
                                        <tr>
                                            <td><?=$section->id?></td>
                                            <td><?= $section->description?></td>
                                            <td>
                                                <form action="<?=base_url.'sections/activate'?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idsection" name="idsection" value="<?=$section->id?>">
                                                    <?php
                                                    if($section->availability==1){?>
                                                        <button type="submit" name="action" value="0" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Deshabilitar Seccion"><i class="fas fa-times-circle"></i></button>
                                                        <?php
                                                    }else{?>
                                                        <button type="submit" name="action" value="1"  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Habilitar Seccion"><i class="fas fa-check-circle"></i></button>
                                                        <?php
                                                    }
                                                    ?>
                                                </form>
                                                <form action="<?=base_url.'sections/delete'?>" method="POST" style="display: inline-block;">
                                                    <input type="hidden" id="idsecdelete" name="idsecdelete" value="<?=$section->id?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Seccion"><i class="fas fa-trash-alt"></i></button>
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

                <!-- /.col-md-6 -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="modal fade" id="newseccion" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nueva Seccion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url.'sections/create'?>" method="POST">
                        <div class="form-group">
                            <label for="sectionname">Descripcion de la seccion: </label>
                            <input type="text" class="form-control" id="sectionname" name="sectionname" placeholder="Ejemplo: Salon 4B-3" required>
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