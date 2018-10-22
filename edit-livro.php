<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<?php


session_start();
		$nome = $_SESSION['nome'];
		$email = $_SESSION['user'];
		$idade = $_SESSION['idade'];
		$senha = $_SESSION['password'];

require_once ("conection/conexao.php");

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$qtd = $_POST["qtd"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $POST["categoria"];

if($_FILES['image']['name']==""){
    $imagem = $_POST["imagem-text"];
}else{
    $arquivo = $_FILES['image']['name'];
    $imagem = "images/".$arquivo;
    echo $arquivo;

    move_uploaded_file($_FILES['image']['tmp_name'],$imagem);
}

$erro = 0;

if ($erro == 0) {

	$busca="UPDATE livro SET autor='$autor', titulo='$titulo', preco=$preco, imagem='$imagem', qtd=$qtd, descricao='$descricao' WHERE id=$id";
    $dados = mysql_query($busca);
    // transforma os dados em um array
    //$linha = mysql_fetch_assoc($dados);
	if (!$dados) {
        
        echo "Erro";

	} else{

        header('location:pages/cadastrados-page.php');
	}
}
?>
</body>
</html>