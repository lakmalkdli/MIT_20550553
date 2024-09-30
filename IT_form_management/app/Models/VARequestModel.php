<?php

namespace App\Models;

use CodeIgniter\Model;

class VARequestModel extends Model
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


    public function saveRequestVA($data=[])
    {
        return $this->insert($data);
    }

    public function getRequests()
    {
       
    //    return $this->where('mng_apr',0)->get()->getResult();

            return $this->db->table('varequestmaster')->select([
                'varequestmaster.req_id',
                'varequestmaster.user_id',
                'varequestmaster.pfno',
                'varequestmaster.email',
                'varequestmaster.mobile',
                'varequestmaster.extention',
                'varequestmaster.date',
                'varequestmaster.department',
                'varequestmaster.position',
                'varequestmaster.server_ip',
                'varequestmaster.server_os',
                'varequestmaster.criticality',
                'varequestmaster.explanation',
                'varequestmaster.mng_apr',
                'varequestmaster.sec_apr',
                'varequestmaster.loged_user',
                'usermaster.u_fname',
                'departmentmaster.name',
            ])
            ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
            ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
            ->where('varequestmaster.mng_apr', '0')
            ->get()
            ->getResult();
    // print_r('<pre>');
    // print_r($result);
    // print_r('</pre>');die;
     
    }

    public function search_by_id($id){

       //return $this->where('req_id',$id)->first();

            return $this->db->table('varequestmaster')->select([
                'varequestmaster.req_id',
                'varequestmaster.user_id',
                'varequestmaster.pfno',
                'varequestmaster.email',
                'varequestmaster.mobile',
                'varequestmaster.extention',
                'varequestmaster.date',
                'varequestmaster.department',
                'varequestmaster.position',
                'varequestmaster.server_ip',
                'varequestmaster.server_os',
                'varequestmaster.criticality',
                'varequestmaster.explanation',
                'varequestmaster.mng_apr',
                'varequestmaster.sec_apr',
                'varequestmaster.loged_user',
                'usermaster.u_fname',
                'departmentmaster.name',
            ])
            ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
            ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
            ->where('varequestmaster.req_id',$id)
            ->get()
            ->getResult();
     }

     public function auth_search_by_id($id){

        //return $this->where('req_id',$id)->first();
 
             return $this->db->table('varequestmaster')->select([
                 'varequestmaster.req_id',
                 'varequestmaster.user_id',
                 'varequestmaster.pfno',
                 'varequestmaster.email',
                 'varequestmaster.mobile',
                 'varequestmaster.extention',
                 'varequestmaster.date',
                 'varequestmaster.department',
                 'varequestmaster.position',
                 'varequestmaster.server_ip',
                 'varequestmaster.server_os',
                 'varequestmaster.criticality',
                 'varequestmaster.explanation',
                 'varequestmaster.mng_apr',
                 'varequestmaster.sec_apr',
                 'varequestmaster.loged_user',
                 'varequestmaster.managercommnt',
                 'varequestmaster.app_by',
                 'usermaster.u_fname',
                 'departmentmaster.name',
             ])
             ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
             ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
             ->where('varequestmaster.req_id',$id)
             ->get()
             ->getResult();
      }

      public function dep_search_by_id($id){

        //return $this->where('req_id',$id)->first();
 
             return $this->db->table('varequestmaster')->select([
                 'varequestmaster.req_id',
                 'varequestmaster.user_id',
                 'varequestmaster.pfno',
                 'varequestmaster.email',
                 'varequestmaster.mobile',
                 'varequestmaster.extention',
                 'varequestmaster.date',
                 'varequestmaster.department',
                 'varequestmaster.position',
                 'varequestmaster.server_ip',
                 'varequestmaster.server_os',
                 'varequestmaster.criticality',
                 'varequestmaster.explanation',
                 'varequestmaster.mng_apr',
                 'varequestmaster.sec_apr',
                 'varequestmaster.loged_user',
                 'varequestmaster.managercommnt',
                 'varequestmaster.app_by',
                 'varequestmaster.itseccomment',
                 'varequestmaster.auth_by',
                 'usermaster.u_fname',
                 'departmentmaster.name',
             ])
             ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
             ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
             ->where('varequestmaster.req_id',$id)
             ->get()
             ->getResult();
      }

     public function aproverequest($id,$data){

        return $this->set('mng_apr',$data['mng_apr'])->set('managercommnt',$data['managercommnt'])
                    ->where('req_id',$id)
                    ->update();
    }

    public function aprovevarequest($id,$data){

        return $this->set($data)
        ->where('req_id', $id)
        ->update();
    }

    public function getvaRequestsauth()
    {
       
    //    return $this->where('mng_apr',0)->get()->getResult();

            return $this->db->table('varequestmaster')->select([
                'varequestmaster.req_id',
                'varequestmaster.user_id',
                'varequestmaster.pfno',
                'varequestmaster.email',
                'varequestmaster.mobile',
                'varequestmaster.extention',
                'varequestmaster.date',
                'varequestmaster.department',
                'varequestmaster.position',
                'varequestmaster.server_ip',
                'varequestmaster.server_os',
                'varequestmaster.criticality',
                'varequestmaster.explanation',
                'varequestmaster.mng_apr',
                'varequestmaster.sec_apr',
                'varequestmaster.loged_user',
                'usermaster.u_fname',
                'departmentmaster.name',
            ])
            ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
            ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
            ->where('varequestmaster.mng_apr', '1')
            ->where('varequestmaster.sec_apr', '0')
            ->get()
            ->getResult();
    // print_r('<pre>');
    // print_r($result);
    // print_r('</pre>');die;
     
    }

    public function getvaRequestsdep()
    {
       
    //    return $this->where('mng_apr',0)->get()->getResult();

            return $this->db->table('varequestmaster')->select([
                'varequestmaster.req_id',
                'varequestmaster.user_id',
                'varequestmaster.pfno',
                'varequestmaster.email',
                'varequestmaster.mobile',
                'varequestmaster.extention',
                'varequestmaster.date',
                'varequestmaster.department',
                'varequestmaster.position',
                'varequestmaster.server_ip',
                'varequestmaster.server_os',
                'varequestmaster.criticality',
                'varequestmaster.explanation',
                'varequestmaster.mng_apr',
                'varequestmaster.sec_apr',
                'varequestmaster.loged_user',
                'usermaster.u_fname',
                'departmentmaster.name',
            ])
            ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
            ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
            ->where('varequestmaster.mng_apr', '1')
            ->where('varequestmaster.sec_apr', '1')
            ->where('varequestmaster.is_execute', '0')
            ->get()
            ->getResult();
    // print_r('<pre>');
    // print_r($result);
    // print_r('</pre>');die;
     
    }



    public function getmyIntRequests($uid)
    {

        return $this->db->table('varequestmaster')->select([
            'varequestmaster.req_id',
            'varequestmaster.user_id',
            'varequestmaster.pfno',
            'varequestmaster.email',
            'varequestmaster.mobile',
            'varequestmaster.extention',
            'varequestmaster.date',
            'varequestmaster.department',
            'varequestmaster.position',
            'varequestmaster.server_ip',
            'varequestmaster.server_os',
            'varequestmaster.criticality',
            'varequestmaster.explanation',
            'varequestmaster.mng_apr',
            'varequestmaster.sec_apr',
            'varequestmaster.loged_user',
            'usermaster.u_fname',
            'departmentmaster.name',
            'varequestmaster.filename',
        ])
        ->join('usermaster', 'usermaster.u_id = varequestmaster.user_id')
        ->join('departmentmaster', 'departmentmaster.id = varequestmaster.department')
        ->where('varequestmaster.user_id', $uid)
        ->get()
        ->getResult();
        // ->getResultArray();

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    
}