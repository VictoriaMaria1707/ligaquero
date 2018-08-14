<?php
require_once "claseconexion.php";
class equipo
{
    
    protected $codigo;
    protected $nombreequipo;
    protected $Numjugadores;
    protected $nombredueno;
    protected $nombreentrenador;
    protected $idcategoria;
    protected $idjugador;
    protected $idequipo;
         
    public function __construct(){
        $this->codigo="";
        $this->nombreequipo="";
        $this->Numjugador="";
        $this->nombredueno="";
        $this->nombreentrenador="";
        $this->idcategoria="";
         $this->idjugador="";
        $this->idequipo="";
    }
    
    public function insert($nombreequipo, $Numjugadores, $nombredueno, $nombreentrenador, $idcategoria)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into equipo (nombreequipo, Numjugadores, nombredueno, nombreentrenador, idcategoria) values('%s','%s','%s','%s','%s')",$nombreequipo, $Numjugadores, $nombredueno, $nombreentrenador, $idcategoria);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     
      public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from equipo inner join categorias on equipo.idcategoria = categorias.idcategoria ";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from equipo inner join categorias on equipo.idcategoria = categorias.idcategoria inner join series on categorias.idserie = series.idserie where idequipo ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
   
      public function consultar_datos($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from equipo inner join categorias on equipo.idcategoria = categorias.idcategoria inner join series on categorias.idserie = series.idserie where idequipo ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    public function actualizar($nombreequipo, $Numjugadores, $nombredueno, $nombreentrenador, $idcategoria, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update equipo set nombreequipo='%s', Numjugadores='%s', nombredueno='%s', nombreentrenador='%s', idcategoria='%s' where idequipo='%s'",$nombreequipo, $Numjugadores, $nombredueno, $nombreentrenador, $idcategoria, $codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
     public function actualizarpas($idequipo,$codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("UPDATE transferencias set idequipos ='%s' where idtransferencia='%s'",$idequipo, $codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
     public function comboequipo()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from equipo";
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
         public function transacciones()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("SELECT idjugador, nombre1, apellido1 from jugadores WHERE esta = 1");
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     public function insertequi($idjugador,$codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("insert into transferencias(idjugadores,idequipos,estado)values('%s','%s','1')",$idjugador,$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
         public function estadojuga($idjugador)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update jugadores set esta = '0' where idjugador='%s'",$idjugador);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    public function consultartransacciones($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("SELECT * FROM transferencias inner join equipo on transferencias.idequipos = equipo.idequipo inner join jugadores on jugadores.idjugador = transferencias.idjugadores Where idequipo = '%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     public function eliminar($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("delete from equipo where idequipo='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
}

?>
