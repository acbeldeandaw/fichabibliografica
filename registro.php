<?php
require 'models/Connection.php';
require 'models/Session.php';
require 'models/Message.php';
require 'models/Usuario.php';
require 'models/UsuarioDAO.php';

session_start();

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
    <title>Inicio - Bibliograpp</title>
    <?php include("template/top.php") ?>
</head>

<body>
    <?php include("template/navbar.php") ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?= (isset($nombre)) ? $nombre : "" ?>">
                    <label class="form-label" for="nombre">Nombre</label>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?= (isset($apellidos)) ? $apellidos : "" ?>">
                    <label class="form-label" for="apellidos">Apellidos</label>
                </div>
            </div>
        </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" value="<?= (isset($email)) ? $email : "" ?>">
            <label class="form-label" for="email">Email</label>
        </div>
        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="contrasena" name="contrasena" class="form-control">
            <label class="form-label" for="contrasena">Contraseña</label>
        </div>
        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="contrasena2" name="contrasena2" class="form-control">
            <label class="form-label" for="contrasena2">Repetir contraseña</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Registrarse</button>
    </form>

    <?php include("template/bottom.php") ?>

    <script type="text/javascript">
        <?= Message::showMessages() ?>
    </script>
</body>

</html>