<?php

namespace App\Controllers;

use App\Models\LopModel;
use App\Models\GiangVienModel;
use App\Models\KhoaModel;

class Classes extends BaseController
{
    public function index()
    {
        $classesModel = new LopModel();
        $teacherModel = new GiangVienModel();
        $departmentModel = new KhoaModel();
        $data['title'] = "Danh sách lớp";
        $classes = $classesModel->getAll();
        foreach ($classes as $key => $value) {
            $ten_giang_vien = $teacherModel->getById($value['gvcn_id'])['ho_ten'];
            $ten_khoa = $departmentModel->getById($value['khoa_id'])['ten_khoa'];
            $classes[$key]['ten_giang_vien'] = $ten_giang_vien;
            $classes[$key]['ten_khoa'] = $ten_khoa;
        }
        $data['classes'] = $classes;
        return view('classes', $data);
    }
    public function editClass()
    {
        $classesModel = new LopModel();
        $teacherModel = new GiangVienModel();
        $departmentModel = new KhoaModel();
        $teachers = $teacherModel->getAll();
        $departments = $departmentModel->getAll();
        $data['teachers'] = $teachers;
        $data['departments'] = $departments;
        $data['title'] = "Thêm mới Lớp";
        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $data['title'] = "Sửa lớp";
            $data['class'] = $classesModel->getById($id);
        }
        if ($this->request->getMethod() == 'post') {
            $ten_lop = $this->request->getVar('ten_lop');
            $gvcn_id = $this->request->getVar('gvcn_id');
            $khoa_id = $this->request->getVar('khoa_id');

            $data['error'] = [];


            $data_insert = [
                'ten_lop' => $ten_lop,
                'gvcn_id' => $gvcn_id,
                'khoa_id' => $khoa_id,
            ];
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data_insert["id"] = $id;
            }
            $new = $classesModel->save($data_insert);
            if ($new > 0) {
                return redirect()->to(base_url() . '/classes');
            } else {
                echo "<script>alert('Đã xảy ra lỗi !!!')</script>;";
            }
        }

        return view('editClass', $data);
    }
    public function deleteClasses()
    {
        if (isset($_GET['id'])) {
            $classesModel = new LopModel();
            $id = $_GET['id'];
            $old = $classesModel->where('id', $id)->delete();
            if ($old > 0) {
                return redirect()->to(base_url() . '/classes');
            }
        }
    }
}
