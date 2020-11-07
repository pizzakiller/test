<?php

class modelData {



  public function conectar_bd()
  {

    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "";

    /* crear la conexión */
    $conexion = new mysqli($servername, $username, $password, $dbname);
    /* comprobar la conexión */
    if ($conexion->connect_error) {
        die("Falló la conexión:: " . $conexion->connect_error);
    }
    else
    {
      return $conexion;
    }

  }


  public  function insert_data($parametro){

    
    /** preparando data para guardar en la base de datos **/
    
    $nombre =  filter_var($parametro['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($parametro['apellido'], FILTER_SANITIZE_STRING);
    $email = filter_var($parametro['email'], FILTER_SANITIZE_EMAIL);

    $sql = "INSERT INTO `persona`(`nombre`, `apellido`, `email`) VALUES ('$nombre', '$apellido', '$email')";

    $conn =  $this->conectar_bd();
    $conn->query("SET lc_messages = 'es_ES'");
    if ($conn->query($sql) === TRUE)
    {

        $res['success'] = TRUE;
        $res['message'] = "Envio exitosamente";
    }
    else
    {
      $res['success'] = FALSE;
      $res['message'] = "Error: ".$conn->error;
    }

    $conn->close();
    return $res;

  }
}

?>
