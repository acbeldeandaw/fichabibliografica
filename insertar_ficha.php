<?php
require 'models/Connection.php';
require 'models/Session.php';
require 'models/Message.php';
require 'models/Usuario.php';
require 'models/UsuarioDAO.php';
require 'models/Ficha.php';
require 'models/FichaDAO.php';

session_start();

// Comprobación de sesión
if (!Session::exists()) {
    header('Location: index.php');
    die();
}

$conn = Connection::connect();

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($titulo)) {
        Message::addErrorMessage("Debes introducir el título");
        $error = true;
    }

    if (!$error) {
        $fichaDAO = new FichaDAO($conn);
        $ficha = new Ficha();
        
        $ficha->setTitulo($titulo);
        $ficha->setAutor($titulo);
        $ficha->setRevista($titulo);
        $ficha->setEditorial($titulo);
        $ficha->setLugarPublicacion($titulo);
        $ficha->setFechaPublicacion($titulo);
        $ficha->setTema($titulo);
        $ficha->setBibliografiaSugerida($titulo);
        $ficha->setUbicacion($titulo);
        $ficha->setResumen($titulo);
        $ficha->setNotas($titulo);
        $ficha->setPalabrasClave($titulo);

        if (!$fichaDAO->insert($ficha)) {
            Message::addErrorMessage("No se ha podido añadir la ficha");
        } else {
            Message::addSuccessMessage("Ficha añadida correctamente");
            header('Location: index.php');
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Insertar Ficha - BibliogrApp</title>
    <?php $pageTitle = "Insertar Ficha - BibliogrApp" ?>
    <?php include("template/top.php") ?>
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>
</head>

<body>
    <?php include("template/navbar.php") ?>

    <form action="" method="POST" class="mb-8">

        <div class="container card shadow text-center col-12 my-4">
            <h5 class="card-header mb-3">Insertar Ficha</h5>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="titulo" name="titulo" class="form-control" />
                        <label class="form-label" for="titulo">Título</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="autor" name="autor" class="form-control" />
                        <label class="form-label" for="autor">Autor</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="revista" name="revista" class="form-control" />
                        <label class="form-label" for="revista">Revista</label>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="editorial" name="editorial" class="form-control" />
                        <label class="form-label" for="editorial">Editorial</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="lugarPublicacion" name="lugarPublicacion" class="form-control" />
                        <label class="form-label" for="lugarPublicacion">Lugar de publicación</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="fechaPublicacion" name="fechaPublicacion" class="form-control" />
                        <label class="form-label" for="fechaPublicacion">Año de publicación</label>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="tema" name="tema" class="form-control" />
                        <label class="form-label" for="tema">Tema</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="bibliografiaSugerida" name="bibliografiaSugerida" class="form-control" disabled />
                        <label class="form-label" for="bibliografiaSugerida">Bibliografía sugerida</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="ubicacion" name="ubicacion" class="form-control" />
                        <label class="form-label" for="ubicacion">Ubicación</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 px-2">
                <div class="form-outline">
                    <textarea class="form-control" id="resumen" name="resumen" rows="3" maxlength="255"></textarea>
                    <label class="form-label" for="resumen">Resumen</label>
                </div>
            </div>

            <textarea id="notas" name="notas" placeholder="Notas..."></textarea>

            <div class="row mt-3">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="palabrasClave" name="palabrasClave" class="form-control" />
                        <label class="form-label" for="palabrasClave">Palabras clave</label>
                    </div>
                </div>
            </div>

            <div class="card-footer text-center mt-3">
                <a href="index.php" class="btn btn-info">Volver<i class="fa-solid fa-rotate-left ps-1"></i></a>
                <button type="submit" class="btn btn-info">insertar<i class="fa-solid fa-triangle-exclamation ps-1"></i></button>
            </div>
        </div>

    </form>

    <?php include("template/bottom.php") ?>

    <script type="text/javascript">
        <?= Message::showMessages() ?>

        ClassicEditor
            .create(document.querySelector('#notas'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>