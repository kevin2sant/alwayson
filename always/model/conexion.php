<?php
class conexionModel{
    private $mysqli;

    public function __construct(){
        $this->mysqli = mysqli_connect("localhost", "root", "", "alwayson");


        if (mysqli_connect_errno()) {
            printf("Conexión fallida: %s\n", mysqli_connect_error());
            exit();
        }

    }

    public function consulta($sql){
        if ($result = mysqli_query($this->mysqli, $sql)) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            
            return $row;

            mysqli_free_result($result);
        }
    }

    public function read($sql){
        $result=mysqli_query($this->mysqli,$sql);

        // Fetch all
        return mysqli_fetch_all($result,MYSQLI_ASSOC);

        mysqli_free_result($result);
    }

    public function cud($sql){
        $result=mysqli_query($this->mysqli,$sql);
        return $result;
    }
}
?>