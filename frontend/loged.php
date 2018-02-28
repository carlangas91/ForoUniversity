<html>
	<head>
		<title>Name of Page</title>
		<meta charset="UTF-8">
		<meta name="description" content="my web">
		<meta name="keywords" content="html, css, binarybyte">
		<meta name="author" content="Carlos Olano">
		<meta http-equiv="refresh" content="300000">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<nav class="menu" >
			<a href="#" id="home">Inicio</a>
			<a href="#" id="contact">Contacta</a>
			<a href="#" id="work">Informacion</a>
		</nav>

		<div id="container1">
<span class="tittle">Todos los  mensajes</span>

			<div id="container111">	
				<div class="caption" id="container11">

				</div>
			</div>
		</div>
		<div id="container2">
			<span class="tittle">Mensajes Recibidos</span>
			<div>
<?php
$m = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
$command = new MongoDB\Driver\Query([]);
$rows = $m -> executeQuery("db_aw.questions",$command);
$i=1;
foreach ($rows as $item){
	echo "<option value=$i>$item->name</option>";
	$i++;
}
?>
			</div>			
		<video autoplay loop><source src="/proyect/media/container2.mp4" type="video/mp4"></video>
		</div>
		<div id="container3">
			<span class="tittle">Nuevo Hilo</span>
			<form action="newquestion.php" method="post" class="captson">
				

				<div>
					<select name="uni">
<?php 
$m = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
$command = new MongoDB\Driver\Query([]);
$rows = $m -> executeQuery("db_aw.uni",$command);
$i=1;
foreach ($rows as $item){
	echo "<option value=$i>$item->name</option>";
	$i++;
}
?>
					</select>
				</div>
<div>
					<select name="grades">
<?php 
$m = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
$command = new MongoDB\Driver\Query([]);
$rows = $m -> executeQuery("db_aw.grades",$command);
$i=1;
foreach ($rows as $item){
	echo "<option value=$i>$item->name</option>";
	$i++;
}
?>
					</select>
				</div>
				<div>
					<textarea name="question" width=100px></textarea>
				</div>
				<div>
					<input type="submit" value="Enviar"/>
				</div>
			</form>
		</div>		
		<footer>
			<nav class="menu">
				<a href="#">Contacta</a>
				<a href="#">Asociados</a>
				<a href="#">Inicio</a>	
			</nav>
		<p>Pagina realizada por Carlos Olano BinaryByte.com</p>
		</footer>
	</body>
</html>

