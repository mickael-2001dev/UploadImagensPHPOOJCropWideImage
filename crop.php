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
include 'classes/WideImage/WideImage.php';//Incluindo a classe WideImage

$img = WideImage::load($_POST['dir_img']);//Carregando a imagem riginal
$img = $img->crop($_POST['x'],$_POST['y'], $_POST['w'], $_POST['h']);//Cortando a imagem orginal

$new_dir = 'img/thumbnail'.$_POST['img_name'];//Criando um novo diretório para a imagem cortada
$img->saveToFile($new_dir);//Salvando a imagem no novo diretório

echo '<img src="'.$new_dir.'">';//Exibindo a nova imagem cortada