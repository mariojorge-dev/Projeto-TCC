<?php
    $error = "";
    if(isset($_POST['registrar'])){
        $nome = $_POST['fullname'];
        $cel = $_POST['number'];
        $cpf = $_POST['cpf'];
        $email = $_POST['address'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['num'];
        $cep = $_POST['cep'];
        $genero = $_POST['gender'];

        $verify = mysql_query("select * from cliente where email = '$email'");


        if(strlen($nome) < 3){
            $error = "<h2 style='color;red'>Nome muito pequeno</h2>";
        }else if(strlen($email) < 8){
            $error = "<h2 style='color;red'>Email muito pequeno</h2>";
        }else if(strlen($cpf) < 11){
            $error = "<h2 style='color;red'>CPF incorreto</h2>";
        }else if(strlen($endereco) < 5){
            $error = "<h2 style='color;red'>CPF incorreto</h2>";
        }else if(mysql_num_rows($verify) > 0){
            $error = "<h2 style='color;red'>Email já registrado</h2>";
        }else{
            mysql_query("INSERT cliente (fullname,number,cpf,address,endereco,num,cep,gender,datacad) VALUES ('$nome','$cel','$cpf','$email','$endereco','$numero','$cep','$genero',NOW()");
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
    <title>Cadastro do Cliente</title>
</head>
<body>
    <?php
    echo $error;
    ?>
    <form action="cadastrar.php"></form>
    <div class="container">
        <div class="form-image">
            <img src="img/undraw_exams_re_4ios.svg" alt="">
        </div>
        <div class="form">
            <div class="voltar-button">
                <button><a href="index.html">Voltar</a> </button>
            </div>  
            <form action="#">
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
                            <input type="radio" name="gender" id="female">
                            <label for="female">Feminino</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" name="gender" id="male">
                            <label for="male">Masculino</label>
                        </div>
                    </div>
                </div>
                <div class="continue-button" name="registrar">
                    <button><a href="#">continuar</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>