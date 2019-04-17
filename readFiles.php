<?php

	 $cipher = "AES-256-CBC"; 
	 $key="veryweakkey";
	 $iv='initVector123456';
 $Path = $_SERVER['DOCUMENT_ROOT'] ."/webLv2/images/";//lokacija enkriptiranih slika

 
 $decodedPath = $_SERVER['DOCUMENT_ROOT'] ."/webLv2/decodedImages/";// lokacija u koju se spremaju dekodirane slike

 
foreach (glob($Path."*.aes256") as $filepath) { // odabiru se slike s ekstenzijom .aes256 iz zadane mape
	
	$codedImageString=file_get_contents($filepath); //učitavanje kriptiranog stringa 
	
    $bs64decoded=base64_decode($codedImageString); // string je kodiran se base64 algritmom stoga ga je potrebno dekodirati prije šredaje funkciji za AES dekriptiranje
    $aesDecodedImage = openssl_decrypt($bs64decoded, $cipher, $key,OPENSSL_RAW_DATA, $iv);
	


	$position=strripos($filepath,'/'); //vraća zadnju poziciju traženog stringa unutar zadanog stringa
	
	    $fileName = substr($filepath, $position);
		$fileName = substr($fileName, 0,-7);
	
	
	
	$handle = fopen($decodedPath.$fileName, "w");// uzima referencu za fwrite
	//echo $handle;

	fwrite( $handle, $aesDecodedImage);
	fclose($handle);
}
?>