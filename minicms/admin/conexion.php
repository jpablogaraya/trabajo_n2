<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'cmsdb');
class DB_con
{
    function __construct()
    {
    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    $this->dbh=$con;
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    }

    // Función de login
    public function login($email,$contrasena)
        {
        $result=mysqli_query($this->dbh,"select idusuario, email from usuarios where email='$email' and contrasena='$contrasena'");
        return $result;
        }

        function runBaseQuery($query) {
                    $result = mysqli_query($this->dbh, $query);
                    while($row=mysqli_fetch_assoc($result)) {
                    $resultset[] = $row;
                    }       
                    if(!empty($resultset)){
                    return $resultset;
                    }
        }
        
        function numRows($query) {
            $result  = mysqli_query($this->dbh, $query);
            $rowcount = mysqli_num_rows($result);
            return $rowcount;   
        }
        
        function executeQuery($query) {
            $result  = mysqli_query($this->dbh, $query);
            return $result; 
        }
}
?>