<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolepermissionsModel;
use App\Models\FirewallRequestModel;


class Login extends BaseController
{
    protected $usermodel;
    protected $rolepermissionsmodel;

    protected $firewallrequestmodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
        $this->rolepermissionsmodel = new RolepermissionsModel();
        $this->firewallrequestmodel = new FirewallRequestModel();
    }

    public function index()
    {
        return view('login/login');
    }

    public function login()
    {
        // echo '<script>alert("Inside login.");</script>';
        $inputusername = trim($this->request->getVar('inputusername'));
        $inputpassword = trim($this->request->getVar('inputpassword'));



        $user = $this->usermodel->getUser($inputusername);

        // print_r('<pre>');
        // print_r($user);
        // print_r('</pre>');die;

        // $pwd  = $this->usermodel->getUser($username);
        // !password_verify($inputpassword, $user->upwd)
        // empty($user) ||  $inputpassword!==$user->u_password


        if (empty($user) ||  !password_verify($inputpassword, $user->u_password)) {
            // echo '<script>alert("Incorrect username or password.");</script>';
            return json_encode(['status' => 'fail']);
        }
        else if (empty($user) ||  $user->u_status == 0) {
            // echo '<script>alert("Incorrect username or password.");</script>';
            return json_encode(['status' => 'inactive']);
        } else {
            $userSession = [
                'username' => $user->u_username,
                'is_logged' => true,
                'permissions' => $this->rolepermissionsmodel->getPermissions($user->u_roleid),
                'role_id' => $user->u_roleid,
                'dep_id'  => $user->u_depid,
                'user_ID' => $user->u_id,
                'pf_no' => $user->u_pfno,
                'user_avatar' => $user->u_avatar,
                'Fname'  => $user->u_fname
            ];
        // print_r('<pre>');
        // print_r($userSession);
        // print_r('</pre>');die;

            $this->session->set($userSession);

            return json_encode(['status' => 'pass']);
        }

              

        // print_r('<pre>');
        // print_r($userSession);
        // print_r('</pre>');
        // die;          

    }

    

    public function redirect()
    {

        return redirect('dashboard');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect('/');
    }



    public function dashbord()
    {

        // print_r('<pre>');
        // print_r($res);
        // print_r('</pre>');die;

        $data['requests'] = $this->firewallrequestmodel->getRequests();

        // foreach ($requests as $row) {
        //     echo $row->staffmember;
        // }
        // print_r('<pre>');
        // print_r($data['requests']);
        // print_r('</pre>');
        // die;

        return view('common/login', $data);
        // return view('login/dashbord');
    }

    // public function home()
    // {
    //     return view('common/dashbord');
    // }


}
