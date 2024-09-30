<?php

namespace App\Models;

use CodeIgniter\Model;

class FirewallrepoModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'firewallrequestmaster';
    protected $primaryKey           = 'req_id';
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

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function getfiltereddetailreqlist($fromdate, $todate, $department)
    {
        return $this->select('staffmember, pfno, extention, date, email, mobile, mng_apr, sec_apr, isntwrkdeployed, effectdate, expiredate, source, destination, ports, explanation')
        ->where('date >=', $fromdate)
        ->where('date <=', $todate)
        ->where('department', $department)
        ->get()->getResult();
    }

    

}




