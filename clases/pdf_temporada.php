<?php
require_once('../fpdf181/fpdf.php');
 
class PDFtem extends FPDF
{
  function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Este PDF fue creador por Victoria Gonzalez & Gabriel Paredes','T',0,'C');
    }
 
    function Header(){
      
        $this->SetFont('Arial','B',20);
        $this->Line(10,10,206,10);
        $this->Line(10,35.5,206,35.5);
        $this->Cell(111,25,'Reporte de temporada ',0,0,'C');
        $this->Ln(25);
    }
    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 10);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(2,157,116);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        //$this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $ejeX = 10;
         $this->Ln(35);
        foreach($cabecera as $fila)
        { 
            
            $this->RoundedRect($ejeX, 44, 30, 7, 2, 'FD');
            $this->CellFitSpace(30,7, utf8_decode($fila),0, 0 , 'C');
            $ejeX = $ejeX + 30;
        }
    }

    function datosHorizontal($datos)
    {
        
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        $ejeY = 25; //Aquí se encuentra la primer CellFitSpace e irá incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        $this->SetXY(10,50);
        foreach($datos as $fila)
        {
            
            //$this->RoundedRect(10, $ejeY, 120, 7, 2, $letra);
            $this->CellFitSpace(30,7, utf8_decode($fila['nombre_temporada']),'LR', 0 , 'L' );
            $this->CellFitSpace(30,7, utf8_decode($fila['fecha']),'LR', 0 , 'L' );
            $this->CellFitSpace(30,7, utf8_decode($fila['nombre']),'LR', 0 , 'L' );
            $this->CellFitSpace(30,7, utf8_decode($fila['nombre_cancha']),'LR', 0 , 'L' );
           $this->CellFitSpace(30,7, utf8_decode($fila['hora']),'LR', 0 , 'L' );
            $this->Ln(05);
            ($letra == 'D') ? $letra = 'FD' : $letra = 'D';
            $ejeY = $ejeY + 7;        
        }
    }
    
 function cabeceraHorizontal1($cabecera1)
    {
        $this->SetXY(10, 10);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(2,157,116);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        //$this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $ejeX = 10;
         $this->Ln(50);
        foreach($cabecera1 as $fila1)
        { 
            
            $this->RoundedRect($ejeX, 60, 30, 7, 2, 'FD');
            $this->CellFitSpace(30,7, utf8_decode($fila1),0, 0 , 'C');
            $ejeX = $ejeX + 30;
        }
    }

    function datosHorizontal1($datos1)
    {
        
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        $ejeY = 25; //Aquí se encuentra la primer CellFitSpace e irá incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        $this->SetXY(10,67);
        foreach($datos1 as $fila1)
        {
            
            //$this->RoundedRect(10, $ejeY, 120, 7, 2, $letra);
            $this->CellFitSpace(30,7, utf8_decode($fila1['nombreequipo']),'LR', 0 , 'L' );
            $this->CellFitSpace(30,7, utf8_decode($fila1['nombre1']." ".$fila1['nombre2']),'LR', 'LR', 'L' );            
            $this->CellFitSpace(30,7, utf8_decode($fila1['apellido1']." ".$fila1['apellido2']),'LR', 'LR' , 'L' );
            $this->CellFitSpace(30,7, utf8_decode($fila1['edad']),'LR', 'LR' , 'L' );
            $this->CellFitSpace(30,7, utf8_decode($fila1['telefono']),'LR', 0 , 'L' );
             $this->Ln(05);
            ($letra == 'D') ? $letra = 'FD' : $letra = 'D';
            $ejeY = $ejeY + 7;
            
        }
    }
 
    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal($datosHorizontal);
    }
    function tablaHorizontal1($cabeceraHorizontal1, $datosHorizontal1)
    {
        $this->cabeceraHorizontal1($cabeceraHorizontal1);
        $this->datosHorizontal1($datosHorizontal1);
    }
   
    //**************************************************************************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//**********************************************************************************************
 
 function RoundedRect($x, $y, $w, $h, $r, $style = '', $angle = '1234')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' or $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2f %.2f m', ($x+$r)*$k, ($hp-$y)*$k ));
 
        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-$y)*$k ));
        if (strpos($angle, '2')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
 
        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$yc)*$k));
        if (strpos($angle, '3')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
 
        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-($y+$h))*$k));
        if (strpos($angle, '4')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
 
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$yc)*$k ));
        if (strpos($angle, '1')===false)
        {
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$y)*$k ));
            $this->_out(sprintf('%.2f %.2f l', ($x+$r)*$k, ($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }
 
    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
} // FIN Class PDF
?>