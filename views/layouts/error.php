<link type="text/css" rel="stylesheet" href="<?=base_url.'assets/css/error.css'?>">
<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404"></div>
        <h1>404</h1>
        <h2>Oops! Contenido no encontrado</h2>
        <p>Lo sentimos, no pudimos encontrar el recurso, quizas fue eliminado :C,  <?php if(isset($e)){echo $e;}else{echo 'Error Desconocido';}?></p>
       <!-- <a href="#">Volver al inicio</a> -->
    </div>
</div>
