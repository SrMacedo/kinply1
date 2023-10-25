<!DOCTYPE html>
<html>
<head>
    <title>Calendário de Eventos</title>
    <link rel="stylesheet" href="style.css">

    
    <script>
        function inserirEvento() {
            // Crie uma solicitação AJAX para enviar o formulário sem recarregar a página
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // Atualize a div com o resultado da inserção
                    document.getElementById("resultado").innerHTML = this.responseText;
                }
            };

            // Obtenha os valores do formulário
            var presente = document.getElementById("presente").checked ? 1 : 0;
            var data_inicio = document.getElementById("data_inicio").value;
            var data_fim = document.getElementById("data_fim").value;

            // Crie os dados a serem enviados
            var dados = "presente=" + presente + "&data_inicio=" + data_inicio + "&data_fim=" + data_fim;

            // Envie os dados para o arquivo PHP de inserção
            xhttp.open("POST", "inserir_evento.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(dados);
        }
    </script>

</head>
<body>
    <h1>Calendário de Eventos</h1>

    <form method="post" action="inserir_evento.php">
        <label for="presente">Presente?</label>
        <input type="checkbox" id="presente">

        <label for="data_inicio">Data de Início:</label>
        <input type="date" id="data_inicio">
        
        <label for="datatwo">Data de Fim:</label>
        <input type="date" id="data_fim">
        
        <button type="button" onclick="inserirEvento()">Inserir Evento</button>
    </form>

    <?php
    // Conexão com o banco de dados (certifique-se de inserir suas próprias credenciais)


    $conn = new mysqli('localhost', 'root', 'stephanyc0574**', 'calendario');

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Verifica se o checkbox está marcado ou não
    // if (!isset($_POST['presente']) || empty($_POST['presente'])) {
    //     echo "<div class='ausencia'>Ausência</div>";
    // }


    // Consulta SQL para obter os eventos
    $sql = "SELECT id, titulo, data_inicio, data_fim FROM eventos";
    $result = $conn->query($sql);

    
    if (!isset($_POST['presente']) || empty($_POST['presente'])) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                    echo "<div class='evento'>";
                    echo "<h3>Ausência</h3>";
                    echo "<p>Início: " . $row['data_inicio'] . "</p>";
                    echo "<p>Fim: " . $row['data_fim'] . "</p>";
                    echo "</div>";
            }
        } else {
            echo "Nenhuma ausência encontrada.";
        }
    
    }

    $conn->close();
    ?>

</body>
</html>
