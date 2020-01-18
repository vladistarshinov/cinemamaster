<form action="" method="post">

	<input class="form-control input-lg" type="input" name="slug" value="<?php echo $slug_news; ?>" placeholder="Тип новости (латиницей)"><br>
	<input class="form-control input-lg" type="input" name="title" value="<?php echo $title_news; ?>" placeholder="Название новости"><br>
	<textarea class="form-control input-lg" name="text" placeholder="Текст новости"><?php echo $content_news; ?></textarea><br>
	<input type="submit" class="btn btn-success" name="submit" value="Редактировать новость">

</form>