<h1>Все посты</h1><br>

<?php if(!$this->dx_auth->is_admin()) { ?>
<?php foreach ($posts as $key => $value): ?>
	<p><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a>
<?php endforeach ?>
<?php   } ?>

<?php if($this->dx_auth->is_admin()) { ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-left">Название поста</th>
      <th class="text-center">Действие #1</th>
      <th class="text-center">Действие #2</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($posts as $key => $value): ?>
      <tr>
        <td class="text-left vert-align"><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></td>
        <td class="text-center vert-align"><a href="edit/<?php echo $value['slug']; ?>">Обновить</a></td>
        <td class="text-center vert-align"><a href="delete/<?php echo $value['slug']; ?>">Удалить</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<p><a href="create"><input type="submit" class="btn btn-success" name="submit" value="Добавить пост"></a></p><br>
<?php   } ?>
<br><br><br>