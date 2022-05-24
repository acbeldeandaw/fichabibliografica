<?php
require 'models/Connection.php';
require 'models/Session.php';
require 'models/Message.php';
require 'models/Usuario.php';
require 'models/UsuarioDAO.php';
require 'models/Ficha.php';
require 'models/FichaDAO.php';

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
            <a href="insertar_ficha.php" class="btn btn-info mb-3">nueva ficha<i class="fa-solid fa-plus ps-1"></i></i></a>
            <div class="input-group d-flex justify-content-center">
                <div class="form-outline">
                    <input type="search" id="filter" class="form-control" oninput="myFunction()" />
                    <label class="form-label" for="filter">Filtrar por título</label>
                </div>
            </div>
        </div>
        <?php
        $fichaDAO = new FichaDAO($conn);
        $fichas = $fichaDAO->findAll(Session::getSessionUserId());
        ?>
        <div class="container my-4">
            <div class="row" id="fichas">
                <?php foreach ($fichas as $ficha) : ?>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4 ficha" id='ficha-<?= $ficha->getId() ?>'>
                        <div class="card text-center border shadow">
                            <div class="card-header"><?= $ficha->getTitulo() ?></div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?= $ficha->getResumen() ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="ver_ficha.php?id=<?= $ficha->getId() ?>">
                                    <button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="editar_ficha.php?id=<?= $ficha->getId() ?>">
                                    <button type="button" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button>
                                </a>
                                <a class="confirm-delete" data-id='<?= $ficha->getId() ?>'>
                                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
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

        function myFunction() {
            var input, filter, cards, cardContainer, h5, title, i;
            input = document.getElementById("filter");
            filter = input.value.toUpperCase();
            cardContainer = document.getElementById("fichas");
            cards = cardContainer.getElementsByClassName("ficha");
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".card-header");
                if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>