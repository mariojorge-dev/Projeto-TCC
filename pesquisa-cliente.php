<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Pesquisa</title>
</head>

<body>
    <?php

    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";
    $sql = "select * from mydb.cliente where nome like '%$pesquisa%'";

    $dados = mysqli_query($conexao, $sql);

    ?>


    <div class="container">
        <div class="row">

            <div class="col">
                <h1>Pesquisa</h1>


                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" action="pesquisa-cliente.php" method="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" name="busca">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="cadastro.php">voltar</a></button>
                    </form>
                </nav>
            </div>

        </div>
    </div>




    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">CPF</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Celular</th>
                <th scope="col">Endereço</th>
                <th scope="col">Cep</th>
                <th scope="col">Numero</th>
                <th scope="col">Data Cadastro</th>
                <th scope="col">funções</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($linha = mysqli_fetch_assoc($dados)) {
                $cpf = $linha['cpf'];
                $nome = $linha['nome'];
                $email = $linha['email'];
                $celular = $linha['celular'];
                $endereco = $linha['endereco'];
                $cep = $linha['cep'];
                $numero = $linha['numero'];
                $datacad = $linha['datacad'];



                echo "<tr>
                
                <td>$cpf</td>
                <td>$nome</td>
                <td>$email</td>
                <td>$celular</td>
                <td>$endereco</td>
                <td>$cep</td>
                <td>$numero</td>
                <td>$datacad</td>
                <td><a href='cadastro-editar.php?cpf=$cpf'; class='btn btn-success btn-sm'>Editar</a></td>
                <td><a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma' onclick=" . '"' . "pegar_dados('$cpf', '$nome')" . '"' . ">Excluir</a></td>
                </td>
                </tr>";
            }


            ?>

            <!-- onclick="pegar_dados($id, '$nome')" -->


        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="excluir-script.php" method="POST">
                        <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <input type="hidden" name="cod_pessoa" id="cod_pessoa" value=""></input>
                    <input type="hidden" name="nome" id="nome_pessoa_1" value=""></input>
                    <input type="submit" class="btn btn-danger" value="Sim"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('cod_pessoa').value = id;
            document.getElementById('nome_pessoa_1').value = nome;
        }
    </script>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>