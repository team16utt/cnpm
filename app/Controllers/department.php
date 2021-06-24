<?php

namespace App\Controllers;

use App\Models\KhoaModel;
use App\Models\LopModel;
use App\Models\NganhModel;
use App\Models\SinhVienModel;

class Department extends BaseController
{
    public function index()
    {
        $departmentModel = new KhoaModel();
        $majorModel = new NganhModel();
        $data['title'] = "Danh sách khoa";
        $departments = $departmentModel->getAll();
        foreach ($departments as $key => $value) {
            $ten_nganh = $majorModel->getById($value['nganh_id'])['ten_nganh'];
            $departments[$key]['ten_nganh'] = $ten_nganh;
        }
        $data['departments'] = $departments;
        return view('department', $data);
    }
    public function editDepartment()
    {
        $departmentModel = new KhoaModel();
        $majorModel = new NganhModel();
        $majors = $majorModel->getAll();
        $data['majors'] = $majors;
        $data['title'] = "Thêm mới khoa";
        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $data['title'] = "Sửa khoa";
            $data['dpm'] = $departmentModel->getById($id);
        }
        if ($this->request->getMethod() == 'post') {
            $ten_khoa = $this->request->getVar('ten_khoa');
            $he_dao_tao = $this->request->getVar('he_dao_tao');
            $thoi_gian = $this->request->getVar('thoi_gian');
            $nganh_id = $this->request->getVar('nganh_id');

            $data['error'] = [];


            $data_insert = [
                'ten_khoa' => $ten_khoa,
                'he_dao_tao' => $he_dao_tao,
                'thoi_gian' => $thoi_gian,
                'nganh_id' => $nganh_id,
            ];
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data_insert["id"] = $id;
            }
            $new = $departmentModel->save($data_insert);
            if ($new > 0) {
                return redirect()->to(base_url() . '/department');
            } else {
                echo "<script>alert('Đã xảy ra lỗi !!!')</script>;";
            }
        }

        return view('editDepartment', $data);
    }
    public function deleteDepartment()
    {
        if (isset($_GET['id'])) {
            $departmentModel = new KhoaModel();
            $id = $_GET['id'];
            $old = $departmentModel->where('id', $id)->delete();
            if ($old > 0) {
                return redirect()->to(base_url() . '/Department');
            }
        }
    }
}
