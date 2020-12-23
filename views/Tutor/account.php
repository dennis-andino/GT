<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Mi Cuenta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
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
                <?php
                if(isset($user)){?>
                <!-- /.col-md-6 -->
                <div class="col-lg-2">
                    <div class="card card-success card-outline">
                        <img src="../assets/dist/img/user2-160x160.png" class="img-fluid img-circle">
                        <div class="card-body">
                            <h5 class="card-title"><?=$user->alias?></h5>
                            <p class="card-text"><?=$user->privilege?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="card card-primary card-outline">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row" >Nombre:</th>
                                <td colspan="2"><?=$user->fullname?></td>
                                <th scope="row">Fecha de Nacimiento: </th>
                                <td><?=$user->birthDate?></td>
                            </tr>
                            <tr>
                                <th scope="row">Correo :</th>
                                <td colspan="2"><?=$user->email?></td>
                                <th scope="row">Telefono</th>
                                <td><?=$user->phone?></td>
                            </tr>
                            <tr>
                                <th scope="row">Facultad: </th>
                                <td><?=$user->career?></td>
                                <th scope="row" colspan="2">Campus: </th>
                                <td><?=$user->campus?></td>
                            </tr>
                            <tr>
                                <th scope="row">Ingreso a la Institucion: </th>
                                <td ><?=$user->admissionDate?></td>
                                <th scope="row" colspan="2">cuenta Institucional: </th>
                                <td><?=$user->account?></td>
                            </tr>
                            <tr>
                                <th scope="row">Usuario </th>
                                <td ><?=$user->username?></td>
                                <th scope="row" colspan="2">Creada el :</th>
                                <td><?=$user->createOn?></td>
                            </tr>
                            <tr>
                                <th scope="row">Perfil:</th>
                                <td ><?=$user->privilege?></td>
                                <th scope="row" colspan="2">Estado:</th>
                                <td><?=$user->availability==1?'Activo':'Inhabilitado'?></td>
                            </tr>
                            <tr>
                                <th scope="row">Observacioes:</th>
                                <td colspan="4"><?=$user->observations?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
