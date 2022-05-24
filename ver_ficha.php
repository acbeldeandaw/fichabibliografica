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

$fichaDAO = new FichaDAO($conn);

$error = false;

if (!empty($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    if ($ficha = $fichaDAO->find($id)) {
        if ($ficha->getUsuario() !== Session::getSessionUserId()) {
            Message::addErrorMessage("Acceso denegado");
            header('Location: index.php');
            die();
        }
    } else {
        Message::addErrorMessage("No se ha encontrado la ficha");
        header('Location: index.php');
        die();
    }
} else {
    header('Location: index.php');
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ver Ficha - BibliogrApp</title>
    <?php $pageTitle = "Ver Ficha - BibliogrApp" ?>
    <?php include("template/top.php") ?>
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>
</head>

<body>
    <?php include("template/navbar.php") ?>

        <div class="container my-4 text-center">
            <a href="index.php" class="btn btn-info">Volver<i class="fa-solid fa-rotate-left ps-1"></i></a>
        </div>
        <div class="container card shadow text-center col-12 my-4">
            <h5 class="card-header mb-3">Ver Ficha Nº <?= $ficha->getId() ?></h5>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="titulo" name="titulo" class="form-control" value="<?= $ficha->getTitulo() ?>" readonly />
                        <label class="form-label" for="titulo">Título</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="autor" name="autor" class="form-control" value="<?= $ficha->getAutor() ?>" readonly />
                        <label class="form-label" for="autor">Autor</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="revista" name="revista" class="form-control" value="<?= $ficha->getRevista() ?>" readonly />
                        <label class="form-label" for="revista">Revista</label>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="editorial" name="editorial" class="form-control" value="<?= $ficha->getEditorial() ?>" readonly />
                        <label class="form-label" for="editorial">Editorial</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="lugarPublicacion" name="lugarPublicacion" class="form-control" value="<?= $ficha->getLugarPublicacion() ?>" readonly />
                        <label class="form-label" for="lugarPublicacion">Lugar de publicación</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="number" id="fechaPublicacion" name="fechaPublicacion" class="form-control" step="1" value="<?= $ficha->getFechaPublicacion() ?>" readonly />
                        <label class="form-label" for="fechaPublicacion">Año de publicación</label>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="tema" name="tema" class="form-control" value="<?= $ficha->getTema() ?>" readonly />
                        <label class="form-label" for="tema">Tema</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="bibliografiaSugerida" name="bibliografiaSugerida" class="form-control" value="<?= $ficha->getBibliografiaSugerida() ?>" readonly />
                        <label class="form-label" for="bibliografiaSugerida">Bibliografía sugerida</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="<?= $ficha->getUbicacion() ?>" readonly />
                        <label class="form-label" for="ubicacion">Ubicación</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 px-2">
                <div class="form-outline">
                    <textarea class="form-control" id="resumen" name="resumen" rows="3" maxlength="255" readonly><?= $ficha->getResumen() ?></textarea>
                    <label class="form-label" for="resumen">Resumen</label>
                </div>
            </div>

            <textarea id="notas" name="notas" placeholder="Notas..." readonly><?= $ficha->getNotas() ?></textarea>

            <div class="row my-3">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="palabrasClave" name="palabrasClave" class="form-control" value="<?= $ficha->getPalabrasClave() ?>" readonly />
                        <label class="form-label" for="palabrasClave">Palabras clave</label>
                    </div>
                </div>
            </div>
        </div>

    

    <?php include("template/bottom.php") ?>

    <script type="text/javascript">
        <?= Message::showMessages() ?>
        document.getElementById('fechaPublicacion').oninput = function() {
            if (this.value.length > 4) {
                this.value = this.value.slice(0, 4);
            }
        }
        ClassicEditor
            .create(document.querySelector('#notas'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            })
            .then(editor => {
                editor.enableReadOnlyMode('#notas');
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>