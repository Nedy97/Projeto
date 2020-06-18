<?php

   /* Connect to a MySQL database using driver invocation */
   $dsn   = "mysql:host=localhost;dbname=regproduct";
   $user  = "root";
   $pass  = "";

   //tentando conectar
    try {
        $con = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
