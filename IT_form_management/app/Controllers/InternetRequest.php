<?php

namespace App\Controllers;


use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\RolepermissionsModel;
use App\Models\InternetRequestModel;
use App\Models\InternetrepotModel;

class InternetRequest extends BaseController
{
    protected $Internetrequest;

    public function __construct() {
        $this->Internetrequest = new InternetRequestModel();

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


    public function save_internet()
    {
        if ($this->checkSession()) {
        

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

                $uid = $_SESSION['user_ID'];
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
                    "loged_user" => $uid,  
                    
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

            } else {
                return redirect()->to(base_url('login'));
            }
    }

    public function intapprovebyman()
    {
        // $data['approverequests'] = $this->firewallrequest->find($id);

        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "managercomment" =>  trim($this->request->getVar('comment')),
                        "app_by" => trim($this->request->getVar('approvedby')),
                        "mstatus"  =>'1',
                        "mng_apr_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->Internetrequest->aproveRequest($id, $data);
                    
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
                            "managercomment" =>  trim($this->request->getVar('comment')),
                            "app_by" => trim($this->request->getVar('approvedby')),
                            "mstatus"  =>'2',
                            "mng_apr_date" => date('Y-m-d'),
                            "loged_user" => $uid,
                            
                        ];

                    $result = $this->Internetrequest->aproveRequest($id, $data);
                    
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

    public function intauthenticationpanel()
    {
        
        if ($this->checkSession()) {
            $data['pendingintAuthrequests'] = $this->Internetrequest->getAuthintrequests();  
            // $data['getAuthintrequestsuname'] = $this->Internetrequest->getAuthintrequestsuname();     
            
            
                    // print_r('<pre>');
                    // print_r($data);
                    // print_r('<pre>');die;

            
            return view('internetrequest/intauthenticationpanel', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function intexecutionpanel()
    {
        
        if ($this->checkSession()) {
            $data['pendingintexecutionrequests'] = $this->Internetrequest->getexecutionrequests();  
    
            
            
                    // print_r('<pre>');
                    // print_r($data);
                    // print_r('<pre>');die;

            
            return view('internetrequest/intexecutionpanel', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function getselectedauthreq($req_id = false){

        // var_dump($seg1);die;
    if ($this->checkSession()) {

        $uid = $_SESSION['user_ID'];

        if ((int)$req_id > 0)
            {
                $departmentmodel = new DepartmentModel();
                $intreqdata['departments'] = $departmentmodel->getDepartments('1');
                $rolemodel = new RoleModel();
                $intreqdata['rolelists'] = $rolemodel->getRole();
                $usermodel = new UserModel();
                $intreqdata['unitmanager'] = $usermodel->getManagerforAppr($uid);
                $intreqdata['authofficer'] = $usermodel->getauthofficerforAppr($uid);

                $internetreqmodel = new InternetRequestModel();
                $intreqdata['datasearch_by_Id'] = $internetreqmodel->search_by_intreqid($req_id);

                // print_r('<pre>');
                // print_r($intreqdata);
                // print_r('<pre>');die;

                return view('internetrequest/authinternetreq', $intreqdata);
        
            }
            else
            {
                redirect('not_good_id_method', 'refresh');//in case of not valid id
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
                $internetrepomodel = new InternetrepotModel();
                $data['myInternetRequests'] = $internetrepomodel->getmyIntRequests($u_id); 

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;
                
                return view('mylist/myinternetreqlist', $data);

            } else {
                return redirect()->to(base_url('login'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }


    }

    public function authbysecteam()
    {

        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];
            date_default_timezone_set('Asia/Colombo');

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "itseccomment" =>  trim($this->request->getVar('comment')),
                        "auth_by" => trim($this->request->getVar('approvedby')),
                        "itsecstatus"  =>'1',
                        "sec_apr_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;

                    $result = $this->Internetrequest->authintrequest($id, $data);
                    
                    if ( $result > 0 ) {
                        return $this->respond([
                            'status' => 200, 
                            'data' => [
                                "message" => "Auth Successfully!"
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
                        "itsecstatus"  =>'2',
                        "sec_apr_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->Internetrequest->authintrequest($id, $data);
                    
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


   

}

     