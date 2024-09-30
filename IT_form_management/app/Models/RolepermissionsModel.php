<?php

namespace App\Models;

use CodeIgniter\Model;

class RolepermissionsModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'rolepermissionmng';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = false;
    protected $allowedFields        = [];
  
   
    public function getPermissions($roleid)
    {
        $permissions =  $this->select(['featurename', 'is_access'])->join('permissionmaster', 'permissionmaster.id = rolepermissionmng.per_id')
        ->where('rolepermissionmng.role_id', $roleid)->get()->getResultArray();    
        
        $permissionArray = [];

        foreach($permissions as $permission) {
            $permissionArray[$permission['featurename']] = $permission['is_access'];
        }

        $permissions = json_decode(json_encode($permissionArray));

        // print_r('<pre>');
        // print_r($permissions);
        // print_r('</pre>');die;

        return $permissions;
    }

    public function getRolePermissions($roleid)
    {
        $permissionArray =  
        
        
        $this->db->table('rolepermissionmng')->select([
            'rolepermissionmng.id',
            'rolepermissionmng.role_id',
            'rolepermissionmng.per_id',
            'userrolemaster.rolename',
            'permissionmaster.displayname', 
            'rolepermissionmng.is_access'
        ])
        ->join('userrolemaster', 'userrolemaster.roleid = rolepermissionmng.role_id')
        ->join('permissionmaster', 'permissionmaster.id = rolepermissionmng.per_id')
        ->where('rolepermissionmng.role_id', $roleid)
        ->get()->getResultArray();    



        
        // $permissionArray = [];

        // foreach($permissions as $permission) {
        //     $permissionArray[$permission['featurename']] = $permission['is_access'];
        // }

        $permissions = json_decode(json_encode($permissionArray));

        // print_r('<pre>');
        // print_r($permissions);
        // print_r('</pre>');die;

        return $permissions;
    }

    public function updatePermission($id, $access) {

        $this->set('is_access', $access);
        return $this->where('id', $id)->update();

    }

}