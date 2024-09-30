<?php

namespace App\Controllers;
use App\Models\FirewallrepoModel;
use App\Models\VAreqreportModel;
use App\Models\InternetrepotModel;
use App\Models\PwdmngreportModel;
use App\Models\UserdetailreportModel;
use App\Models\DepartmentModel;

class Reportmanager extends BaseController
{
    protected $firewallreportmanager;
    protected $varequestreportmanager;
    protected $intrequestreportmanager;
    protected $pwdreqreportmanager;
    protected $userdatareportmanager;

    public function __construct() {
        $this->firewallreportmanager = new FirewallrepoModel();
        $this->varequestreportmanager = new VAreqreportModel();
        $this->intrequestreportmanager = new InternetrepotModel();
        $this->pwdreqreportmanager = new PwdmngreportModel();
        $this->userdatareportmanager = new UserdetailreportModel();
        $this->userdatareportmanager = new UserdetailreportModel();

       
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


    public function fwaccessdreport()
    {
        if ($this->checkSession()) {
            $departmentmodel = new DepartmentModel();
            $data['departments'] = $departmentmodel->getDepartments('1');    
            $data['firewallreqdata'] = $this->firewallreportmanager->getdetailreqlist();       


            return view('reports/faccessdetailreport', $data);
            // return view('firewallauthentication/authentication', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function intaccessdreport()
    {
        if ($this->checkSession()) {
            $departmentmodel = new DepartmentModel();
            $data['departments'] = $departmentmodel->getDepartments('1');    
            $data['internetreqdata'] = $this->intrequestreportmanager->getdetailreqlist();       


            return view('reports/internetaccessdetailreport', $data);
            // return view('firewallauthentication/authentication', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function fwaccessdreportsearch()
    {
        if ($this->checkSession()) {
            $fromdate = $this->request->getVar('fromdate');
            $todate = $this->request->getVar('todate');
            $department = $this->request->getVar('department');

            $data['firewallreqdata'] = $this->firewallreportmanager->getfiltereddetailreqlist($fromdate, $todate, $department);       
            
            return $this->respond(['status' => 100, 'data' => $data]);

        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function intaccessdreportsearch()
    {
        if ($this->checkSession()) {
            $fromdate = $this->request->getVar('fromdate');
            $todate = $this->request->getVar('todate');
            $department = $this->request->getVar('department');

            $data['firewallreqdata'] = $this->intrequestreportmanager->getfilteredintdetailreqlist($fromdate, $todate, $department);       
            
            return $this->respond(['status' => 100, 'data' => $data]);
            
        } else {
            return redirect()->to(base_url('login'));
        }
    }



    public function inernetreqreport()
    {
        
        $data['intreqdata'] = $this->intrequestreportmanager->getdetailreqlist();       


        return view('reports/internetaccessdetailreport', $data);
        // return view('firewallauthentication/authentication', $data);

    }

    public function pwdreqreport()
    {
        
        $data['pwdreqdata'] = $this->pwdreqreportmanager->getdetailreqlist();       


        return view('reports/passworddetailreport', $data);
        // return view('firewallauthentication/authentication', $data);

    }

    public function unitwiseuserreport()
    {
        
        $data['userdata'] = $this->userdatareportmanager->getdetailreqlist();       


        return view('reports/userdetailunitwisereport', $data);
        // return view('firewallauthentication/authentication', $data);

    }

    public function vadetailreport()
    {
        if ($this->checkSession()) {
            $departmentmodel = new DepartmentModel();
            $data['departments'] = $departmentmodel->getDepartments('1');    
            $data['vareqdata'] = $this->varequestreportmanager->getdetailreqlist();       


            return view('reports/vareqdetailreport', $data);
            // return view('firewallauthentication/authentication', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function vadetailreportsearch()
    {
        if ($this->checkSession()) {
            $fromdate = $this->request->getVar('fromdate');
            $todate = $this->request->getVar('todate');
            $department = $this->request->getVar('department');

            $data['firewallreqdata'] = $this->varequestreportmanager->getfilteredvadetailreqlist($fromdate, $todate, $department);       
            
            return $this->respond(['status' => 100, 'data' => $data]);
            
        } else {
            return redirect()->to(base_url('login'));
        }
    }

}