<html>
<head>


<style>
 

 body {
        text-align: center
    }
    .v{
        height: 40px;
        width: 300px;
    }

    .v1{
        height: 35px;
        width: 100px;
    }
 
    tr:nth-child(even)
        {background-color: #EE82EE;
        margin-left: -80px;
         }


         .table-responsive{
        width: 100% !important;
                }

        .table {
            width: 50% !important; 
            margin: auto;
        }

        .table-status {
            margin-top: 20px;
            margin-bottom: 20px !important;
        }
            
    


</style>
</head>

<body>
<br>
<br>
<br>
<br>
    <h1> CADASTRO DO ESTOQUE </H1>
    <br>
    <form action="recebeInserir.php" method="GET">
    <label> Vestuario </label>
    <input name="vestuario" class="v" type="text" >
   <br><br>
    <label>Tamanho</label>
    <select name="tam">
      <option value="P">P</option>
      <option value="M">M</option>
      <option value="G">G</option>
    </select>
    
    <label> Quantidade </label>
    <input name="qtd" class="v1" type="numb" >
    <br>
    <br>
    <input class="v" style="background-color:blue;color:white;" type="submit" value="Enviar">
</form>

<div class="container">
  <div class="table-responsive">
      <table class="table">
          <tr>
          <th>Codigo</th>
          <th>Roupa</th>
          <th>Tam.</th>
          <th>Quant.</th>
              </tr>
          <?php 
            require_once("ClassBanco.php");
            $b = new BancoVestuario();
          $b->TabelaDados();
          ?>
      </table>
  </div>
</div>

<!-- Jquery incluido -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>