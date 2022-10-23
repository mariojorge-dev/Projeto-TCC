<?php
if (isset($_POST['submit'])) {

    include_once("conexao.php");

    $nome = $_POST['fullname'];
    $cel = $_POST['number'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['address'];
    $num = $_POST['num'];
    $cep = $_POST['cep'];
    $genero = $_POST['gender'];
    $vowels = array(".", "-");
    $cpf = str_replace($vowels, "", $cpf);
    $bola = 1;


    /*$result = mysqli_query($conexao, "INSERT INTO `mydb`.`cliente` (`cpf`, `nome`, `email`, `celular`, `endereco`, `cep`, `numero`, `datacad`,`sexo`) VALUES ('$cpf', '$nome', '$email', '$cel', '$endereco', '$cep', '$num', now(), '$genero')");
        */
    $result = mysqli_query($conexao, "UPDATE `mydb`.`cliente` set `cpf`='$cpf', `nome`='$nome', `email`='$email', `celular`='$cel', `endereco`='$endereco', `cep`='$cep', `numero`='$num',
    `sexo`='$genero' WHERE cpf = $cpf");

    if ($result) {
        echo "<script>alert('Alterado com sucesso!');</script>";
        

    } else {
        echo "<script>alert('Não foi possivel fazer a alteração!');</script>";
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
    <title>Alteração de cadastro</title>
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
            <form action="cadastro.php" method="POST">
                <div class="form-header">

                    <div class="title">
                        <h1>CADASTRO</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="fullname">Nome completo</label>
                        <input id="fullname" type="text" name="fullname" placeholder="Nome completo" required>
                    </div>
                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="number" type="cell" name="number" placeholder="(xx) xxxx-xxxx" required>
                    </div>
                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="digite seu e-mail" required>
                    </div>
                    <div class="input-box">
                        <label for="address">Endereço</label>
                        <input id="address" type="address" name="address" placeholder="Endereço" required>
                    </div>

                    <div class="input-box">
                        <label for="cep">Cep</label>
                        <input id="cep" type="text" name="cep" placeholder="xxxxx-xxx" required>
                    </div>
                    <div class="input-box">
                        <label for="num">Número da casa</label>
                        <input id="num" type="text" name="num" placeholder="" required>
                    </div>
                </div>
                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" name="gender" id="F">
                            <label for="female">Feminino</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" name="gender" id="M">
                            <label for="male">Masculino</label>
                        </div>
                    </div>
                </div>
                <div class="continue-button" name="registrar">
                    <button type="submit" name="submit" id="submit"><a href="#">Salvar Alterações</a></button>


                </div>
            </form>
        </div>
    </div>
</body>

</html>