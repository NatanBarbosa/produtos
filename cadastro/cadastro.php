<?php
require '../login/verificaLogin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">

        <header class="container">
            <a class="navbar-brand" href="#">Lista <br> Produtos</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link active mx-3" href="../listagem/lista.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active mx-3" href="#">Cadastrar produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger mx-3" href="../login/doLogout.php"> Sair </a>
                    </li>
                </ul>
            </div>
        </header>

    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Cadastro de novos produtos</h1>
            <p class="lead">Cadastrar novos produtos para o banco de dados</p>
        </div>

        
        <form action="docad.php" method="POST" enctype="multipart/form-data">

            <label for="nome" class="font-weight-bold">Nome do produto</label>
            <div class="input-group">
                <input type="text" id="nome" name="nome" class="form-control">
            </div>

            <br>

            <label for="desc" class="font-weight-bold">Descrição do produto</label>
            <div class="input-group">
                <textarea type="text" id="desc" name="desc" class="form-control"></textarea>
            </div>

            <br>

            <label for="area" class="font-weight-bold">Área do produto</label>
            <div class="input-group">
                <select id="area" name="area" class="form-control"> 
                    <option value="">Selecione a área</option>
                    <option value="1">Eletrodomésticos</option>
                    <option value="2">Informática</option>
                </select>
            </div>

            <br>

            <label for="preco" class="font-weight-bold">Preço</label>
            <div class="input-group">
                <input type="text" id="preco" name="preco" class="form-control">
            </div>

            <br>

            <label for="moeda" class="font-weight-bold">Moeda</label>
            <div class="input-group">
                <select id="moeda" name="moeda" class="form-control"> 
                    <option value="">Selecione o tipo de moeda</option>
                    <option value="R$">R$ - (real)</option>
                    <option value="U$">U$ - (dolar americano)</option>
                </select>
            </div>

            <br>

            <label for="pais" class="font-weight-bold">País de origem</label>
            <div class="input-group">
                <input type="text" id="pais" name="pais" class="form-control">
            </div>

            <br>

            <label for="img" class="font-weight-bold">Imagem do produto</label>
            <div class="input-group">
                <input type="file" id="img" name="img" class="filestyle">
            </div>

            <br>

            <button class="btn btn-success">Cadastrar</button>
            <button type="reset" class="btn btn-danger">limpar</button>

        </form>
        
    </div>

</body>

</html>