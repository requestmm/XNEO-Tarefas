<?php require_once dirname(__FILE__) . '/shared/header.php'; ?>

<h1>Tarefas</h1>



<div id="form-criar-tarefa">
    <form action="javascript:void(0);" id="formulario-criar-tarefa">
        <label for="usuario">Usuário</label>
        <select id="usuario" name="usuario_id">

        <?php
        foreach ($usuarios as $usuario):
        ?>
        <option value="<?=$usuario["id"];?>"><?=$usuario["email"];?></option>
        <?php
        endforeach;
        ?>
        </select>

        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" placeholder="Descrição">

        <button type="submit">
            Criar
        </button>

    </form>
</div>

<br />
<br />

<table>
<thead>
  <tr>
    <th>Usuário</th>
    <th>Descrição</th>
    <th>Situação</th>
    <th>Ação</th>
  </tr>
  </thead>
  <tbody>
    <?php
    foreach($tarefas as $tarefa):
    ?>
    <tr>
    <form class="salvar-tarefa" action="javascript:void(0);" data-id="<?=$tarefa["tarefa_id"];?>">
    <input name="tarefa_id" type="hidden" value="<?=$tarefa["tarefa_id"];?>" />
    <td><?=$tarefa["email"];?></td>
    <td>
      <textarea name="descricao">
        <?=$tarefa["descricao"];?>
      </textarea>
    </td>
    <td><?=($tarefa["situacao"]==1? "Concluída":"Aguardando");?></td>
    <td>
      
        <select name="acao">
          <option value="1">Concluída</option>
          <option value="0">Aguardando</option>
          <option value="-1">Remover</option>
        </select>

        <button type="submit" class="button button2">
            Salvar
        </button>
      
    </td>
    </form>
  </tr>
    <?php
    endforeach;
    ?>
  
  </tbody>
</table>


<?php require_once dirname(__FILE__) . '/shared/footer.php'; ?>