<?php

namespace App\Controllers;

use App\Models\FirewallRequestModel;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\RolepermissionsModel;
use App\Models\InternetrepotModel;
use App\Models\InternetRequestModel;

class Firewallrequest extends BaseController
{
    protected $firewallrequest;
    protected $firewallintmodel;

    public function __construct() {
        $this->firewallrequest = new FirewallRequestModel();
        $this->firewallintmodel = new InternetrepotModel();
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



    public function addnew()
    {
        if ($this->checkSession()) {
            if (isset($_SESSION['user_ID'])) {

                $id = $_SESSION['user_ID'];
                $roleid = $_SESSION['role_id'];

                    if ($id && $roleid) {
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

                        return view('firewallrequest/addnew', $data);
                        // return view('firewallrequest/approval', $data);
                    } else {
                        redirect('Something_wrong', 'refresh');
                    }
            } else {
                return redirect()->to(base_url('login'));
            }
        } else {
        return redirect()->to(base_url('login'));
        }

    }



    public function addinternet()
    {   
            if ($this->checkSession()) {
                if (isset($_SESSION['user_ID'])) {

                    $id = $_SESSION['user_ID'];
                    $roleid = $_SESSION['role_id'];

                    if ($id && $roleid) {    
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

                        return view('internetrequest/addinternet', $data);

                    } else {
                        redirect('Something_wrong', 'refresh');
                    }
                } else {
                    return redirect()->to(base_url('login'));
                }

            }else {
                return redirect()->to(base_url('login'));
                }

    }

        public function managepwd()
    {
        $data['permissions'] = $this->session->get('permissions');

        $departmentmodel = new DepartmentModel();
        $data['departments'] = $departmentmodel->getDepartments('1');

        $rolemodel = new RoleModel();
        $data['rolelists'] = $rolemodel->getRole();

        $usermodel = new UserModel();
        $data['userlists'] = $usermodel->getUsers('1');



        return view('firewallrequest/passwordreset', $data);
        // return view('firewallrequest/approval', $data);
    }
    

    public function save()
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
                        'rules' => 'permit_empty|regex_match[/^[0-9]{10}$/]'
                    ],
                    'exten' => [
                        'label' => 'Extension number',
                        'rules' => 'permit_empty|numeric'
                    ],
                    'chngtyp' => [
                        'label' => 'Type of Change',
                        'rules' => 'required'
                    ],
                    'department' => [
                        'label' => 'Criticality',
                        'rules' => 'required'
                    ],
                    'desig' => [
                        'label' => 'Designation',
                        'rules' => 'required'
                    ],
                    'category' => [
                        'label' => 'Category',
                        'rules' => 'required'
                    ],
                    'sourceip' => [
                        'label' => 'Source Address',
                        'rules' => 'required|regex_match[/^[\d.]+$/]'
                    ],
                    'destip' => [
                        'label' => 'Destination Address/Subnet Mask',
                        'rules' => 'required|regex_match[/^[\d.]+$/]'
                    ],
                    'protocol' => [
                        'label' => 'Protocols',
                        'rules' => 'required'
                    ],
                    'ports' => [
                        'label' => 'Ports',
                        'rules' => 'required'
                    ],
                    'direction' => [
                        'label' => 'Direction',
                        'rules' => 'required'
                    ],
                    'action' => [
                        'label' => 'Action',
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
                    "department" => trim($this->request->getVar('department')),
                    "position" => trim($this->request->getVar('desig')),   
                    "staffmember" => trim($this->request->getVar('name')),
                    "pfno" => trim($this->request->getVar('pfno')),
                    "email" => trim($this->request->getVar('email')),
                    "mobile" => trim($this->request->getVar('mobile')),
                    "extention" => trim($this->request->getVar('exten')),
                    "date" => trim($this->request->getVar('req_date')), 
                    "typeofchange" => trim($this->request->getVar('chngtyp')),
                    "category" => trim($this->request->getVar('category')),
                    "effectdate" => trim($this->request->getVar('efromdate')),
                    "expiredate" =>  trim($this->request->getVar('exprdate')),
                    "explanation" => trim($this->request->getVar('explanation')),
                    "source" =>  trim($this->request->getVar('sourceip')),
                    "destination" => trim($this->request->getVar('destip')),
                    "protocol" => trim($this->request->getVar('protocol')),
                    "ports" => trim($this->request->getVar('ports')),
                    "userid" => trim($this->request->getVar('userSelect')),
                    "direction"=> trim($this->request->getVar('direction')),
                    "action" => trim($this->request->getVar('action')),
                    "loged_user" => $uid,
                    "approvedby"=>"0",      

                    

                ];

                // print_r('<pre>');
                // print_r($requestdata);
                // print_r('<pre>');die;


                $result = $this->firewallrequest->saveRequest($requestdata);

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
            }else {
                return redirect()->to(base_url('login'));
                }

    }



    public function pendingrequestlist()
    {
        if ($this->checkSession()) {

            if (isset($_SESSION['user_ID'])) {

                $depid = $_SESSION['dep_id'];
        
                $data['pendingRequests'] = $this->firewallrequest->getRequestsforapp($depid); 
                
                return view('firewallrequest/pendingrequestlist', $data);

            } else {
                return redirect()->to(base_url('login'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function mypendingrequestlist()
    {
        if ($this->checkSession()) {

            if (isset($_SESSION['user_ID'])) {

                $depid = $_SESSION['dep_id'];
                $uid = $_SESSION['user_ID'];
        
                $data['myfirewallreq'] = $this->firewallrequest->getmyFRequests($uid); 

                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;

                
                return view('mylist/mypendingfwreq', $data);

            } else {
                return redirect()->to(base_url('login'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function pendinginternetlist()
    {
        if ($this->checkSession()) {

            if (isset($_SESSION['user_ID'])) {

                $depid = $_SESSION['dep_id'];
        
                $data['pendingInternetRequests'] = $this->firewallintmodel->getIntRequestsforapp($depid); 
                
                return view('firewallrequest/pendinginternetlist', $data);

            } else {
                return redirect()->to(base_url('login'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }


    }

    public function pendvalist()
    {
        
        $data['pendingRequests'] = $this->firewallrequest->getRequests(); 
        


        return view('firewallrequest/pendvalist', $data);
        // return view('firewallauthentication/authentication', $data);

    }

    public function pendingpwdlist()
    {
        
        $data['pendingRequests'] = $this->firewallrequest->getRequests(); 
        


        return view('firewallrequest/pendingpwdlist', $data);
        // return view('firewallauthentication/authentication', $data);

    }

    public function getmanagersforappr()
    {
        $usermodel = new UserModel();
        $data['managerlists'] = $usermodel->getManagers();
        // print_r('<pre>');
        // print_r($data);
        // print_r('<pre>');die;

    }

    public function approval()
    {
        return view('firewallrequest/approval');

    }


    public function getselectedreq($req_id = false){

        // var_dump($seg1);die;
        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];

                if ((int)$req_id > 0)
                {

                    $fwrecdata['datasearch_by_Id'] = $this->firewallrequest->search_by_id($req_id);
                    $fwrecdata['datasearch_by_Innerejoin'] = $this->firewallrequest->search_by_innerjn($req_id);
                    $usermodel = new UserModel();
                    $fwrecdata['unitmanager'] = $usermodel->getManagerforAppr($uid);
                    // print_r('<pre>');
                    // print_r($data);
                    // print_r('<pre>');die;
                    return view('firewallrequest/manapproval', $fwrecdata);
            
                }
                else
                {
                    redirect('not_good_id_method', 'refresh');//in case of not valid id
                }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function getselectedappintreq($req_id = false){

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

            $internetreqmodel = new InternetRequestModel();
            $intreqdata['datasearch_by_Id'] = $internetreqmodel->search_by_intreqid($req_id);

            // print_r('<pre>');
            // print_r($intreqdata);
            // print_r('<pre>');die;

            return view('internetrequest/appinternetreq', $intreqdata);
    
        }
        else
        {
            redirect('not_good_id_method', 'refresh');//in case of not valid id
        }

    } else {
        return redirect()->to(base_url('login'));
    }
}

    public function approvebyman()
    {
        // $data['approverequests'] = $this->firewallrequest->find($id);

        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "managercommnt" =>  trim($this->request->getVar('comment')),
                        "approvedby" => trim($this->request->getVar('approvedby')),
                        "mng_apr"  =>'1',
                        "mng_apr_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->firewallrequest->aproveRequest($id, $data);
                    
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
                        "approvedby" => trim($this->request->getVar('approvedby')),
                        "mng_apr"  =>'2',
                        "mng_apr_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->firewallrequest->aproveRequest($id, $data);
                    
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

    public function authbysecteam()
    {
        // $data['approverequests'] = $this->firewallrequest->find($id);

        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "itseccomment" =>  trim($this->request->getVar('comment')),
                        "auth_by" => trim($this->request->getVar('approvedby')),
                        "sec_apr"  =>'1',
                        "sec_apr_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->firewallrequest->aproveRequest($id, $data);
                    
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
                        "sec_apr"  =>'2',
                        "sec_apr_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->firewallrequest->aproveRequest($id, $data);
                    
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


    public function executebynetwork()
    {
        // $data['approverequests'] = $this->firewallrequest->find($id);

        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];

                if ( $this->request->getVar('type') == "approved" )
                {

                    $id = trim($this->request->getVar('id'));

                    $data = [
                        "itsecnetwrkcmapp" =>  trim($this->request->getVar('comment')),
                        "apply_by" => trim($this->request->getVar('executeby')),
                        "isntwrkdeployed"  =>'1',
                        "net_exe_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->firewallrequest->aproveRequest($id, $data);
                    
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
                        "itsecnetwrkcmapp" =>  trim($this->request->getVar('comment')),
                        "apply_by" => trim($this->request->getVar('executeby')),
                        "isntwrkdeployed"  =>'2',
                        "net_exe_date" => date('Y-m-d'),
                        "loged_user" => $uid,
                        
                    ];

                    $result = $this->firewallrequest->aproveRequest($id, $data);
                    
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

    public function getrequestusers(){

        $selroleid = $this->request->getPost('id');      
            


        // alert($selroleid);
        // $pos_id = $this->request->getVar('position');
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the form is submitted using the POST method

            // alert('insidemodel');

            // Retrieve the selected role ID
            // $selectedRoleId = $_POST['position'];

            $usermodel = new UserModel();
            $data['userlists'] = $usermodel->getUsers($selroleid);
            // print_r('<pre>');
            // print_r($data);
            // print_r('<pre>');die;
            // $this->load->model('Your_model');
            // $data['dropdown_data'] = $this->Your_model->get_dropdown_data();
        
            // Now you can use $selectedRoleId in your logic
            // echo "Selected Role ID: " . $selectedRoleId;

            return $this->respond(['status' => 100, 'data' => $data]);
        // }

    }



}

     