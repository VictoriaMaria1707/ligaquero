<?php
require_once "claseconexion.php";
class equipo
{
    
    protected $codigo;
    protected $nombreequipo;
    protected $Numjugadores;
    protected $nombredueno;
    protected $ceduladueno;
    protected $nombreentrenador;
    protected $cedulaentrenador;
    protected $idcategoria;
    protected $idjugador;
    protected $idequipo;
    protected $idtemporada;
         
    public function __construct(){
        $this->codigo="";
        $this->nombreequipo="";
        $this->Numjugador="";
        $this->nombredueno="";
        $this->ceduladueno="";
        $this->nombreentrenador="";
        $this->cedulaentrenador="";
        $this->idcategoria="";
         $this->idjugador="";
        $this->idequipo="";
        $this->idtemporada="";
    }
    
    public function insert($nombreequipo, $Numjugadores, $nombredueno,$ceduladueno, $nombreentrenador,$cedulaentrenador,$idcategoria)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into equipo (nombreequipo, Numjugadores, nombredueno, ceduladueno, nombreentrenador, cedulaentrenador, idcategoria) values('%s','%s','%s','%s','%s','%s','%s')",$nombreequipo, $Numjugadores, $nombredueno, $ceduladueno, $nombreentrenador, $cedulaentrenador, $idcategoria);
        
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     
      public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from equipo inner join categorias on equipo.idcategoria = categorias.idcategorias ";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from equipo inner join categorias on equipo.idcategoria = categorias.idcategorias inner join series on categorias.idseries = series.idserie where idequipo ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
   
      public function consultar_datos($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from equipo inner join categorias on equipo.idcategoria = categorias.idcategorias inner join series on categorias.idseries = series.idserie where idequipo ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    public function actualizar($nombreequipo, $Numjugadores, $nombredueno, $ceduladueno, $nombreentrenador, $cedulaentrenador, $idcategoria, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update equipo set nombreequipo='%s', Numjugadores='%s', nombredueno='%s',ceduladueno='%s', nombreentrenador='%s', cedulaentrenador='%s',idcategoria='%s' where idequipo='%s'",$nombreequipo, $Numjugadores, $nombredueno, $ceduladueno, $nombreentrenador, $cedulaentrenador, $idcategoria, $codigo);
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
      public function verifrentrenador($nombreentrenador)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT nombreentrenador FROM equipo WHERE nombreentrenador =".$nombreentrenador;
        $result= mysqli_query($conexion,$sentencia);    
        $row=mysqli_fetch_assoc($result);
        $nrow=mysqli_num_rows($result);
        return $nrow;  
    }
    
    public function reportetemporada()
    {
        $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select temporadas.nombre_temporada,series.nombreserie,categorias.nombre_cate, nombreequipo from equipo
        inner join categorias on equipo.idcategoria = categorias.idcategorias
        inner join series on categorias.idseries = series.idserie 
        INNER JOIN temporadas on series.idtemporadas = temporadas.idtemporada";
        $result= mysqli_query($conexion,$sentencia);
        return $result; 
       
    }
    
}

?>
