<?php

namespace App\Models;

use CodeIgniter\Model;

class GiangVienModel extends Model
{
    protected $table      = 'giang_vien';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';


    protected $allowedFields = ['id', 'mgv', 'chuc_vu', 'ten_dang_nhap', 'mat_khau', 'ho_ten', 'ngay_sinh', 'email', 'gioi_tinh', 'sdt', 'anh_bia', 'que_quan'];

    public function getAll()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
}
