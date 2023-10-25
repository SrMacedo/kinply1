<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
    <link rel="stylesheet" href="aluno-professor.css">
</head>
<body>
    <section class="formulario">

        <div class="perfil">

         


            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="white" stroke-width="1.5"><circle cx="12" cy="6" r="4"/><path d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z"/></g></svg>

            <h3 id="nomeAluno">

                <?php


                    include 'processar_login.php'; // Inclui o primeiro arquivo
                    echo 'Aluno'; // Exibe o valor definido no primeiro arquivo
                
                ?>

            </h3>

            <div class="inputs">
                <div class="input">
                    <a href="aluno-falta.php">Histórico de ausências</a>
                </div>
                <div class="input">
                    <a href="">Justificar falta</a>
                </div>

                <div class="input">
                    <a href="">Alterar senha</a>
                </div>
            </div>

            <a href="loogi.php" id="sair">Sair</a>
            
        </div>


    </section> 
    
    
</body>
</html>


<?php
// Conexão com o banco de dados 
$host = 'localhost';
$usuario = 'root';
$senha_bd = 'stephanyc0574**';
$banco = 'Senai';

$conn = mysqli_connect($host, $usuario, $senha_bd, $banco);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar a matrícula e senha
    $sql = "SELECT Nome FROM Alunos WHERE Matricula = '$matricula' AND Senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Matrícula e senha corretas
        $row = $result->fetch_assoc();
        $nomeAluno = $row['Nome'];

        // Redireciona para outra página com o nome do aluno na URL
        header("Location: dashboard.php?nomeAluno=$nomeAluno");
        exit();
    } else {
        // Matrícula ou senha incorretas, você pode exibir uma mensagem de erro
        echo "Matrícula ou senha incorretas.";
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>
