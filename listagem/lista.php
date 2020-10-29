<?php
require '../login/verificaLogin.php';

require "../conexao/conexao.php";
$conexao = new Conexao();
$bd = $conexao->conectar();

#paginação
//verificar página atual(por url) e atribui-la
$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

//lista_produtos
$query = "SELECT * FROM produto";
$stmt = $bd->prepare($query);
$stmt->execute();
$lista = $stmt->fetchAll(PDO::FETCH_OBJ);

//contar produtos
$total = count($lista);

//total de linhas por página = 10

//numero de páginas necessárias
$numPags = ceil($total / 10);

//variável para calcular o inicio da visualização com pase na pagina atual
$inicio = (10 * $pag) - 10;

//próxima pág / pág anterior
$nextPag = $pag == $numPags ? $pag : $pag + 1;
$prevPag = $pag == 1 ? $pag : $pag - 1;

//selecionar de 15 em 15
$query = "SELECT * FROM produto LIMIT $inicio, 10";
$stmt = $bd->prepare($query);
$stmt->execute();
$lista = $stmt->fetchAll(PDO::FETCH_OBJ);

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

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/fa019dc073.js" crossorigin="anonymous"></script>

    <!-- Centralizar tabela -->
    <style>
        .table tbody tr .item{
            vertical-align: middle;
        }
    </style>

    <!-- Ações dos botões (editar e excluir) -->
    <script src="acoes.js"></script>

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
                        <a class="nav-link active mx-3" href="#">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active mx-3" href="../cadastro/cadastro.php">Cadastrar produto</a>
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
            <h1 class="display-4">Listagem uau</h1>
            <p class="lead">Bó listar esses produtos consagrado</p>
            <hr class="my-4">
            <p>Listagem fofinhaaaaa</p>
        </div>

        <table class="table table-stripped">
            <thead class="thead-dark">
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Área</th>
                    <th>Preço</th>
                    <th>País</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <?foreach($lista as $i => $p){ ?>
            <tbody>
                <tr>
                    <td> <img src="../cadastro/img_produtos/<?=$p->imagem?>" style="width: 120px; border-radius: 50px; cursor: pointer" onclick="visualizar('<?=$p->imagem?>')"> </td>
                    <td class="item"><?= $p->nome ?> </td>
                    <td class="item"><?= $p->descricao ?></td>
                    <td class="item"><?= $p->id_area ?></td>
                    <td class="item"><?= $p->moeda ?> <?= $p->preco_uni ?></td>
                    <td class="item"><?= $p->pais_origem ?></td>
                    <td class="item"> <button class="btn btn-primary" onclick="editar(<?=$p->id_produto?>, '<?=$p->nome?>', '<?=$p->descricao?>', <?=$p->id_area?>, '<?=$p->moeda?>', <?=$p->preco_uni?>, '<?=$p->pais_origem?>')"> <i class="fas fa-edit"></i> </button> </td>
                    <td class="item"> <button class="btn btn-danger" onclick="excluir(<?=$p->id_produto?>)"> <i class="fas fa-trash"></i> </button> </td>
                </tr>
            </tbody>
            <?}?>
        </table>
        <nav aria-label="Navegação de página exemplo">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="lista.php?pag=1"> &laquo; </a></li>

                <li class="page-item"><a class="page-link" href="lista.php?pag=<?= $prevPag ?>">
                        < </a> </li> <li class="page-item"><a class="page-link"> <?= $pag ?> </a></li>
                <li class="page-item"><a class="page-link" href="lista.php?pag=<?= $nextPag ?>"> > </a></li>

                <li class="page-item"><a class="page-link" href="lista.php?pag=<?= $numPags ?>"> &raquo; </a></li>
            </ul>
        </nav>
    </div>

</body>

</html>