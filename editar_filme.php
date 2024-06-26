<?php
    //verifica se um cliente foi selecionado para ediçao
if (isset ($_GET["id"])){
    $tb_avaliacaofilmes_id = $_GET["id"];
    
    // Conexão com banco de dados 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_avaliacao";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    
    //obter os dados dos cliente para ediçao
    $sql ="SELECT * FROM tb_avaliacaofilmes WHERE id = $tb_avaliacaofilmes_id";
    $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        else{
            echo "Cliente nao encontrado.";
            exit;
    }

    //processa o formulario para ediçao quando enviado
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $novo_titulo = $_POST["titulo"];
        $novo_categoria = $_POST["categoria"];
        $novo_direcao = $_POST["direcao"];
        $novo_elenco = $_POST["elenco"];

        //atualizar os dados do cliente no banco de dados
        $sql = "UPDATE tb_avaliacaofilmes SET titulo = '$novo_titulo',  categoria ='$novo_categoria', direcao = '$novo_direcao', elenco = '$novo_elenco' WHERE id = $tb_avaliacaofilmes_id";
        
        if ($conn->query($sql) === TRUE){
            header("Location: lista_filmes.php?excluido=true");
            exit;

        }else{
            echo "Erro ao atualizar os dados:" . $conn->erro;
        }


    }

    $conn->close();
}   else{
    echo "Cliente nao especificado para a edição";
    exit;


    }
?>        

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar filmes</title>
</head>
<body>
    <h1>Editar filmes</h1>
    <form action=""method="POST">
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo $row ["titulo"]; ?>" required><br>

    <label for="categoria">Categoria:</label>
    <input type="categoria" id="categoria" name="categoria" value="<?php echo $row ["categoria"]; ?>" required><br>

    <label for="direcao">Direção:</label>
    <input type="text" id="direcao" name="direcao" value="<?php echo $row ["direcao"]; ?>" required><br>

    <label for="elenco">Elenco</label>
    <input type="text" id="elenco" name="elenco" value="<?php echo $row ["elenco"]; ?>" required><br>

    <input type="submit" value="Salvar Alterações">
    </form>
    
    <br><a href="lista_filmes.php">Voltar</a>

    
</body>
</html>
        
