<p><?php echo $result; ?></p><br><br><br>
    <?php if($this->dx_auth->is_admin()): ?>
        <a href="/posts/" class="btn btn-success pull-left">Назад</a><br><br><br>
    <?php else: ?>
        <a href="/" class="btn btn-success pull-left">Назад</a><br><br><br> 
    <?php endif ?>
