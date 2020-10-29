<?php

    //conexao
    require "../conexao/conexao.php";
    $conec = new Conexao();
    $conec = $conec->conectar();

    //imagem
    $imgTemp = $_FILES['img']['tmp_name'];
    $img = $_FILES['img']['name'];

    //tratamento da imagem


    //inserindo valores no bd com ou sem imagem
    $query = "";
    $tem_imagem = @move_uploaded_file($imgTemp, "img_produtos/$img");
    if( $tem_imagem ){
        //retorno true == com imagem
        $query = "INSERT INTO produto(nome, descricao, id_area, moeda, preco_uni, pais_origem, imagem) VALUES(:nome, :descricao, :area, :moeda, :preco, :pais, :imagem)";
    } else {
        //retorno false == sem imagem
        $query = "INSERT INTO produto(nome, descricao, id_area, moeda, preco_uni, pais_origem) VALUES(:nome, :descricao, :area, :moeda, :preco, :pais)";
    }

    $stmt = $conec->prepare($query);

    //bind values
    $stmt->bindValue(':nome', $_POST['nome']);
    $stmt->bindValue(':descricao', $_POST['desc']);
    $stmt->bindValue(':area', $_POST['area']);
    $stmt->bindValue(':moeda', $_POST['moeda']);
    $stmt->bindValue(':preco', $_POST['preco']);
    $stmt->bindValue(':pais', $_POST['pais']);
    if ($tem_imagem) { $stmt->bindValue(':imagem', $img); }

    $stmt->execute();

    print_r($stmt->errorInfo());

    header('Location:../listagem/lista.php');