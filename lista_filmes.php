<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de filmes</title>
</head>
<body>
    <h1>Lista de filmes</h1>

    <?php
    // Conexão com banco de dados 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_avaliacao";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    
    // Verificar se um filme foi excluído
    //if (isset($_GET["excluido"]) && $_GET["excluido"] == "true") {
    //    echo "<p>Filme excluído com sucesso!</p>";
    //}  

    // SQL para selecionar todos os filmes
    $sql = "SELECT * FROM tb_avaliacaofilmes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Id</th><th>Título</th><th>Categoria</th><th>Direção</th><th>Elenco</th><th>Ações</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["titulo"] . "</td>";
            echo "<td>" . $row["categoria"] . "</td>";
            echo "<td>" . $row["direcao"] . "</td>";
            echo "<td>" . $row["elenco"] . "</td>";
            echo "<td>";
            echo "<a href='editar_filme.php?id=". $row["id"] ."'>Editar</a> | ";
            echo "<a href='excluir_filme.php?id=". $row["id"] ."'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum filme cadastrado.";
    }

    $conn->close();
    ?>
    
</body>
</html>
