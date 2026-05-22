<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu crio uma função para reutilizar código
function obterProdutos(PDO $pdo): array{
    $stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
    return $stmt->fetchAll();
}

function exibirTabelaProdutos(array $produtos): void{
    // Aqui eu mostro informações na tela
echo '<h2>Produtos</h2>';
    echo '<a class="btn btn-cadastrar" href="cadastro_produto.php">Novo Produto</a><br><br>';

    echo '<table>';
    echo '<tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Imagem</th>
          </tr>';

    // Aqui eu percorro vários itens de uma lista
foreach($produtos as $produto){
        echo '<tr>';
        echo '<td>'.htmlspecialchars($produto['nome']).'</td>';
        echo '<td>'.htmlspecialchars($produto['descricao']).'</td>';
        echo '<td>R$ '.number_format($produto['preco'],2,',','.').'</td>';
        echo '<td>'.$produto['estoque'].'</td>';

        // Aqui eu verifico uma condição antes de executar algo
if(!empty($produto['imagem'])){
            echo '<td><img src="uploads/'.$produto['imagem'].'" width="70"></td>';
        } else {
            echo '<td>Sem imagem</td>';
        }

        echo '</tr>';
    }

    echo '</table>';
}
?>
