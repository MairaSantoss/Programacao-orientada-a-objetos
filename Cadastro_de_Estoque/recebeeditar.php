<?php
require_once("ClassRoupa.php");
$r = new Vestuario( $_GET['vestuario'],$_GET['tam'],$_GET['qtd'],$_GET['cod']);
$r->Editar();
header("location:home.php");
?>

