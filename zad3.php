<?php
//include($_SERVER['DOCUMENT_ROOT'] . "/lv2.1/LV2.xml");
$inputFile = simplexml_load_file('LV2.xml');
foreach($inputFile->record as $xmlPart) {
    echo('<img src = "'.$xmlPart->slika.'"><br>');
   
    echo("Ime: " . "$xmlPart->ime <br>");
	
    echo("Prezime: " . "$xmlPart->prezime <br>");
	
    echo("e-mail: " . "$xmlPart->email <br>");
	
    echo("Spol: " . "$xmlPart->spol <br>");
	
    echo("Životopis: " . "$xmlPart->zivotopis <br><br>");
}
 ?>