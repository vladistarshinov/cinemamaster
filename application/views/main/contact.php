<div class="well">
    <?php $attributes = array("class" => "form-horizontal", "name" => "contactform");
    echo form_open("/contact", $attributes);?>
    <fieldset>
    <legend><h2>Контакты</h2></legend>
    <p id="cont">Отправьте ваш отзыв о портале КиноМастер</p>
    <div class="form-group">
        <input class="form-control" name="name" placeholder="Ваше имя" type="text" value="<?php echo set_value('name'); ?>" />
        <span class="text-danger"><?php echo form_error('name'); ?></span>
    </div>

    <div class="form-group">
        <input class="form-control" name="email" placeholder="Ваш email" type="text" value="<?php echo set_value('email'); ?>" />
        <span class="text-danger"><?php echo form_error('email'); ?></span>
    </div>

    <div class="form-group">
        <input class="form-control" name="subject" placeholder="Тема" type="text" value="<?php echo set_value('subject'); ?>" />
        <span class="text-danger"><?php echo form_error('subject'); ?></span>
    </div>

    <div class="form-group">
        <textarea class="form-control" name="message" rows="4" placeholder="Ваш отзыв"><?php echo set_value('message'); ?></textarea>
        <span class="text-danger"><?php echo form_error('message'); ?></span>
    </div>

    <div class="form-group">
        <input name="submit" type="submit" class="btn btn-lg btn-warning pull-right" value="отправить" />
    </div>
    </fieldset>
    <?php echo form_close(); ?>
    <?php echo $this->session->flashdata('msg'); ?>
</div>