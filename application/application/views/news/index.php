<h1>Все новости</h1>

<?php foreach ($news as $key => $value): ?>
	<p><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a> | 
	<a href="edit/<?php echo $value['slug']; ?>">Изменить</a> | 
	<a href="delete/<?php echo $value['slug']; ?>">Удалить</a></p>
<?php endforeach ?>

<p><a href="create">Добавить новость</a></p><br>