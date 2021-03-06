<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    if ($_GET["logout"] == 1) {
        session_destroy();
    } else {
        header("Location: login.php");
        exit();
    }
}

require_once 'info_contenido.php';

$contenido = new Contenido();

//----------------   EDITAR O AGREGAR NUEVO CONTENIDO

if (isset($_GET["idcontenido"])) {
  $contenido->setIdContenido($_GET["idcontenido"]);
}
if (!empty($_POST)) {
  $contenido->setIdContenido($_POST["idcontenido"]);
  $contenido->idclasificacion = $_POST["idclasificacion"];
  $contenido->imagen          = $_POST["imagen"];
  $contenido->titulo          = $_POST["titulo"];
  $contenido->subtitulo       = $_POST["subtitulo"];
  $contenido->contenido       = $_POST["contenido"];
  
  if ($_POST["idcontenido"] == 0){
    $contenido->agregar($_SESSION['usuario']);
  } else {
    $contenido->modificar();
  }

    header("Location: contenidos.php");
}

//-------------Listar clasificaciones
$clasificacion =  new Clasificaciones();
$seleccionClasificaciones = $clasificacion->listar();
$idclasificacion = $contenido->idclasificacion;
?>

<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../style/style.css" rel="stylesheet" type="text/css">
    <title>MINICMS</title>
</head>

<body>
  <?php include '../header.php' ?>
  <?php include '../carousel.php' ?>

  <?php 
    if ($_GET["idcontenido"] != 0 ) {

  ?>

  <div class="container p-3 my-3 border" style="width:50%" id="container">
    <form method="post">
    <input type="hidden" name="idcontenido" value="<?php echo $contenido->idcontenido ?>">
      <div class="form">
        <h4>Contenido</h4>
        <br>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><b>Clasificaci??n</b></label>
        </div>
        <div>
          <select class="form-select" required arial-label="select example" id="idclasificacion" name="idclasificacion">
            <option  value="">
            <?php
            foreach ($seleccionClasificaciones as $key => $value) {
                $selected = "";
                if ($value["idclasificacion"] == $idclasificacion)  {
                    $selected = "selected";
                }
                echo "<option value='".$value["idclasificacion"]."' ".$selected.">".$value["nombre"]."</option>";
            }
            ?>  
          
            </option>
          </select>
        </div>
        <br>
        <div>
          <label for="formGroupExampleInput"><b>Imagen</b></label>
          <input type="url" class="form-control" id="imagen" name="imagen" placeholder="URL de im??gen"  value="<?php echo $contenido->imagen ?>">
        <br>
            </div>
        <div class="form-group">
          <label for="formGroupExampleInput"><b>T??tulo</b></label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="T??tulo del Contenido"  value="<?php echo $contenido->titulo ?>">
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Resumen</b></label>
          <textarea class="form-control" id="subtitulo" name="subtitulo" rows="5" placeholder="Resumen del Contenido"><?php echo $contenido->subtitulo ?></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Contenido</b></label>
          <textarea class="form-control" id="contenido" name="contenido"  rows="5" placeholder="Texto del contenido"><?php echo $contenido->contenido ?></textarea>
        </div>
    </form>
    <br>
    <div>
      <a href="contenidos.php" class="btn btn-sm btn-outline-secondary">Cancelar</a>
      <button type="submit" class="btn btn-sm btn-outline-secondary">Guardar</button>
    </div>

  </div>

<?php
} elseif (($_GET["idcontenido"] == 0 )) {
?>

<div class="container p-3 my-3 border" style="width:50%" id="container">
    <form method="post">
    <input type="hidden" name="idcontenido" value="0">
      <div class="form">
        <h4>Contenido</h4>
        <br>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><b>Clasificaci??n</b></label>
        </div>
        <div>
          <select class="form-select" required arial-label="select example" id="idclasificacion" name="idclasificacion">
            <option selected value="">Elija Clasificaci??n </option>
            <?php 

              $clasificacion =  new Clasificaciones();
              $listar = $clasificacion->listar();
              while ($reg = $listar->fetch_assoc()){
              ?>

              <option value="<?php echo $reg["idclasificacion"] ?>" name="<?php echo $reg["idclasificacion"] ?>"><?php echo $reg["nombre"] ?></option>
          
            <?php } ?>
          </select>
        </div>
        <br>
        <br>
        <div>
          <label for="formGroupExampleInput"><b>Imagen</b></label>
          <input type="url" class="form-control" id="imagen" name="imagen" placeholder="URL de im??gen">
        <br>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput"><b>T??tulo</b></label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="T??tulo del Contenido">
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Resumen</b></label>
          <textarea class="form-control" id="subtitulo" name="subtitulo" rows="5" placeholder="Resumen del Contenido"></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><b>Contenido</b></label>
          <textarea class="form-control" id="contenido" name="contenido"  rows="5" placeholder="Texto del contenido"></textarea>
        </div>
    </form>
    <br>
    <div>
      <a href="contenidos.php" class="btn btn-sm btn-outline-secondary">Cancelar</a>
      <button name="agregar" type="submit" class="btn btn-sm btn-outline-secondary">Guardar</button>
    </div>

  </div>


<?php 
}
?>

    <?php include '../footer.php' ?>
</body>

</html>