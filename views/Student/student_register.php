<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/GT/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/GT/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/GT/assets/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/GT/assets/css/themes/default.min.css">
    <script src="http://localhost/GT/assets/js/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/GT/assets/js/alertify.js"></script>
    <script src="http://localhost/GT/assets/js/bootstrap.min.js"></script>
    <title>Gestion de tutorias</title>
</head>
<body>
<div class="alineacion">
    <div class="login">
        <h2 class="login-header">Sistema de tutorias</h2>
        <div class="login-container">
            <form action="<?=base_url?>users/save" method="POST">
                <div class="form-group">
                    <label for="fullname">Nombre Completo</label>
                    <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" minlength="15" maxlength="50" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                    </div>
                <div class="form-group col-md-4">
                    <label for="phone">Telefono</label>
                    <input type="text" class="form-control form-control-sm" id="phone" name="phone" minlength="8" required>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="birthdate">Dia de Nacimiento</label>
                        <input type="date" class="form-control form-control-sm" min="1950-01-01" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="campus">Cuenta Institucional</label>
                        <input type="text" class="form-control form-control-sm" id="account" name="account" required>
                    </div>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="campus">Carrera</label>
                            <select id="career" name="career" class="form-control">
                                <?php
                                if(isset($careers)){
                                    while ($career= $careers->fetch_object()){ ?>
                                <option value="<?=$career->id?>"><?=$career->description?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">Campus</label>
                            <select id="campus" name="campus" class="form-control">
                                <?php
                                if(isset($campus)){
                                    while ($campu=$campus->fetch_object()){?>
                                <option value="<?=$campu->id?>"><?=$campu->description?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="admissiondate">Fecha de ingreso</label>
                        <input type="date" class="form-control form-control-sm" min="1960-01-01" id="admissiondate" name="admissiondate" required>
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control form-control-sm" minlength="5" maxlength="20" id="username" name="username" minlength="10" maxlength="25" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-6">
                        <label for="username">Contraseña</label>
                        <input type="password" class="form-control form-control-sm " id="pass" name="pass"  minlength="8" maxlength="15" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" title="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico." required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pass">Repetir contraseña</label>
                        <input type="password" class="form-control form-control-sm" required>
                    </div>
                </div>
                <input type="hidden" id="role" name="role" value="1">
                <div class="form-group">
                    <input type="submit" value="Registrarme">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['register']) && $_SESSION['register'] == false) {
    ?>
    <script type='text/javascript'>
        alertify.error('Upps, Hubo un error al intentar registrarlo, intentelo nuevamente !');
    </script>
    <?php
    unset($_SESSION['register']);
}
?>
</body>
</html>