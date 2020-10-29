<?php
require "../conexao/conexao.php";

session_start();

$conexao = new Conexao();
$conexao = $conexao->conectar();

$login = $_POST['login'];
$senha = $_POST['senha'];

//verificando user do DB
$query = "SELECT * FROM users WHERE login = :login AND senha = :senha";
$stmt = $conexao->prepare($query);
$stmt->bindValue(':login', $_POST['login']);
$stmt->bindValue(':senha', $_POST['senha']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);

if( !empty($user) ){
    $_SESSION['email'] = $user->login;
    $_SESSION['senha'] = $user->senha;

    header('location:../listagem/lista.php');
} else{
    header('location:../index.php?erro=invalido');
}