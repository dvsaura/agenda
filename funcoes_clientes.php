<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu crio uma função para reutilizar código
function obterClientes(PDO $pdo): array{
    $stmt = $pdo->query("SELECT * FROM clientes ORDER BY id DESC");
    return $stmt->fetchAll();
}

function exibirTabelaClientes(array $clientes): void{
    // Aqui eu mostro informações na tela
echo '<h2>Lista de Clientes</h2>';
    echo '<a class="btn btn-cadastrar" href="cadastro_cliente.php">Novo Cliente</a><br><br>';

    echo '<table>';
    echo '<tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
          </tr>';

    // Aqui eu percorro vários itens de uma lista
foreach($clientes as $cliente){
        echo '<tr>';
        echo '<td>'.$cliente['id'].'</td>';
        echo '<td>'.htmlspecialchars($cliente['nome']).'</td>';
        echo '<td>'.htmlspecialchars($cliente['cpf']).'</td>';
        echo '<td>'.htmlspecialchars($cliente['email']).'</td>';
        echo '<td>'.htmlspecialchars($cliente['telefone']).'</td>';
        echo '<td>'.htmlspecialchars($cliente['endereco']).'</td>';
        echo '<td>
                <a class="btn btn-editar" href="editar_cliente.php?id='.$cliente['id'].'">Editar</a>
                <a class="btn btn-excluir" href="excluir_cliente.php?id='.$cliente['id'].'">Excluir</a>
              </td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>
