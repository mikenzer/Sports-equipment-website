<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class LoginController extends Controller
{
	public function showLoginForm()
	{
		if (Guard::isUserLoggedIn()) {
			redirect('/home');
		}

		$data = [
			'messages' => session_get_once('messages'),
			'old' => $this->getSavedFormValues(),
			'errors' => session_get_once('errors')
		];

		$this->sendPage('auth/login', $data);
	}

	public function login()
	{
		$user_credentials = $this->filterUserCredentials($_POST);

		$errors = [];
		$user = User::where('user_email', $user_credentials['user_email'])->first();
		if (!$user) {
			// Người dùng không tồn tại...
			$errors['user_email'] = 'Email không đúng.';
		} else if (Guard::login($user, $user_credentials)) {
			// Đăng nhập thành công...
			redirect('/home');
		} else {
			// Sai mật khẩu...
			$errors['user_password'] = 'Mật khẩu không đúng.';
		}

		// Đăng nhập không thành công: lưu giá trị trong form, trừ password
		$this->saveFormValues($_POST, ['user_password']);
		redirect('/login', ['errors' => $errors]);
	}

	public function logout()
	{
		Guard::logout();
		redirect('/login');
	}

	protected function filterUserCredentials(array $data)
	{
		return [
			'user_email' => filter_var($data['user_email'], FILTER_VALIDATE_EMAIL),
			'user_password' => $data['user_password'] ?? null
		];
	}
}
