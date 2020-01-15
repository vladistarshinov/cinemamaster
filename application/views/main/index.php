			<!-- CONTENT (index) start -->

            <h2>Новые фильмы</h2>
					<hr>
					<div class="row">

						<?php foreach ($movie as $key => $value): ?>
							<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<a href="/movies/view/<?php echo $value['slug']; ?>/"><img src="<?php echo $value['poster']; ?>" alt="<?php echo $value['poster']; ?>"></a>
								<div class="films__label"><?php echo $value['name']; ?></div>
							</div>
						<?php endforeach ?>

					</div>
					
					<div class="margin-8"></div>

					<h2>Новые сериалы</h2>
					<hr>

					<div class="row">

					<?php foreach ($serials as $key => $value): ?>
							<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<a href="/movies/view/<?php echo $value['slug']; ?>/"><img src="<?php echo $value['poster']; ?>" alt="<?php echo $value['poster']; ?>"></a>
								<div class="films__label"><?php echo $value['name']; ?></div>
							</div>
						<?php endforeach ?>
					</div>

					<div class="margin-8"></div>

					<a href="#"><h3>Как снимали Интерстеллар</h3></a>
					<hr>
					<p>45 лет исполнилось Кристоферу Нолану — одному из самых успешных режиссеров 
						нашего времени, чьи работы одинаково любимы как взыскательными критиками, 
						так и простыми зрителями. Фильмом изначально занималась студия Paramount. 
						Когда Кристофер Нолан занял место режиссера, студия Warner Bros., которая 
						выпускала его последние фильмы, добилась участия в проекте.</p>
					<a href="#" class="btn btn-warning pull-right">Читать</a>
					
					<div class="margin-8"></div>

					<a href="#"><h3>Актер Том Хенкс поделился впечатлением о фестивале</h3></a>
					<hr>
					<p>16 февраля в Лондоне состоялась 67-я церемония вручения наград Британской 
						киноакадемии. Леонардо ДиКаприо, Брэд Питт, Анджелина Джоли, Кейт Бланшетт, 
						Хелен Миррен, Эми Адамс, Кристиан Бэйл, Альфонсо Куарон и другие гости и 
						победители премии — в нашем репортаже.</p>	
					<a href="#" class="btn btn-warning pull-right">Читать</a>

					<div class="margin-8 сlear"></div>

				</div>

				<div class="col-lg-3 col-lg-pull-9"> <!-- Меняем блоки местами col-lg-pull-9 -->
					<div class="panel panel-info hidden-xs">
						<div class="panel-heading">
							<div class="sidebar-header">Поиск</div>
						</div>
						<div class="panel-body">
							<form role="search">
								<div class="form-group">
									<div class="input-group">
										<input type="search" class="form-control input-lg" placeholder="Ваш запрос">
										<div class="input-group-btn">
											<button class="btn btn-default btn-lg" type="submit">
												<i class="glyphicon glyphicon-search"></i>
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="sidebar-header">Авторизация</div>
						</div>
						<div class="panel-body">
							<form role="form">
								<div class="form-group">
									<input type="text" class="form-control input-lg" placeholder="Логин">
								</div>
								<div class="form-group">
									<input type="password" class="form-control input-lg" placeholder="Пароль">
								</div>
								<button type="submit" class="btn btn-warning pull-right">Вход</button>
							</form>
						</div>
					</div>

					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="sidebar-header">Новости</div>
						</div>
						<div class="panel-body">
                        <?php foreach ($news as $key => $value): ?>
                            <p><a href="/news/view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></p>
                        <?php endforeach ?>
						</div>
					</div>	

					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="sidebar-header">Рейтинг фильмов</div>
						</div>
						<div class="panel-body">
							<ul class="list-group">
								
								<?php foreach ($films as $key => $value): ?>
									<li class="list-group-item list-group-warning">
										<span class="badge"><?php echo $value['rating']; ?></span>
										<a href="/movies/view/<?php echo $value['slug']; ?>/"><?php echo $value['name']; ?></a>
									</li>
								<?php endforeach ?> 
								
							</ul>
						</div>
					</div>	

				</div>
			</div>
		</div>

		<div class="clear">

		</div>

          <!-- CONTENT (index) end -->