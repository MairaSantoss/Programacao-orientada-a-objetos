<?php

$cod = $_GET["cod"];
require_once("ClassRoupa.php");
$roupa = new Vestuario("","","",$cod);
$roupa->Excluir();
header("location:home.php");

?>

