<?php
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'mydb';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword);
/*
if($conexao->connect_errno){
    echo "Erro";
}else{
    echo "SUCESSO";
}
*/
?>

<?php
/*
function mostra_data($data){
    $d = explode('-', $data);
    $escreve = $d[0] ."/" .$d[1] . "/" .$d[2];
    return $escreve;
}
*/
?>

