<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		// $userModel = new UserModel();
		// var_dump($userModel->getAllUser());
		$data['title'] = "Trang chủ";
		$data['page'] = "home";
		return view('dashboard', $data);
	}
}
