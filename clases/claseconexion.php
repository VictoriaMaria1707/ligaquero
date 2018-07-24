<?php
class conexion
{  

protected $conex;
protected $db;  
protected $servidor;
protected $base;
protected $usuario;
protected $clave;
    
    public function __construct(){
        $this ->conex="";
        $this -> db="";
        $this -> servidor= "localhost";
        $this -> base= "ligaquero";
        $this -> usuario= "root";
        $this -> clave= "";
    }

    
public function conectar()
{
    $this -> conex=mysqli_connect($this -> servidor,$this -> usuario,$this -> clave) or die ("Error 1".mysqli_error());
    $this ->db = mysqli_select_db($this -> conex,$this -> base) or die ("Error 2".mysqli_error());
    return $this->conex;
}    
   

}
?>