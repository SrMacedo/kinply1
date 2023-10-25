<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST['matricula'];
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
    $query = "SELECT ID, Nome FROM Alunos WHERE Matricula = '$matricula' AND Senha = '$senha'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // A combinação matrícula/senha é válida, obtenha o ID do aluno
        $row = mysqli_fetch_assoc($result);
        $aluno_id = $row['ID'];
        $nome_aluno = $row['Nome'];

        // Consulta SQL para obter as ausências do aluno pelo ID
        $query_ausencias = "SELECT DataDaAula, Ausencia FROM Ausencias WHERE Aluno = $aluno_id";
        $result_ausencias = mysqli_query($con, $query_ausencias);

        // Preparar os resultados para JSON
        $ausencias = array();
        while ($row_ausencias = mysqli_fetch_assoc($result_ausencias)) {
            $data_aula = $row_ausencias['DataDaAula'];
            $ausencia = $row_ausencias['Ausencia'];
            $ausencias[] = array('DataDaAula' => $data_aula, 'Ausencia' => $ausencia);
        }

        // Feche a conexão com o banco de dados
        mysqli_close($con);

        // Retorna os resultados em formato JSON
        $response = array('nomeAluno' => $nome_aluno, 'ausencias' => $ausencias);
        echo json_encode($response);
    } else {
        // A combinação matrícula/senha é inválida
        echo json_encode(array('error' => 'Matrícula ou senha incorretas. Por favor, tente novamente.'));
    }
}
?>
