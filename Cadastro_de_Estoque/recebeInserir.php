<?php

    include("ClassRoupa.php");
    $obj = new Vestuario( $_GET['vestuario'],$_GET['tam'],$_GET['qtd'],NULL);
    $obj->Guardar();


?> 