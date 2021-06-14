<?php

namespace App\Controllers;


class Student extends BaseController
{
    public function index()
    {
        $data['title'] = "Danh sách sinh viên";
        $data['page'] = "student";

        return view('students', $data);
    }
    public function editStudent()
    {
        $data['title'] = "Thêm mới sinh viên";
        if (isset($GET["id"])) {
            $data['title'] = "Sửa sinh viên";
        }
        $data['page'] = "student";
        return view('editStudent', $data);
    }
}
