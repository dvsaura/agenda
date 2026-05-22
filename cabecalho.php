<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Agenda PHP</title>
<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f4f4;
    margin:0;
}
nav{
    background:#222;
    padding:15px;
}
nav a{
    color:#fff;
    text-decoration:none;
    margin-right:20px;
    font-weight:bold;
}
footer{
    background:#222;
    color:white;
    text-align:center;
    padding:10px;
    margin-top:20px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}
.container{
    width:90%;
    margin:20px auto;
    background:#fff;
    padding:20px;
    border-radius:10px;
}
table{
    width:100%;
    border-collapse:collapse;
}
table th, table td{
    border:1px solid #ccc;
    padding:10px;
}
table th{
    background:#333;
    color:#fff;
}
.btn{
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
    color:white;
}
.btn-editar{
    background:black;
}
.btn-excluir{
    background:gray;
}
.btn-cadastrar{
    background:black;
}
input, textarea{
    width:100%;
    padding:10px;
    margin-bottom:10px;
}
img{
    border-radius:5px;
}
</style>
</head>
<body>

<nav>
    <a href="index.php">Contatos</a>
    <a href="clientes.php">Clientes</a>
    <a href="produtos.php">Produtos</a>
</nav>

<div class="container">
