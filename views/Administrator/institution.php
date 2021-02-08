<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Institución</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Institucion</li>
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
    <div class="col-lg-4">
        <div class="card card-success card-outline">
            <div class="card-body">
                <form action="<?=base_url.'institution/changeLogo'?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <img src="../assets/img/<?=$information->logo?>" class="img-circle elevation-1" width="100" height="100" >
                         </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-info btn-block">Cambiar logo</button>
                        </div>
                    </div>
                    <div class="custom-file custom">
                        <input type="file" id="logo" name="logo" accept="image/png, .jpeg, .jpg" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <div class="col">
                <div class="card card-success card-outline">
                    <div class="card-body">
                        <form action="<?=base_url.'institution/edit'?>" method="post">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <i class="fas fa-pencil-alt prefix"></i>
                                <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?=$information->name?>" aria-describedby="emailHelp">
                            </div>
                    </div>
                </div>
            </div>

</div>
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card card-warning card-outline">
                        <div class="card-body">
                            <div class="md-form">
                                <label for="vision">Visión</label>
                                <i class="fas fa-pencil-alt prefix"></i>
                                <textarea id="vision" name="vision" class="md-textarea form-control " rows="3"><?=$information->vision?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-warning card-outline">
                        <div class="card-body">
                            <div class="md-form">
                                <label for="inputPassword4">Misión</label>
                                <i class="fas fa-pencil-alt prefix"></i>
                                <textarea id="mision" name="mision" class="md-textarea form-control " rows="3"><?=$information->mission?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <div class="col">
                <div class="card card-secondary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputPassword4">Dirección</label>
                            <i class="fas fa-pencil-alt prefix"></i>
                            <input type="text" class="form-control form-control-sm" id="address" name="address" value="<?=$information->address?>" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-info card-outline">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputEmail4">Correo</label>
                                <i class="fas fa-pencil-alt prefix"></i>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?=$information->email?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Teléfono</label>
                                <i class="fas fa-pencil-alt prefix"></i>
                                <input type="text" class="form-control form-control-sm" id="telephone" name="telephone" value="<?=$information->telefone?>">
                            </div>
                            <div class="form-group col-md-2 " style="display: flex;align-items: flex-end">
                                <button type="submit" class="btn btn-info">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
