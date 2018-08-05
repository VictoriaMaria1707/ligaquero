<?php
require_once "claseconexion.php";
class alimentacion
{
    protected $codigo;
    protected $idalimentacion;
    protected $idjugador;
    protected $idcalendario;
    protected $numerocami;
    
    public function __construct(){
        $this->codigo="";
        $this->idalimentacion="";
        $this->idjugador="";
        $this->idcalendario="";
        $this->numerocami="";
    }
    
    public function insert($idjugador, $idcalendario, $numerocami)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into alineaciones (idjugadorss, idcanlendario, numerocamiseta) values('%s','%s','%s')",$idjugador, $idcalendario, $numerocami);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     
    public function combojugador1()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from jugadores inner join transferencias on transferencias.idjugadores = jugadores.idjugador where idequipos=( SELECT idequipo1 from calendarios)");
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
        
    public function combojugador2()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from jugadores inner join transferencias on transferencias.idjugadores = jugadores.idjugador where idequipos=( SELECT idequipo2 from calendarios)");
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
          public function fechass($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from fechas inner join calendarios on fechas.idfecha = calendarios.idfechas where idcalendario ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }  
    
      public function consultar1()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from alineaciones INNER join jugadores on jugadores.idjugador = alineaciones.idjugadorss INNER JOIN calendarios on calendarios.idcalendario = alineaciones.idcanlendario INNER JOIN fechas on fechas.idfecha = calendarios.idfechas Where alineaciones.idequipo = calendarios.idequipo1 ";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    public function consultar2()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from alineaciones INNER join jugadores on jugadores.idjugador = alineaciones.idjugadorss INNER JOIN calendarios on calendarios.idcalendario = alineaciones.idcanlendario INNER JOIN fechas on fechas.idfecha = calendarios.idfechas Where alineaciones.idequipo = calendarios.idequipo2 ";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from jugadores inner join generos on generos.idgenero = jugadores.idgenero where idjugador ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
     public function consultar_ali($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from alineaciones INNER join jugadores on jugadores.idjugador = alineaciones.idjugadorss INNER JOIN calendarios on calendarios.idcalendario = alineaciones.idcanlendario where alineaciones.idcanlendario ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
     
    public function actualizar2($idjugador, $numerocami, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update alineaciones set idjugadorss='%s', numerocamiseta='%s' where idalineacion='%s'",$idjugador, $numerocami, $codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function eliminar($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("delete from usuarios where idusuario='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
}

?>
