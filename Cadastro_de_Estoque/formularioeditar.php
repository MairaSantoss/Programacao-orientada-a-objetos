

<?php
$cod = $_GET['cod'];
include("ClassRoupa.php");
$roupa = new Vestuario("","","",$cod);
[$roupa,$qtd,$tam,$cod] = $roupa->Exibir();
?>

<html>

<style>
    body {
        text-align: center
    }
    .v{
        height: 40px;
        width: 300px;
    }

</style>

<body>
<br>
<br>
<br>
<br>
    <h1> Alteração </H1>
    <br>
    <form action="recebeeditar.php" method="GET">
    <label> Vestuario </label>
    <input value="<?php echo $roupa; ?>" name="vestuario" class="v" type="text" >
   <br><br>
    <label>Tamanho</label>
    <select name="tam">
      <option value="P">P</option>
      <option value="M">M</option>
      <option value="G">G</option>
    </select>
    
    <label> Quantidade </label>
    <input value="<?php echo $qtd; ?>"name="qtd" type="numb" >
    <input type="hidden" name="cod" value="<?php echo $cod; ?>">
    <br>
    <br>
    <input class="v" style="background-color:yellow" type="submit" value="Alterar">
</form>
</html>