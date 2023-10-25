<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Conexão com o banco de dados (substitua pelos seus próprios dados)
    $host = 'localhost';
    $usuario = 'root';
    $senha_bd = 'stephanyc0574**';
    $banco = 'Senai';

    $con = mysqli_connect($host, $usuario, $senha_bd, $banco);

    if (!$con) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Consulta SQL para verificar a combinação matrícula/senha na tabela Alunos
    $query = "SELECT * FROM Professores WHERE CPF = '$cpf' AND Senha = '$senha'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // Combinação matrícula/senha correta
        header('Location: paginaprofessor.html');
        exit;
    } else {
        // Combinação matrícula/senha incorreta
        echo "Matrícula ou senha incorretas. Por favor, tente novamente.";
    }

    // if (mysqli_num_rows($result) == 1) {
        // Combinação matrícula/senha correta
        // $row = mysqli_fetch_assoc($result);
        // $nomeAluno = $row['Nome'];
        // Resto do código para redirecionar e sair
    // } else {
        // Combinação matrícula/senha incorreta
        // echo "Matrícula ou senha incorretas. Por favor, tente novamente.";
    // }    
    

    // Feche a conexão com o banco de dados
    mysqli_close($con);
}
?>
