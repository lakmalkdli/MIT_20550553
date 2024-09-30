<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'departmentmaster';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = false;
    protected $allowedFields        = [];
  
   	protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        return $data;
    }

    protected function beforeUpdate(array $data){
        return $data;
    }    

    public function getDepartments($status='')
    {
        if ($status=='') {
            return $this->get()->getResult();
        } else {
            // return $this->where('status', $status)->where('id', 2)->get()->getResult();
            return $this->where('status', $status)->get()->getResult();
        }        
    }

    public function saveDepartment($data=[])
    {
        return $this->insert($data);
    }

}