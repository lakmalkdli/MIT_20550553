<?php

namespace App\Models;

use CodeIgniter\Model;

class PwdmngreportModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'passwordreqmaster';
    protected $primaryKey           = 'pwdreq_id';
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

    public function getdetailreqlist()
    {
        return $this->get()->getResult();
        // $result = $this->get()->getResult();
        // $result = $this->db->select('*')
        //                     ->from('firewallrequestmaster')
        //                     ->join('departmentmaster', 'firewallrequestmaster.column = table2.column', 'inner')
        //                     ->get()
        //                     ->getResult();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

}




