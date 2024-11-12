<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '123456';
$db_nome = 'pagina_recado';

try{
$con = new PDO("mysql:host=$servidor;$db_nome",$usuario,$senha);

}catch(PDOException $msg){
    echo "Erro ao se conectar com o Banco de Dados!! ".$msg->getMessage();
}




$sql=$con->exec('USE pagina_recado');



?>