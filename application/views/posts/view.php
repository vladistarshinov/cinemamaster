<h3><?php echo $title; ?>
	<?php if($this->dx_auth->is_admin()) { ?>
        <a href="/posts/edit/<?php echo $slug; ?>"><button type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
	<?php   } ?>
</h3>
<p><?php echo $content; ?></p>
<br><br><br>
<?php if($this->dx_auth->is_admin()): ?>
        <a href="/posts/" class="btn btn-success pull-left">Назад</a><br><br><br>
    <?php else: ?>
        <a href="/" class="btn btn-success pull-left">Назад</a><br><br><br> 
    <?php endif ?>