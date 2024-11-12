
<style>
 h3{
background-color: green;
color: white;
 }

 h2{
background-color: yellow;
color: black;
 }

</style>




<?php
require_once('conexao.php');
$banco=$con->exec('USE pagina_recado');

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){

try{
 
    

    $usuario = strtoupper($_POST['usuario']);
    $senha = $_POST['senha'];
    $conf_senha = $_POST['conf_senha']; 
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    

        if($senha !== $conf_senha ){

        $_SESSION['senhas_difere'] = true;

        header('Location:cria_conta.php');
        

        }else{

    $hash_senha = password_hash($senha, PASSWORD_DEFAULT);

    //exec() é usada para comandos SQL diretos (sem preparar) que não retornam resultados
    $con->exec("USE pagina_recado");
    
    $sql = "INSERT INTO usuario(usuario,senha,cpf,cidade,estado,email,data_hora_cadastro) values(:usuario,:senha,:cpf,:cidade,:estado, :email,NOW())";

    $stmt = $con->prepare($sql);
    
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $hash_senha);
    $stmt->bindParam(':cpf',$cpf);
    $stmt->bindParam(':cidade',$cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    
    echo "<h3> Cadastro realizado com Sucesso!</h3>";
}

    }catch(PDOException $msg){


        if($msg->getCode()==23000){

            echo "<h2> CPF ou USUÁRIO já possui Cadastro!</h2>";
            

        }

       

    }

}else{

    header('Location:LOGIN/login.php');
}

?>

<a href="LOGIN/login.php">Tela de Login</a>