<?php

namespace App\Controllers;


use App\Models\Product;
use App\Models\User;
use App\Models\Bills;

class PagesController extends Controller
{
	// public function __construct()
	// {
	// 	if (!Guard::isUserLoggedIn()) {
	// 		redirect('/login');
	// 	}

	// 	parent::__construct();
	// }

	public function index()
	{
		$products = Product::orderby('pro_id', 'DESC')->get();
		$this->sendPage('pages/homepage', ['products' => $products]);
		
		
	}

	public function detailPro($proId) {
		$product = Product::where('pro_id', $proId)->get();
		$this->sendPage('pages/product_detail', ['product' => $product]);
	}

	public function buyPro($userId, $proId) {
		$product = Product::where('pro_id', $proId)->get();
		$user = User::where('user_id', $userId)->get();
		$this->sendPage('pages/payment', ['user' => $user, 'product' => $product]);
	}

	protected function filterUserData(array $data)
	{
		return [
			'user_name' => $data['user_name'] ?? null,
			'user_phone' => $data['user_phone'] ?? null,
			'user_address' => $data['user_address'] ?? null,
			'user_email' => filter_var($data['user_email'], FILTER_VALIDATE_EMAIL),
			
			
		];
	}

	protected function filterBillData(array $data)
	{
		return [
			'user_id' => $data['user_id'] ?? null,
			'pro_id' => $data['pro_id'] ?? null,
			'bill_status' => 0

		];
	}

	public function printBill($userId)
	{
		
		$data = $this->filterUserData($_POST);
		User::where('user_id', $userId)->update($data);
		// $this->saveFormValues($_POST);
		$data1 = $this->filterBillData($_POST);
		$bill = new Bills();
		$bill->fill($data1);
		$bill->save();
		$_SESSION['message']= 'Đặt hàng thành công.';
		redirect('/home');
		
	} 

	public function history($userId)
	{
		$history = Bills::where('user_id', $userId)->join('products','products.pro_id', '=','bills.pro_id')->get();
		// $product = Product::where('pro_id', $history->pro_id);
		$this->sendPage('pages/history', ['history' => $history]);
	}

	public function delBill($userId,$billId)
	{
		$data = $this->filterBillData($_POST);
		Bills::where('bill_id', $billId)->delete($data);
		// $this->saveFormValues($_POST);
		$_SESSION['message']= 'Xóa đơn hàng thành công.';
		redirect('/history/'.$userId);
	}
}