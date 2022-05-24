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
            $usuario = $ficha->getUsuario();

            $sql = "INSERT INTO fichas(titulo, autor, revista, editorial,"
                . " lugarPublicacion, fechaPublicacion, tema, bibliografiaSugerida,"
                . " ubicacion, resumen, notas, palabrasClave, usuario)"
                . " values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            if (!$stmt = $this->conn->prepare($sql)) {
                die("Error preparing query: " . $this->conn->error);
            }
            $stmt->bind_param(
                'ssssssssssssi',
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
                $palabrasClave,
                $usuario
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

    /**
     * 
     * @param Ficha $ficha
     * @return boolean
     */
    public function update($ficha)
    {
        if ($ficha instanceof Ficha) {
            $id = $ficha->getId();
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
            $usuario = $ficha->getUsuario();

            $sql = "UPDATE fichas SET titulo=?, autor=?, revista=?, editorial=?, lugarPublicacion=?, fechaPublicacion=?, tema=?, bibliografiaSugerida=?, ubicacion=?, resumen=?, notas=?, palabrasClave=?, usuario=? WHERE id=?";
            if (!$stmt = $this->conn->prepare($sql)) {
                die("Error preparing query: " . $this->conn->error);
            }
            $stmt->bind_param(
                'ssssssssssssii',
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
                $palabrasClave,
                $usuario,
                $id
            );
            $stmt->execute();

            if ($this->conn->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param Ficha $ficha
     * @return boolean
     */
    public function delete($id)
    {
        $sql = "DELETE FROM fichas WHERE id=?";
        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error preparing query: " . $this->conn->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($this->conn->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function find($id)
    {
        $sql = "SELECT * FROM fichas WHERE id=?";
        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error preparing query: " . $this->conn->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if (!$result = $stmt->get_result()) {
            die("SQL Error: " . $this->conn->error);
        }

        if ($ficha = $result->fetch_object('Ficha')) {
            return $ficha;
        } else {
            return null;
        }
    }

    /**
     * 
     * @param type $id
     * @param type $order
     * @param type $field
     * @return type
     */
    public function findAll($id, $order = 'DESC', $field = 'id')
    {
        $array_obj = array();
        $sql = "SELECT * FROM fichas WHERE usuario=$id ORDER BY $field $order";
        if (!$result = $this->conn->query($sql)) {
            die("SQL Error: " . $this->conn->error);
        }
        while ($res = $result->fetch_object('Ficha')) {
            $array_obj[] = $res;
        }
        return $array_obj;
    }
}
