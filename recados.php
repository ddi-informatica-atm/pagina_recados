<style>

 tr:nth-child(even){

background-color: Beige;

 }

</style>

<div>
<table>
<?php
require_once('conexao.php');

$sql=$con->exec('USE pagina_recado');

$sql = "SELECT * FROM recados";
$stmt=$con->prepare($sql);
$stmt->execute();
echo "<th>USUÁRIO</th><th>RECADO</th><th>DATA</th>";

while($dados=$stmt->fetch(PDO::FETCH_ASSOC)){

$usuario=$dados['usuario'];
$recado=$dados['recado'];
$data = $dados['data_hora_recado'];


echo '<tr>';
echo '<td>';
echo $usuario;
echo '</td>';

echo '<td>';
echo $recado;
echo '</td>';

echo '<td>';
echo $data;
echo '</td>';
echo '</tr>';


}


?>



</table>

</div>