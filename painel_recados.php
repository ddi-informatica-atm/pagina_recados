<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Recados</title>
    <style>
        *{
            font-size:15px;
        }
        .recados{
            width: 50%;
            height: 100%;
            margin-left: 20%;
            
            
        }

        .postar{
            width: 50%;
            height: 100%;
            margin-left: 20%;
            
            
        }
       
.menu button{
cursor: pointer;
    padding: 10px;
    width: 100%;
    border: none;
}

.menu button:hover{

    background-color: black;
    color: white;
}



.menu{
    width: 150px;
    position: absolute;
   
   
}

tr:nth-child(even){
    background-color:DarkKhaki;
}

p{

    color: purple;
    font-size: 30px;
}


h2{

color: purple;
font-size: 22px;
}


td{

color: purple;
font-size: 22px;
}



</style>
</head>
<body>
    
<h3>Painel de Recados.....</h3>
<hr>
<?php
require_once('conexao.php');
$sql=$con->exec('USE pagina_recado');

session_start();
if(isset($_SESSION['usuario_logado'])){

echo "<button class='usuario'>{$_SESSION['usuario_logado']}</button>";

}else{

header('Location:login/login.php');

}

?>
<hr>

<div class="menu">
<form action="">
<button type="submit" name="pagina" value="todosrecados">Todos os Recados</button>
<button type="submit" name="pagina" value="meus_dados">Dados Pessoais</button>
<button type="submit" name="pagina" value="meus_recados">Meus Recados</button>
<button type="submit" name="pagina" value="sair">SAIR</button>
</div>
</form>  

<div class="recados">
<?php
if(isset($_GET['pagina'])){

$pagina = $_GET['pagina'];

    
if ($pagina == "meus_dados") {
    $usuario_m_dados = $_SESSION['usuario_logado'];

    $sql=$con->prepare('SELECT * FROM usuario where usuario = :usuario') ;
    $sql->bindParam(':usuario',$usuario_m_dados);
    $sql->execute();

    while($dados=$sql->fetch(PDO::FETCH_ASSOC)){

        echo "<h2>Nome de Usuário: ".$nome=$dados['usuario']."</h2>";
        echo "<h2>Cidade: ".$nome=$dados['cidade']."</h2>";
        echo "<h2>Estado: ".$nome=$dados['estado']."</h2>";
        echo "<h2>Email: ".$nome=$dados['email']."</h2>";
        

    }


              
}elseif($pagina =="meus_recados"){

    $usuario_m_recados = $_SESSION['usuario_logado'];  
    $sql=$con->prepare('SELECT * FROM recados where usuario = :usuario') ;
    $sql->bindParam(':usuario',$usuario_m_recados);
    $sql->execute();

    echo"<table>";
    echo "<th>Recado:</th><th>Data:</th>";
    while($recados=$sql->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>";
        echo $usuario=$recados['recado'];
        echo "</td>";

        echo "<td>";
        $recado=$recados['data_hora_recado'];
        $data = date('d-m-y H:m', strtotime($recado));
        echo $data;
        echo "</td>";
        echo "</tr>";
        
    }
   
    echo"</table>";

}elseif($pagina =="sair"){
     
    session_start();
    session_destroy();
    header('Location: login/login.php');
    
}else{

include 'recados.php';

}
}
?>
</div>



<div class="postar">
<table>
<form action="postar.php" method="POST">
<tr><td><label for="mensagem">Mensagem:</label></td><td><textarea id="mensagem" name="recado" rows="10"
cols="40" placeholder="Digite sua mensagem aqui..." required></textarea></td></tr>

<input type="hidden" name='usuario' value="<?php echo $_SESSION['usuario_logado'] ?>">

<tr><td><input type="submit" value="Postar Recado"></td>
<td><input type="reset" value="Limpar"></td></tr>

</form>


</table>
</div>

</body>
</html>



