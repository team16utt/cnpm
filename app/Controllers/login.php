<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data['title'] = "Nhom1 - Đăng nhập";
        return view('login', $data);
    }
}
