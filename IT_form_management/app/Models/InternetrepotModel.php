<?php

namespace App\Models;

use CodeIgniter\Model;

class InternetrepotModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'internetrequestmaster';
    protected $primaryKey           = 'intreq_id';
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


    public function getfiltereddetailreqlist($fromdate, $todate, $department)
    {
        // return $this->select('staffmember, pfno, extention, date, email, mobile, mng_apr, sec_apr, isntwrkdeployed, effectdate, expiredate, source, destination, ports, explanation')
        // ->where('date >=', $fromdate)
        // ->where('date <=', $todate)
        // ->where('department', $department)
        // ->get()->getResult();
        return $this->db->table('internetrequestmaster')->select([
            'internetrequestmaster.intreq_id',
            'internetrequestmaster.user_id',
            'internetrequestmaster.pfno',
            'internetrequestmaster.email',
            'internetrequestmaster.mobile',
            'internetrequestmaster.extention',
            'internetrequestmaster.req_date',
            'internetrequestmaster.department',
            'internetrequestmaster.position',
            'internetrequestmaster.ip_address',
            'internetrequestmaster.access_type',
            'internetrequestmaster.category',
            'internetrequestmaster.effective_from',
            'internetrequestmaster.expire_on',
            'internetrequestmaster.purpose',
            'internetrequestmaster.loged_user',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = internetrequestmaster.user_id')
        ->where('req_date >=', $fromdate)
        ->where('req_date <=', $todate)
        ->where('internetrequestmaster.department', $dipid)
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

    public function getIntRequestsforapp($dipid)
    {
        // $result =  $this->where('mstatus',0)
        //             ->where('department',$dipid)
        //             ->get()
        //             ->getResult();

        return $this->db->table('internetrequestmaster')->select([
            'internetrequestmaster.intreq_id',
            'internetrequestmaster.user_id',
            'internetrequestmaster.pfno',
            'internetrequestmaster.email',
            'internetrequestmaster.mobile',
            'internetrequestmaster.extention',
            'internetrequestmaster.req_date',
            'internetrequestmaster.department',
            'internetrequestmaster.position',
            'internetrequestmaster.ip_address',
            'internetrequestmaster.access_type',
            'internetrequestmaster.category',
            'internetrequestmaster.effective_from',
            'internetrequestmaster.expire_on',
            'internetrequestmaster.purpose',
            'internetrequestmaster.loged_user',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = internetrequestmaster.user_id')
        ->where('internetrequestmaster.department', $dipid)
        ->where('internetrequestmaster.mstatus', '0')
        ->get()
        ->getResultArray();

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function getmyIntRequests($uid)
    {
        // $result =  $this->where('mstatus',0)
        //             ->where('department',$dipid)
        //             ->get()
        //             ->getResult();

        return $this->db->table('internetrequestmaster')->select([
            'internetrequestmaster.intreq_id',
            'internetrequestmaster.user_id',
            'internetrequestmaster.pfno',
            'internetrequestmaster.email',
            'internetrequestmaster.mobile',
            'internetrequestmaster.extention',
            'internetrequestmaster.req_date',
            'internetrequestmaster.department',
            'internetrequestmaster.position',
            'internetrequestmaster.ip_address',
            'internetrequestmaster.access_type',
            'internetrequestmaster.category',
            'internetrequestmaster.effective_from',
            'internetrequestmaster.expire_on',
            'internetrequestmaster.purpose',
            'internetrequestmaster.loged_user',
            'internetrequestmaster.mstatus',
            'internetrequestmaster.itsecstatus',
            'internetrequestmaster.isnetworkdeployed',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = internetrequestmaster.user_id')
        ->where('internetrequestmaster.user_id', $uid)
        ->where('internetrequestmaster.mstatus', '0')
        ->get()
        ->getResultArray();

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }



    

    

}




