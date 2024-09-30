<?php

namespace App\Controllers;

use App\Models\FirewallRequestModel;
use App\Models\InternetRequestModel;
use App\Models\RequestLogModel;

class Requestlogcontroller extends BaseController
{
    protected $firewallrequest;
    protected $firewallintmodel;
    protected $fwlogrequestmodel;

    public function __construct() {
        $this->firewallrequest = new FirewallRequestModel();
        $this->firewallintmodel = new InternetRequestModel();
        $this->fwlogrequestmodel = new RequestLogModel();
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

    
    public function getmyrequestlist()
    {
        if ($this->checkSession()) {

            $uid = $_SESSION['user_ID'];
            $data['myreqlst'] = $this->fwlogrequestmodel->getreqlists($uid); 
            print_r('<pre>');
            print_r($data);
            print_r('<pre>');die;

            return view('common/userwisereqlist',$data);

         } else {
            return redirect()->to(base_url('login'));
        }

    }
}