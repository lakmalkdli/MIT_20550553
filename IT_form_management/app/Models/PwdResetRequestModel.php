<?php

namespace App\Models;

use CodeIgniter\Model;

class PwdResetRequestModel extends Model
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


    public function saveRequestPwdreset($data=[])
    {
        return $this->insert($data);
    }

    public function getRequests()
    {
        // return $this->get()->getResult();
        return $this->where('mstatus',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($this->where('mng_apr',0)->findAll());
        // print_r('</pre>');die;
    }

    public function search_by_id($id){

        return $this->where('pwdreq_id',$id)->first();
     }

     public function aproverequest($id,$data){

        return $this->set('mstatus',$data['mstatus'])->set('mngcomm',$data['mngcomm'])
                    ->where('pwdreq_id',$id)
                    ->update();
    }

    
}