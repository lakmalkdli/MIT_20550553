<?php

namespace App\Controllers;

use App\Models\FirewallRequestModel;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\RolepermissionsModel;
use App\Models\PwdResetRequestModel;



class PwdResetRequest extends BaseController
{
  
    protected $PwdResetrequest;

    public function __construct() {
      
        $this->PwdResetrequest = new PwdResetRequestModel();
    }


public function save_pwd_reset()
{
    $req_type = trim($this->request->getVar('req_type'));
 if ($req_type == "reset_pwd"){
    $this->validation->setRules([
        'reason' => [
            'label' => 'Reason to reset',
            'rules' => 'required'
        ],
    ]);
 }
 

 $user_type = trim($this->request->getVar('user_type'));
 
 if ($user_type == "stf_mem" && $req_type == "reset_pwd"){

    $this->validation->setRules([
        'req_type' => [
            'label' => 'Type of Request',
            'rules' => 'required'
        ],
        'reason' => [
            'label' => 'Reason to reset',
            'rules' => 'required'
        ],
        'user_type' => [
            'label' => 'User Type',
            'rules' => 'required'
        ], 
        'name' => [
            'label' => 'Name',
            'rules' => 'required'
        ],
        'position' => [
            'label' => 'Grade',
            'rules' => 'required'
        ],
        'pfno' => [
            'label' => 'PF No',
            'rules' => 'required'
        ],
        
        'mobile' => [
            'label' => 'Mobile No',
            'rules' => 'required|regex_match[/^[0-9]{10}$/]'
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ],
        'nic' => [
            'label' => 'NIC No',
            'rules' => 'regex_match[/^\d{9}[VvXx]$/]'
        ],
        'exten' => [
            'label' => 'Extension',
            'rules' => 'required|numeric'
        ],
        'branch' => [
            'label' => 'Branch',
            'rules' => 'required'
        ],
        'branch_code' => [
            'label' => 'Branch Code',
            'rules' => 'required'
        ],
         
    ]);
 }else if ($user_type == "ext_user" && $req_type == "reset_pwd"){

    $this->validation->setRules([
        'req_type' => [
            'label' => 'Type of Request',
            'rules' => 'required'
        ],
        'reason' => [
            'label' => 'Reason to reset',
            'rules' => 'required'
        ],
        'user_type' => [
            'label' => 'User Type',
            'rules' => 'required'
        ], 
        'name1' => [
            'label' => 'Name',
            'rules' => 'required'
        ],
        'nic1' => [
            'label' => 'NIC No',
            'rules' => 'required|regex_match[/^\d{9}[VvXx]$/]'
        ],
        
        'branch1' => [
            'label' => 'Branch',
            'rules' => 'required'
        ],
        'branch_code1' => [
            'label' => 'Branch Code',
            'rules' => 'required'
        ],
        'exdate' => [
            'label' => 'Contract Termination Date',
            'rules' => 'required'
        ],
         
    ]); 
} else if ($user_type == "ext_user" && $req_type == "new_user"){
    $this->validation->setRules([
        'req_type' => [
            'label' => 'Type of Request',
            'rules' => 'required'
        ],
        'user_type' => [
            'label' => 'User Type',
            'rules' => 'required'
        ], 
        'name1' => [
            'label' => 'Name',
            'rules' => 'required'
        ],
        'nic1' => [
            'label' => 'NIC No',
            'rules' => 'required|regex_match[/^\d{9}[VvXx]$/]'
        ],
        'exdate' => [
            'label' => 'Contract Termination Date',
            'rules' => 'required'
        ],
        'branch1' => [
            'label' => 'Branch',
            'rules' => 'required'
        ],
        'branch_code1' => [
            'label' => 'Branch Code',
            'rules' => 'required'
        ],
]);

 } else {
    $this->validation->setRules([
        'req_type' => [
            'label' => 'Type of Request',
            'rules' => 'required'
        ],
        'user_type' => [
            'label' => 'User Type',
            'rules' => 'required'
        ], 
        'name' => [
            'label' => 'Name',
            'rules' => 'required'
        ],
        'position' => [
            'label' => 'Grade',
            'rules' => 'required'
        ],
        'pfno' => [
            'label' => 'PF No',
            'rules' => 'required'
        ],
        
        'mobile' => [
            'label' => 'Mobile No',
            'rules' => 'required|regex_match[/^[0-9]{10}$/]'
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ],
        'exten' => [
            'label' => 'Extension',
            'rules' => 'required|numeric'
        ],
        'branch' => [
            'label' => 'Branch',
            'rules' => 'required'
        ],
        'branch_code' => [
            'label' => 'Branch Code',
            'rules' => 'required'
        ],
        'nic' => [
            'label' => 'NIC No',
            'rules' => 'regex_match[/^\d{9}[VvXx]$/]'
        ],
         
    ]);
 }
   
    

    $this->validation->withRequest($this->request)->run();

    if (!empty($this->validation->getErrors())) {
        return $this->respond([
            'status' => 400, 
            'data' => [
                "errors" => $this->validation->getErrors()
            ]
        ]);
    }
    // print_r('validation pass');
    // $data['pfno'] = trim($this->request->getVar('pfno'));

    
    $requestdata = [

        "req_type" => trim($this->request->getVar('req_type')),
        "user_type" => trim($this->request->getVar('user_type')),
        "resetreason" => trim($this->request->getVar('reason')),
        "namewithini" => trim($this->request->getVar('name')),
        "position" => trim($this->request->getVar('position')),
        "pfno" => trim($this->request->getVar('pfno')),
        "mobile" => trim($this->request->getVar('mobile')),
        "email" => trim($this->request->getVar('email')),
        "extention" => trim($this->request->getVar('exten')), 
        "reqdate" => date('Y-m-d'),
        "id_num" => trim($this->request->getVar('nic')),
        "d_contrct_trmnt" => trim($this->request->getVar('exdate')),
        "branch" => trim($this->request->getVar('branch')),
        "bcode" => trim($this->request->getVar('branch_code')),
       

    ];

    // $internetmodel = new InternetRequestModel();

    $result = $this->PwdResetrequest->saveRequestPwdreset($requestdata);

    if ( $result > 0 ) {
        return $this->respond([
            'status' => 200, 
            'data' => [
                "message" => "Saved Successfully!"
            ]
        ]);
    } else {
        return $this->respond([
            'status' => 500, 
            'data' => [
                "message" => "Save Error!"
            ]
        ]);
    }


}


public function pendingrequestlist()
{
    
    $data['pendingRequests'] = $this->PwdResetrequest->getRequests(); 
    


    return view('firewallrequest/pendingpwdlist', $data);
    // return view('firewallauthentication/authentication', $data);

}

public function getselectedreq($req_id = false){

    // var_dump($seg1);die;

    if ((int)$req_id > 0)
    {

        $data['datasearch_by_Id'] = $this->PwdResetrequest->search_by_id($req_id);
        $usermodel = new UserModel();
        $data['managerlists'] = $usermodel->getManagersforAppr();
        // print_r('<pre>');
        // print_r($data);
        // print_r('<pre>');die;
        return view('firewallrequest/manapprovalpwdreset', $data);

    }
    else
    {
        redirect('not_good_id_method', 'refresh');//in case of not valid id
    }
}

public function approvebyman()
{
    // $data['approverequests'] = $this->firewallrequest->find($id);

    if ( $this->request->getVar('type') == "approved" )
    {

        $id = trim($this->request->getVar('id'));

        $data = [
            "mngcomm" =>  $this->request->getVar('man_comment'),
            "mstatus" => $this->request->getVar('approvedby'),
        ];

        $result = $this->PwdResetrequest->aproveRequest($id, $data);
        
        if ( $result > 0 ) {
            return $this->respond([
                'status' => 200, 
                'data' => [
                    "message" => "Approved Successfully!"
                ]
            ]);
        } else {
            return $this->respond([
                'status' => 500, 
                'data' => [
                    "message" => "Error Occur !"
                ]
            ]);
        }
    } else if ( $this->request->getVar('type') == "rejected" ) {
        // $data = [
        //     "mng_apr" => "2",                
        //     "managercommnt" =>  trim($this->request->getVar('man_comment')),
        // ];
        // $result = $this->firewallrequest->aproveRequest($id,$data);
        // if ( $result > 0 ) {
        //     return $this->respond([
        //         'status' => 200, 
        //         'data' => [
        //             "message" => "Rejected Successfully!"
        //         ]
        //     ]);
        // } else {
        //     return $this->respond([
        //         'status' => 500, 
        //         'data' => [
        //             "message" => "Error Occur !"
        //         ]
        //     ]);
        // }
    }               
    
}

}

     