<?php

namespace App\Controllers;

use App\Models\NganhModel;

class Major extends BaseController
{
    public function index()
    {
        $majorModel = new NganhModel();
        $data['title'] = "Danh sách ngành";
        $majors = $majorModel->getAll();
        $data['majors'] = $majors;
        return view('major', $data);
    }
    public function editMajor()
    {
        $majorModel = new NganhModel();
        $data['title'] = "Thêm mới ngành";
        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $data['title'] = "Sửa ngành";
            $data['major'] = $majorModel->getById($id);
        }
        if ($this->request->getMethod() == 'post') {
            $ten_nganh = $this->request->getVar('ten_nganh');
            $data['error'] = [];
            $data_insert = [
                'ten_nganh' => $ten_nganh,
            ];
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data_insert["id"] = $id;
            }
            $new = $majorModel->save($data_insert);
            if ($new > 0) {
                return redirect()->to(base_url() . '/major');
            } else {
                echo "<script>alert('Đã xảy ra lỗi !!!')</script>;";
            }
        }

        return view('editMajor', $data);
    }
    public function deleteMajor()
    {
        if (isset($_GET['id'])) {
            $majorModel = new NganhModel();
            $id = $_GET['id'];
            $old = $majorModel->where('id', $id)->delete();
            if ($old > 0) {
                return redirect()->to(base_url() . '/major');
            }
        }
    }
}
