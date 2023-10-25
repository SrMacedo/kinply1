<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', 'stephanyc0574**', 'Senai');

    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }
}

    function inserir()
    {

    }

    function verifcar_existe($email)
    {
        $stmt = pdo()->prepare("SELECT * ");
    }
    



    $conn->close();

?>
