<?php

namespace App\Controllers;

use App\Models\LopModel;
use App\Models\SinhVienModel;

class Student extends BaseController
{
    public function index()
    {
        $studentModel = new SinhVienModel();
        $classModel = new LopModel();
        $data['title'] = "Danh sách sinh viên";
        session_start();
        $user = $_SESSION['user'];
        if ($user['chuc_vu'] == 0) {
            $studentByTeacher = $studentModel->getAll();
            foreach ($studentByTeacher as $key => $value) {
                $ten_lop = $classModel->getById($value['ma_lop'])['ten_lop'];
                $studentByTeacher[$key]["ten_lop"] = $ten_lop;
            }
        } else {
            $classes = $classModel->getByGV($user['id']);
            $studentByTeacher = [];
            foreach ($classes as $class) {
                $students = $studentModel->getByMaLop($class['id']);
                foreach ($students as $student) {
                    array_push($studentByTeacher, $student);
                }
            }
            foreach ($studentByTeacher as $key => $value) {
                $ten_lop = $classModel->getById($value['ma_lop'])['ten_lop'];
                $studentByTeacher[$key]["ten_lop"] = $ten_lop;
            }
        }
        $data['students'] = $studentByTeacher;
        return view('students', $data);
    }
    public function editStudent()
    {
        $studentModel = new SinhVienModel();
        $classModel = new LopModel();
        $classes = $classModel->getAll();
        $data['classes'] = $classes;
        $data['title'] = "Thêm mới sinh viên";
        if (isset($_GET["id"])) {
            $sid = $_GET['id'];
            $data['title'] = "Sửa sinh viên";
            $data['student'] = $studentModel->getById($sid);
        }
        if ($this->request->getMethod() == 'post') {
            $ho_ten = $this->request->getVar('ho_ten');
            $msv = $this->request->getVar('msv');
            $ngay_sinh = $this->request->getVar('ngay_sinh');
            $gioi_tinh = $this->request->getVar('gioi_tinh');
            $ma_lop = $this->request->getVar('ma_lop');
            $khoa_vao_truong = $this->request->getVar('khoa_vao_truong');
            $sdt = $this->request->getVar('sdt');
            $email = $this->request->getVar('email');
            $khoa_hoc = $this->request->getVar('khoa_hoc');
            $que_quan = $this->request->getVar('que_quan');
            $anh_bia = $this->request->getFile('anh_bia');
            if ($anh_bia->isValid() && !$anh_bia->hasMoved()) {
                $newName = $anh_bia->getRandomName();
                $path = $anh_bia->move("./public/img/avatar/", $newName);
            }
            $checkEmail = $studentModel->where('email', $email)->countAllResults();
            $checkMSV = $studentModel->where('msv', $msv)->countAllResults();
            $data['error'] = [];

            $url_avatar = "/public/img/avatar/" . $newName;
            $data_insert = [
                'ho_ten' => $ho_ten,
                'msv' => $msv,
                'ngay_sinh' => $ngay_sinh,
                'gioi_tinh' => $gioi_tinh,
                'ma_lop' => $ma_lop,
                'khoa_vao_truong' => $khoa_vao_truong,
                'sdt' => $sdt,
                'email' => $email,
                'khoa_hoc' => $khoa_hoc,
                'que_quan' => $que_quan,
                'anh_bia' => $url_avatar,
            ];
            if (isset($_GET['id'])) {
                $sid = $_GET['id'];
                $data_insert["id"] = $sid;
                $conditionEmail = [
                    'email' => $email,
                    'id!=' => $sid
                ];
                $conditionMSV = [
                    'msv' => $msv,
                    'id!=' => $sid
                ];
                $checkEmail = $studentModel->where($conditionEmail)->countAllResults();
                $checkMSV = $studentModel->where($conditionMSV)->countAllResults();
            }
            if ($checkMSV || $checkEmail) {
                $data['message'] = 'fail';
                if ($checkMSV != 0) {
                    $txtError = 'Đã có người đăng ký mã sinh viên này.';
                    array_push($data['error'], $txtError);
                }
                if ($checkEmail != 0) {
                    $txtError = 'Đã có người đăng ký email này.';
                    array_push($data['error'], $txtError);
                }
                return view('editStudent', $data);
            }
            $new = $studentModel->save($data_insert);
            if ($new > 0) {
                return redirect()->to(base_url() . '/student');
            } else {
                echo "<script>alert('Đã xảy ra lỗi !!!')</script>;";
            }
        }

        return view('editStudent', $data);
    }
    public function deleteStudent()
    {
        if (isset($_GET['sid'])) {
            $studentModel = new SinhVienModel();
            $studentID = $_GET['sid'];
            $old = $studentModel->where('id', $studentID)->delete();
            if ($old > 0) {
                return redirect()->to(base_url() . '/student');
            }
        }
    }
    public function studentDetail()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $studentModel = new SinhVienModel();
            $student = $studentModel->getById($id);
            $data['title'] = $student['ho_ten'];

            $data['student'] = $student;
            return view('studentDetail', $data);
        }
    }
}
