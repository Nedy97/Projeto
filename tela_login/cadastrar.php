<?php
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
<div id="corpo-formulario-cad">
    <h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="email" name="email" placeholder="Email" maxlength="40">
        <div class="form-group">
          <label for="setor" placeholder="Setor" maxlength="40"></label>
          <select class="setor" id="setor" name="setor">
            <option selected>Setor</option>
            <option value="Fiscal">Fiscal</option>
            <option value="Cliente">Cliente</option>
          </select
          value="<?php if(isset($registro)) echo $registro['setor']; ?>">
        </div>
        </br>
        <input type="usuario" name="usuario" placeholder="Usuario" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="Cadastrar">
        <a class="btn btn-info btn-sm" href="../lista_produtos.php">Voltar</a>
    </form>
</div>
<?php
    //verificar se clicou no botão
    if(isset($_POST['nome'])){
      $nome = addslashes($_POST['nome']);
      $setor = addslashes($_POST['setor']);
      $usuario = addslashes($_POST['usuario']);
      $email = addslashes($_POST['email']);
      $senha = addslashes($_POST['senha']);
      $confSenha = addslashes($_POST['confSenha']);

      //verificar se está preenchido
    if(!empty($nome) && !empty($setor) && !empty($email) && !empty($usuario) && !empty($senha) && !empty($confSenha)){
        $u->conectar("regproduct","localhost","root","");
        if($msgErro == ""){ // se está tudo certo
            if($senha == $confSenha) {
              if($u->cadastrar($nome, $setor, $usuario, $email, $senha)){
                ?>
                  <div id="msg-sucesso">
                  <a href="index.php">Cadastrado com sucesso!<strong> Acesse para entrar!</strong>
                  </div>
                <?php
              }else{
                  ?>
                    <div id="msg-erro">
                    Email já cadastrado!
                    </div>
                  <?php
              }
            }else{
              ?>
                <div id="msg-erro">
                Senha e confirmar senha não correspondem!
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
