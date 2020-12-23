<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Institucion</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Mi institucion</li>
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
                <div class="col-lg-2">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6 align-content-center">
                                        <img src="../assets/img/<?=$information->logo?>" class="img-circle elevation-1" width="100" height="100" >
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                                <div class="form-group">
                                    <p><label for="name"><?=$information->name?></label></p>
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
                                <label for="vision">Vision</label>
                                <blockquote><?=$information->vision?></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-warning card-outline">
                        <div class="card-body">
                            <div class="md-form">
                                <label for="inputPassword4">Mision</label>
                                <blockquote><?=$information->mission?></blockquote>
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
                            <label for="inputPassword4">Direccion</label>
                            <address><?=$information->address?></address>
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
                                <p><?=$information->email?></p>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Telefono</label>
                                <p><?=$information->telefone?></p>
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
