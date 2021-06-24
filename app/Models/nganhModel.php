<?php

namespace App\Models;

use CodeIgniter\Model;

class NganhModel extends Model
{
    protected $table      = 'nganh';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';


    protected $allowedFields = ['id', 'ten_nganh'];

    public function getAll()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
}
