<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'userDemo';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';


    protected $allowedFields = ['firstname', 'lastname'];

    public function getAllUser()
    {
        return $userList = $this->find(1);
    }
}
