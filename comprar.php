<?php

   require_once('conexao.php');


   $produto = array();
   $produto['qtdprodcompra'] = $_POST['qtdprodcompra'];


   if(isset($_GET['codigo'])){
      $produto['codigo'] = $_GET['codigo'];
      $sql = "UPDATE produto SET qtdprod= qtdprod - :qtdprodcompra WHERE codigo = :codigo";
   }else {
     echo "Erro em baixar o estoque!";
   }

   $query = $con->prepare($sql);

   $resposta = $query->execute($produto);

   if($resposta==true){
     echo "Comprado com Sucesso";
     $sql = "INSERT INTO compras(produto, valototal) VALUES (:codigo, :qtdprodcompra)";
     header('Location: lista_produtos_cliente.php');
   } else{
     echo "Erro ao comprar " . print_r($query->errorInfo());
   }
?>
