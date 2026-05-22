<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu crio uma função para reutilizar código
function obterContatos(PDO $pdo): array {
    $stmt = $pdo->query("SELECT * FROM contatos ORDER BY id DESC");
    return $stmt->fetchAll();
}

function exibirTabelaContatos(array $contatos): void {
    // Aqui eu mostro informações na tela
echo '<h2>Lista de Contatos</h2>';
    echo '<a class="btn btn-cadastrar" href="cadastro_contato.php">Novo Contato</a><br><br>';

    echo '<table>';
    echo '<tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>';

    // Aqui eu percorro vários itens de uma lista
foreach($contatos as $contato){
        echo '<tr>';
        echo '<td>' . $contato['id'] . '</td>';
        echo '<td>' . htmlspecialchars($contato['nome']) . '</td>';
        echo '<td>' . htmlspecialchars($contato['email']) . '</td>';
        echo '<td>' . htmlspecialchars($contato['telefone']) . '</td>';
        echo '<td><a class="btn btn-editar" href="editar_contato.php?id=' . $contato['id'] . '">Editar</a></td>';
        echo '<td><a class="btn btn-excluir" href="excluir_contato.php?id=' . $contato['id'] . '">Excluir</a></td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>
