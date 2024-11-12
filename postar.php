<?php
require_once('conexao.php');

if($_SERVER['REQUEST_METHOD']=="POST"){

    


$usuario = $_POST['usuario'];
$recado = $_POST['recado'];

$sql = ('INSERT INTO recados(usuario,recado,data_hora_recado)
values(:usuario,:recado,NOW())');
$stmt=$con->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':recado', $recado);
$stmt->execute();
echo 'Recado Foi adicionado com Sucesso!';
}
?>

<a href="painel_recados.php">PAINEL</a>


