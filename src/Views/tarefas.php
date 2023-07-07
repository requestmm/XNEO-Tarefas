<?php require_once dirname(__FILE__) . '/shared/header.php'; ?>

<h1>Tarefas</h1>

<div id="form-criar-tarefa">
    <form action="/action_page.php">
        <label for="email">Usuário</label>
        <select id="country" name="country">
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
        </select>

        <label for="senha">Descrição</label>
        <input type="password" id="senha" name="senha" placeholder="Senha">

        <button type="submit">
            Criar
        </button>

    </form>
</div>


<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Points</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>Adam</td>
    <td>Johnson</td>
    <td>67</td>
  </tr>
</table>


<?php require_once dirname(__FILE__) . '/shared/footer.php'; ?>