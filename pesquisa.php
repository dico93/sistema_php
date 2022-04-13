<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pesquisar</title>
  </head>
  <body>

    <?php
        //função para mostrar a data no padrão brasileiro.
        function mostra_data($data) {
            $d = explode('-', $data);
            $escreve = $d[2] . "/" .$d[1] ."/" .$d[0];
            return $escreve;
        }    
    ?>


    <?php
      $pesquisa = $_POST['busca'] ?? '';
    

      include 'C:\xampp\htdocs\estoque\sys\conexao.php';

      $sql = "SELECT * FROM `produtos` WHERE nome LIKE '%$pesquisa%'";

      $dados = mysqli_query($conn, $sql);
      ?>


    <div class="container">
      <div class="row">
        <div class="col">
           <h1>Pesquisar Produtos</h1>
           <nav class="navbar navbar-light bg-light">
             <form class="form-inline" action="pesquisa.php" method="POST">
               <input class="form-control mr-sm-2" type="search" placeholder="nome do produto" aria-label="Search" name="busca" autofocus>
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
             </form>

           </nav>
           <table class="table table-hover">
             <thead>
               <tr>
                 <th scope="col">Nome do Produto</th>
                 <th scope="col">Quantidade</th>
                 <th scope="col">Preço unitário</th>
                 <th scope="col">Data da Compra</th>
                 <th scope="col">Preço Total</th>
                 <th scope="col">Funções</th>

               </tr>
             </thead>
             <tbody>

               <?php
               while ($linha = mysqli_fetch_assoc($dados)) {
                $cod_produto = $linha['cod_produto'];
                $nome = $linha['nome']; 
                $quantidade = $linha['quantidade'];
                $preco = $linha['preco'];
                $data_compra = $linha['data_compra'];
                $data_compra = mostra_data($data_compra);
                $preco_total = $quantidade * $preco;

              echo"  <tr>
                  <th scope='row'>$nome</th>
                  <td>$quantidade</td>
                  <td>$preco</td>
                  <td>$data_compra</td>
                  <td>$preco_total</td>
                  <td width=150px>
                      <a href='cadastro_edit.php?id=$cod_produto' class='btn btn-success btn-sm'>Editar</a>
                      <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma'
                      onclick=" .'"' ."pegar_dados($cod_produto, '$nome')" .'"' .">Excluir</a>
                  </td>
                </tr>";

               }
              ?>
               
           
             </tbody>
           </table>
           <a href="index.php" class="btn btn-info">Voltar para o início</a>
        </div>
      </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="excluir_script.php" method="POST">
            <p>Deseja realmente excluir?</p>
            <p id="nome_produto">Nome do produto</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <input type="hidden" name="nome" id="nome_prod" value="">
            <input type="hidden" name="id" id="cod_produto" value="">
            <input type="submit" class="btn btn-danger" value="Sim">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function pegar_dados(id, nome){
        document.getElementById('nome_produto').innerHTML = nome;
        document.getElementById('nome_prod').value = nome;
        document.getElementById('cod_produto').value = id;
      }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>