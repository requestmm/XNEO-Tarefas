<?php require_once dirname(__FILE__) . '/shared/header.php'; ?>

<h1>Cadastrar</h1>

<div id="form-cadastrar">
    <form action="/api/usuarios" method=POST>
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="E-mail">

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Senha">

        <button type="submit">
            Cadastrar
        </button>

    </form>
</div>
<?php require_once dirname(__FILE__) . '/shared/footer.php'; ?>