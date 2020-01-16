<?php

/*
	It is recommended for you to change 'auth_login_incorrect_password' and 'auth_login_username_not_exist' into something vague.
	For example: Username and password do not match.
*/

$lang['auth_login_incorrect_password'] = "Логин и пароль не совпадают.";
$lang['auth_login_username_not_exist'] = "Логин и пароль не совпадают.";

$lang['auth_username_or_email_not_exist'] = "Логин или пароль не существуют.";
$lang['auth_not_activated'] = "Ваш аккаунт еще не активирован. Проверьте свой email.";
$lang['auth_request_sent'] = "Вы уже запросили восстановление пароля. Проверьте свой email.";
$lang['auth_incorrect_old_password'] = "Ваш старый пароль введен некорректено.";
$lang['auth_incorrect_password'] = "Ваш пароль введен некорректено.";

// Email subject
$lang['auth_account_subject'] = "%s данные аккаунта";
$lang['auth_activate_subject'] = "%s активация";
$lang['auth_forgot_password_subject'] = "Восстановление пароля";

// Email content
$lang['auth_account_content'] = "Приветствуем вас на %s,

Ваш аккаунт успешно создан.

Вы можете войти, используя логин или email адрес:

Логин: %s
Email: %s
Пароль: %s";

$lang['auth_activate_content'] = "Приветствуем вас на %s,

Чтобы активировать ваш аккаунт перейдите по ссылке:
%s

Пожайлуста активируйте свой аккаунт в течение %s часов, иначе вам нужно будет зарегистрироваться еще раз.

Вы можете войти, используя логин или email адрес:

Логин: %s
Email: %s
Пароль: %s";

$lang['auth_forgot_password_content'] = "Приветствуем вас на %s,

Вы запросили восстановление пароля.
Пожайлуста перейдите по ссылке, чтобы изменить пароль:
%s

Ваш новый пароль: %s
Ключ активации: %s

Если остались проблемы с доступом, то пишите на %s.";

/* End of file dx_auth_lang.php */
/* Location: ./application/language/english/dx_auth_lang.php */