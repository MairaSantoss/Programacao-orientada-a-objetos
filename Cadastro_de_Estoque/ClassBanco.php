<?php
class BancoVestuario{
    private $db;

   function getDb() {
      return $this->db;
    }
  
   function setDb(PDO $db) {
      $this->db = $db;
    }
    
    function __construct() {
     try {
        $banco = "RoupaFashion";
        $this->setDb(new PDO("mysql:host=localhost;dbname=$banco", "root",""));
        // set the PDO error mode to exception
        $this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Conexão com o banco de dados falhou: " . $e->getMessage();
      }
      }


    public function Inserir($vestuario,$qtd,$tamanho){
        try {
            // set the PDO error mode to exception
           // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO estoque (codigo, roupa, quantidade, tamanho)
        VALUES (NULL, '$vestuario', $qtd ,'$tamanho')";
            // use exec() because no results are returned
            $this->db->exec($sql);
            echo "";
        } catch (PDOException $e) {
            echo $sql . "<br> ERRO " . $e->getMessage();
        }  
        header("location:home.php");  
    }

    public function Exibir($cod)
    {      
      // echo $cod;  
      try {
        $sql = $this->db->prepare("SELECT codigo, roupa, tamanho, quantidade FROM estoque where codigo = $cod");
          $sql->execute();
          foreach($sql->fetchAll() as $k=>$v)  { 
            $roupa = $v["roupa"];
            $qtd = $v["quantidade"];
            $tam = $v["tamanho"];
            $cod = $v["codigo"];

                }
        } 
        catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $db = null;
        return [$roupa,$qtd,$tam,$cod];
    }





    public function Editar($cod, $vestuario, $tamanho, $quantidade){
      try {
          $sql = "UPDATE estoque SET roupa='$vestuario', quantidade='$quantidade', tamanho='$tamanho' WHERE codigo=$cod";
          $stmt = $this->db->prepare($sql);
          $stmt->execute();
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        
        $db = null;
    }

    public function Excluir($cod)
    {
      try {
        $sql = "DELETE FROM estoque WHERE codigo=$cod";
        $this->db->exec($sql);
        echo "Record deleted successfully";
        } 
        
        catch(PDOException $e)
         {
        echo $sql . "<br>" . $e->getMessage();
        }
        
        $db = null;
    }



    public function TabelaDados(){
          try {
            $sql = $this->db->prepare("SELECT codigo, roupa, tamanho, quantidade FROM estoque");
            $sql->execute();
            foreach($sql->fetchAll() as $k=>$v)  { 
            $roupa = $v["roupa"];
            $qtd = $v["quantidade"];
            $tam = $v["tamanho"];
            $cod = $v["codigo"];
              
                echo "
                <tr>
                  <th>$cod</th>
                  <td> $roupa </td>
                  <td>$tam</td>
                  <td>$qtd</td>

                  <td>
                  <a href='formularioeditar.php?cod=".$cod."'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                    </svg> 
                  </a>
                  </td>
  
                  <td><a href='recebeexcluir.php?cod=".$cod."'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                  </svg>
                  </a>
                 </td>



  
 
                </tr>";

                  }   
                 }          
          catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          $db = null;
        }

  }

?> 