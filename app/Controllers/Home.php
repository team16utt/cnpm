<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "Trang chủ";
		session_start();
		if ($_SESSION['user']) {
			return view('dashboard', $data);
		}
		return redirect()->to(base_url() . '/login');
	}
}
