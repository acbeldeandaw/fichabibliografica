<?php

session_start();

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
    if(!$error) {
        $usuarioDAO = new UsuarioDAO($conn);
        if (!$usuario = $usuarioDAO->findByEmail($email)) {
            Message::addErrorMessage("Datos incorrectos");
            $error = true;
        } else {
            if (password_verify($password, $usuario->getPassword()) == true) {
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
    <title>Inicio - Bibliograpp</title>
    <?php include("template/top.php") ?>
</head>

<body>
    <?php include("template/navbar.php") ?>

    <form action="actions/login.php" method="POST" class="text-center p-2 m-2 border">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="contrasena" placeholder="Contraseña">
        <input type="submit" value="Entrar">
    </form>
    <a href="registro.php">Registrarse</a>

    <?php include("template/bottom.php") ?>
    <script type="text/javascript">
        <?= Message::showMessages() ?>
    </script>
</body>

</html>