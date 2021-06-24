<?php

namespace App\Models;

use CodeIgniter\Model;

class KhoaModel extends Model
{
    protected $table      = 'khoa';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';


    protected $allowedFields = ['id', 'ten_khoa', 'he_dao_tao', 'thoi_gian', 'nganh_id'];

    public function getAll()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
}
