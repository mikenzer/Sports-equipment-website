<?php

namespace App\Controllers;


use App\Models\Product;
use App\Models\Bills;


class AdminController extends Controller
{
	// public function __construct()
	// {
	// 	if (!Guard::isUserLoggedIn()) {
	// 		redirect('/login');
	// 	}

	// 	parent::__construct();
	// }

	public function showAdminPage()
	{
		$this->sendPage('admin/home', [
		'errors' => session_get_once('errors'),
		'old' => $this->getSavedFormValues()
		]);
	}
	public function showAddPage()
	{
		$this->sendPage('admin/add', [
		'errors' => session_get_once('errors'),
		'old' => $this->getSavedFormValues()
		]);
	}


	public function create()
	{
		$data = $this->filterProductData($_POST);
		$model_errors = Product::validate($data);
		if (empty($model_errors)) {
			$product = new Product();
			$product->fill($data);
			// $product->user()->associate(Guard::user());
			$product->save();
            $_SESSION['message']= 'Thêm mới sản phẩm thành công.';
			redirect('/add-product');
		} 
		// Lưu các giá trị của form vào $_SESSION['form']
		$this->saveFormValues($_POST);
		// Lưu các thông báo lỗi vào $_SESSION['errors']
		redirect('/add-product', ['errors' => $model_errors]);
	} 
	protected function filterProductData(array $data)
	{
		return [
		'pro_name' => $data['pro_name'] ?? null,
        'pro_price' => $data['pro_price'] ?? null,
		'pro_brand' => $data['pro_brand'] ?? null,
        'pro_cate' => $data['pro_cate'] ?? null,
        'pro_photo' => $data['pro_photo'] ?? null,
		'pro_notes' => $data['pro_notes'] ?? null
		];
	}

	public function showListPage()
	{
		$products = Product::orderby('pro_id', 'DESC')->get();
		$this->sendPage('admin/list', ['products' => $products]);
	}

	public function showEditPage($proId)
	{
		
		$product = Product::where('pro_id', $proId)->get();
		$this->sendPage('admin/edit', ['product' => $product,'errors' => session_get_once('errors'),
		'old' => $this->getSavedFormValues() ]);
	}

	public function update($proId)
	{
		$data = $this->filterProductData($_POST);
		$model_errors = Product::validate($data);
		if (empty($model_errors)) {
		Product::where('pro_id', $proId)->update($data);
		$_SESSION['message']= 'Sửa thông tin sản phẩm thành công.';
		redirect('/list-product');
		}
		$this->saveFormValues($_POST);
		redirect('/list-product', ['errors' => $model_errors]);
		
	} 

	public function delete($proId)
	{
		$data = $this->filterProductData($_POST);
		Product::where('pro_id', $proId)->delete($data);
		
		$_SESSION['message']= 'Xóa sản phẩm thành công.';
		redirect('/list-product');
	}

	public function showListBill()
	{
		$bills = Bills::orderby('bill_id', 'DESC')->get();
		$this->sendPage('admin/list_bill', ['bills' => $bills]);
	}

	public function viewBill($billId)
	{
		$view = Bills::where('bill_id', $billId)->join('users', 'users.user_id', '=', 'bills.user_id')->join('products', 'products.pro_id', '=', 'bills.pro_id')->get();
		$this->sendPage('admin/view_bill', ['view' => $view]);
	}

	protected function filterBillData()
	{
		return [
			
			'bill_status' => 1

		];
	}
	public function confirmBill($billId)
	{
		
		$data = $this->filterBillData();
		Bills::where('bill_id', $billId)->update($data);
		
		$_SESSION['message']= 'Xác nhận đơn hàng thành công.';
		redirect('/view-bill/'.$billId);
		
	} 
}
