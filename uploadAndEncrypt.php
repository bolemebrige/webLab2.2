<?php
$files = @$_FILES["files"];


if($files["name"] != '') {

  $newPath = $_SERVER['DOCUMENT_ROOT'] ."/webLv2/images/";
  $fullPath = $_REQUEST["path"].$files["name"];
  
 

      $imageString = file_get_contents($files['tmp_name']); // predaje se raw slika koja se nalazi privremeno u $files['tmp_name']
	  
	  $cipher = "AES-256-CBC"; //vrsta algoritm za kriptiranje
	  $key="veryweakkey"; // ključ za kriptiranje
      $iv='initVector123456';// inicijalizacijski vektor potreban algoritmu min dužine 16 znakova
  
     $encryptedImage = openssl_encrypt($imageString, $cipher, $key, 0, $iv); //funckija za enkripciju
	  


   


	 
	 

      $myfile = fopen("./images/"."$fullPath.aes256", "w") or die("Unable to open file!"); // stvaranje novog filea s ekstenzijom .aes256 u koju se zapisuje kriptirani i base64 kodirani string
      fwrite($myfile, $encryptedImage);// pisanje u otvoreni file
      fclose($myfile);

      echo("<br><br>Upload succesfull!<br><br>");
      //echo "<h1><a href='$fullPath'>OK-Click here!</a></h1>";
    
}
echo '<html>
<head>
<title>Upload files...</title>
</head>
<body>
<form method=POST enctype="multipart/form-data" action="">
<input type=text name=path accept = "images/jpeg, images/png, application/pdf">
<input type="file" name="files" accept="image/jpeg, image/png, application/pdf">
<input type=submit value="Up">
</form>
</body></html>';
?>
