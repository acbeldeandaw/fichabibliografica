<?php
require 'models/Connection.php';
require 'models/Session.php';
require 'models/Message.php';
require 'models/Usuario.php';
require 'models/UsuarioDAO.php';

session_start();

$conn = Connection::connect();

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contrasena = $_POST['contrasena'];

    if (empty($email)) {
        Message::addErrorMessage("Debes introducir el email");
        $error = true;
    }
    if (empty($contrasena)) {
        Message::addErrorMessage("Debes introducir la contraseña");
        $error = true;
    }
    if (!$error) {
        $usuarioDAO = new UsuarioDAO($conn);
        if (!$usuario = $usuarioDAO->findByEmail($email)) {
            Message::addErrorMessage("Datos incorrectos");
            $error = true;
        } else {
            if (password_verify($contrasena, $usuario->getContrasena()) == true) {
                Session::start($usuario->getId());
            } else {
                Message::addErrorMessage("Datos incorrectos");
                $error = true;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inicio - BibliogrApp</title>
    <?php $pageTitle = "Inicio - BibliogrApp" ?>
    <?php include("template/top.php") ?>
</head>

<body>
    <?php include("template/navbar.php") ?>

    <?php if (Session::exists()) : ?>

        <div class="container my-4 text-center">
            <a href="insertar_ficha.php" class="btn btn-info">Insertar nueva ficha<i class="fa-solid fa-user-plus ps-1"></i></a>
        </div>

    <?php else : ?>
        <div class="d-flex justify-content-center mb-8 text-center">
            <div class="col-10 col-md-6 col-lg-5 col-xl-4 p-0 ">
                <div class="card shadow" style="border-radius: 1rem;">
                    <div class="card-body">
                        <form method="post">
                            <h1 class="fw-bold mb-0">¡Bienvenid@!</h1>
                            <i class="fa-solid fa-user fa-3x my-3"></i>
                            <div class="form-outline mb-3">
                                <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                <label class="form-label" for="email">Email *</label>
                            </div>
                            <div class="form-outline mb-3">
                                <input type="password" id="contrasena" name="contrasena" class="form-control form-control-lg" required />
                                <label class="form-label" for="contrasena">Contraseña *</label>
                            </div>
                            <div class="checkbox form-check mb-3">
                                <label class="form-check-label" for="recuerdame">
                                    <input class="form-check-input" type="checkbox" id="recuerdame" name="_remember_me" checked />
                                    Recuérdame
                                </label>
                            </div>
                            <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}">
                            <button class="btn btn-info mb-3" type="submit">Iniciar sesión<i class="fa-solid fa-right-to-bracket ps-1"></i></button>
                        </form>
                        <div>
                            <p class="mb-0">¿No estás registrado? <a href="registro.php" class="text-body fw-bold">Regístrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php include("template/bottom.php") ?>

    <script type="text/javascript">
        <?= Message::showMessages() ?>
    </script>
</body>

</html>