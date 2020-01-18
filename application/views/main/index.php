<!-- CONTENT (index) start -->

          <h2>Новые фильмы <?php if($this->dx_auth->is_admin()) {
      echo '<a href="/movies/"><button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>';
                } ?>
          </h2>
          <hr>
          <div class="row">
            <?php foreach ($movie as $key => $value): ?>
              <div class="films_block col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <a href="/movies/view/<?php echo $value['slug']; ?>"><img src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>"></a> 
                <div class="film_label"><a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a></div>
              </div>
            <?php endforeach ?>
            

          </div>

          <div class="margin-8"></div>

         <h2>Новые сериалы <?php if($this->dx_auth->is_admin()) {
      echo '<a href="/movies/"><button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>';
                } ?>
          </h2>
         <hr>
          <div class="row">

            <?php foreach ($serials as $key => $value): ?>
              <div class="films_block col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <a href="/movies/view/<?php echo $value['slug']; ?>"><img src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>"></a> 
                <div class="film_label"><a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a></div>
              </div>
            <?php endforeach ?>

          </div>

          <div class="margin-8"></div>
          
          <h2>Блог о кино</h2>  <hr>

          <?php if(!$this->dx_auth->is_admin()) { ?>
            <?php foreach ($posts as $key => $value): ?>
              <a href="/posts/view/<?php echo $value['slug']; ?>"><h3><?php echo $value['title']; ?></h3></a>
              <hr>
              <p><?php echo $value['text']; ?></p>
              <a href="/posts/view/<?php echo $value['slug']; ?>" class="btn btn-warning pull-right">Читать</a>
              <br>
              <div class="margin-8 сlear"></div>
            <?php endforeach ?>
          <?php   } ?>
          <br><br><br>
          
          <!-- CONTENT (index) end -->