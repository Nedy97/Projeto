<?php

   require_once('conexao.php');

   $produto = array();
   $produto['descnot'] = $_POST['descnot'];
   $produto['descprod']   = $_POST['descprod'];
   $produto['unidmed']   = $_POST['unidmed'];
   $produto['situprod']   = $_POST['situprod'];
   $produto['valoprod']   = $_POST['valoprod'];
   $produto['qtdprod']   = $_POST['qtdprod'];

   if(isset($_GET['codigo'])){
      $produto['codigo'] = $_GET['codigo'];
      $sql = "UPDATE produto SET descnot=:descnot, descprod=:descprod, unidmed=:unidmed, situprod=:situprod, valoprod=:valoprod, qtdprod=:qtdprod WHERE codigo = :codigo";
   }else{
      $sql = "INSERT INTO produto(descnot, descprod, unidmed, situprod, valoprod, qtdprod) values(:descnot, :descprod, :unidmed, :situprod, :valoprod, :qtdprod);";
     }

   $query = $con->prepare($sql);

   $resposta = $query->execute($produto);

   if($resposta==true){
     echo "Cadastrado com Sucesso";
     header('Location: lista_produtos.php');
   } else{
     echo "Erro ao cadastrar" . print_r($query->errorInfo());
   }
?>
