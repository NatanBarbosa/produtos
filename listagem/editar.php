<?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    #conexao
    require "../conexao/conexao.php";
    $conec = new Conexao();
    $conec = $conec->conectar();

    #pegando a imagem
    $imgtemp = $_FILES['img']['tmp_name'];
    $img = $_FILES['img']['name'];

    #editando os valores
    $query = "";
    $tem_imagem = @move_uploaded_file($imgtemp,"../cadastro/img_produtos/$img");

    if( $tem_imagem ){
        //retorno true == com imagem
        $query = "UPDATE produto SET nome = :nome, descricao = :descricao, id_area = :area, moeda = :moeda, preco_uni = :preco, pais_origem = :pais, imagem = :imagem where id_produto = :id_produto;";
    } else {
        //retorno false == sem imagem
        $query = "UPDATE produto SET nome = :nome, descricao = :descricao, id_area = :area, moeda = :moeda, preco_uni = :preco, pais_origem = :pais where id_produto = :id_produto;";
    }

    $stmt = $conec->prepare($query);

    //bind values
    $stmt->bindValue(':id_produto', $_POST['id']);
    $stmt->bindValue(':nome', $_POST['nome']);
    $stmt->bindValue(':descricao', $_POST['desc']);
    $stmt->bindValue(':area', $_POST['area']);
    $stmt->bindValue(':moeda', $_POST['moeda']);
    $stmt->bindValue(':preco', $_POST['preco']);
    $stmt->bindValue(':pais', $_POST['pais']);
    if ($tem_imagem) { $stmt->bindValue(':imagem', $img); }

    $stmt->execute();

    header('Location: lista.php');