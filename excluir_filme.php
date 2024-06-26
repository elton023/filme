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

        $sql = "DELETE FROM tb_avaliacaofilmes WHERE id = $tb_avaliacaofilmes_id";

        //header = redireciona para a pagina cliente.php
        if ($conn->query($sql) === TRUE){
            header("Location: lista_filmes.php?excluido=true");
            exit;

        }   else {
                echo "Erro ao excluir o filme " . $conn->error;
        }
        $conn->close();

    } else {
        echo "Filme não especificado para exclusão.";
    }


?>