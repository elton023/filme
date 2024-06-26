<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Cadastro de Filmes</title>   
</head>
<body>
    <div class="container">
        <h2>Cadastro de filmes</h2>
        <form action="processa_filmes.php" method="POST">
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" id="categoria" name="categoria" required>
            </div>
            <div class="form-group">
                <label for="direcao">Direção:</label>
                <input type="text" id="direcao" name="direcao" required>
            </div>
            <div class="form-group">
                <label for="elenco">Elenco:</label>
                <input type="text" id="elenco" name="elenco" required>
                
            </div>
            <div class="form-group">
                <a href=""><button type="submit">Cadastrar</button></a>
            </div>
           
            <div class="form-group">
                <a href="index.php"><button type="button">Voltar</button></a>
            </div>
        </form>
    </div>
    
</body>
</html>