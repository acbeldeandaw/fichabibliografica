<?php

class Ficha
{
    private $id;
    private $titulo;
    private $autor;
    private $revista;
    private $editorial;
    private $lugarPublicacion;
    private $fechaPublicacion;
    private $tema;
    private $bibliografiaSugerida;
    private $ubicacion;
    private $resumen;
    private $notas;
    private $palabrasClave;
    private $usuario;

    function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getRevista()
    {
        return $this->revista;
    }

    public function setRevista($revista)
    {
        $this->revista = $revista;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    public function getLugarPublicacion()
    {
        return $this->lugarPublicacion;
    }

    public function setLugarPublicacion($lugarPublicacion)
    {
        $this->lugarPublicacion = $lugarPublicacion;
    }

    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    public function getTema()
    {
        return $this->tema;
    }

    public function setTema($tema)
    {
        $this->tema = $tema;
    }

    public function getBibliografiaSugerida()
    {
        return $this->bibliografiaSugerida;
    }

    public function setBibliografiaSugerida($bibliografiaSugerida)
    {
        $this->bibliografiaSugerida = $bibliografiaSugerida;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    public function getResumen()
    {
        return $this->resumen;
    }

    public function setResumen($resumen)
    {
        $this->resumen = $resumen;
    }

    public function getNotas()
    {
        return $this->notas;
    }

    public function setNotas($notas)
    {
        $this->notas = $notas;
    }

    public function getPalabrasClave()
    {
        return $this->palabrasClave;
    }

    public function setPalabrasClave($palabrasClave)
    {
        $this->palabrasClave = $palabrasClave;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
}
