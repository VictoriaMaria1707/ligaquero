function nuevoAjax()
{
var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
  	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
//combo anidados
function cargar_categoria(codigo_serie)
{
combo_categoria=document.getElementById("txt_categoria");	
ajax= nuevoAjax();
ajax.open("GET","../acciones/cargar_categoria.php?codigo="+codigo_serie,true);
ajax.onreadystatechange=function() {
	if(ajax.readyState==1)
  	{
		
	}
	else
	{
 	   if(ajax.readyState==4)
		{
		combo_categoria.innerHTML= ajax.responseText;
		}	
	}
}
ajax.send(null);
}
//cargar etapa-equipos
function cargar_etapa_equipo(codigo_etapa)
{
combo_etapa=document.getElementById("txt_etapa");	
ajax= nuevoAjax();
ajax.open("GET","../acciones/cargar_etapa_equipo.php?codigo="+codigo_etapa,true);
ajax.onreadystatechange=function() {
	if(ajax.readyState==1)
  	{
		
	}
	else
	{
 	   if(ajax.readyState==4)
		{
		combo_etapa.innerHTML= ajax.responseText;
		}	
	}
}
ajax.send(null);
}
//no se pueda pegar letras en input numericos
function validaNumericos(valor){
 for(i=0;i<valor.length;i++){
     var code=valor.charCodeAt(i);
         if(code<=48 || code>=57){          
           inputtxt.value=""; 
           return;
         }    
   }}
 
    
function lugarnaci(lug){

    if(lug == "Quero" || lug == "--Seleccione--")
    {
   document.getElementById("txt_parentesto").style.visibility="hidden";    document.getElementById("txt_parentest").style.visibility="hidden"; 
document.getElementById("txt_lugarnacipari").style.visibility="hidden";    document.getElementById("txt_lugarnacipar").style.visibility="hidden";document.getElementById("btn_insertarjuga").style.visibility="visible";
   
    }
    else
    {
 document.getElementById("txt_parentesto").style.visibility="visible";    document.getElementById("txt_parentest").style.visibility="visible";

document.getElementById("btn_insertarjuga").style.visibility="hidden";
    }
    
}

function parent(paren){

    if(paren == "--Seleccione--" )
    {
   document.getElementById("txt_lugarnacipari").style.visibility="hidden";    document.getElementById("txt_lugarnacipar").style.visibility="hidden";
    document.getElementById("btn_insertarjuga").style.visibility="hidden";
    }
    else
    {   document.getElementById("txt_lugarnacipari").style.visibility="visible";    document.getElementById("txt_lugarnacipar").style.visibility="visible";
    }
    
}

function lugarnacipar(lugpar){

    if(lugpar == "Quero" )
    {
    document.getElementById("btn_insertarjuga").style.visibility="visible";
    }
    else
    {
    document.getElementById("btn_insertarjuga").style.visibility="hidden";
    }
    
}


