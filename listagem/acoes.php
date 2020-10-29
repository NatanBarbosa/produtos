<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produtos </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/fa019dc073.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-3">
    <?
        $acao = $_GET['acao'];

        if($acao == 'visualizar'){
    ?>
        <div class="text-center">
            <img src="../cadastro/img_produtos/<?=$_GET['img']?>" class="img-fluid">
        </div>

    <? } else if ($acao == 'editar'){
            //form para editar produto
    ?>
        <h1 class="h3"> Editar produto "<em><?=$_GET['nome']?></em>" </h1>

        <form action="editar.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" value="<?=$_GET['id']?>" name="id">

            <label for="nome" class="font-weight-bold">Nome do produto</label>
            <div class="input-group">
                <input type="text" id="nome" name="nome" class="form-control" value="<?=$_GET['nome']?>">
            </div>

            <br>

            <label for="desc" class="font-weight-bold">Descrição do produto</label>
            <div class="input-group">
                <textarea type="text" id="desc" name="desc" class="form-control"> <?=$_GET['desc']?> </textarea>
            </div>

            <br>

            <label for="area" class="font-weight-bold">Área do produto</label>
            <div class="input-group">
                <select id="area" name="area" class="form-control"> 
                    <option value="">Selecione a área</option>
                    <option value="1" <?if($_GET['area'] == '1'){ echo "selected"; }?>>Eletrodomésticos</option>
                    <option value="2" <?if($_GET['area'] == '2'){ echo "selected"; }?>>Informática</option>
                </select>
            </div>

            <br>

            <label for="preco" class="font-weight-bold">Preço</label>
            <div class="input-group">
                <input type="text" id="preco" name="preco" class="form-control" value="<?=$_GET['preco']?>">
            </div>

            <br>

            <label for="moeda" class="font-weight-bold">Moeda</label>
            <div class="input-group">
                <select id="moeda" name="moeda" class="form-control" value="<?=$_GET['moeda']?>"> 
                    <option value="">Selecione o tipo de moeda</option>
                    <option value="R$" <?if($_GET['moeda'] == 'R$'){ echo "selected"; }?> >R$ - (real)</option>
                    <option value="U$" <?if($_GET['moeda'] == 'U$'){ echo "selected"; }?> >U$ - (dolar americano)</option>
                </select>
            </div>

            <br>

            <label for="pais" class="font-weight-bold">País de origem</label>
            <div class="input-group">
                <input type="text" id="pais" class="form-control" name="pais" value="<?=$_GET['pais']?>"> 
            </div>

            <br>

            <label for="img" class="font-weight-bold">Imagem do produto</label>
            <div class="input-group">
                <input type="file" id="img" name="img" class="filestyle">
            </div>

            <br>

            <button type="submit" class="btn btn-info">Editar</button>
            <a href="lista.php" class="btn btn-danger">Cancelar</a>

        </form>
                   
    </div>

</body>

</html>

<?php

} else if ($acao == 'excluir') {
    require "../conexao/conexao.php";
    $conec = new Conexao();
    $conec = $conec->conectar();

    $query = "DELETE FROM produto WHERE id_produto = :id";
    $stmt = $conec->prepare($query);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();

    header('Location: lista.php');

}

?>