<?php
if (!empty($_GET['cpf'])){

    $cpf = $_GET['cpf'];




    $sql = "select * from mydb.cliente where cpf = '$cpf'";

    include "conexao.php";
    $dados = mysqli_query($conexao, $sql);


    while ($linha = mysqli_fetch_assoc($dados)) {
        $cpf = $linha['cpf'];
        $nome = $linha['nome'];
        $email = $linha['email'];
        $celular = $linha['celular'];
        $endereco = $linha['endereco'];
        $cep = $linha['cep'];
        $numero = $linha['numero'];
        $datacad = $linha['datacad'];
        $sexo = $linha['sexo'];
    }

}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alteração de Cadastro</title>
</head>

<body>


    <div class="container">
        <div class="form-image">
            <img src="img/undraw_exams_re_4ios.svg" alt="">
        </div>
        <div class="form">
            <div class="voltar-button">
                <button><a href="index.php">Voltar</a> </button>
                <button><a href="pesquisa-cliente.php">Pesquisar</a> </button>

            </div>
            <form action="script-editar.php" method="POST">
                <div class="form-header">

                    <div class="title">
                        <h1>CADASTRO</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="fullname">Nome completo</label>
                        <input id="fullname" name="fullname" type="text" required value="<?php echo $nome; ?>">
                    </div>
                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="number" type="cell" name="number" placeholder="(xx) xxxx-xxxx" required value="<?php echo $celular; ?>">
                    </div>
                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" required value="<?php echo $cpf; ?>">
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="digite seu e-mail" required value="<?php echo $email; ?>">
                    </div>
                    <div class="input-box">
                        <label for="address">Endereço</label>
                        <input id="address" type="text" name="address" placeholder="Endereço" required value="<?php echo $endereco; ?>">
                    </div>

                    <div class="input-box">
                        <label for="cep">Cep</label>
                        <input id="cep" type="text" name="cep" placeholder="xxxxx-xxx" required value="<?php echo $cep; ?>">
                    </div>
                    <div class="input-box">
                        <label for="num">Número da casa</label>
                        <input id="num" type="text" name="num" placeholder="" required value="<?php echo $numero; ?>">
                    </div>
                </div>
                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" name="gender" id="female" <?php echo ($sexo == "f") ? "checked" : null; ?>>
                            <label for="female">Feminino</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" name="gender" id="male"<?php echo ($sexo == "m") ? "checked" : null; ?>>
                            <label for="male">Masculino</label>
                        </div>
                    </div>
                </div>
                <div class="continue-button" name="registrar">
                    <button type="submit" name="submit" id="submit"><a href="#">Salvar alterações</a></button>
                    <input type="hidden" name="cpf" value="<?php echo $cpf; ?>">

                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php


?>