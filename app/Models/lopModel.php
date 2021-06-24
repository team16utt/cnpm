<?php

namespace App\Models;

use CodeIgniter\Model;

class LopModel extends Model
{
    protected $table      = 'lop';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';


    protected $allowedFields = ['id', 'ten_lop', 'gvcn_id', 'khoa_id'];

    public function getAll()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
}
