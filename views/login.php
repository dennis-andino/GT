<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=base_url?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/alertify.min.css">
    <script src="<?=base_url?>assets/js/noback.js"></script>
    <script src="<?=base_url?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?=base_url?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url?>assets/js/alertify.js"></script>
	<title>Gestion de tutorias</title>
</head>
<body onload="noback();">
	<div class="alineacion">
<div class="login">
  <h2 class="login-header">Sistema de tutorías</h2>
  <div class="login-container">
  <form action="<?=base_url?>home/login" method="POST">
      <?php
      if(isset($_SESSION['loginstate'])){
      ?>
          <div class="alert<?=$_SESSION['loginstate']['tipo']=='sucess'?' alert-success':' alert-danger'?>" role="alert">
              <?=$_SESSION['loginstate']['msj']?>
          </div>
      <?php
          unset($_SESSION['loginstate']);
      }
      ?>
     <div class="form-group">
            <p><input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required></p>
          </div>
    <div class="form-group">
            <p><input type="password" class="form-control" id="pass" name="pass" placeholder="Clave de acceso" required></p>
          </div>
    <input type="submit" value="Ingresar">
  </form>
      <br>
  <label>¿Has olvidado tu clave?<span role="button" class="text-info" data-toggle="modal" data-target="#resetpassword">
         Restablecer
      </span></label>
  </div>
</div>
</div>
    <?php
    if (isset($_SESSION['register']) && $_SESSION['register']==true ){
        ?>
        <script type='text/javascript'>
            alertify.success('Se registro exitosamente ! , inicia sesion para continuar :)');
        </script>
        <?php
        unset($_SESSION['register']);
    }
    ?>
    <div class="modal fade" id="resetpassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?=base_url?>users/resetPass" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Restableciendo Clave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group"><input type="text" minlength="5" maxlength="20" class="form-control" name="usernres" placeholder="Ingrese su usuario" required></div>
                        <div class="form-group"><input type="email" class="form-control" name="emailres" placeholder="Ingrese su correo" required></div>

                    <div>
                        <p>
                        <strong>Nota: </strong>
                            <small class="form-text text-muted">Ingrese el correo con el cual se registro, a ese mismo enviaremos su nueva clave.</small>
                            <small class="form-text text-muted">Si no recuerda su usuario, por favor contactese con el departamento de acompañamiento estudiantil.</small>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Restablecer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>