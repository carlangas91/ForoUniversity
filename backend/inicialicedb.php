<?php
$m= new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');

//UNIVERSIDAD

//Grades
$bulk_com = new MongoDB\Driver\BulkWrite;
$bulk_uni = new MongoDB\Driver\BulkWrite;
$bulk_grad = new MongoDB\Driver\BulkWrite;
$bulk_asig = new MongoDB\Driver\BulkWrite;

$fo = fopen('./universidades_publicas', 'r');
$type = -1;
while (!feof($fo)){
	$line = fgets($fo);
	switch ($line){
	case 0,1,2,3,4:
		$type = $line;
	break;
	default:
	
	$doc = ['_id' => new MongoDB\BSON\ObjectID,'name' =>strtok($line,"\n")];
	
	switch ($type){
	case : 1
		$bulk_com -> insert($doc);
	break;
	case : 2
		$bulk_uni -> insert($doc);
	break;
	case : 3
		$bulk_grad -> insert($doc);
	break;
	case : 4
		$bulk_asig -> insert($doc);
	break;
	}
	break;
	}
}

fclose($fo);

$m-> executeBulkWrite('db_aw.com',$bulk_com);
$m-> executeBulkWrite('db_aw.uni',$bulk_uni);
$m-> executeBulkWrite('db_aw.grad',$bulk_grad);

//Users
$bulk = new MongoDB\Driver\BulkWrite;
$fo = fopen('./usuarios', 'r');
while (!feof($fo)){
	$doc = ['_id' => new MongoDB\BSON\ObjectID,'name' =>strtok(fgets($fo),"\n"), 'pass'=>strtok(fgets($fo),"\n")];
	$bulk -> insert($doc);
}
$m-> executeBulkWrite('db_aw.usr',$bulk);
fclose($fo);

//Qustions
//$bulk = new MongoDB\Driver\BulkWrite;
//$fo = fopen('./pregunstas', 'r');
//while (!feof($fo)){
//	$doc = ['_id' => new MongoDB\BSON\ObjectID,'name' =>strtok(fgets($fo),"\n"), 'pass'=>strtok(fgets($fo),"\n")];
//	$bulk -> insert($doc);
//}
//$m-> executeBulkWrite('db_aw.questions',$bulk);
//fclose($fo);

