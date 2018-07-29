<?php
//preguntar al inge como hacer
if ($_GET['codigo']== 'Quero' || $_GET['codigo']== 'quero' ){
    
}else{
    echo "<tr>
        <th><label for='txt_parentesto'>Parentesto</label> </th>
        <th><input type='text' id='txt_parentesto' name='txt_parentesto' required /></th>
    </tr>

    <tr>
        <th><label for='txt_lugarnacipari'>lugar de nacimiento del pariente</label> </th>
        <th><input type='text' id='txt_lugarnacipari' name='txt_lugarnacipari' required /></th>
    </tr> ";
} ?>