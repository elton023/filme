<?php
//verifica se um cliente foi selecionado para ediçao
if (isset ($_GET["id"])){
    $cliente_id = $_GET["id"];
    
    //conexao com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password =   "";
    $dbnome = "bd_avaliacao";

    $conn = new mysqli($servername, $username, $password, $dbnome);
        
        if ($conn->connect_error) {
            die("Erro na conexao com o banco de dados: " .$conn->connect_error);
        } 

    $sql = "DELETE FROM tb_avaliacaofilmes WHERE id = $tb_avaliacaofilmes_id";

    //header = redireciona para a pagina cliente.php
    if ($conn->query($sql) === TRUE){
        header("Location: clientes.php?excluido=true");
        exit;

    }   else {
            echo "Erro ao excluir o cliente " . $conn->error;
    }
    $conn->close();

    } else {
        echo "Cliente não especificado para exclusão.";
    }


?>