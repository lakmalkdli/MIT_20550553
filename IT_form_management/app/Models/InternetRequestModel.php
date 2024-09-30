<?php

namespace App\Models;

use CodeIgniter\Model;

class InternetRequestModel extends Model
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


    public function saveRequestInternet($data=[])
    {
        return $this->insert($data);
    }

    public function search_by_id($id){

        return $this->where('intreq_id',$id)->first();
     }

    public function search_by_intreqid($reqid){

        // return $this->where('intreq_id',$reqid)->first();

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
            'internetrequestmaster.managercomment',
            'internetrequestmaster.app_by',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = internetrequestmaster.user_id')
        ->where('internetrequestmaster.intreq_id', $reqid)
        ->get()
        ->getResultArray(); 

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
     }

     public function aproverequest($id,$data){

        // return $this->set('mng_apr',$data['mng_apr'])->set('managercommnt',$data['managercommnt'])
        //             ->where('req_id',$id)
        //             ->update();
        return $this->set($data)
        ->where('intreq_id', $id)
        ->update();
    }

    public function authintrequest($id,$data){

        // return $this->set('mng_apr',$data['mng_apr'])->set('managercommnt',$data['managercommnt'])
        //             ->where('req_id',$id)
        //             ->update();
        return $this->set($data)
        ->where('intreq_id', $id)
        ->update();
    }


    public function getAuthintrequests()
    {
        
        $array = array('mstatus' => 1, 'itsecstatus' => 0);
        // return $this->where($array)->get()->getResult();
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
        ->where($array)
        ->get()
        ->getResultArray();
               

        // return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($this->where('mng_apr',0)->findAll());
        // print_r('</pre>');die;
    }


    public function getexecutionrequests()
    {
        
        $array = array('mstatus' => 1, 'itsecstatus' => 1, 'isnetworkdeployed' => 0);
        // return $this->where($array)->get()->getResult();
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
            'internetrequestmaster.auth_by',
            'internetrequestmaster.itseccomment',       
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = internetrequestmaster.user_id')
        ->where($array)
        ->get()
        ->getResultArray();
               

        // return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($this->where('mng_apr',0)->findAll());
        // print_r('</pre>');die;
    }


    public function getAuthintrequestsuname()
    {
        
        $array = array('mstatus' => 1, 'itsecstatus' => 0);
        // return $this->where($array)->get()->getResult();
        return $this->db->table('internetrequestmaster')->select([
            'internetrequestmaster.intreq_id',
            'usermaster.u_fname',
        ])
        ->join('usermaster', 'usermaster.u_id = internetrequestmaster.user_id')
        ->where($array)
        ->get()
        ->getResultArray();

        
    }
    public function getpenbymaninyt($status){

        return $this->where('mstatus', $status)
        ->countAllResults();

        
    }
    public function getapppenintreqcount($id){

        return $this->where('mstatus', '0')
        ->where('user_id',$id)
        ->countAllResults();

        
    }
    
   public function gesecpendingint($status) {

            return $this->where('mstatus', $status)
            ->where('itsecstatus', "0")
            ->countAllResults();
    
        }

    public function gesecpendingintuwise($id){

            return $this->where('itsecstatus', '0')
            ->where('user_id',$id)
            ->countAllResults();
    
            
        }

    public function getpenbynetwrkint($id) {

            return $this->where('isnetworkdeployed', '0')
            ->where('user_id', $id)
            ->countAllResults();
        }

        public function getnetwrkpenintuwise($id) {

            return $this->where('isnetworkdeployed', '0')
            ->where('user_id', $id)
            ->countAllResults();
        }

    public function getapproved($status) {

            return $this->where('isnetworkdeployed', "1")
            ->countAllResults();
        }
        


        public function getrejbymanint($status) {

            return $this->where('mstatus', $status)
            ->countAllResults();
        }
        public function getrejbysecint($status) {
    
            return $this->where('itsecstatus', $status)
            ->countAllResults();
        }
        
        public function getrejbynetwint($status) {
    
            return $this->where('isnetworkdeployed', $status)
            ->countAllResults();
        }

  
}