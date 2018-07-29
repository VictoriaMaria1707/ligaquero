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

function parentescos(lugarnaci)
{
    alert(lugarnaci);
parentescos=document.getElementById("txt_lugarnaci");	
ajax= nuevoAjax();
ajax.open("GET","../acciones/parentesco.php?codigo="+lugarnaci,true);
ajax.onreadystatechange=function() {
	if(ajax.readyState==1)
  	{
		
	}
	else
	{
 	   if(ajax.readyState==4)
		{
		parentescos.innerHTML= ajax.responseText;
		}	
	}
}
ajax.send(null);
}