<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
	// Used for registering and changing password form validation
	var $min_username = 3;
	var $max_username = 20;
	var $min_password = 3;
	var $max_password = 20;

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');
		
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	function index()
	{
		$this->login();
	}
	
	/* Callback function */
	
	function username_check($username)
	{
		$result = $this->dx_auth->is_username_available($username);
		if ( ! $result)
		{
			$this->form_validation->set_message('username_check', 'Логин занят. Выберите другой.');
		}
				
		return $result;
	}

	function email_check($email)
	{
		$result = $this->dx_auth->is_email_available($email);
		if ( ! $result)
		{
			$this->form_validation->set_message('email_check', 'Email занят. Выберите другой.');
		}
				
		return $result;
	}

	
	function recaptcha_check()
	{
		$result = $this->dx_auth->is_recaptcha_match();		
		if ( ! $result)
		{
			$this->form_validation->set_message('recaptcha_check', 'Your confirmation code does not match the one in the image. Try again.');
		}
		
		return $result;
	}
	
	/* End of Callback function */
	
	
	function login()
	{


		if ( !$this->dx_auth->is_logged_in())
		{

			

			$val = $this->form_validation;
			
			// Set form validation rules
			$val->set_rules('username', 'Логин', 'trim|required');
			$val->set_rules('password', 'Пароль', 'trim|required');
			$val->set_rules('remember', 'Remember me', 'integer');
				
			if ($val->run() AND $this->dx_auth->login($val->set_value('username'), $val->set_value('password'), $val->set_value('remember')))
			{
				// Redirect to homepage
				redirect('', 'location');
			}
			else
			{

				// Check if the user is failed logged in because user is banned user or not
				if ($this->dx_auth->is_banned())
				{
					// Redirect to banned uri
					$this->dx_auth->deny_access('banned');
				}
				else
				{						
					// Default is we don't show captcha until max login attempts eceeded
					$data['show_captcha'] = FALSE;
					
					// Load login page view
					$this->load->view($this->dx_auth->login_view, $data);
				}
			}
		}
		else
		{
			$data['auth_message'] = 'You are already logged in.';
			$this->load->view($this->dx_auth->logged_in_view, $data);
		}
	}
	
	function logout()
	{
		$this->dx_auth->logout();
		
		$data['auth_message'] = 'Вы разлогинились.';		
		$this->load->view('Auth/logout', $data);
	}
	
	
	function register()
	{
		$this->data['title'] = "Регистрация";

		$this->load->model('Films_model');



		if ( ! $this->dx_auth->is_logged_in() AND $this->dx_auth->allow_registration)
		{	
			$val = $this->form_validation;
			
			// Set form validation rules
			$val->set_rules('username', 'Логин', 'trim|required|min_length['.$this->min_username.']|max_length['.$this->max_username.']|callback_username_check|alpha_dash');
			$val->set_rules('password', 'Пароль', 'trim|required|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_password]');
			$val->set_rules('confirm_password', 'Повторите пароль', 'trim|required');
			$val->set_rules('email', 'Email адрес', 'trim|required|valid_email|callback_email_check');
			
			// Is registration using captcha
			if ($this->dx_auth->captcha_registration)
			{
				// Set recaptcha rules.
				// IMPORTANT: Do not change 'recaptcha_response_field' because it's used by reCAPTCHA API,
				// This is because the limitation of reCAPTCHA, not DX Auth library
				$val->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|required|callback_recaptcha_check');
			}

			// Run form validation and register user if it's pass the validation
			if ($val->run() AND $this->dx_auth->register($val->set_value('username'), $val->set_value('password'), $val->set_value('email')))
			{	
				// Set success message accordingly
				if ($this->dx_auth->email_activation)
				{
					$data['auth_message'] = 'Вы успешно зарегистрировальсь. Проверьте свой email, чтобы активировать аккаунт.';
				}
				else
				{					
					$data['auth_message'] = 'Вы успешно зарегистрировальсь.'.anchor(site_url($this->dx_auth->login_uri), ' ');
				}
				
				// Load registration success page
				$this->load->view('templates/header', $this->data);
				$this->load->view($this->dx_auth->register_success_view, $data);
				$this->load->view('templates/footer');
			}
			else
			{
				// Load registration page
				$this->load->view('templates/header', $this->data);
				$this->load->view('Auth/register_form');
				$this->load->view('templates/footer');
			}
		}
		elseif ( ! $this->dx_auth->allow_registration)
		{
			$data['auth_message'] = 'Registration has been disabled.';
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->register_disabled_view, $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$data['auth_message'] = 'You have to logout first, before registering.';
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->logged_in_view, $data);
			$this->load->view('templates/footer');
		}
	}
	
	function activate()
	{	
		$this->data['title'] = "Активация";

		$this->load->model('Films_model');

		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Activate user
		if ($this->dx_auth->activate($username, $key)) 
		{
			$data['auth_message'] = 'Ваш аккаунт успешно активирован. '.anchor(site_url($this->dx_auth->login_uri), ' ');
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->activate_success_view, $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$data['auth_message'] = 'Активационный код введен неправильно. Проверьте свой email еще раз.';
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->activate_failed_view, $data);
			$this->load->view('templates/footer');
		}
	}
	
	function forgot_password()
	{	
		$this->data['title'] = "Восстановление пароля";

		$this->load->model('Films_model');

		$val = $this->form_validation;
		
		// Set form validation rules
		$val->set_rules('login', 'Логин или Email адрес', 'trim|required');

		// Validate rules and call forgot password function
		if ($val->run() AND $this->dx_auth->forgot_password($val->set_value('login')))
		{
			$data['auth_message'] = 'Вам было выслано письмо с инструкциями по активации нового пароля.';
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->forgot_password_success_view, $data);
			$this->load->view('templates/footer');
		}
		else
		{	
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->forgot_password_view);
			$this->load->view('templates/footer');
		}
	}
	
	function reset_password()
	{
		$this->load->model('Films_model');
		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Reset password
		if ($this->dx_auth->reset_password($username, $key))
		{
			$this->data['title'] = "Ваш пароль успешно восстановлен.";
			$data['auth_message'] = 'Ваш пароль успешно восстановлен. '.anchor(site_url($this->dx_auth->login_uri), ' ');
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->reset_password_success_view, $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->data['title'] = "Восстановление не удалось.";
			$data['auth_message'] = 'Восстановление не удалось. Ваш логин и ключ некорректны. Пожайлуста проверьте почту еще раз и следуйте инструкциям.';
			$this->load->view('templates/header', $this->data);
			$this->load->view($this->dx_auth->reset_password_failed_view, $data);
			$this->load->view('templates/footer');
		}
	}
	
	function change_password()
	{
		// Check if user logged in or not
		if ($this->dx_auth->is_logged_in())
		{			
			$val = $this->form_validation;
			
			// Set form validation
			$val->set_rules('old_password', 'Старый пароль', 'trim|required|min_length['.$this->min_password.']|max_length['.$this->max_password.']');
			$val->set_rules('new_password', 'Новый пароль', 'trim|required|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_new_password]');
			$val->set_rules('confirm_new_password', 'Подтвердить новый пароль', 'trim|required');
			
			// Validate rules and change password
			if ($val->run() AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password')))
			{
				$data['auth_message'] = 'Ваш пароль успешно изменен.';
				$this->load->view($this->dx_auth->change_password_success_view, $data);
			}
			else
			{
				$this->load->view($this->dx_auth->change_password_view);
			}
		}
		else
		{
			// Redirect to login page
			$this->dx_auth->deny_access('login');
		}
	}	
	
	function cancel_account()
	{
		// Check if user logged in or not
		if ($this->dx_auth->is_logged_in())
		{			
			$val = $this->form_validation;
			
			// Set form validation rules
			$val->set_rules('password', 'Password', "trim|required");
			
			// Validate rules and change password
			if ($val->run() AND $this->dx_auth->cancel_account($val->set_value('password')))
			{
				// Redirect to homepage
				redirect('', 'location');
			}
			else
			{
				$this->load->view($this->dx_auth->cancel_account_view);
			}
		}
		else
		{
			// Redirect to login page
			$this->dx_auth->deny_access('login');
		}
	}

	// Example how to get permissions you set permission in /backend/custom_permissions/
	function custom_permissions()
	{
		if ($this->dx_auth->is_logged_in())
		{
			echo 'My role: '.$this->dx_auth->get_role_name().'<br/>';
			echo 'My permission: <br/>';
			
			if ($this->dx_auth->get_permission_value('edit') != NULL AND $this->dx_auth->get_permission_value('edit'))
			{
				echo 'Edit is allowed';
			}
			else
			{
				echo 'Edit is not allowed';
			}
			
			echo '<br/>';
			
			if ($this->dx_auth->get_permission_value('delete') != NULL AND $this->dx_auth->get_permission_value('delete'))
			{
				echo 'Delete is allowed';
			}
			else
			{
				echo 'Delete is not allowed';
			}
		}
	}


}