<?php
require 'models/Connection.php';
require 'models/Session.php';
require 'models/Message.php';
require 'models/Usuario.php';
require 'models/UsuarioDAO.php';
require 'models/Ficha.php';
require 'models/FichaDAO.php';

session_start();

if (!Session::exists()) {
    die();
}

$conn = Connection::connect();

$fichaDAO = new FichaDAO($conn);

if (!empty($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    if ($ficha = $fichaDAO->find($id)) {
        if ($ficha->getUsuario() !== Session::getSessionUserId()) {
            die();
        }
    } else {
        die();
    }
} else {
    die();
}

if (!$fichaDAO->delete($id)) {
    die();
}

header('Content-type: application/json');
echo json_encode(array(
    "response" => "ok",
));
