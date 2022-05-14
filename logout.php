<?php
require 'models/Session.php';

session_start();

Session::close();

// Borramos la cookie diciendole al navegador que está caducada
setcookie('uid', '', time()-10);

header('Location: index.php');

die();