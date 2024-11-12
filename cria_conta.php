<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>

    <style>

select{
            padding: 8px;
            font-size: 18px;
        }
        input{
            padding: 8px;
            font-size: 18px;
        }

        hr{

            border: 1px solid purple
        }

        h3{
background-color: red;
color: white;

        }


    </style>
</head>
<body>
<h2>Criar Conta.........</h2>
<hr>
<?php
        session_start();
        if(isset($_SESSION['senhas_difere'])){
        if($_SESSION['senhas_difere'] == true){
            echo "<h3>As senhas não são Idênticas - tente Novamente!</h3>";
            }
       }
      
?>

<div class="cria_conta">
<form action="cadastra.php" method="POST">
     <table>
        <tr><td>Usuário*:</td><td><input type="text" name="usuario" required></td></tr>
        <tr><td>Senha*:</td><td><input type="password" name="senha" required></td></tr>
        <tr><td>Confirme a senha*:</td><td><input type="password" name="conf_senha" required></td></tr>
        <tr><td>CPF*:</td><td><input type="text" name="cpf" placeholder="000.000.000-00"
        pattern="\d{3}.\d{3}.\d{3}-\d{2}" required></td></tr>
        <tr><td>Cidade:</td><td><input type="text" name="cidade"></td></tr>
        <tr><td>Estado:</td><td><select name="estado" id="estado">
            <option value=""></option>
            <option value="ac">Acre</option>
<option value="al">Alagoas</option>
<option value="ap">Amapá</option>
<option value="am">Amazonas</option>
<option value="ba">Bahia</option>
<option value="ce">Ceará</option>
<option value="df">Distrito Federal</option>
<option value="es">Espírito Santo</option>
<option value="go">Goiás</option>
<option value="ma">Maranhão</option>
<option value="mt">Mato Grosso</option>
<option value="ms">Mato Grosso do Sul</option>
<option value="mg">Minas Gerais</option>
<option value="pa">Pará</option>
<option value="pb">Paraíba</option>
<option value="pr">Paraná</option>
<option value="pe">Pernambuco</option>
<option value="pi">Piauí</option>
<option value="rj">Rio de Janeiro</option>
<option value="rn">Rio Grande do Norte</option>
<option value="rs">Rio Grande do Sul</option>
<option value="ro">Rondônia</option>
<option value="rr">Roraima</option>
<option value="sc">Santa Catarina</option>
<option value="sp">São Paulo</option>
<option value="se">Sergipe</option>
<option value="to">Tocantins</option>


        </select></td></tr>
        <tr><td>E-mail*:</td><td><input type="email" name="email" placeholder="exemplo@exemplo.com" required></td></tr>
        <tr><td></td><td><input type="submit" value="Cadastrar"> | <input type="reset" value="Limpar"></td></tr>
    </table>
    <h5>* Obrigatórios</h5>
</form>
</div>
<hr>

<a href="login\login.php">Página de Login</a>
</body>
</html>