<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['fullname']));
$cel = mysqli_real_escape_string($conexao, trim($_POST['number']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$email = mysqli_real_escape_string($conexao, trim($_POST['address']));
$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['num']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$genero = mysqli_real_escape_string($conexao, trim($_POST['gender']));



$sql = "INSERT INTO cliente (cpf, nome, email, celular, emdereco, cep, numero, datacad) VALUES ('$cpf', '$nome', '$email', '$endereco', '$numero', '$cep', '$genero', NOW())";

if($conexao->query($sql) === true) {
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();
header('Location: cadastro.php');
exit;
?>