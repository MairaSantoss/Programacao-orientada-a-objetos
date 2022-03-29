<?php

class Vestuario{
    private $Roupa;
    private $Tamanho;
    private $Quantidade;
    private $Codigo;

    function __construct( $roupa, $tamanho, $quantidade, $codigo)
    {
        $this->Roupa = $roupa;
        $this->Tamanho = $tamanho;
        $this->Quantidade = $quantidade;
        $this->Codigo = $codigo;
    }

    public function getRoupa(){
        return $this->Roupa;
    }

    public function getTamanho(){
        return $this->Tamanho;
    }

    public function getQuantidade(){
        return $this->Quantidade;
    }

    public function getCodigo(){
        return $this->Codigo;
    }

    public function Mostrar(){
        echo "<br>Codigo: ". $this->Codigo;
        echo "<br>Roupa: ".$this->Roupa;
        echo "<br>Tamanho: ".$this->Tamanho;
        echo "<br>Quantidade: " .$this->Quantidade;
    }

    public function Guardar(){
        $Vestuario = $this->Roupa;
        $Tamanho = $this->Tamanho;
        $Quantidade = $this->Quantidade;
        require_once("ClassBanco.php");
        $banco = new BancoVestuario();
        $banco->Inserir($Vestuario,$Quantidade,$Tamanho);

    }

    public function Exibir(){
       $cod = $this->Codigo;
       require_once("ClassBanco.php");
       $banco = new BancoVestuario();
       return [$roupa,$qtd,$tam,$cod] = $banco->Exibir($cod);
    }

    
    public function Editar(){
        $Cod = $this->Codigo;
        $Vestuario = $this->Roupa;
        $Tamanho = $this->Tamanho;
        $Quantidade = $this->Quantidade;
        require_once("ClassBanco.php");
        $banco = new BancoVestuario();
        $banco->Editar($Cod, $Vestuario, $Tamanho, $Quantidade);
     }

     public function Excluir(){
        $Cod = $this->Codigo;
        require_once("ClassBanco.php");
        $banco = new BancoVestuario();
        $banco->Excluir($Cod);

     }

}


?>