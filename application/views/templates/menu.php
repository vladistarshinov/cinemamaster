<!-- MENU start -->
<div class="col-lg-3 col-lg-pull-9"> <!-- Меняем блоки местами col-lg-pull-9 -->
          
          <div class="panel panel-info hidden-xs">
            <div class="panel-heading"><div class="sidebar-header">Поиск</div></div>
            <div class="panel-body">
              <form role="search">
                <div class="form-group">
                  <div class="input-group">
                    <input type="search" class="form-control input-lg" placeholder="Ваш запрос">
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>                  
          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Вход</div></div>
            <div class="panel-body">

              <?php if (!$this->dx_auth->is_logged_in()): ?>
            
              <?php
                $remember = array(
                  'name'  => 'remember',
                  'id'  => 'remember',
                  'value' => 1,
                  'checked' => set_value('remember'));
              ?>

              <?php echo $this->session->flashdata('general__error'); ?>
              <form role="form" action="/auth/login/" method="post">
                <div class="form-group">
                  <input type="text"  class="form-control input-lg" placeholder="Логин" name="username">
                  <?php echo $this->session->flashdata('username__error'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control input-lg" placeholder="Пароль" name="password">
                  <?php echo $this->session->flashdata('password__error'); ?>
                </div>
                <button type="submit" class="btn btn-warning pull-right">Вход</button>
                <dd>
                  <?php echo form_checkbox($remember);?> <?php echo form_label('Запомнить меня'.'<br>', $remember['id']);?> 
                  <?php echo anchor($this->dx_auth->forgot_password_uri, 'Восстановить пароль'.'<br>');?> 
                  <?php
                    if ($this->dx_auth->allow_registration) {
                      echo anchor($this->dx_auth->register_uri, 'Регистрация');
                    };
                  ?>
                </dd>
              </form>

              <?php else: ?>

                Здравствуйте, <?php echo $this->dx_auth->get_username(); ?>!
                <a href="/auth/logout/" class="btn btn-warning pull-right">Выход</a>

              <?php endif ?>

           
            </div>
          </div>  


          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Новости</div></div>
            <div class="panel-body">
              
              <?php foreach ($news as $key => $value): ?>
                <p><a href="/news/view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></p>
              <?php endforeach ?>
              
            </div>
          </div>


          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Рейтинг фильмов</div></div>
            <div class="panel-body">
                
                <ul class="list-group">
                  <?php foreach ($films as $key => $value): ?>
                    <li class="list-group-item list-group-warning">
                      <span class="badge"><?php echo $value['rating']; ?></span>
                      <a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a>
                    </li>
                  <?php endforeach ?>
                  
                </ul>

            </div>
          </div>  
          


        </div>      

      <!-- MENU end -->

