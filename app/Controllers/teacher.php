<?php

namespace App\Controllers;

use App\Models\GiangVienModel;

class Teacher extends BaseController
{
    public function index()
    {
        $teacherModel = new GiangVienModel();
        $data['title'] = "Danh sách giảng viên";
        $teachers = $teacherModel->getAll();
        $data['teachers'] = $teachers;

        return view('teachers', $data);
    }
    public function editTeacher()
    {
        $teacherModel = new GiangVienModel();
        $data['title'] = "Thêm mới giảng viên";
        if (isset($_GET["id"])) {
            $tid = $_GET['id'];
            $data['title'] = "Sửa giảng viên";
            $data['teacher'] = $teacherModel->getById($tid);
        }
        if ($this->request->getMethod() == 'post') {
            $ho_ten = $this->request->getVar('ho_ten');
            $mgv = $this->request->getVar('mgv');
            $ngay_sinh = $this->request->getVar('ngay_sinh');
            $gioi_tinh = $this->request->getVar('gioi_tinh');
            $chuc_vu = $this->request->getVar('chuc_vu');
            $ten_dang_nhap = $this->request->getVar('ten_dang_nhap');
            $mat_khau = $this->request->getVar('mat_khau');
            $re_mat_khau = $this->request->getVar('re_mat_khau');
            $sdt = $this->request->getVar('sdt');
            $email = $this->request->getVar('email');
            $que_quan = $this->request->getVar('que_quan');
            $anh_bia = $this->request->getFile('anh_bia');
            if ($anh_bia->isValid() && !$anh_bia->hasMoved()) {
                $newName = $anh_bia->getRandomName();
                $path = $anh_bia->move("./public/img/avatar/", $newName);
            }
            $checkEmail = $teacherModel->where('email', $email)->countAllResults();
            $checkMGV = $teacherModel->where('mgv', $mgv)->countAllResults();
            $checkPassword = $mat_khau != $re_mat_khau;
            $data['error'] = [];


            $url_avatar = "/public/img/avatar/" . $newName;
            $data_insert = [
                'ho_ten' => $ho_ten,
                'mgv' => $mgv,
                'ngay_sinh' => $ngay_sinh,
                'gioi_tinh' => $gioi_tinh,
                'chuc_vu' => $chuc_vu,
                'ten_dang_nhap' => $ten_dang_nhap,
                'mat_khau' => $mat_khau,
                'sdt' => $sdt,
                'email' => $email,
                'que_quan' => $que_quan,
                'anh_bia' => $url_avatar,
            ];
            if (isset($_GET['id'])) {
                $tid = $_GET['id'];
                $data_insert["id"] = $tid;
                $conditionUsername = [
                    'ten_dang_nhap' => $ten_dang_nhap,
                    'id!=' => $tid
                ];
                $conditionEmail = [
                    'email' => $email,
                    'id!=' => $tid
                ];
                $conditionMGV = [
                    'mgv' => $email,
                    'id!=' => $tid
                ];
                $checkUsername = $teacherModel->where($conditionUsername)->countAllResults();
                $checkEmail = $teacherModel->where($conditionEmail)->countAllResults();
                $checkMGV = $teacherModel->where($conditionMGV)->countAllResults();
            }
            if ($checkMGV || $checkEmail || $checkUsername || $checkPassword) {
                $data['message'] = 'fail';
                if ($checkPassword != 0) {
                    $txtError = '2 mật khẩu không trùng khớp.';
                    array_push($data['error'], $txtError);
                }
                if ($checkUsername != 0) {
                    $txtError = 'Đã có người đăng ký mã giảng viên này.';
                    array_push($data['error'], $txtError);
                }
                if ($checkMGV != 0) {
                    $txtError = 'Đã có người đăng ký mã giảng viên này.';
                    array_push($data['error'], $txtError);
                }
                if ($checkEmail != 0) {
                    $txtError = 'Đã có người đăng ký email này.';
                    array_push($data['error'], $txtError);
                }
                return view('editTeacher', $data);
            }
            $new = $teacherModel->save($data_insert);
            if ($new > 0) {
                return redirect()->to(base_url() . '/teacher');
            } else {
                echo "<script>alert('Đã xảy ra lỗi !!!')</script>;";
            }
        }
        return view('editTeacher', $data);
    }
    public function deleteTeacher()
    {
        if (isset($_GET['id'])) {
            $teacherModel = new GiangVienModel();
            $teacherID = $_GET['id'];
            $old = $teacherModel->where('id', $teacherID)->delete();
            if ($old > 0) {
                return redirect()->to(base_url() . '/teacher');
            }
        }
    }
    public function teacherDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $teacherModel = new GiangVienModel();
            $teacher = $teacherModel->getById($id);
            $data['teacher'] = $teacher;
            $data['title'] = $teacher['ho_ten'];

            return view('teacherDetail', $data);
        }
    }
}
