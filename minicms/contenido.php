<?php
    require_once './admin/info_contenido.php';  

?>

<!DOCTYPE html>
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
    <?php include 'header.php' ?>
    <hr>
        <?php
            $contenido = new Contenido();
            if (isset($_GET["idcontenido"])) {
                $contenido->setIdContenido1($_GET["idcontenido"]);
            }
            if (!empty($_POST)) {
                $contenido->setIdContenido1($_POST["idcontenido"]);
                $contenido->imagen = $_POST["imagen"];
                $contenido->titulo = $_POST["titulo"];
                $contenido->subtitulo = $_POST["subtitulo"];
                $contenido->contenido = $_POST["contenido"];
                $contenido->clasificacion = $_POST["clasificacion"];
                $contenido->nombre = $_POST["nombre"];
                $contenido->apellido = $_POST["apellido"];
            }
        ?>

                <div class="row">
                    <img src="<?php echo $contenido->imagen?>"  alt="Responsive image" width="1463" height="263">
                </div>
                <div class="container">
                <div class="row mb-5">
                    <h1 style="text-align: justify;"><?php echo $contenido->titulo?></h1>
                    <h6><?php echo $contenido->clasificacion?></h4>
                    <h6 style="text-align: justify;"><?php echo  $contenido->subtitulo?></h3>
                    <h7 style="text-align: right; font-family: Candara"><?php echo  $contenido->nombre." ".$contenido->apellido ?></h6>
                    <br>
                    <br>
                    <h6 style="text-align: justify;"><b><?php echo $contenido->contenido?></b></h5>
                </div>
                </div>
                <hr>

<!-- ..................................................... -->    
    </div> 
    <?php include 'footer.php' ?>  
</body>
</html>