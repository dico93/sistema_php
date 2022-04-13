<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Alteração de Cadastro</title>
  </head>
  <body>

    <?php

      include 'C:\xampp\htdocs\estoque\sys\conexao.php';

      $id = $_GET['id'] ?? ''; 
      $sql = "SELECT * FROM produtos WHERE cod_produto = $id";

      $dados = mysqli_query($conn, $sql);
      $linha = mysqli_fetch_assoc($dados);

    ?>

    <div class="container">
      <div class="row">
        <div class="col">
           <h1>Cadastro de Produtos</h1>
           <form action="edit_script.php" method="POST">
             <div class="form-group">
                 <label for="nome">Nome do Produto</label>
                 <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome'];?>">
            </div>
            <div class="form-group">
                  <label for="quantidade">Quantidade</label>
                  <input type="text" class="form-control" name="quantidade" value="<?php echo $linha['quantidade'];?>">
            </div>
            <div class="form-group">
                  <label for="preco">Preço</label>
                  <input type="text" class="form-control" name="preco" value="<?php echo $linha['preco'];?>">
            </div>
            <div class="form-group">
                  <label for="data_compra">Data de Compra</label>
                  <input type="date" class="form-control" name="data_compra" value="<?php echo $linha['data_compra'];?>">
            </div>
            <div class="form-group">
                  <input type="submit" class="btn btn-success" value="Salvar alterações">
                  <input type="hidden" name="id" value="<?php echo $linha['cod_produto'];?>">
            </div>
           </form>
           <a href="index.php" class="btn btn-info">Voltar para o início</a>
        </div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>