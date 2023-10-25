<?php
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crie uma conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', 'stephanyc0574**', 'Senai');

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

   // Loop através dos dados do formulário para Ausências
foreach ($_POST['ausencia'] as $alunoID => $status) {
    // Use a instrução SQL para verificar se o registro já existe
    $checkQuery = "SELECT ID FROM Ausencias WHERE Aluno = '$alunoID' AND DataDaAula = NOW()";
    
    $result = $conn->query($checkQuery);
    
    if ($result->num_rows > 0) {
        // Se o registro já existe, atualize-o
        $updateQuery = "UPDATE Ausencias SET Ausencia = 'Ausente' WHERE Aluno = '$alunoID' AND DataDaAula = NOW()";
        
        if ($conn->query($updateQuery) !== TRUE) {
            echo "Erro ao atualizar dados: " . $conn->error;
        }
    } else {
        // Se o registro não existe, insira um novo
        $insertQuery = "INSERT INTO Ausencias (Aluno, DataDaAula, Ausencia) VALUES ('$alunoID', NOW(), 'Ausente')";
        
        if ($conn->query($insertQuery) !== TRUE) {
            echo "Erro ao inserir dados: " . $conn->error;
        }
    }
}

// Loop através dos dados do formulário para Presenças
foreach ($_POST['presenca'] as $alunoID => $status) {
    // Use a instrução SQL para verificar se o registro já existe
    $checkQuery = "SELECT ID FROM Presencas WHERE Aluno = '$alunoID' AND DataDaAula = NOW()";
    
    $result = $conn->query($checkQuery);
    
    if ($result->num_rows > 0) {
        // Se o registro já existe, atualize-o
        $updateQuery = "UPDATE Presencas SET Presenca = 'Presente' WHERE Aluno = '$alunoID' AND DataDaAula = NOW()";
        
        if ($conn->query($updateQuery) !== TRUE) {
            echo "Erro ao atualizar dados: " . $conn->error;
        }
    } else {
        // Se o registro não existe, insira um novo
        $insertQuery = "INSERT INTO Presencas (Aluno, DataDaAula, Presenca) VALUES ('$alunoID', NOW(), 'Presente')";
        
        if ($conn->query($insertQuery) !== TRUE) {
            echo "Erro ao inserir dados: " . $conn->error;
        }
    }
}



    // Feche a conexão com o banco de dados
    $conn->close();
}

header("Location: KINPLY.php");
?>
