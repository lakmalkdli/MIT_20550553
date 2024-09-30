<?php

namespace App\Models;

use CodeIgniter\Model;

class VAreqreportModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'varequestmaster';
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
        // return $this->get()->getResult();
        // $result = $this->get()->getResult();
        return $this->db->table('varequestmaster')->select([
            'varequestmaster.req_id',
            'varequestmaster.req_id',
            'varequestmaster.pfno',
            'varequestmaster.email',
            'varequestmaster.mobile',
            'varequestmaster.extention',
            'varequestmaster.date',
            'varequestmaster.department',
            'varequestmaster.server_os',
            'varequestmaster.server_ip',
            'varequestmaster.explanation',
            'varequestmaster.sec_apr',
            'varequestmaster.mng_apr',
            'varequestmaster.is_execute',
            'departmentmaster.name',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
        ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
        ->get()
        ->getResult();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function getIntRequests()
    {
        return $this->where('mstatus',0)->get()->getResult();
        // $result = $this->where('mstatus',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function vaassesmentreport()
    {
        $result = $this->db->table('varequestmaster')->select([
            'varequestmaster.req_id',
            'varequestmaster.req_id',
            'varequestmaster.pfno',
            'varequestmaster.email',
            'varequestmaster.mobile',
            'varequestmaster.extention',
            'varequestmaster.date',
            'varequestmaster.department',
            'varequestmaster.server_os',
            'varequestmaster.server_ip',
            'varequestmaster.explanation',
            'varequestmaster.sec_apr',
            'varequestmaster.mng_apr',
            'varequestmaster.is_execute',
            'departmentmaster.name',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
        ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
        ->get()
        ->getResult();
        // ->getResultArray();
        // ->getResult();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
        // ->get()
        // ->getResult();

    }

    public function getfilteredvadetailreqlist($fromdate, $todate, $department)
    {
        // return $this->select('staffmember, pfno, extention, date, email, mobile, mng_apr, sec_apr, isntwrkdeployed, effectdate, expiredate, source, destination, ports, explanation')
        return  $this->db->table('varequestmaster')->select([
            'varequestmaster.req_id',
            'varequestmaster.req_id',
            'varequestmaster.pfno',
            'varequestmaster.email',
            'varequestmaster.mobile',
            'varequestmaster.extention',
            'varequestmaster.date',
            'varequestmaster.department',
            'varequestmaster.server_os',
            'varequestmaster.server_ip',
            'varequestmaster.explanation',
            'varequestmaster.sec_apr',
            'varequestmaster.mng_apr',
            'varequestmaster.is_execute',
            'departmentmaster.name',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
        ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
        ->where('date >=', $fromdate)
        ->where('date <=', $todate)
        ->where('department', $department)
        ->get()->getResult();

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


    public function getpenbymanva($status){

        return $this->where('mng_apr', $status)
        ->countAllResults();

        
    }

    
   public function getpenbysecva($status) {

            return $this->where('mng_apr', $status)
            ->where('sec_apr', "0")
            ->countAllResults();
    
        }

    public function getpenbynetwrkva($status) {

            return $this->where('mng_apr', $status)
            ->where('sec_apr', $status)
            ->where('is_execute', "0")
            ->countAllResults();
        }

    public function getapproved($status) {

            return $this->where('is_execute', "1")
            ->countAllResults();
        }
        

        public function getrejbymanva($status) {

            return $this->where('mng_apr', $status)
            ->countAllResults();
        }
        public function getrejbysecva($status) {
    
            return $this->where('sec_apr', $status)
            ->countAllResults();
        }
        
        public function getrejbynetwva($status) {
    
            return $this->where('is_execute', $status)
            ->countAllResults();
        }



}




