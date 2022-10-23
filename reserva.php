<?php
    if(isset($_POST['submit'])){

        include_once("conexao.php");
        $nome = $_POST['name'];
        $cpf = trim($_POST['cpf']);
        $data = $_POST['Data'];
        $hini = $_POST['horaini'];
        $hfim = $_POST['horafim'];

$result = mysqli_query($conexao, "INSERT INTO `mydb`.`reserva` (`Nome_cliente`,`data_reserva`, `hora_inicio`, `hora_final`, `cliente_cpf`) VALUES ('$nome','$data', '$hini', '$hfim', '$cpf')");

    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="img/undraw_Engineering_team_a7n2.png" alt="">
        </div>
        <div class="form">
            <div class="voltar-button">
                <button><a href="index.php">Voltar</a> </button>
            </div>
            <form action="reserva.php" method="POST">
                <div class="form-header">

                    <div class="title">
                        <h1>Reservar</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Nome Completo</label>
                        <input id="firstname" type="text" name="name" placeholder="Nome completo" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="Ex.: 000.000.000-00">
                    </div>
                    <div class="input-box">
                        <label for="data">Data</label>
                        <input name="Data" type="date" class="form-control  date-time-mask">
                    </div>

                    <div class="input-box">

                        <label for="horaini">Horario inicio</label>

                        <input type="time" id="apptini" name="horaini" min="09:00" max="22:00" required>
                    </div>
                    <div class="input-box">
                        <label for="horafim">Horario termino</label>

                        <input type="time" id="apptfim" name="horafim" min="09:00" max="22:00" required>
                    </div>
                </div>
                <div class="continue-button">
                    <button type="submit" name="submit" id="submit"><a href="#">Continuar</a> </button>
                </div>

        </div>
    </div>

    </form>
</body>
<script src="script.js"></script>

</html>