<?php

namespace App\Controllers;

use App\Models\FirewallRequestModel;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\RolepermissionsModel;
use App\Models\VARequestModel;
use App\Models\InternetRequestModel;
use App\Models\PwdResetRequestModel;



class VArequest extends BaseController
{
    protected $VArequest;
    protected $Internetrequest;
    protected $PwdResetrequest;

    public function __construct() {
        $this->VArequest = new VARequestModel();
        $this->Internetrequest = new InternetRequestModel();
        $this->PwdResetrequest = new PwdResetRequestModel();
    }

    public function checkSession()
    {
        
        if (isset($_SESSION['user_ID'])) {

            $id = $_SESSION['user_ID'];
            //echo "User ID: $id";
            return true;
        } else {
            echo "user ID not found";
            return false;
            //echo "not found";
        }
    }

    

    public function addva()
    {
        if ($this->checkSession()) {
            if (isset($_SESSION['user_ID'])) {

                $id = $_SESSION['user_ID'];
                $roleid = $_SESSION['role_id'];   

                $data['permissions'] = $this->session->get('permissions');

                $departmentmodel = new DepartmentModel();
                $data['departments'] = $departmentmodel->getDepartments('1');

                $rolemodel = new RoleModel();
                $data['rolelists'] = $rolemodel->getRole();

                $usermodel = new UserModel();
                $data['userlists'] = $usermodel->getUsers($roleid);

                $data['selecteduserdata'] = $usermodel->getselecuser($id);

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;

                return view('varequests/addva', $data);
                // return view('firewallrequest/approval', $data);

            } else {
                return redirect()->to(base_url('login'));
            }

        }else {
            return redirect()->to(base_url('login'));
            }
    }



    public function save_va()
    {
       

        $requestdata = [

            "department" => trim($this->request->getVar('department')),
            "position" => 1, 
            "user_id" => trim($this->request->getVar('user_id')),
            "pfno" => trim($this->request->getVar('pfno')),
            "email" => trim($this->request->getVar('email')),
            "mobile" => trim($this->request->getVar('mobile')),
            "extention" => trim($this->request->getVar('exten')),
            "date" => trim($this->request->getVar('request_date')),
            "server_os" => trim($this->request->getVar('serveros')),
            "server_ip" => trim($this->request->getVar('server_ip')),
            "criticality" => trim($this->request->getVar('criticality')),      
            "explanation" =>  trim($this->request->getVar('explanation')),

        ];
        // print_r('<pre>');
        // print_r($requestdata);
        // print_r('<pre>');die;

        $result = $this->VArequest->saveRequestVA($requestdata);

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

    public function save_internet()
    {
        // print_r("fdsafsaf");
        

        $this->validation->setRules([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
            'pfno' => [
                'label' => 'PF No',
                'rules' => 'required|numeric'
            ], 
            'mobile' => [
                'label' => 'Mobile No',
                'rules' => 'required|regex_match[/^[0-9]{10}$/]'
            ],
            'exten' => [
                'label' => 'Extension number',
                'rules' => 'required|numeric'
            ],
            'category' => [
                'label' => 'Category',
                'rules' => 'required'
            ],
            'department' => [
                'label' => 'Criticality',
                'rules' => 'required'
            ],
            'position' => [
                'label' => 'Designation',
                'rules' => 'required'
            ],
            'server_ip' => [
                'label' => 'Source Address',
                'rules' => 'required'
            ],
            'request_date' => [
                'label' => 'Request Date',
                'rules' => 'required'
            ],
            'efrmdate' => [
                'label' => 'Effective Date',
                'rules' => 'required'
            ],
            'exdate' => [
                'label' => 'Expiration Date',
                'rules' => 'required'
            ],
            
             
        ]);

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

            "user_id" => trim($this->request->getVar('user_id')),
            "pfno" => trim($this->request->getVar('pfno')),
            "email" => trim($this->request->getVar('email')),
            "mobile" => trim($this->request->getVar('mobile')),
            "extention" => trim($this->request->getVar('exten')),
            "req_date" => trim($this->request->getVar('request_date')),
            "department" => trim($this->request->getVar('department')),
            "position" => trim($this->request->getVar('position')), 
            "ip_address" => trim($this->request->getVar('server_ip')),
            "access_type" => trim($this->request->getVar('access_type')),
            "category" => trim($this->request->getVar('category')),
            "effective_from" => trim($this->request->getVar('efrmdate')),
            "expire_on" => trim($this->request->getVar('exdate')),
            "purpose" =>  trim($this->request->getVar('purpose')),   

        ];

        // $internetmodel = new InternetRequestModel();

        $result = $this->Internetrequest->saveRequestInternet($requestdata);

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
    

    if ($this->checkSession()) {

        $data['pendingRequests'] = $this->VArequest->getRequests(); 

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;
        
                return view('varequests/pendvalist', $data);
    } else {
        return redirect()->to(base_url('login'));
    }

}

public function getselectedvareq($req_id = false){

    // var_dump($seg1);die;
    if ($this->checkSession()) {
        if (isset($_SESSION['user_ID'])) {

            $id = $_SESSION['user_ID'];
            $roleid = $_SESSION['role_id'];   

            if ((int)$req_id > 0)
            {
                $departmentmodel = new DepartmentModel();
                $data['departments'] = $departmentmodel->getDepartments('1');

                $rolemodel = new RoleModel();
                $data['rolelists'] = $rolemodel->getRole();

                $usermodel = new UserModel();
                $data['userlists'] = $usermodel->getUsers($roleid);

                $data['selecteduserdata'] = $usermodel->getselecuser($id);

                $data['datasearch_by_Id'] = $this->VArequest->search_by_id($req_id);

                $data['unitmanager'] = $usermodel->getManagerforAppr($id);
                // $intreqdata['authofficer'] = $usermodel->getauthofficerforAppr($uid);
                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;
                return view('varequests/manapprovalva', $data);

            }
            else
            {
                redirect('not_good_id_method', 'refresh');//in case of not valid id
            }
        }else {
            return redirect()->to(base_url('login'));
        }

    }else {
        return redirect()->to(base_url('login'));
        }
        
        
}

public function getselectedvareqauth($req_id = false){

    // var_dump($seg1);die;
    if ($this->checkSession()) {
        if (isset($_SESSION['user_ID'])) {

            $id = $_SESSION['user_ID'];
            $roleid = $_SESSION['role_id'];   

            if ((int)$req_id > 0)
            {
                $departmentmodel = new DepartmentModel();
                $data['departments'] = $departmentmodel->getDepartments('1');

                $rolemodel = new RoleModel();
                $data['rolelists'] = $rolemodel->getRole();

                $usermodel = new UserModel();
                $data['userlists'] = $usermodel->getUsers($roleid);

                $data['selecteduserdata'] = $usermodel->getselecuser($id);

                $data['datasearch_by_Id'] = $this->VArequest->auth_search_by_id($req_id);

                $data['unitmanager'] = $usermodel->getManagersforAppr($id);

                $data['authofficer'] = $usermodel->getManagerforAppr($id);
                
                // $intreqdata['authofficer'] = $usermodel->getauthofficerforAppr($uid);
                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;
                return view('varequests/secauthva', $data);

            }
            else
            {
                redirect('not_good_id_method', 'refresh');//in case of not valid id
            }
        }else {
            return redirect()->to(base_url('login'));
        }

    }else {
        return redirect()->to(base_url('login'));
        }
        
        
}


public function getselectedvareqdep($req_id = false){

    // var_dump($seg1);die;
    if ($this->checkSession()) {
        if (isset($_SESSION['user_ID'])) {

            $id = $_SESSION['user_ID'];
            $roleid = $_SESSION['role_id'];   

            if ((int)$req_id > 0)
            {
                $departmentmodel = new DepartmentModel();
                $data['departments'] = $departmentmodel->getDepartments('1');

                $rolemodel = new RoleModel();
                $data['rolelists'] = $rolemodel->getRole();

                $usermodel = new UserModel();
                $data['userlists'] = $usermodel->getUsers($roleid);

                $data['selecteduserdata'] = $usermodel->getselecuser($id);
                

                $data['datasearch_by_Id'] = $this->VArequest->dep_search_by_id($req_id);

                $data['unitmanager'] = $usermodel->getManagersforAppr();

                $data['commonusers'] = $usermodel->getallusersfordropdown();

                // $data['executeofficers'] = $usermodel->getManagerforAppr();

                $data['executeofficer'] = $usermodel->getManagerforAppr($id);

                

                // $intreqdata['authofficer'] = $usermodel->getauthofficerforAppr($uid);
                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;
                return view('varequests/executeva', $data);

            }
            else
            {
                redirect('not_good_id_method', 'refresh');//in case of not valid id
            }
        }else {
            return redirect()->to(base_url('login'));
        }

    }else {
        return redirect()->to(base_url('login'));
        }
        
        
}


// public function approvebyman()
//     {
//         // $data['approverequests'] = $this->firewallrequest->find($id);

//         if ( $this->request->getVar('type') == "approved" )
//         {

//             $id = trim($this->request->getVar('id'));

//             $data = [
//                 "managercommnt" =>  trim($this->request->getVar('comment')),
//                 "mng_apr" => trim($this->request->getVar('approvedby')),
//             ];

//             $result = $this->VArequest->aproveRequest($id, $data);
            
//             if ( $result > 0 ) {
//                 return $this->respond([
//                     'status' => 200, 
//                     'data' => [
//                         "message" => "Approved Successfully!"
//                     ]
//                 ]);
//             } else {
//                 return $this->respond([
//                     'status' => 500, 
//                     'data' => [
//                         "message" => "Error Occur !"
//                     ]
//                 ]);
//             }
//         } else if ( $this->request->getVar('type') == "rejected" ) {
           
//         }               
        
//     }

    public function vaapprovebyman()
    {
        // $data['approverequests'] = $this->firewallrequest->find($id);

        if ($this->checkSession()) {

            date_default_timezone_set('Asia/Colombo');
            $uid = $_SESSION['user_ID'];

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "managercommnt" =>  trim($this->request->getVar('comment')),
                        "app_by" => trim($this->request->getVar('approvedby')),
                        "mng_apr"  =>'1',
                        "app_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;

                    $result = $this->VArequest->aprovevarequest($id, $data);
                    
                    if ( $result > 0 ) {
                        return $this->respond([
                            'status' => 200, 
                            'data' => [
                                "message" => "Approved Successfully!"
                            ]
                        ]);
                    } else {
                        return $this->respond([
                            'status' => 400, 
                            'data' => [
                                "message" => "Error Occur !"
                            ]
                        ]);
                    }
                } else if ( $this->request->getVar('type') == "rejected" ) {
                    $id = trim($this->request->getVar('id'));

                        $data = [
                            "managercommnt" =>  trim($this->request->getVar('comment')),
                            "app_by" => trim($this->request->getVar('approvedby')),
                            "mng_apr"  =>'2',
                            "app_date" => date('Y-m-d'),
                            "loged_user" => $uid,
                            
                        ];



                    $result = $this->VArequest->aprovevarequest($id, $data);
                    
                    if ( $result > 0 ) {
                        return $this->respond([
                            'status' => 200, 
                            'data' => [
                                "message" => "rejected Successfully!"
                            ]
                        ]);
                    } else {
                        return $this->respond([
                            'status' => 400, 
                            'data' => [
                                "message" => "Error Occur !"
                            ]
                        ]);
                    }
                }    
                
        } else {
            return redirect()->to(base_url('login'));
        }
        
    }

    public function pendingrequestlisttodeploy()
        {
            

            if ($this->checkSession()) {

                $data['pendingdepvaRequests'] = $this->VArequest->getvaRequestsdep(); 

                        // print_r('<pre>');
                        // print_r($data);
                        // print_r('<pre>');die;
                
                        return view('varequests/pendingvadeplist', $data);
            } else {
                return redirect()->to(base_url('login'));
            }

        }


    public function pendingrequestlisttoauth()
        {
            

            if ($this->checkSession()) {

                $data['pendingdepvaRequests'] = $this->VArequest->getvaRequestsauth(); 

                        // print_r('<pre>');
                        // print_r($data);
                        // print_r('<pre>');die;
                
                        return view('varequests/pendingvaauthlist', $data);
            } else {
                return redirect()->to(base_url('login'));
            }

        }

    public function authbysec()
        {
        // $data['approverequests'] = $this->firewallrequest->find($id);

        if ($this->checkSession()) {

            date_default_timezone_set('Asia/Colombo');
            $uid = $_SESSION['user_ID'];

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "itseccomment" =>  trim($this->request->getVar('comment')),
                        "auth_by" => trim($this->request->getVar('approvedby')),
                        "sec_apr"  =>'1',
                        "auth_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;

                    $result = $this->VArequest->aprovevarequest($id, $data);
                    
                    if ( $result > 0 ) {
                        return $this->respond([
                            'status' => 200, 
                            'data' => [
                                "message" => "Approved Successfully!"
                            ]
                        ]);
                    } else {
                        return $this->respond([
                            'status' => 400, 
                            'data' => [
                                "message" => "Error Occur !"
                            ]
                        ]);
                    }
                } else if ( $this->request->getVar('type') == "rejected" ) {
                    $id = trim($this->request->getVar('id'));

                        $data = [
                            "itseccomment" =>  trim($this->request->getVar('comment')),
                            "auth_by" => trim($this->request->getVar('approvedby')),
                            "sec_apr"  =>'2',
                            "auth_date" => date('Y-m-d'),
                            "loged_user" => $uid,
                            
                        ];



                    $result = $this->VArequest->aprovevarequest($id, $data);
                    
                    if ( $result > 0 ) {
                        return $this->respond([
                            'status' => 200, 
                            'data' => [
                                "message" => "rejected Successfully!"
                            ]
                        ]);
                    } else {
                        return $this->respond([
                            'status' => 400, 
                            'data' => [
                                "message" => "Error Occur !"
                            ]
                        ]);
                    }
                }    
                
        } else {
            return redirect()->to(base_url('login'));
        }
        
    }

    public function executebynetwok()
        {
        // $data['approverequests'] = $this->firewallrequest->find($id);

        if ($this->checkSession()) {

            date_default_timezone_set('Asia/Colombo');
            $uid = $_SESSION['user_ID'];

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "execomment" =>  trim($this->request->getVar('comment')),
                        "exe_by" => trim($this->request->getVar('appliedby')),
                        "is_execute"  =>'1',
                        "auth_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        "filename" => trim($this->request->getVar('filename'))
                        
                    ];

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;

                    $result = $this->VArequest->aprovevarequest($id, $data);
                    
                    if ( $result > 0 ) {
                        return $this->respond([
                            'status' => 200, 
                            'data' => [
                                "message" => "Approved Successfully!"
                            ]
                        ]);
                    } else {
                        return $this->respond([
                            'status' => 400, 
                            'data' => [
                                "message" => "Error Occur !"
                            ]
                        ]);
                    }
                } else if ( $this->request->getVar('type') == "rejected" ) {
                    $id = trim($this->request->getVar('id'));

                        $data = [
                            "execomment" =>  trim($this->request->getVar('comment')),
                            "exe_by" => trim($this->request->getVar('approvedby')),
                            "is_execute"  =>'2',
                            "auth_date" => date('Y-m-d'),
                            "loged_user" => $uid,
                            
                        ];



                    $result = $this->VArequest->aprovevarequest($id, $data);
                    
                    if ( $result > 0 ) {
                        return $this->respond([
                            'status' => 200, 
                            'data' => [
                                "message" => "rejected Successfully!"
                            ]
                        ]);
                    } else {
                        return $this->respond([
                            'status' => 400, 
                            'data' => [
                                "message" => "Error Occur !"
                            ]
                        ]);
                    }
                }    
                
        } else {
            return redirect()->to(base_url('login'));
        }
        
    }

    public function myinternetreqlist()
    {
        if ($this->checkSession()) {

            if (isset($_SESSION['user_ID'])) {

                $u_id = $_SESSION['user_ID'];
                // $internetrepomodel = new InternetrepotModel();
                $data['myVARequestslist'] = $this->VArequest->getmyIntRequests($u_id); 

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;
                
                return view('mylist/myvarequestlist', $data);

            } else {
                return redirect()->to(base_url('login'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }


    }

    public function uploadfile() {
        $inputFile = $this->validate(['file' => [
            'uploaded[file]',
            'max_size[file, 10000]',
        ]]);

        $fname='';
        $fpath='';

        if ($inputFile) {
            $file = $this->request->getFile('file');

            $fname = $file->getRandomName();
            $fpath = FCPATH.'uploads/attachments';

            $file->move($fpath, $fname);

            return $this->respond([
                'status' => 200, 
                'data' => [
                    "message" => "File uploaded!",
                    "filepath" => $fpath.'/'.$fname,
                    "filename" => $fname
                ]
            ]);
        } else {
            return $this->respond([
                'status' => 400, 
                'data' => [
                    "message" => "Error Occur !"
                ]
            ]);
        }

    }


}

     