<?php

namespace App\Controllers;

use App\Models\FirewallauthenticationModel;
use App\Models\DepartmentModel;
use App\Models\InternetRequestModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\FirewallRequestModel;
class Firewallauthentication extends BaseController
{
    protected $firewallauthentication;
    protected $internetreqmodel;

    public function __construct() {
        $this->firewallauthentication = new FirewallauthenticationModel();
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
        $departmentmodel = new DepartmentModel();
        $data['departments'] = $departmentmodel->getDepartments('1');


        return view('firewallrequest/addnew', $data);
    }



    public function authenticationpanel()
    {
        if ($this->checkSession()) {
            $data['pendingAuthrequests'] = $this->firewallauthentication->getAuthrequests();        
            
            return view('firewallauthentication/authenticationpanel', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }


    public function executionpanel()
    {
        if ($this->checkSession()) {
            $data['pendingexerequests'] = $this->firewallauthentication->getrequestsforexe();        
            
            return view('firewallauthentication/executionpanel', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function getselectedauthreq($req_id = false){

                // var_dump($seg1);die;
        // var_dump($seg1);die;
        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];

                if ((int)$req_id > 0)
                {

                    $fwrecdata['datasearch_by_Id'] = $this->firewallauthentication->search_by_id($req_id);
                    $fwrecdata['datasearch_by_Innerejoin'] = $this->firewallauthentication->search_by_innerjn($req_id);
                    $usermodel = new UserModel();
                    $fwrecdata['unitmanager'] = $usermodel->getapprManager();
                    $fwrecdata['authofficer'] = $usermodel->getauthofficerforAppr($uid);
                    // print_r('<pre>');
                    // print_r($fwrecdata);
                    // print_r('<pre>');die;
                    return view('firewallauthentication/authentication', $fwrecdata);
            
                }
                else
                {
                    redirect('not_good_id_method', 'refresh');//in case of not valid id
                }
        } else {
            return redirect()->to(base_url('login'));
        }
            
    }

    
    public function getselectedexereq($req_id = false){

        // var_dump($seg1);die;
// var_dump($seg1);die;
        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];

                if ((int)$req_id > 0)
                {

                    $fwrecdata['datasearch_by_Id'] = $this->firewallauthentication->search_by_id($req_id);
                    $fwrecdata['datasearch_by_Innerejoin'] = $this->firewallauthentication->search_by_innerjn($req_id);
                    $usermodel = new UserModel();
                    $fwrecdata['unitmanager'] = $usermodel->getapprManager();
                    $fwrecdata['authofficer'] = $usermodel->getauthofficerforAppr($uid);
                    // print_r('<pre>');
                    // print_r($fwrecdata);
                    // print_r('<pre>');die;
                    return view('firewallauthentication/execution', $fwrecdata);
            
                }
                else
                {
                    redirect('not_good_id_method', 'refresh');//in case of not valid id
                }
        } else {
            return redirect()->to(base_url('login'));
        }
    
}
    




}