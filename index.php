<?php 
/*
    ---01/05/2017

    Criado Por Mickael Braz de Souza
    Sistema de Uploads de imagem com corte e
    redimensionamento com utilizando o plugin 
    para jquery, Jcrop e a classe para
    PHP, WideImage.

    ----01/05/2017---
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/jquery.Jcrop.css">
</head>
<body>
    <form action="img.php" method="post" enctype="multipart/form-data">
        <label>Image: </label>
        <input type="file" name="img">
        <input type="submit" value="Upload">
    </form>
</body>
</html>