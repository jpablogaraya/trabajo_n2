<?php

require_once "conexionDB.php";

class Contenido {
    public $idcontenido;
    public $idclasificacion;
    public $idusuario;
    public $imagen;
    public $titulo;
    public $subtitulo;
    public $contenido;

    public function __construct()   {

    }

    public function setIdContenido($idcontenido)   {
        $this->idcontenido = $idcontenido;
        $this->obtener();
   }

    public function setIdContenido1($idcontenido)   {
        $this->idcontenido = $idcontenido;
        $this->MostrarContenido();
    }

    public function delIdContenido($idcontenido)   {
        $this->idcontenido = $idcontenido;
        $this->eliminaContenido();
    }


    public function listar() {
        $db = new conexionDB();
        $sql = "select *  from contenidos order by 1 desc LIMIT 5";
        $resultado = $db->ejecutar_pdo($sql, array());
        return $resultado;
    }


    public function obtener()   {
        $db = new conexionDB();
        $query = "select * from contenidos where idcontenido = ?";
        $resultado = $db->ejecutar_pdo($query, array($this->idcontenido));
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $this->idcontenido      = $fila["idcontenido"];
            $this->idclasificacion  = $fila["idclasificacion"];
            $this->autor_idusuario  = $fila["autor_idusuario"];
            $this->imagen           = $fila["imagen"];
            $this->titulo           = $fila["titulo"];
            $this->subtitulo        = $fila["subtitulo"];
            $this->contenido        = $fila["contenido"];


        } else {
            $this->idcontenido      = null;
            $this->idclasificacion  = null;
            $this->autor_idusuario  = null;
            $this->imagen           = null;
            $this->titulo           = null;
            $this->subtitulo        = null;
            $this->contenido        = null;
        }
        $db->cerrar();
    }

    public function MostrarContenido()   {
        $db = new conexionDB();
        $query = "SELECT imagen, titulo, subtitulo, contenido, cl.nombre clasificacion, u.nombre, u.apellido FROM contenidos c, clasificaciones cl, usuarios u WHERE c.idclasificacion = cl.idclasificacion AND c.autor_idusuario = u.idusuario and idcontenido = ?";
        $resultado = $db->ejecutar_pdo($query, array($this->idcontenido));
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $this->imagen           = $fila["imagen"];
            $this->titulo           = $fila["titulo"];
            $this->subtitulo        = $fila["subtitulo"];
            $this->contenido        = $fila["contenido"];
            $this->clasificacion    = $fila["clasificacion"];
            $this->nombre           = $fila["nombre"];
            $this->apellido         = $fila["apellido"];
        } else {
            $this->imagen           = null;
            $this->titulo           = null;
            $this->subtitulo        = null;
            $this->contenido        = null;
            $this->clasificacion    = null;
            $this->nombre           = null;
            $this->apellido         = null;
        }
        $db->cerrar();
    }

    public function modificar() {
        $db = new conexionDB();
        $query = "UPDATE contenidos SET idclasificacion = ?, imagen = ?, titulo = ?, subtitulo = ?, contenido = ? WHERE idcontenido = ?";
        $parametros = array($this->idclasificacion, $this->imagen, $this->titulo, $this->subtitulo, $this->contenido, $this->idcontenido);
        $db->ejecutar_pdo($query, $parametros);
        $db->cerrar();
    }

    public function eliminaContenido() {
        $db = new conexionDB();
        $query = "DELETE FROM contenidos WHERE idcontenido = ?";
        $parametros = array($this->idcontenido);
        $db->ejecutar_pdo($query, $parametros);
        $db->cerrar();
    }

    public function agregar($iduser) {
        $db = new conexionDB();
        $query = "INSERT INTO contenidos (idclasificacion, autor_idusuario, imagen, titulo, subtitulo, contenido) VALUES (?, (select idusuario from usuarios where email = ?), ?, ?, ? ,?)";
        $parametros = array($this->idclasificacion, $iduser, $this->imagen, $this->titulo, $this->subtitulo, $this->contenido);
        $db->ejecutar_pdo($query, $parametros);
        $db->cerrar();
    }
} 


class Clasificaciones {
    public $idclasificacion;
    public $nombre;
    
    public function __construct()   {

    }

    public function listar()    {
        $db = new conexionDB();
        $query = "select idclasificacion, nombre from clasificaciones order by nombre";
        $resultado = $db->ejecutar_pdo($query, array());
        return $resultado;
    }


}

?>