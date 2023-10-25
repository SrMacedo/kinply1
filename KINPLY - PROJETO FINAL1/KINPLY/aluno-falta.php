<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Ausências</title>
    <link rel="stylesheet" href="aluno-falta.css">
</head>
<body>



    <section class="verify">
    
    <a href="paginaaluno.php" id="voltar">Voltar</a>

        <div class="form">
            <form id="verificar-form" class="verificar-ausencia" action="verificar_ausencias" method="POST">
                <label for="matricula">Confirme seus dados</label><br>
                <input type="text" name="matricula" placeholder="Confirme sua matrícula">
                <input type="password" name="senha" placeholder="Confirme sua senha">
                <input type="submit" id="button" value="Verificar Ausências">
            </form>
        </div>

        
    </section>

    <div class="ceenter">    
        <div id="resultados" class="resultados">
                <h2 id="nome-aluno"></h2>
                <ul id="lista-ausencias" class="lista-ausencia"></ul>
        </div>
    </div>


    <script>
        document.getElementById("verificar-form").addEventListener("submit", function (event) {
            event.preventDefault();

            var matricula = document.querySelector('input[name="matricula"]').value;
            var senha = document.querySelector('input[name="senha"]').value;

            // Realizar uma solicitação AJAX para verificar as ausências
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "verificar_ausencias.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);

                    if (response.nomeAluno) {
                        // Exibe o nome do aluno e as ausências na página
                        document.getElementById("nome-aluno").textContent = "Ausências de " + response.nomeAluno;
                        var listaAusencias = document.getElementById("lista-ausencias");
                        listaAusencias.innerHTML = "";
                        response.ausencias.forEach(function (ausencia) {
                            var listItem = document.createElement("li");
                            listItem.textContent = "Data da Aula: " + ausencia.DataDaAula + " - Status: " + ausencia.Ausencia;
                            listaAusencias.appendChild(listItem);
                        });
                        document.getElementById("resultados").style.display = "block";
                    } else if (response.error) {
                        // Exibe uma mensagem de erro
                        alert(response.error);
                    }
                }
            };

            xhr.send("matricula=" + matricula + "&senha=" + senha);
        });
    </script>
</body>
</html>
