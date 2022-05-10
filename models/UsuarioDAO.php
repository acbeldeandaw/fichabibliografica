<?php

class UsuarioDAO {
    
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    /**
     * 
     * @param Usuario $usuario
     * @return boolean
     */
    public function insert($usuario){
        if ($usuario instanceof Usuario) {
            $email = $usuario->getEmail();
            $contrasena = $usuario->getContrasena();
            $nombre = $usuario->getNombre();
            $apellidos = $usuario->getApellidos();
            
            $sql = "INSERT INTO usuarios(email, contrasena, nombre, apellidos) "
                    . "values(?,?,?,?)";
            if (!$stmt = $this->conn->prepare($sql)) {
                die("Error preparing query: " . $this->conn->error);
            }
            $stmt->bind_param('ssss', $email, $contrasena, $nombre, $apellidos);
            $stmt->execute();
            
            // Guardo el id que le ha asignado la base de datos en la propiedad id del objeto
            $usuario->setId($this->conn->insert_id);
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
     * @param type $email
     * @return type
     */
    public function findByEmail($email){
        $sql = "SELECT * FROM usuarios WHERE email=?";
        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error preparing query: " . $this->conn->error);
        }
        $stmt->bind_param('s', $email);
        $stmt->execute();
        
        if(!$result = $stmt->get_result()) {
            die("SQL Error: ". $this->conn->error);
        }
        
        if ($user = $result->fetch_object('Usuario')) {
            return $user;
        } else {
            return null;
        }
    }

    
}
