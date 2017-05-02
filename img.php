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
include 'classes/Upload.php';//Incluindo a classe que ira fazer o upload da imagem original
$upload = new Upload();//Instanciando a class Upload
$img = $_FILES['img'];//Pegando o arquivo da imagem
$upload->image($img);//Chamand o método image

if(!$upload->getResult()){//Verficando se o atributo é false
    echo $upload->getMsg();//A Chamada do metodo getMsg, se deve pelo fato, de que para cada situação da estrutra IF/ELSE, uma mensagem diferente será exibida

}else{
    echo $upload->getMsg();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/jquery.Jcrop.css">
</head>
<body>
	<hr>
	<img src="<?php echo $upload->dir_img;?>" id="target">
	<form method="post" action="crop.php" enctype="multipart/form-data">
		<input type="hidden" name="dir_img" value="<?php echo $upload->dir_img;?>" >
		<input type="hidden" name="img_name" value="<?php echo $upload->getNovo();?>">
		<input type="hidden" name="x" id="x" class="coords">
		<input type="hidden" name="y" id="y" class="coords">
		<input type="hidden" name="w" id="w" class="coords">
		<input type="hidden" name="h" id="h" class="coords">
		<br><br>
		<input type="submit" value="Salvar">
	</form>
	

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.Jcrop.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#target').Jcrop({//Chamando Jcrop para fazer a seleção do corte
				aspectRatio: 1,
				minSize: [160,160],//Tamanho mínimo de 160x160
				setSelect: [0,0,160,160],//Caixa de seleção da imagem
				onChange: showCoords,//Chamada da função ShowCoords
				onSelect: showCoords,
			});

			function showCoords(c){//Função responsvel de atribuir aos inputs 'x,y,w,h', que no caso são hiddens, onde contem as coordenadas que serão usadas no corte da imagem
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			}
		});
	</script>
</body>
</html>