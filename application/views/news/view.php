<h3><?php echo $title; ?>
	<?php if($this->dx_auth->is_admin()) { ?>
        <a href="/news/edit/<?php echo $slug; ?>"><button type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
	<?php   } ?>
</h3>
<p><?php echo $content; ?></p>
<br><br><br><a href="/news/" class="btn btn-success pull-center">Все новости</a><br>
