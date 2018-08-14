<?php
require_once "claseconexion.php";
class temporada
{
    protected $codigo;
    protected $idtemporada;
    protected $idtemporadas;
    
    public function __construct(){
        $this->codigo="";
        $this->idtemporada="";
        $this->idtemporadas="";
    }
    
    public function insert($idtemporada,$idtemporadas)
    {
       $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into series (nombreserie,idtemporada) values('Serie A',%s'), ('Serie B',%s')",$idtemporada,$idtemporadas);      
        $result1= mysqli_query($conexion,$sentencia);
       $sentencia=sprintf("Insert into temporadas (nombre_temporada) values('%s')",$idtemporada);      
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
              
      public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from temporadas ";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from temporadas where idtemporada = '%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
        
     
    public function actualizar($idtemporada, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update temporadas set nombre_temporada='%s' where idtemporada='%s'",$idtemporada, $codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
    public function reporte($idtemporada)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from calendarios inner join fechas on fechas.idfecha = calendarios.idfechas INNER join etapas on etapas.idetapa = calendarios.idetapas INNER JOIN equipo on equipo.idequipo = calendarios.idequipo1 INNER JOIN temporadas on temporadas.idtemporada = calendarios.idtemporadas INNER JOIN canchas on canchas.idcachas = calendarios.idcanchas INNER JOIN categorias on categorias.idcategoria = equipo.idcategoria INNER JOIN series on series.idserie = categorias.idserie INNER join calearbi on calearbi.idcalendarioss = calendarios.idcalendario INNER JOIN arbitros on arbitros.idarbitro = calearbi.idarbitros WHERE temporadas.idtemporada ='".$idtemporada."'";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
    
    public function consultartransacciones()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * FROM transferencias inner join equipo on transferencias.idequipos = equipo.idequipo inner join jugadores on jugadores.idjugador = transferencias.idjugadores Where idequipo ORDER BY `equipo`.`nombreequipo` ASC ";
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
}

?>