<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        if ($_GET["logout"] == 1) {
            session_destroy();
        } else {
            header("Location: index.php");
            exit();
        }
    }

    require_once('../admin/conexion.php');
    $usercredentials=new DB_con();

    $usuario = null;
    $contrasena = null;

    if (!empty($_POST)) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $ret=$usercredentials->login($usuario,$contrasena);
        $num=mysqli_fetch_array($ret);

        if($num>0)
        {
            $_SESSION["usuario"] = $usuario;
            echo "<script>window.location.href='../index.php'</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">

        <div class="row" style="margin-top: 15%">
            <div class="col-md-4 offset-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <img src="https://investors.togethermoney.com/sites/together-finance/files/together-finance/together-investor-portal/investor-portal.jpg"
                        class="card-img-top" alt="Login">
                    <div class="card-body">
                        <h5 class="card-title">Acceso</h5>
                        <div class="card-text mt-3">
                            <form action="" method="post" id="login">

                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="email" class="form-control" maxlength="100" required  id="usuario" name="usuario" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="contrasena" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" maxlength="15" required  id="contrasena" name="contrasena" placeholder="123">
                                </div>
                                <div class="mb-3">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" style="float: right;" name="login">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>