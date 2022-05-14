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

    $usuario = null;
    $contrasena = null;
    $usuarioValido = null;
    $usuarioNoValido = null;

    if (!empty($_POST)) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        if ($usuario == 'admin@admin.cl' && $contrasena == 'mayo') {
            $usuarioValido = "Usuario válido";
            $_SESSION["usuario"] = $usuario;
            header("Location: ../index.php");
        } else {
            $usuarioNoValido = "Usuario no válido";
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
                        <h5 class="card-title">Login</h5>
                        <div class="card-text mt-3">
                            <form action="" method="POST">
                                <!--
IMPORTANTES:
GET - obtener datos y desplegar páginas y formularios
POST - enviar datos y procesar formularios

MENOS IMPORTANTES:
PUT - actualizar datos
DELETE - eliminar datos
                                -->
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="email" class="form-control"
                                            maxlength="100" required
                                            id="usuario" name="usuario"
                                            placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="contrasena" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control"
                                            maxlength="15" required
                                            id="contrasena" name="contrasena"
                                            placeholder="123">
                                </div>
                                <div class="mb-3">
                                    <?php
                                        if (!is_null($usuarioValido)) {
                                    ?>
                                        <div class="alert alert-success" role="alert">
                                            Usuario válido, será redicreccionado/a
                                        </div>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if (!is_null($usuarioNoValido))   {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            Usuario/a no válido/a, deberá intentar nuevamente.
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" style="float: right;">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>
</html>l