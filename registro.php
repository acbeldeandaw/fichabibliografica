<?php
require 'models/Connection.php';
require 'models/Session.php';
require 'models/Message.php';
require 'models/Usuario.php';
require 'models/UsuarioDAO.php';

session_start();

// Comprobación de sesión
if (Session::exists()) {
    header('Location: index.php');
    die();
}

$conn = Connection::connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = false;
    $usuarioDAO = new UsuarioDAO($conn);
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_SPECIAL_CHARS);
    $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contrasena = $_POST['contrasena'];
    $contrasena2 = $_POST['contrasena2'];

    if (empty($nombre)) {
        Message::addErrorMessage("Debes introducir el nombre");
        $error = true;
    }
    if (empty($apellidos)) {
        Message::addErrorMessage("Debes introducir los apellidos");
        $error = true;
    }
    if (empty($email)) {
        Message::addErrorMessage("Debes introducir el email");
        $error = true;
    }
    if (empty($contrasena) && empty($contrasena2)) {
        Message::addErrorMessage("Debes introducir la contraseña");
        $error = true;
    }
    if ($contrasena != $contrasena2) {
        Message::addErrorMessage("Las contraseñas no coinciden");
        $error = true;
    }
    if ($usuarioDAO->findByEmail($email) != null) {
        Message::addErrorMessage("Este email ya se encuentra registrado");
        $email = "";
        $error = true;
    }

    if (!$error) {
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setEmail($email);
        $contrasena = password_hash($contrasena, PASSWORD_BCRYPT);
        $usuario->setContrasena($contrasena);

        if ($usuarioDAO->insert($usuario)) {
            Message::addSuccessMessage("Usuario registrado correctamente");
            header('Location: index.php');
            die();
        } else {
            Message::addErrorMessage('No se ha podido crear el usuario');
        }

        $nombre = "";
        $apellidos = "";
        $email = "";
        $contrasena = "";
        $contrasena2 = "";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registro - BibliogrApp</title>
    <?php $pageTitle = "Registro - BibliogrApp"?>
    <?php include("template/top.php") ?>
</head>

<body>
    <?php include("template/navbar.php") ?>

    <div class="d-flex justify-content-center mb-8 text-center">
        <div class="col-10 col-md-6 col-lg-5 col-xl-4 p-0 ">
            <div class="card shadow" style="border-radius: 1rem;">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <h1 class="fw-bold m-0">¡Introduce tus datos!</h1>
                        <div class="form-outline my-3">
                            <input type="text" id="" name="nombre" class="form-control" value="<?= (isset($nombre)) ? $nombre : "" ?>" required />
                            <label class="form-label" for="nombre">Nombre *</label>
                        </div>
                        <div class="form-outline my-3">
                            <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?= (isset($apellidos)) ? $apellidos : "" ?>" required />
                            <label class="form-label" for="apellidos">Apellidos *</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="email" id="email" name="email" class="form-control" value="<?= (isset($email)) ? $email : "" ?>" required />
                            <label class="form-label" for="email">Email *</label>
                        </div>
                        <div class="form-outline my-3">
                            <input type="password" id="contrasena" name="contrasena" class="form-control" required />
                            <label class="form-label" for="contrasena">Contraseña *</label>
                        </div>
                        <div class="form-outline my-3">
                            <input type="password" id="contrasena2" name="contrasena2" class="form-control" required />
                            <label class="form-label" for="contrasena2">Repetir Contraseña *</label>
                        </div>
                        <button class="btn btn-dark mb-3" type="submit">Registrarse<i class="fa-solid fa-user-plus ps-1"></i></button>
                    </form>
                    <div>
                        <p class="mb-0">¿Ya tienes cuenta? <a href="index.php" class="text-body fw-bold">Inicia sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("template/bottom.php") ?>

    <script type="text/javascript">
        <?= Message::showMessages() ?>
    </script>
</body>

</html>