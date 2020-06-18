<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <title>RegProduct</title>
  <link rel="stylesheet" href="CSS_Prod/estilo_prod.css">
  </head>
  <body>
    <?php
          if(isset($registro)){
              $acao =  "comprar.php?codigo=".$registro['codigo'];
          }else{
              echo "ERRO!!!!";
          }
    ?>

    <div class="container" id="corpo_formCadProd">
      <h1>Concluir a compra</h1>

      <form action= "<?php echo ($acao) ?> " method="POST"></br>
        <!-- Descrição do produto -->
        <div class="form-group">
          <label for="descprod">Descrição:</label>
          <input type="text" class="form-control" id="descprod" placeholder="Informe a descrição do produto" name="descprod" required
          value="<?php if(isset($registro)) echo $registro['descprod']; ?>" readonly>
        </div>
        <!-- Descrição do produto na Nota Fiscal-->
        <div class="form-group">
          <label for="descnot">Descrição para NF</label>
         <input type="text" class="form-control" id="descnot" placeholder="Informe a descrição para nota fiscal" name="descnot" required
          value="<?php if(isset($registro)) echo $registro['descnot']; ?>" readonly >
        </div>
        <!-- Unidade de Medida -->
        <div class="form-group">
          <label for="unidmed">UM</label>
          <select class="form-group" id="unidmed" name="unidmed">
            <option selected><?php if(isset($registro)) echo $registro['unidmed']; ?></option>
          </select readonly>
        </div>
        <!-- Valor Produto -->
        <div class="form-group">
          <label for="descnot">Valor<label>
         <input type="text" class="form-control" id="valoprod" placeholder="Informe o valor do Produto" name="valoprod"
          value="<?php if(isset($registro)) echo $registro['valoprod']; ?>" readonly>
        </div>
        <!-- Quantidade em estoque -->
        <div class="form-group">
          <label for="descnot">Quantidade em estoque</label>
         <input type="text" class="form-control" id="qtdprod" name="qtdprod"
          value="<?php if(isset($registro)) echo $registro['qtdprod']; ?>" readonly>
        </div>
        <!-- Quantidade a comprar -->
        <div class="form-group">
          <label for="descnot">Quantidade a comprar</label>
         <input type="num" class="form-control" id="qtdprodcompra" placeholder="Informe a quantidade que deseja comprar" name="qtdprodcompra" required>
        </div>
        </br>
        <!-- Botão comprar -->
        <button type="submit" class="btn btn-default" onclick="return confirm('Tem certeza que deseja efeturar a compra?')">Comprar</button>
        <a class="btn btn-info btn-sm" href="lista_produtos_cliente.php">Voltar</a>
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
