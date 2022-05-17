<?php

class FichaDAO
{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * 
     * @param Ficha $ficha
     * @return boolean
     */
    public function insert($ficha)
    {
        if ($ficha instanceof Ficha) {

            $titulo = $ficha->getTitulo();
            $autor = $ficha->getAutor();
            $revista = $ficha->getRevista();
            $editorial = $ficha->getEditorial();
            $lugarPublicacion = $ficha->getLugarPublicacion();
            $fechaPublicacion = $ficha->getFechaPublicacion();
            $tema = $ficha->getTema();
            $bibliografiaSugerida = $ficha->getBibliografiaSugerida();
            $ubicacion = $ficha->getUbicacion();
            $resumen = $ficha->getResumen();
            $notas = $ficha->getNotas();
            $palabrasClave = $ficha->getPalabrasClave();

            $sql = "INSERT INTO fichas(titulo, autor, revista, editorial,"
                . " lugar_publicacion, fecha_publicacion, tema, bibliografia_sugerida,"
                . " ubicacion, resumen, notas, palabras_clave)"
                . " values(?,?,?,?,?,?,?,?,?,?,?,?)";
            if (!$stmt = $this->conn->prepare($sql)) {
                die("Error preparing query: " . $this->conn->error);
            }
            $stmt->bind_param(
                'ssssssssssss',
                $titulo,
                $autor,
                $revista,
                $editorial,
                $lugarPublicacion,
                $fechaPublicacion,
                $tema,
                $bibliografiaSugerida,
                $ubicacion,
                $resumen,
                $notas,
                $palabrasClave
            );
            $stmt->execute();

            // Guardo el id que le ha asignado la base de datos en la propiedad id del objeto
            $ficha->setId($this->conn->insert_id);
            if ($this->conn->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
