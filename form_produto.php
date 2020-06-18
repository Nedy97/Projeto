<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>RegProduct</title>
  <link rel="stylesheet" href="CSS_Prod/estilo_prod.css">
  </head>
  <body>
    <?php
          if(isset($registro)){
              $acao =  "insere_produto.php?codigo=".$registro['codigo'];
          }else{
              $acao =  "insere_produto.php";
          }
    ?>

    <div class="container" id="corpo_formCadProd">
      <h1>Cadastro de Produto</h1>

      <form action= "<?php echo ($acao) ?> " method="POST"></br>
        <div class="form-group">
          <label for="descprod">Descrição:</label>
          <input type="text" class="form-control" id="descprod" placeholder="Informe a descrição do produto" name="descprod" required
          value="<?php if(isset($registro)) echo $registro['descprod']; ?>" required>
        </div>
        <div class="form-group">
          <label for="descnot">Descrição para NF</label>
         <input type="text" class="form-control" id="descnot" placeholder="Informe a descrição para nota fiscal" name="descnot" required
          value="<?php if(isset($registro)) echo $registro['descnot']; ?>" required>
        </div>
        <div class="form-group">
          <label for="unidmed">UM</label>
          <select class="form-group" id="unidmed" name="unidmed">
            <option selected><?php if(isset($registro)) echo $registro['unidmed']; ?></option>
            <option value="g">g</option>
            <option value="kg">Kg</option>
            <option value="Lt">Lt</option>
            <option value="mm">mm</option>
            <option value="m">m</option>
            <option value="Ton">Ton</option>
          </select>
        </div>
        <div class="form-group">
          <label for="descnot">Valor<label>
         <input type="text" class="form-control" id="valoprod" placeholder="Informe o valor do Produto" name="valoprod" required
          value="<?php if(isset($registro)) echo $registro['valoprod']; ?>" required>
        </div>
        <div class="form-group">
          <label for="descnot">Quantidade</label>
         <input type="text" class="form-control" id="qtdprod" placeholder="Informe a quantidade em estoque" name="qtdprod" required
          value="<?php if(isset($registro)) echo $registro['qtdprod']; ?>" required>
        </div>
        <div class="form-group">
          <label for="situprod">Situação</label>
          <select class="situprod" id="situprod" name="situprod">
            <option selected><?php if(isset($registro)) echo $registro['situprod']; ?></option>
            <option value="Inativo">Inativo</option>
            <option value="Ativo">Ativo</option>
          </select
        </div>
        </br>
        <button type="submit" class="btn btn-default">Cadastrar</button>
        <a class="btn btn-info btn-sm" href="lista_produtos.php">Voltar</a>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
