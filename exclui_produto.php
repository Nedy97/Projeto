<?php

    require_once 'conexao.php';

    $codigo  = $_GET['codigo'];
    $sql = "DELETE FROM produto WHERE codigo = " . $codigo;

    $resultado = $con->query($sql);
    if($resultado){
        // echo "Registro removido com Sucesso";
        header('Location: lista_produtos.php');
    }else{
        echo "Erro ao tentar remover o registro " . $codigo;
    }
 ?>
