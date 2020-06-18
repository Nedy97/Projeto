<?php
    require_once 'conexao.php';

    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM produto WHERE codigo = " . $codigo;

    $query = $con->query($sql);

    $registro = $query->fetch();

    // print_r($registro);
    require('form_produto.php');
 ?>
