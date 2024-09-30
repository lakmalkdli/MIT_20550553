<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'userrolemaster';
    protected $primaryKey           = 'roleid';
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

    public function getRole()
    {
        return $this->get()->getResult();     
    }

    public function getallRole()
    {
        $query = $this->get()->getResult();
        // return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($query);
        // print_r('</pre>');die;


		if (count($query) > 0) {

			$myarray = array();

			foreach ($query as $row1) {
				$myarray[$row1->roleid] = $row1->rolename;
			}
			return $myarray;
		}
		return false;
    }

    public function saveRole($data=[])
    {
        return $this->insert($data);
    }

    public function aproverequest($id,$data){

        return $this->set('mng_apr',$data['mng_apr'])
                    ->where('req_id',$id)
                    ->update();
    }

    public function search_by_id($id){

        return $this->where('roleid',$id)->first();
     }
}