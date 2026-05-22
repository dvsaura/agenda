<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação
require_once 'config.php';

$erro = '';

// Aqui eu verifico uma condição antes de executar algo
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $preco = str_replace(',', '.', $_POST['preco']);
    $estoque = (int)$_POST['estoque'];

    $nomeArquivo = null;

    if($preco <= 0){
        $erro = 'Preço inválido.';
    }

    if($estoque < 0){
        $erro = 'Estoque inválido.';
    }

    if(!empty($_FILES['imagem']['name'])){
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $permitidos = ['jpg','jpeg','png','webp'];

        $mime = mime_content_type($_FILES['imagem']['tmp_name']);

        $mimesPermitidos = ['image/jpeg', 'image/png', 'image/webp'];

        if(!in_array(strtolower($extensao), $permitidos) || !in_array($mime, $mimesPermitidos)){
            $erro = 'Tipo de imagem não permitido.';
        } else {
            $nomeArquivo = uniqid('prod_') . '.' . $extensao;
            move_uploaded_file($_FILES['imagem']['tmp_name'], 'uploads/' . $nomeArquivo);
        }
    }

    if(empty($erro)){
        $stmt = $pdo->prepare("INSERT INTO produtos(nome,descricao,preco,estoque,imagem) VALUES(?,?,?,?,?)");

        $stmt->execute([
            $nome,
            $descricao,
            $preco,
            $estoque,
            $nomeArquivo
        ]);

        header('Location: produtos.php');
        exit;
    }
}

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';
?>

<h2>Cadastrar Produto</h2>

<p style="color:red;"><?= $erro ?></p>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nome" placeholder="Nome do Produto" required>

    <textarea name="descricao" placeholder="Descrição"></textarea>

    <input type="number" step="0.01" min="0" name="preco" placeholder="Preço" required>

    <input type="number" min="0" name="estoque" placeholder="Estoque" required>

    <input type="file" name="imagem">

    <button class="btn btn-cadastrar">Salvar Produto</button>
</form>

<?php include 'rodape.php'; ?>
