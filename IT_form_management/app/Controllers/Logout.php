
<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolepermissionsModel;

class Login extends BaseController
{
    protected $usermodel;
    protected $rolepermissionsmodel;

    public function __construct() {
        $this->usermodel = new UserModel();
        $this->rolepermissionsmodel = new RolepermissionsModel();
    }

    public function index()
    {
        return view('login/login');
    }

    public function login()
    {
        $username = trim($this->request->getVar('username'));
        $password = trim($this->request->getVar('password'));

        if (empty($username)) {
            return redirect('/');
        }

        if (empty($password)) {
            return redirect('/');
        }

        $user = $this->usermodel->getUser($username);

        if (empty($user)) {
            return redirect('/');
        }

        #do password verification


        $userSession = [
            'username' => $user->u_name,
            'is_logged' => true,
            'permissions' => $this->rolepermissionsmodel->getPermissions($user->u_roleid)

        ];

        print_r('<pre>');
        print_r($userSession);
        print_r('</pre>');
        die;

          
        $this->session->set($userSession);

        return redirect('dashboard');

    }

    public function logout()
    {
        $this->session->destroy();
        return redirect('/');
    }

    

    public function dashbord()
    {

        print_r('<pre>');
        print_r($res);
        print_r('</pre>');die;

        $data['requests'] = $this->firewallrequest->getRequests();

        // foreach ($requests as $row) {
        //     echo $row->staffmember;
        // }
        // // print_r('<pre>');
        // // print_r($requests);
        // // print_r('</pre>');
        // die;

        return view('common/login', $data);
        // return view('login/dashbord');
    }

    // public function home()
    // {
    //     return view('common/dashbord');
    // }


}