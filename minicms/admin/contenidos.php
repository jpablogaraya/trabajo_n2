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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ffa50c084f.js" crossorigin="anonymous"></script>
    <link href="../style/style.css" rel="stylesheet" type="text/css">
    <title>MINICMS</title>
</head>
<body>

    <?php include '../header.php' ?>
    <div class="container">
        <br>
        <div id="bottom">
            <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
        </div>
        <br>
        <div class="row">
            <?php
            $contenido = new Contenido();
            $registros = $contenido->listar();
            while ($reg = $registros->fetch_assoc())    {
            ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo $reg["imagen"]?>" width="302" height="81"> 
                            <div class ="card-title">
                                <h2>
                                    <br>
                                    <?php echo $reg["titulo"]?>
                                </h2>
                            </div>
                            <div class="card-text" align="justify">
                            <?php echo $reg["subtitulo"]?>
                            </div>
                            <br>
                            <div align="center">
                                <!--<button type="button" class="btn btn-sm btn-outline-success btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>-->
                                <!--<button type="button" class="btn btn-sm btn-outline-danger btn-md"><i class="fa fa-trash" aria-hidden="true"></i></button>-->
                                <a href="contenido.php?idcontenido=<?php echo $reg["idcontenido"] ?>" class="btn btn-sm btn-outline-success btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="contenido.php?idcontenido=<?php echo $reg["idcontenido"] ?>" class="btn btn-sm btn-outline-danger btn-md"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            <?php
            }   
            ?>
        </div>
<!-- ..................................................... -->    
    </div> 
    <?php include '../footer.php' ?>  
</body>
</html>