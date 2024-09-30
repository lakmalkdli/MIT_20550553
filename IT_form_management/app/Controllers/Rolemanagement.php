<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\DepartmentModel;
use App\Models\RolepermissionsModel;



class Rolemanagement extends BaseController
{
    protected $rolemodel;

    public function __construct() {
        $this->rolemodel = new RoleModel();
    }
    public function updaterole()
    {
        $roledata = [
            "rolename" => trim($this->request->getVar('rolename'))
        ];

        $result = $this->rolemodel->saveRole($roledata);

        if ( $result > 0 ) {
            // var_dump("saved successfully");
            return redirect()->to(base_url('role/edit'));
        } else {
            var_dump("save error!");
        }

        die;
    }
    public function getselectedrole($roleid = false){

        // var_dump($seg1);die;

        if ((int)$roleid > 0)
        {

            $data['editrolename'] = $this->rolemodel->search_by_id($roleid)['rolename'];
            $data['edtrolelist'] = $this->rolemodel->getRole();  
            // print_r('<pre>');
            // print_r($data);
            // print_r('<pre>');die;
            return view('rolemanagement/editrole', $data);
        }
        else
        {
            redirect('not_good_id_method', 'refresh');//in case of not valid id
        }
    }


    public function getrolelisttoedit()
    {
        $data['edtrolelist'] = $this->rolemodel->getRole();  
        // return view('firewallrequest/pendingrequestlist', $data);
        // print_r('<pre>');
        // print_r($data['rolelist']);
        // print_r('</pre>');die;
        return view('rolemanagement/editrole', $data);
    }

    public function getrolelist()
    {
        $data['newrolelist'] = $this->rolemodel->getRole();  
        // return view('firewallrequest/pendingrequestlist', $data);
        // print_r('<pre>');
        // print_r($data['rolelist']);
        // print_r('</pre>');die;
        return view('rolemanagement/addrole', $data);
    }

    public function getrolegroupaccesslist($roleid)
    {
        $rolemodelaccess = new RolepermissionsModel();
        $data['role_list'] = $this->rolemodel->getallRole();
        $data['rolegrouplist'] = $rolemodelaccess->getRolePermissions($roleid);  
        $data['selectedroleid'] = $roleid;  
        // return view('firewallrequest/pendingrequestlist', $data);
        // print_r('<pre>');
        // print_r($data['rolegrouplist']);
        // print_r('</pre>');die;
        return view('rolemanagement/rolemodel', $data);

    }
    public function getrole(){
        // $data['rolelist'] = $this->rolemodel->getRole(); 
        $data['role_list'] = $this->rolemodel->getallRole();
            // print_r('<pre>');
            // print_r($data['role_list']);
            // print_r('</pre>');die;
        return view('rolemanagement/rolemodel', $data);
    }

    public function save()
    {
        $roledata = [
            "rolename" => trim($this->request->getVar('rolename'))
        ];

        $result = $this->rolemodel->saveRole($roledata);

        if ( $result > 0 ) {
            return redirect()->to(base_url('role/edit'));
        } else {
            var_dump("save error!");
        }

        die;
    }

    public function updaterolegroup()
    {

        $selectedRows = $this->request->getPost('update_rolegroup');

            // print_r('<pre>');
            // print_r($selectedRows);
            // print_r('</pre>');die;

    }

    public function updatepermissions() {
        $permissionid = $this->request->getPost('id');
        $accesslevel = $this->request->getPost('acceess');

        $rolemodelaccess = new RolepermissionsModel();

        if ($rolemodelaccess->updatePermission($permissionid, $accesslevel)) {
            $status = 200;
            $message = 'Permission updated!';
        } else {
            $status = 500;
            $message = 'Permission cannot be updated!';
        }
        
        return $this->respond(['status' => $status, 'message' => $message]);
        
    }

    


}

     