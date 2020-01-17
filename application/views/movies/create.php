<form action="/movies/create/" method="post">
	
	<input class="form-control input-lg" type="input" name="slug" placeholder="Тип фильма"><br>
	<input class="form-control input-lg" type="input" name="name" placeholder="Название фильма"><br>
	<textarea class="form-control input-lg" name="descriptions" placeholder="Описание"></textarea><br>
	<input class="form-control input-lg" type="input" name="year" placeholder="Год"><br>
	<input class="form-control input-lg" type="input" name="rating" placeholder="Рейтинг"><br>
	<input class="form-control input-lg" type="input" name="poster" placeholder="Ссылка на постер"><br>
	<input class="form-control input-lg" type="input" name="player_code" placeholder="Ссылка на плеер"><br>
	<input class="form-control input-lg" type="input" name="director" placeholder="Режиссер"><br>
	<input class="form-control input-lg" type="input" name="add_date" value="<?php echo date("Y-m-d")." ".date("h:i:s"); ?>"><br>
	<input class="form-control input-lg" type="input" name="category_id" placeholder="Категория (1=фильм; 2=сериал)"><br>
	<input type="submit" class="btn btn-success" name="submit" value="Добавить фильм/сериал">

</form>