<?php
   session_start();

    require_once 'Classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-formulario">
    <h1>Entrar</h1>
    <form action="index.php" method="post">
        <input type="usuario" name="usuario" placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="ACESSAR">
    </form>
</div>
<?php
if(isset($_POST['usuario'])){
  $usuario = addslashes($_POST['usuario']);
  $senha = addslashes($_POST['senha']);

  //verificar se está preenchido
  if(!empty($usuario) && !empty($senha)){
    $u->conectar("regproduct","localhost","root","");
    if($u->msgErro == ""){
      if($u->logar($usuario, $senha)){
        if($u->setor_Fiscal($usuario, $senha)){
          $_SESSION['fiscal'] = $usuario;
          header("location: ../lista_produtos.php");
        }else{
          $_SESSION['cliente'] = $usuario;
          header("location: ../lista_produtos_cliente.php");
        }
      }else{
        ?>
          <div id="msg-erro">
            Usuário e/ou senha estão incorretos!
          </div>
        <?php
      }
    }else{
      ?>
        <div id="msg-erro">
          <?php echo "Erro: ".$u->msgErro;?>
        </div>
      <?php
    }

  }else{
    ?>
      <div id="msg-erro">
        Preenche todos os campos!
      </div>
    <?php
  }
}

?>
</body>
</html>
