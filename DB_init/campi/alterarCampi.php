<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$id=$_POST['id'];
$nome=$_POST['nome'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];
mysqli_query($con,"UPDATE campi SET nome='$nome',cidade='$cidade',uf='$uf' WHERE id='$id'");
echo "<script>location.href='campi.php'</script>";
?>
