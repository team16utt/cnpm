<?php

namespace App\Controllers;


class Teacher extends BaseController
{
    public function index()
    {
        $data['title'] = "Danh sách giảng viên";
        return view('teachers', $data);
    }
    public function editTeacher()
    {
        $data['title'] = "Thêm mới giảng viên";
        if (isset($GET["id"])) {
            $data['title'] = "Sửa giảng viên";
        }
        return view('editTeacher', $data);
    }
}
