<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/style.css" />

    <title>XNEO Tarefas</title>
</head>

<body>
    <header>
    <ul>
    <?php if(!isLoggedIn()): ?>
    <li><a class="active" href="/">Acessar</a></li>
    <li><a href="/cadastrar">Cadastrar</a></li>
    <?php endif; ?>

    <?php if(isLoggedIn()): ?>
    <li><a href="/tarefas">Tarefas</a></li>
    <li><a href="/sair">Sair</a></li>
    <?php endif; ?>
    </ul>
    </header>
    <main>