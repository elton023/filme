<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // CONEXAO COM BANCO DE DADOS
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_avaliacao";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Erro na conexão com o banco e dados:" . $conn->connect_error);
    }

    // captura os dados do formulario
    $titulo = $_POST["titulo"];
    $categoria = $_POST["categoria"];
    $direcao = $_POST["direcao"];
    $elenco = $_POST["elenco"];

    // sql para inserir os dados coletados na tabela clientes
    $sql = "INSERT INTO tb_avaliacaofilmes (titulo, categoria, direcao, elenco) VALUES ('$titulo', '$categoria', '$direcao', '$elenco')";

    if($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar:" . $conn->error;

    
    } 
    $conn->close();
}

?>

<a href="index.php">Voltar</a>
