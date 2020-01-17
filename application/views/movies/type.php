<h1><?php echo $title." "; ?>
<?php if($this->dx_auth->is_admin()) {
      echo '<a href="/movies/"><button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>';
    } ?>
</h1>
  <hr>

  <?php foreach ($movie_data as $key => $value): ?>
    <div class="row">
      <div class="well clearfix">
        <div class="col-lg-3 col-md-2 text-center">
          <img class="img-thumbnail" src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>">
          <p><?php echo $value['name']; ?></p>
        </div>

        <div class="col-lg-9 col-md-10">
          <p><?php echo $value['descriptions']; ?></p>
        </div>
        
        <div class="col-lg-12 col-md-12">
          <a href="/movies/view/<?php echo $value['slug']; ?>" class="btn btn-lg btn-warning pull-right">подробнее</a>
        </div>
      </div>
    </div>
  <?php endforeach ?>

  <?php echo $pagination; ?>