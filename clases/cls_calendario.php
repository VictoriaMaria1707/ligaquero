<?php
require_once "claseconexion.php";
class calendario
{
    
    protected $idcalendario;
    protected $idequipo1;
    protected $idequipo2;
    protected $idfechas;
    protected $idtemporadas;
    protected $idcanchas;
    protected $idetapas;
    protected $fechas;
    protected $marca1;
    protected $marca2;
    
    public function __construct(){
        $this->idcalendario="";
        $this->idequipo1="";
        $this->idequipo2="";
        $this->idfechas="";
        $this->idtemporadas="";
        $this->idcanchas="";
        $this->idetapas="";
        $this->fechas="";
        $this->marca1="";
        $this->marca2="";
    }
    
    public function insert($idequipo1, $idequipo2, $idtemporadas, $idcanchas, $idetapas, $fechas,$hora)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        
        $sentencia="select * from fechas where fecha='".$fechas."'";
        $result3= mysqli_query($conexion,$sentencia);
        $row2=mysqli_fetch_assoc($result3);
        
        if ($row2['idfecha'] == 0){
        $sentencia=sprintf("Insert into fechas (fecha,hora) values('%s','%s')",$fechas,$hora);
        $result1= mysqli_query($conexion,$sentencia);
        
        $sentencia="select idfecha from fechas where fecha = '".$fechas."'";
        $result2= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result2);
        
        $sentencia=sprintf("Insert into calendarios (idequipo1, idequipo2, idfechas, idtemporadas, idcanchas, idetapas,Marcadorequi1,Marcadorequi2) values('%s','%s','%s','%s','%s','%s','0','0')",$idequipo1, $idequipo2, $row['idfecha'], $idtemporadas, $idcanchas, $idetapas);
        $result= mysqli_query($conexion,$sentencia);
            
        }else{
            
        $sentencia=sprintf("Insert into calendarios (idequipo1, idequipo2, idfechas, idtemporadas, idcanchas, idetapas,Marcadorequi1,Marcadorequi2) values('%s','%s','%s','%s','%s','%s','0','0')",$idequipo1, $idequipo2, $row2['idfecha'], $idtemporadas, $idcanchas, $idetapas);
        $result= mysqli_query($conexion,$sentencia);  
            
        }
        
        
        return $result;   
    }
     public function actualizarmarca($marca1,$marca2,$idcalendario)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update calendarios set Marcadorequi1 ='%s', Marcadorequi2 ='%s' where idcalendario='%s'",$marca1,$marca2,$idcalendario);
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
     public function combotemporada()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from temporadas";
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     public function combocanchas()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from canchas";
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }    
     public function comboetapas()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from etapas";
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }  
    
    public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from calendarios inner join fechas on fechas.idfecha = calendarios.idfechas INNER join etapas on etapas.idetapa = calendarios.idetapas INNER JOIN equipo on equipo.idequipo = calendarios.idequipo1 INNER JOIN temporadas on temporadas.idtemporada = calendarios.idtemporadas INNER JOIN canchas on canchas.idcachas = calendarios.idcanchas";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
          public function reporte($idcalendario)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from calendarios inner join fechas on fechas.idfecha = calendarios.idfechas INNER join etapas on etapas.idetapa = calendarios.idetapas INNER JOIN equipo on equipo.idequipo = calendarios.idequipo1 INNER JOIN temporadas on temporadas.idtemporada = calendarios.idtemporadas INNER JOIN canchas on canchas.idcachas = calendarios.idcanchas INNER JOIN categorias on categorias.idcategoria = equipo.idcategoria INNER JOIN series on series.idserie = categorias.idserie INNER join calearbi on calearbi.idcalendarioss = calendarios.idcalendario INNER JOIN arbitros on arbitros.idarbitro = calearbi.idarbitros WHERE idcalendario ='".$idcalendario."'";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
    
    
          public function consultarequipo1()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select equipo.nombreequipo from equipo where idequipo =( SELECT idequipo1 from calendarios)";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultarequipo2()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select equipo.nombreequipo from equipo where idequipo =( SELECT idequipo2 from calendarios)";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
          public function reporequipo1($idcalendario)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select equipo.nombreequipo from equipo where idequipo =( SELECT idequipo1 from calendarios WHERE idcalendario ='".$idcalendario."')";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function reporequipo2($idcalendario)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select equipo.nombreequipo from equipo where idequipo =( SELECT idequipo2 from calendarios WHERE idcalendario ='".$idcalendario."')";          
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
     public function consultar_marca($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from calendarios  where idcalendario ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
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
     
    public function actualizar($cedula, $nombre1, $nombre2, $apellido1, $apellido2, $direccion, $lugarnacimi, $parentesto, $lugarnaciparen, $telefono, $celular, $correo, $idgenero, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update jugadores set cedula='%s', nombre1='%s', nombre2='%s', apellido1='%s', apellido2='%s', direccion='%s', lugarnacimi='%s', parentesto='%s', lugarnaciparen='%s', telefono='%s', celular='%s', correo='%s', idgenero='%s' where idjugador='%s'",$cedula, $nombre1, $nombre2, $apellido1, $apellido2, $direccion, $lugarnacimi, $parentesto, $lugarnaciparen, $telefono, $celular, $correo, $idgenero, $codigo);
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
