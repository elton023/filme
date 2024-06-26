<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de filmes </title>
</head>
<body>
    <h1>listar de  filmes </h1>

    <?php

    //conexao com banco de dados 
    $servername ="localhost";
    $username = "root";
    $password =   "";
    $dbnome = "bd_avaliacao";


        $conn = new mysqli($servername, $username, $password, $dbnome);

    if ($conn->connect_error) {
        die("Erro na conexao com o banco de dados: " .$conn->connect_error);
    }  
    //verificar se um cliente foi excluido 
    if (isset($GET ["excluido"]) && $_GET ["excluido"] == "true") {
        echo "<p>Cliente excluido com sucesso!</p>";

    }  
    //SQL para selecionar todos os clientes
    $sql = "SELECT * FROM tb_avaliacaofilmes";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>id</th><th>titulo</th><th>categoria</th><th>direcao</th><th>elenco</th><th>Ações</th></tr>";
   

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["titulo"] . "</td>";
        echo "<td>" . $row["categoria"] . "</td>";
        echo "<td>" . $row["direcao"] . "</td>";
        echo "<td>" . $row["elenco"] . "</td>";
        echo "<td>";
        echo "<a href='editar_cliente.php?id=". $row["id"] ."'>Editar</a>";
        echo "|";
        echo "<a href='excluir_cliente.php?id=". $row["id"] ."'>Excluir</a>";
        echo "</td";
        echo "<tr>";

    }
        echo "</table>";
    } 
    else{
            echo "Nenhum cliente cadastrado.";
    }

    $conn->close();

    ?>
    
</body>
</html>