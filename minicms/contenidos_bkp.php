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
    <div class="container">

    <h1> CONTENIDO</h1>

<?php
$contenido = new Contenido();
$registros = $contenido->listar();
while ($reg = $registros->fetch_assoc())    {
    //echo "ID CONTENIDO: "       . $reg["idcontenido"] . "<br>";
    //echo "ID CLASIFICACION: "   . $reg["idclasificacion"] . "<br>";
    //echo "ID USUARIO: "         . $reg["autor_idusuario"] . "<br>";
    echo "TITULO: "             . $reg["titulo"] . "<br>";
    echo "URL IMAGEN: "         ?> <img src="<?php echo $reg["imagen"]?>" width="189" height="121"> <?php "<br> </p>";
    //echo "SUBTITULO: "          . $reg["subtitulo"] . "<br>";
    echo "CONTENIDO: "          . $reg["contenido"] . "<br>";
    echo "<hr>";
}   
?>
    
    </div> 
    <?php include 'footer.php' ?>  
</body>
</html>