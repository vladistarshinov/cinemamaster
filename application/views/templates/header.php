<!-- Header start -->

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
	<div class="container-fluid">
		<div class="row">

			<nav role="navigation" class="navbar navbar-inverse">
				<div class="container">
					
					<div class="navbar-header header">

						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<h1> <a href="/">КиноМастер</a> </h1>
									<p>Кино - наша страсть!</p>
								</div>
							</div>
						</div>

						<button type="button" data-target="#navbarCollapse" data-toggle="collapse" 
						class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>

                	<div id="navbarCollapse" class="collapse navbar-collapse navbar-right">
                    
						<ul class="nav nav-pills">
							<li class="active"> <a href="/main/index/">Главная</a> </li>
							<li> <a href="/movies/type/films/">Фильмы</a> </li>
							<li> <a href="/movies/type/serials/">Сериалы</a> </li>
							<li> <a href="/movies/rating_list/rating/">Рейтинг фильмов</a> </li>
							<li> <a href="contact.html">Обратная связь</a> </li>
						</ul>
            
					</div>
				</div>
            </nav> 

		</div>
	</div>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-lg-push-3"> <!-- Меняем блоки местами col-lg-push-3 -->
					<form role="search" class="visible-xs">
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

				<!-- Header end -->
	
