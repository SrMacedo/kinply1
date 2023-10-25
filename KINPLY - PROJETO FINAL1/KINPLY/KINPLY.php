<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="KINSTYLE.css">



</head>
<body>
    <section class="conteudo">
        
        <header>
            <a href="paginaprofessor.html" id="menu"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 256 256"><g transform="rotate(-90 128 128)"><path fill="white" d="M208.49 120.49a12 12 0 0 1-17 0L140 69v147a12 12 0 0 1-24 0V69l-51.51 51.49a12 12 0 0 1-17-17l72-72a12 12 0 0 1 17 0l72 72a12 12 0 0 1 0 17Z"/></g></svg></a>

            <div class="retangulo-profile">
                <div class="contain-info-profile">

                    <div class="profile-picture"></div>

                    <div class="text-info-profile">
                        <h2>Docente</h2>
                        <h3>Docente</h3>
                        <h4>Docente</h4>
                    </div>
                </div>
            </div>

            <!-- <div class="allfilter"> -->
                <div class="filterarea" id="filterarea">

                    <a href="" onclick="mostrarFiltro()"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M18.523 4.226a58.727 58.727 0 0 0-13.046 0a1.373 1.373 0 0 0-.915 2.229l3.769 4.659A7.5 7.5 0 0 1 10 15.83v3.142a.75.75 0 0 0 .306.605l2.771 2.032a.58.58 0 0 0 .923-.468V15.83a7.5 7.5 0 0 1 1.67-4.717l3.768-4.66a1.373 1.373 0 0 0-.915-2.228Z"/></svg></a>

                    <p id="filterlink" onclick="mostrarFiltro()">Filter</p> 
                </div>

                <div class="filter-active-one">
                    <select name="fdsd" id="filterr" class="filter-active">
                        <option value="">fdsfsdf</option>
                        <option value="">fdsfsdf</option>
                        <option value="">fdsfsdf</option>
                        <option value="">fdsfsdf</option>
                    </select>
                </div>
            <!-- </div> -->

        </header>

        <!-- <div class="data">
            <select name="Data" id="">
                <option value="dsdd">Data</option>
                <option value="dsdd">Data</option>
                <option value="dsdd">Data</option>
                <option value="dsdd">Data</option>
            </select>
        </div> -->

        <section class="chamadas">
            <form action="processarpresenca.php" method="POST" class="formulario-chamada">

                <div class="espaco"></div>

                <div class="lista-alunos">
                    
                    
                    <?php
                    // Cria uma conexão com o banco de dados
                    $conn = new mysqli('localhost', 'root', 'stephanyc0574**', 'Senai');

                    // Verifica a conexão
                    if ($conn->connect_error) {
                        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
                    }

                    // Consulta SQL para obter os dados dos alunos
                    $sql = "SELECT * FROM Alunos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="retangulos-info-aluno-desc">';
                            echo '<div class="retangulo-aluno">';
                            echo '<div class="pfp-info-aluno">';
                            echo '<div class="aluno-profile-picture"></div>';
                            echo '<div class="info-aluno">';
                            echo '<h4>' . $row["Nome"] . '</h4>';
                            echo '<h5>' . $row["Matricula"] . '</h5>';
                            echo '</div>';
                            echo '</div>';
                            
                            echo '<div class="registrar-ausencia">';
                            // echo '<h4>Status</h4>';

                            echo '<div class="checks">';

                            echo '<div class="checks-labels">';
                            echo '<label for="nothing">Presente';
                            echo '<br>';
                            echo '<br>';
                            echo '<label for="nothing">Ausente';
                            echo '</div>';


                            echo '<div class="checks-pres">';
                            echo '<input type="checkbox" class="checkbox" name="presenca[' . $row["ID"] . ']">';
                            echo '<input type="checkbox" class="checkbox2" name="ausencia[' . $row["ID"] . ']">';

                            echo '</div>';
                            echo '</div>';

                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M11.178 19.569a.998.998 0 0 0 1.644 0l9-13A.999.999 0 0 0 21 5H3a1.002 1.002 0 0 0-.822 1.569l9 13z" class="arrow-down"></svg>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Nenhum aluno encontrado.";
                    }

                    // Fecha a conexão com o banco de dados
                    $conn->close();
                    ?>

                <div class="submits">
                    <input type="submit" placeholder="Salvar" class="submit">
                </div>


            </form>
        </section>


    </section>
    
    <script src="KINN.JS"></script>
</body>
</html>


<?php 


// foreach ($_POST as $alunoID => $status) {
//     if (isset($_POST[$alunoID])) {
        // Caixa de seleção marcada (presença)
        // Insira a presença do aluno na tabela de presenças do banco de dados
    //     $sql = "INSERT INTO Presencas (Aluno, DataDaAula, Presenca) VALUES ('$alunoID', NOW(), 'Presente')";
        

        
    // } else {
        // Caixa de seleção não marcada (ausência)
        // Insira a ausência do aluno na tabela de ausências do banco de dados

//         $sql = "INSERT INTO Presencas (Aluno, DataDaAula, Presenca) VALUES ('$alunoID', NOW(), 'Presente')";
        
//     }
    

//     if ($conn->query($sql) !== TRUE) {
//         echo "Erro ao inserir dados: " . $conn->error;
//     }
// }



?>