function visualizar(imagem){
    location.href = `acoes.php?acao=visualizar&img=${imagem}`
}

function editar(id_produto, nome, desc, area, moeda, preco, pais) {
    location.href = `acoes.php?acao=editar&id=${id_produto}&nome=${nome}&desc=${desc}&area=${area}&moeda=${moeda}&preco=${preco}&pais=${pais}`
}

function excluir(id_produto) {
    if( confirm("Você tem certeza que deseja excluir esse produto?") ){
        location.href = `acoes.php?acao=excluir&id=${id_produto}`
    }
}