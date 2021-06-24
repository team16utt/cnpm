<?php

namespace App\Models;

use CodeIgniter\Model;

class SinhVienModel extends Model
{
    protected $table      = 'sinh_vien';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';


    protected $allowedFields = ['id', 'msv', 'ho_ten', 'ngay_sinh', 'email', 'gioi_tinh', 'sdt', 'anh_bia', 'que_quan', 'ma_lop', 'khoa_vao_truong', 'khoa_hoc'];

    public function getAll()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
    public function getByMaLop($id)
    {
        return $this->where('ma_lop', $id)->findAll();
    }
}
