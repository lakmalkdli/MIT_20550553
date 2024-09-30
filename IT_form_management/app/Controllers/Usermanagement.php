<?php

namespace App\Controllers;


use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\DesignationModel;


class Usermanagement extends BaseController
{
    protected $usermodel;
    protected $designationmodel;
    protected $rolemodel;
    protected  $departmentmodel;
    public function __construct() {
        $this->usermodel = new UserModel();
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

    public function adduserload()
    {
        // $data['permissions'] = $this->session->get('permissions');
        if ($this->checkSession()) {

            if (isset($_SESSION['user_ID'])) {

                $id = $_SESSION['user_ID'];

                if ($id) {
                    // print_r("inside IF");
                    $departmentmodel = new DepartmentModel();
                    $data['departments'] = $departmentmodel->getDepartments('1');

                    $rolemodel = new RoleModel();
                    $data['rolelists'] = $rolemodel->getRole();

                    $designationmodel = new DesignationModel();
                    $data['designationlists'] = $designationmodel->getDesignation();



                    return view('usermanagement/adduser', $data);
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

    public function pwdchange(){
 
        $inputusername = trim($this->request->getVar('uname'));
        $inputpassword = trim($this->request->getVar('curpwd')); 

        $user = $this->usermodel->getUser($inputusername);

        if ($this->checkSession()) {

            $this->validation->setRules([
                'curpwd' => [
                    'label' => 'Current Password',
                    'rules' => 'required'
                ],
                'newpwd' => [
                    'label' => 'New Password',
                    'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/]'
                ],
                'cnpwd' => [
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[newpwd]'
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
            else if (empty($user) || !password_verify($inputpassword, $user->u_password)) {
                            
                // return json_encode(['status' => 'wrpwd']);
                // print_r($inputusername);
                // print_r($inputpassword);
                return $this->respond([
                    'status' => 410, // Conflict status code for existing resource
                    'data' => [
                        'message' => 'Invalid Pssword'
                    ]
                ]);
            }
                            $password = trim($this->request->getVar('cnpwd'));
                            $uid = trim($this->request->getVar('selecteduid'));

                            // Hash the password
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            
                            $pwdchangedata = [
                                "u_password" => $hashed_password,
                                "is_pwchng" => "1",
                            ];
                            // print_r('<pre>');
                            // print_r($requestdata);
                            // print_r('<pre>');die;

                                    $result = $this->usermodel->changepassword($uid,$pwdchangedata);
                            
                                    if ($result > 0) {

                                        // return view('RoleManagementView/ViewRole', $data);
                                        return $this->respond([
                                            'status' => 200, // Conflict status code for existing resource
                                            'data' => [
                                                'message' => 'Password Changed Sucessfully !'
                                            ]
                                        ]);
                                        // return json_encode(['status' => 'success']);

                                    } else {
                                        var_dump("save error!");
                                    }
                
            

        } else {
            return redirect()->to(base_url('login'));
        }

    }


    public function saveuser()
    {
        if ($this->checkSession()) {


                            $this->validation->setRules([
                                'fname' => [
                                    'label' => 'First Name',
                                    'rules' => 'required'
                                ],
                                'lname' => [
                                    'label' => 'Last Name',
                                    'rules' => 'required'
                                ],
                                'pfno' => [
                                    'label' => 'PF No',
                                    'rules' => 'required|numeric'
                                ],
                                'email' => [
                                    'label' => 'Email',
                                    'rules' => 'required|valid_email'
                                ],
                                'mobile' => [
                                    'label' => 'Mobile No',
                                    'rules' => 'permit_empty|regex_match[/^[0-9]{10}$/]'
                                ],
                                'exten' => [
                                    'label' => 'Extension number',
                                    'rules' => 'required|numeric'
                                ],
                                'dep' => [
                                    'label' => 'Department',
                                    'rules' => 'required'
                                ],
                                'desig' => [
                                    'label' => 'Designation',
                                    'rules' => 'required'
                                ],
                                'role' => [
                                    'label' => 'User Role',
                                    'rules' => 'required'
                                ],
                                'ustate' => [
                                    'label' => 'User Status',
                                    'rules' => 'required'
                                ],
                                'pwd' => [
                                    'label' => 'New Password',
                                    'rules' => 'required'
                                ],
                                'cnpwd' => [
                                    'label' => 'Confirm Password',
                                    'rules' => 'required|matches[pwd]'
                                ],

                                // 'avatar' => 'uploaded[avatar]|max_size[avatar,1024]',
                                
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

                            $pfno = trim($this->request->getVar('pfno'));

                            // Check if the user already exists
                            $existingUser = $this->usermodel->findUserBypfno($pfno);
                            // echo($existingUser);
                            if ($existingUser) {
                                return $this->respond([
                                    'status' => 409, // Conflict status code for existing resource
                                    'data' => [
                                        'message' => 'User already exists'
                                    ]
                                ]);
                            } 


                            // Get the password from the form input
                            $password = trim($this->request->getVar('cnpwd'));

                            // Hash the password
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            
                            $requestdata = [
                                "u_fname" => trim($this->request->getVar('fname')),
                                "u_lname" => trim($this->request->getVar('lname')),
                                "u_pfno" => trim($this->request->getVar('pfno')),
                                "u_username" => trim($this->request->getVar('uname')),
                                "u_email" => trim($this->request->getVar('email')),
                                "u_mobile" => trim($this->request->getVar('mobile')),
                                "u_extention" => trim($this->request->getVar('exten')),
                                "u_depid" => trim($this->request->getVar('dep')),
                                "u_desigid" => trim($this->request->getVar('desig')),
                                "u_roleid" => trim($this->request->getVar('role')),
                                "u_status" => trim($this->request->getVar('ustate')),
                                "u_password" => $hashed_password,
                                "u_avatar" => trim($this->request->getVar('avatarpath')),
                                "logusr_id" => trim($_SESSION['user_ID']),

                            ];
                            // print_r('<pre>');
                            // print_r($requestdata);
                            // print_r('<pre>');die;

                                    $result = $this->usermodel->saveUser($requestdata);
                            
                                    if ($result > 0) {

                                        // return view('RoleManagementView/ViewRole', $data);
                                        return $this->respond([
                                            'status' => 200, // Conflict status code for existing resource
                                            'data' => [
                                                'message' => 'User Added Sucessfully !'
                                            ]
                                        ]);
                                        // return json_encode(['status' => 'success']);

                                    } else {
                                        var_dump("save error!");
                                    }


                                  
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function updateuserprofile(){

        if ($this->checkSession()) {


            $this->validation->setRules([
                'fname' => [
                    'label' => 'First Name',
                    'rules' => 'required'
                ],
                'lname' => [
                    'label' => 'Last Name',
                    'rules' => 'required'
                ],
                // 'pfno' => [
                //     'label' => 'PF No',
                //     'rules' => 'required|numeric'
                // ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ],
                'mobile' => [
                    'label' => 'Mobile No',
                    'rules' => 'permit_empty|regex_match[/^[0-9]{10}$/]'
                ],
                'exten' => [
                    'label' => 'Extension number',
                    'rules' => 'required|numeric'
                ],
                'dep' => [
                    'label' => 'Department',
                    'rules' => 'required'
                ],
                'desig' => [
                    'label' => 'Designation',
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

           
            $uid = $_SESSION['user_ID'];
            
            $userdata = [
                "u_fname" => trim($this->request->getVar('fname')),
                "u_lname" => trim($this->request->getVar('lname')),
                "u_email" => trim($this->request->getVar('email')),
                "u_mobile" => trim($this->request->getVar('mobile')),
                "u_extention" => trim($this->request->getVar('exten')),
                "u_depid" => trim($this->request->getVar('dep')),
                "u_desigid" => trim($this->request->getVar('desig')),
                "u_avatar" => trim($this->request->getVar('avatarpath')),
                "logusr_id" => trim($_SESSION['user_ID']),

            ];
            // print_r('<pre>');
            // print_r($requestdata);
            // print_r('<pre>');die;

                    $result = $this->usermodel->updateuser($uid,$userdata);
            
                    if ($result > 0) {

                        // return view('RoleManagementView/ViewRole', $data);
                        return $this->respond([
                            'status' => 200, // Conflict status code for existing resource
                            'data' => [
                                'message' => 'User Added Sucessfully !'
                            ]
                        ]);
                        // return json_encode(['status' => 'success']);

                    } else {
                        var_dump("save error!");
                    }

          
        } else {
        return redirect()->to(base_url('login'));
        }


    }
    public function loadprofileforedit(){
       
        // $data['permissions'] = $this->session->get('permissions');
        if ($this->checkSession()) {

            if (isset($_SESSION['user_ID'])) {

                $id = $_SESSION['user_ID'];

                if ($id) {
                    // print_r("inside IF");
                    $departmentmodel = new DepartmentModel();
                    $data['departments'] = $departmentmodel->getDepartments('1');

                    $rolemodel = new RoleModel();
                    $data['rolelists'] = $rolemodel->getRole();

                    $designationmodel = new DesignationModel();
                    $data['designationlists'] = $designationmodel->getDesignation();

                    $data['selecteduserdata'] = $this->usermodel->getselecuser($id);



                    return view('usermanagement/editprofile', $data);
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

    public function verifychgpwd(){

        if ($this->checkSession()) {
                
                if (isset($_SESSION['user_ID'])) {

                    $id = $_SESSION['user_ID'];
    
                    $inputusername = trim($this->request->getVar('inputusername'));
                    $inputpassword = trim($this->request->getVar('inputpassword'));            
            
                    $user = $this->usermodel->getUser($inputusername);
            
      
            
                        if (empty($user) || !password_verify($inputpassword, $user->u_password)) {
                            
                            return json_encode(['status' => 'fail']);
                        } else {                    
                
                            return json_encode(['status' => 'pass']);
                        }
    
                } else {
                    return redirect()->to(base_url('login'));
                }


            
        } else {
            return redirect()->to(base_url('login'));
        }


    }

    public function getuserlist()
    {

        if ($this->checkSession()) {

            $data['userlist'] = $this->usermodel->getUserlists(); 
            // return view('firewallrequest/pendingrequestlist', $data);
            return view('usermanagement/userlist', $data);

         } else {
            return redirect()->to(base_url('login'));
        }

        
    }

    public function getselecteduser($usr_id = false){

        if ($this->checkSession()) {

            if ((int)$usr_id > 0)
            {
                $departmentmodel = new DepartmentModel();
                $data['departments'] = $departmentmodel->getDepartments('1');

                $rolemodel = new RoleModel();
                $data['rolelists'] = $rolemodel->getRole();

                $designationmodel = new DesignationModel();
                $data['designationlists'] = $designationmodel->getDesignation();
                
                $data['usersearch_by_Id'] = $this->usermodel->getselecuser($usr_id);
                // $usermodel = new UserModel();
                // $data['managerlists'] = $usermodel->getManagersforAppr();
                // print_r('<pre>');
                // print_r($data);
                // print_r('<pre>');die;
                return view('usermanagement/resetuser', $data);
        
            }
            else
            {
                redirect('not_good_id_method', 'refresh');//in case of not valid id
            }

        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function verifypwdreset(){


        if ($this->checkSession()) {


            if (isset($_SESSION['user_ID'])) {

                $id = $_SESSION['user_ID'];

                $inputusername = trim($this->request->getVar('inputusername'));
                $inputpassword = trim($this->request->getVar('inputpassword'));
                $selecteduserid = trim($this->request->getVar('selecteduserid'));
                // $selectedusername = trim($this->request->getVar('selectedusername'));         
        
                $user = $this->usermodel->getUser($inputusername);
        
                // print_r('<pre>');
                // print_r($user);
                // print_r('</pre>');die;        
                // $pwd  = $this->usermodel->getUser($username);
                // !password_verify($inputpassword, $user->upwd)        
        
                    if (empty($user) || !password_verify($inputpassword, $user->u_password)) {
                        
                        return json_encode(['status' => 'fail']);
                    } else {

                        $newPassword = password_hash($this->request->getVar('selectedusername'), PASSWORD_DEFAULT);
                        
                        $pwresetdata = [
                            "u_password" => $newPassword,
                            "is_pwchng" => "2",
                            "logusr_id" => trim($_SESSION['user_ID']),
            
                        ];                        
                        $result = $this->usermodel->resetpassword($selecteduserid, $pwresetdata, $id);
                            if ($result > 0){
                                
                                return json_encode(['status' => 'pass']);

                            }
                        
                    }

            } else {
                return redirect()->to(base_url('login'));
                }

        
        }
    }

    public function changestatus(){
                // $selecteduserid = trim($this->request->getVar('seluid'));
                // $userstatus = trim($this->request->getVar('ustate'));
                // $loginuser = U_id;
        if ($this->checkSession()) {


            if (isset($_SESSION['user_ID'])) {

                $logeduid = $_SESSION['user_ID'];
                $selectuid = trim($this->request->getVar('seluid'));
            
                $ustatusdata = [
                    "u_status" => trim($this->request->getVar('ustate')),
                    "logusr_id" => $logeduid,
                    "is_pwchng" => 3,                     
                ];
                // print_r('<pre>');
                // print_r($ustatusdata);
                // print_r('<pre>');die;
    
                        $result = $this->usermodel->updateuserstatus($selectuid,$ustatusdata);
                
                        if ($result > 0) {
    
                            // return view('RoleManagementView/ViewRole', $data);
                            return $this->respond([
                                'status' => 200, // Conflict status code for existing resource
                                'data' => [
                                    'message' => 'User Status Updated Sucessfully !'
                                ]
                            ]);
                            // return json_encode(['status' => 'success']);
    
                        } else {
                            var_dump("save error!");
                        }
            } else {
                return redirect()->to(base_url('login'));
                }

        
        }



    }
    


}

     