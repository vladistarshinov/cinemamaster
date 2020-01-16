<!-- MENU start -->

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

<!-- MENU end -->