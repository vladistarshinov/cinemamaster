<form action="" method="post">

	<input class="form-control input-lg" type="input" name="slug" value="<?php echo $slug_movies; ?>" placeholder="Тип фильма"><br>
	<input class="form-control input-lg" type="input" name="name" value="<?php echo $name_movies; ?>" placeholder="Название фильма"><br>
	<textarea class="form-control input-lg" name="descriptions" placeholder="описание"><?php echo $descriptions_movies; ?></textarea><br>
	<input class="form-control input-lg" type="input" name="year" value="<?php echo $year_movies; ?>" placeholder="Год"><br>
	<input class="form-control input-lg" type="input" name="rating" value="<?php echo $rating_movies; ?>" placeholder="Рейтинг"><br>
	<input class="form-control input-lg" type="input" name="poster" value="<?php echo $poster_movies; ?>" placeholder="Ссылка на постер"><br>
	<input class="form-control input-lg" type="input" name="player_code" value="<?php echo $player_code_movies; ?>" placeholder="Ссылка на плеер"><br>
	<input class="form-control input-lg" type="input" name="director" value="<?php echo $director_movies; ?>" placeholder="Режиссер"><br>
	<input class="form-control input-lg" type="input" name="add_date" value="<?php echo $add_date_movies; ?>" placeholder="Дата добавления"><br>
	<input class="form-control input-lg" type="input" name="category_id" value="<?php echo $category_id_movies; ?>" placeholder="Категория (1=фильм; 2=сериал)"><br>
	<input type="submit" class="btn btn-success" name="submit" value="Редактировать фильм/сериал">

</form>