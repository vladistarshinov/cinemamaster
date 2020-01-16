<?php

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'maxlength'	=> 80,
	'size'	=> 30,
	'value' => set_value('login')
);

?>

<fieldset><legend accesskey="D" tabindex="1">Восстановление пароля</legend>
<?php echo form_open($this->uri->uri_string()); ?>

<?php echo $this->dx_auth->get_auth_error(); ?>

<dl>
	<dt><?php echo form_label('Введите свой логин или email адрес', $login['id']);?></dt>
	<dd>
		<?php echo form_input($login); ?> 
		<?php echo form_error($login['name']); ?>
		<?php echo form_submit('reset', 'Восстановить'); ?>
	</dd>
</dl>

<?php echo form_close()?>
</fieldset>