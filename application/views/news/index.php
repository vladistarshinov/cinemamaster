<h1>Все новости</h1><br>

<?php if(!$this->dx_auth->is_admin()) { ?>
<?php foreach ($news as $key => $value): ?>
	<p><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a>
<?php endforeach ?>
<?php   } ?>

<?php if($this->dx_auth->is_admin()) { ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-left">Название новости</th>
      <th class="text-center">Действие #1</th>
      <th class="text-center">Действие #2</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($news as $key => $value): ?>
      <tr>
        <td class="text-left vert-align"><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></td>
        <td class="text-center vert-align"><a href="edit/<?php echo $value['slug']; ?>">Обновить</a></td>
        <td class="text-center vert-align"><a href="delete/<?php echo $value['slug']; ?>">Удалить</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<p><a href="create"><input type="submit" class="btn btn-success" name="submit" value="Добавить новость"></a></p><br>
<?php   } ?>
<br><br><br>
