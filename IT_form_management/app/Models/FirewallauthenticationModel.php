<?php

namespace App\Models;


use CodeIgniter\Model;

class FirewallauthenticationModel extends Model
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

    public function getAuthrequests()
    {
        
        $array = array('mng_apr' => 1, 'sec_apr' => 0);
        return $this->where($array)->get()->getResult();
               

        // return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($this->where('mng_apr',0)->findAll());
        // print_r('</pre>');die;
    }

    public function getrequestsforexe()
    {
        
        $array = array('mng_apr' => 1, 'sec_apr' => 1);
        return $this->where($array)->get()->getResult();
               

        // return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($this->where('mng_apr',0)->findAll());
        // print_r('</pre>');die;
    }

    public function search_by_id($id){

        return $this->where('req_id',$id)->first();
     }

    public function search_by_innerjn($id){
 
         //    $result = $this->where('req_id',$id)->first();
     
             return $this->db->table('firewallrequestmaster')->select([
                 'firewallrequestmaster.pfno',       
                 'departmentmaster.name',
                 'designationmaster.desig_name',
             ])
             ->join('departmentmaster', 'departmentmaster.id = firewallrequestmaster.department')
             ->join('designationmaster', 'designationmaster.desig_id = firewallrequestmaster.position')
             ->where('firewallrequestmaster.req_id', $id)
             ->get()
             ->getResultArray();
     
             // print_r('<pre>');
             // print_r($result);
             // print_r('</pre>');die;
     
    }



    

}