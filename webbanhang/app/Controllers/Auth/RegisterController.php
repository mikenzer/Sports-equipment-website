<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class RegisterController extends Controller
{
	// public function __construct()
	// {
	// 	if (Guard::isUserLoggedIn()) {
	// 		redirect('/home');
	// 	}

	// 	parent::__construct();
	// }

	public function showRegisterForm()
	{
		$data = [
			'old' => $this->getSavedFormValues(),
			'errors' => session_get_once('errors')
		];

		$this->sendPage('auth/register', $data);
	}

	public function register()
	{
		$this->saveFormValues($_POST, ['user_password', 'user_password_confirmation']);

		$data = $this->filterUserData($_POST);
		$model_errors = User::validate($data);
		if (empty($model_errors)) {
			// Dữ liệu hợp lệ...
			$this->createUser($data);

			$_SESSION['message']= 'Đăng ký thành công! Mời bạn đăng nhập.';
			redirect('/login');
		}

		// Dữ liệu không hợp lệ...
		redirect('/register', ['errors' => $model_errors]);
	}

	protected function filterUserData(array $data)
	{
		return [
			'user_name' => $data['user_name'] ?? null,
			'user_phone' => $data['user_phone'] ?? null,
			'user_address' => $data['user_address'] ?? null,
			'user_email' => filter_var($data['user_email'], FILTER_VALIDATE_EMAIL),
			'user_password' => $data['user_password'] ?? null,
			'user_password_confirmation' => $data['user_password_confirmation'] ?? null
		];
	}

	protected function createUser($data)
	{
		return User::create([
			'user_name' => $data['user_name'],
			'user_phone' => $data['user_phone'],
			'user_address' => $data['user_address'],
			'user_email' => $data['user_email'],
			'user_password' => password_hash($data['user_password'], PASSWORD_DEFAULT)
		]);
	}
}
