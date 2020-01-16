			<!-- CONTENT (index) start -->

            <h2>Новые фильмы</h2>
					<hr>
					<div class="row">

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<a href="inter.html"><img src="assets/img/inter.png" alt="Интерстеллар"></a>
							<div class="films__label">Интерстеллар</div>
						</div>

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<img src="assets/img/matrix.png" alt="Матрица">
							<div class="films__label">Матрица</div>
						</div>

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<img src="assets/img/max.png" alt="Безумный Макс">
							<div class="films__label">Безумный Макс</div>
						</div>

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<img src="assets/img/cloud.png" alt="Облачный атлас">
							<div class="films__label">Облачный атлас</div>
						</div>

					</div>
					
					<div class="margin-8"></div>

					<h2>Новые сериалы</h2>
					<hr>

					<div class="row">

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<img src="assets/img/xfiles.png" alt="Секретные материалы">
							<div class="films__label">Секретные материалы</div>
						</div>

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<img src="assets/img/silicon.png" alt="Кремниевая долина">
							<div class="films__label">Кремниевая долина</div>
						</div>

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<img src="assets/img/dead.png" alt="Ходячие мертвецы">
							<div class="films__label">Ходячие мертвецы</div>
						</div>

						<div class="films__block col-lg-3 col-md-3 col-sm-3 col-xs-6">
							<img src="assets/img/breakingbad.png" alt="Во все тяжкие">
							<div class="films__label">Во все тяжкие</div>
						</div>

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
								
								<li class="list-group-item list-group-warning">
									<span class="badge">8.3</span>
									<a href="#">Интерстеллар</a>
								</li>

								<li class="list-group-item list-group-warning">
									<span class="badge">8.1</span>
									<a href="#">Матрица</a>
								</li>

								<li class="list-group-item list-group-warning">
									<span class="badge">7.6</span>
									<a href="#">Безумный Макс</a>
								</li>

								<li class="list-group-item list-group-warning">
									<span class="badge">7.2</span>
									<a href="#">Облачный атлас</a>
								</li>
								
							</ul>
						</div>
					</div>	

				</div>
			</div>
		</div>

		<div class="clear">

		</div>

          <!-- CONTENT (index) end -->