<?php 

class conexionDB {

    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "cmsdb");
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
    }

    public function login($email,$contrasena)
    {
    $result=mysqli_query($this->dbh,"select idusuario from usuarios where email='$email' and contrasena='$contrasena'");
    return $result;
    }

    // PDO - seguro -- USAR
    public function ejecutar_pdo($sql, $parametros)  {
        $resultado = $this->conexion->prepare($sql);
        // foreach ($parametros as $key => $parametro) {
        //     $resultado->bind_param("s", $parametro);
        // }
        if (sizeof($parametros))    {
            $tipos = str_repeat("s", sizeof($parametros));
            $resultado->bind_param($tipos, ...$parametros);
        }
        $resultado->execute();
        $resultado = $resultado->get_result();
        return $resultado;
    }

    public function cerrar() {
        $this->conexion->close();
    }


}



?>