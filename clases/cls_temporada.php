<?php
require_once "claseconexion.php";
class temporada
{
    protected $codigo;
    protected $idtemporada;
    protected $fechaini;
    protected $fechafin;
    protected $idtemporadas;
    
    public function __construct(){
        $this->codigo="";
        $this->idtemporada="";
        $this->fechaini="";
        $this->fechafin="";
        $this->idtemporadas="";
    }
    
    public function insert($idtemporada,$fechaini,$fechafin)
    {
        $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into temporadas (nombre_temporada,inicio_tem,fin_tem) values('%s','%s','%s')",$idtemporada,$fechaini,$fechafin);      
        $result= mysqli_query($conexion,$sentencia);
        
        $sentencia=sprintf("select idtemporada from temporadas where nombre_temporada =",$idtemporada);      
        $result1= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result1);
        
        $sentencia=sprintf("Insert into series (nombreserie,idtemporadas) values('Serie A',%s')",$row['idtemporada']);      
        $result1= mysqli_query($conexion,$sentencia);
        
         $sentencia=sprintf("Insert into series (nombreserie,idtemporadas) values('Serie B',%s')",$row['idtemporada']);      
        $result2= mysqli_query($conexion,$sentencia);
        return $result2;   
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
        
     
    public function actualizar($idtemporada, $fechaini, $fechafin ,$codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update temporadas set nombre_temporada='%s', inicio_tem ='%s', fin_tem='%s' where idtemporada='%s'" ,$idtemporada, $fechaini, $fechafin, $codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
    public function reporte($idtemporada)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from calendarios inner join fechas on fechas.idfecha = calendarios.idfechas INNER join etapas on etapas.idetapa = calendarios.idetapas INNER JOIN equipo on equipo.idequipo = calendarios.idequipo1 INNER JOIN temporadas on temporadas.idtemporada = calendarios.idtemporadas INNER JOIN canchas on canchas.idcachas = calendarios.idcanchas INNER JOIN categorias on categorias.idcategorias = equipo.idcategoria INNER JOIN series on series.idserie = categorias.idseries INNER join calearbi on calearbi.idcalendarioss = calendarios.idcalendario INNER JOIN arbitros on arbitros.idarbitro = calearbi.idarbitros WHERE temporadas.idtemporada ='".$idtemporada."'";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
    
    public function consultartransacciones($idtemporada)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * FROM transferencias inner join equipo on transferencias.idequipos = equipo.idequipo inner join jugadores on jugadores.idjugador = transferencias.idjugadores INNER JOIN categorias on equipo.idcategoria = categorias.idcategorias INNER join series on series.idserie = categorias.idseries Where series.idtemporadas = ".$idtemporada;
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
}

?>