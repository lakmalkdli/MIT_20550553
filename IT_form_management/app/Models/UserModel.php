<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'usermaster';
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
    
    public function getUser($username='')
    {
        return $this->where('u_username', $username)->get()->getRow();  
        // $result = $this->where('u_username', $username)->get()->getRow(); 
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;

    }
    
    public function getUsers($selectedRoleId='')
    {
        // return $this->where('u_roleid',$selectedRoleId) ->get()->getResult();

        // $result =
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;

        return $this->where('u_roleid',$selectedRoleId)->get()->getResult();
        // return $this->where('mng_apr',0)->get()->getResult();


    }

    public function getManagersforAppr()
        {

            return $this->whereIn('u_roleid', ['2','3'])
            ->get()
            ->getResult();

            // print_r('<pre>');
            // print_r($result);
            // print_r('</pre>');die;    


        }

    public function getallusersfordropdown()
        {

            return $this->where('u_status', '1')
            ->get()
            ->getResult();

            // print_r('<pre>');
            // print_r($result);
            // print_r('</pre>');die;    


        }

    

    public function getManagerforAppr($uid)
    {

        return $this->where('u_id', $uid)
        ->get()
        ->getResult();

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;    


    }

    public function getapprManager()
    {
        $array = array('1', '3');
        return $this->where('u_roleid', $array[0])
            ->orWhere('u_roleid', $array[1])
            ->get()
            ->getResult();

    }

    public function getauthofficerforAppr($uid)
    {

        return $this->where('u_id', $uid)
        ->get()
        ->getResult();

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;    


    }


    public function getuserlist()
    {
        return $this->get()->getResult();   
        // $result = $this->get()->getResult();   
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;

        // return $this->where('u_roleid',$selectedRoleId)->get()->getResult();
        // return $this->where('mng_apr',0)->get()->getResult();

    }

    public function saveUser($data=[])
    {
        return $this->insert($data);
    }


    public function findUserBypfno($pf) {
        return $this->where(['u_pfno' => $pf])->first();
        // $result = $this->where(['u_pfno' => $pf])->first();  
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function getselecuser($id) {
        return $this->where(['u_id' => $id])->first();
        // $result = $this->where(['u_id' => $id])->first(); 
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function getUserlists()
    {
        return $this->get()->getResult();
        // $result = $this->get()->getResult();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;

    }

    public function changepassword($uid,$passwordData){

        return $this->set($passwordData)
        ->where('u_id', $uid)
        ->update();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function updateuser($id,$changeuserdata){
        
        return $this->set($changeuserdata)
        ->where('u_id', $id)
        ->update(); // Replace 'user' with your table name

        // return $this->db->affected_rows(); // Return the number of affected rows   
       
    }

    
    public function resetpassword($id,$newPassword,$loguser){
        
        return $this->set($newPassword)
        ->where('u_id', $id)
        ->update(); // Replace 'user' with your table name

        // return $this->db->affected_rows(); // Return the number of affected rows   
       
    }

    public function updateuserstatus($seluid, $ustatedata){

        
        return $this->set($ustatedata)
        ->where('u_id', $seluid)
        ->update(); // Replace 'user' with your table name

        // return $this->db->affected_rows(); // Return the number of affected rows   
       
    }


}