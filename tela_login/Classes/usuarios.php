<?php
  Class Usuario {
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        global $msgErro;
        try{
           $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch(PDOException $e){
           $msgErro= $e->getMessage();
        }
    }
    public function cadastrar($nome, $setor, $usuario, $email, $senha){
        global $pdo;
        //verificar se já existe o Cadastro
        $sql = $pdo->prepare("SELECT ID FROM usuarios WHERE usuario = :u");
        $sql->bindValue(":u", $usuario);
        $sql->execute();
        if($sql->rowCount() > 0){
          return false;
        }else{
          $sql = $pdo->prepare("INSERT INTO usuarios (nome, setor, usuario, email, senha) VALUES (:n, :t, :u, :e, :s)");
          $sql->bindValue(":n", $nome);
          $sql->bindValue(":t", $setor);
          $sql->bindValue(":u", $usuario);
          $sql->bindValue(":e", $email);
          $sql->bindValue(":s", md5($senha));
          $sql->execute();
          return true;
        }
    }
    public function logar($usuario, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT ID FROM usuarios where usuario = :u and senha = :s");
        $sql->bindValue(":u", $usuario);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true; //logado com sucesso
        }else{
          return false; //não foi possível logar
        }
    }

    public function setor_Fiscal($usuario, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios where usuario = :u and senha = :s and setor = 'Fiscal'");
        $sql->bindValue(":u", $usuario);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            return true; //logado com sucesso
            session_start();
            $_SESSION['fiscal'];
        }else{
          return false; //não foi possível logar
          session_start();
          $_SESSION['cliente'] ;
        }
      }

      public function usuario_logado($usuario){
          global $pdo;
          $sql = $pdo->prepare("SELECT nome FROM usuarios where usuario = :u ");
          $sql->bindValue(":u", $usuario);
          $sql->execute();
          if($sql->rowCount() > 0){
              return true; //logado com sucesso
          }else{
            return false; //não foi possível logar
          }
        }
  }

?>
