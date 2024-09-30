<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\FirewallRequestModel;
use App\Models\InternetRequestModel;
use App\Models\VAreqreportModel;

class Home extends BaseController
{
    Protected  $firewallmodel;

    public function __construct()
    {


        //$this->prioirtymodel = new PriorityModel();
    }

    public function home()
    {     
        $data = [
            'permissions' => $this->session->get('permissions')
        ];
        // print_r('<pre>');
        // print_r();
        // print_r('</pre>');
        // die;
        return view('common/dashboard', $data);
    }

    public function checkSession()
    {
        //print_r($_SESSION['user_id']);
        if (isset($_SESSION['user_ID'])) {

            $id = $_SESSION['user_ID'];
            //echo "User ID: $id";
            return true;
        } else {
            echo "not found";
            return false;
            //echo "not found";
        }
    }

    public function homepage()
    {
        if ($this->checkSession()) {
            $data = [
                'permissions' => $this->session->get('permissions')
            ];

            $tablefirewallrequest = new FirewallRequestModel();
            $tableinternetrequest = new InternetRequestModel();

            if (isset($_SESSION['role_id'])) {
                if ($_SESSION['role_id'] == 1) {

                    if (isset($_SESSION['user_ID'])) {

                        $id = $_SESSION['user_ID'];

                        $firewallmodel = new FirewallRequestModel();
                        $data['penappfw'] = $firewallmodel ->getpenbyman(0);
                        $data['penseclistfw'] = $firewallmodel ->getpenbysec(1);
                        $data['pennetwrklistfw'] = $firewallmodel ->getpenbynetwrk(1);

                        $data['rejectbymanfw'] = $firewallmodel ->getrejbyman(2);
                        $data['rejectbysecfw'] = $firewallmodel ->getrejbysec(2);
                        $data['rejectbynetfw'] = $firewallmodel ->getrejbynetwk(2);

                        $data['totalreject'] = intval($data['rejectbymanfw']) + intval($data['rejectbysecfw']) + intval($data['rejectbynetfw']);

                        $data['totalpendingfirewall'] = intval($data['penappfw']) + intval($data['penseclistfw']) + intval($data['pennetwrklistfw']);

                        $data['totalappfw'] = $firewallmodel ->getapproved(1);


                        $intrequestmodel = new InternetRequestModel();
                        $data['penappint'] = $intrequestmodel ->getpenbymaninyt(0);
                        $data['penseclistint'] = $intrequestmodel ->getpenbysecint(1);
                        $data['pennetwrklistint'] = $intrequestmodel ->getpenbynetwrkint(1);

                        $data['rejectbymanint'] = $intrequestmodel ->getrejbymanint(2);
                        $data['rejectbysecint'] = $intrequestmodel ->getrejbysecint(2);
                        $data['rejectbynetint'] = $intrequestmodel ->getrejbynetwint(2);
                        $data['totalrejectint'] = intval($data['rejectbymanint']) + intval($data['rejectbysecint']) + intval($data['rejectbynetint']);

                        $data['totalpendingintreq'] = intval($data['penappint']) + intval($data['penseclistint']) + intval($data['pennetwrklistint']);

                        $data['totalappint'] = $firewallmodel ->getapproved(1);


                        $vareportmodel = new VAreqreportModel();
                        $data['penappva'] = $vareportmodel ->getpenbymanva(0);
                        $data['pensecva'] = $vareportmodel ->getpenbysecva(1);
                        $data['pennetwrkva'] = $vareportmodel ->getpenbynetwrkva(1);

                        $data['rejectbymanva'] = $vareportmodel ->getrejbymanva(2);
                        $data['rejectbysecva'] = $vareportmodel ->getrejbysecva(2);
                        $data['rejectbynetva'] = $vareportmodel ->getrejbynetwva(2);
                        $data['totalrejectva'] = intval($data['rejectbymanva']) + intval($data['rejectbysecva']) + intval($data['rejectbynetva']);

                        $data['totalpendingva'] = intval($data['penappva']) + intval($data['pensecva']) + intval($data['pennetwrkva']);

                        $data['totalappintva'] = $firewallmodel ->getapproved(1);




                        // Doughnut Values
                        $data['dval1'] = intval($data['totalpendingva']);
                        $data['dval2'] = intval($data['totalpendingintreq']);
                        $data['dval3'] = intval($data['totalpendingva']);
                        $data['dval4'] = intval($data['totalpendingfirewall']);
                        $data['dval5'] = 2;

                        $data['barval_pending1'] = intval($data['totalpendingfirewall']);
                        $data['barval_pending2'] = intval($data['totalpendingintreq']);
                        $data['barval_pending3'] = intval($data['totalrejectva']);
                        $data['barval_pending4'] = 7;
                        
                        $data['barval_active1'] = intval($data['totalappfw']);
                        $data['barval_active2'] = intval($data['totalappint']);
                        $data['barval_active3'] = intval($data['totalappintva']);
                        $data['barval_active4'] = 0;

                        $data['barval_reject1'] = intval($data['totalreject']);
                        $data['barval_reject2'] = intval($data['totalrejectint']);
                        $data['barval_reject3'] = intval($data['totalreject']);
                        $data['barval_reject4'] = 0;



                        
                        // $this->session->set($userSession);
                        return view('common/dashboard', $data);
                    } else {
                        return redirect()->to(base_url('login'));
                    }

                }else if ($_SESSION['role_id'] == 2) {
    
                        if (isset($_SESSION['user_ID'])) {
    
                            $id = $_SESSION['user_ID'];
                            $depid = $_SESSION['dep_id'];
    
                            $firewallmodel = new FirewallRequestModel();
                            $data['penappfirewalllists'] = $firewallmodel ->getupenFirewallreqcount($id);
                            $data['pensecteam'] = $firewallmodel ->getupensecFirewallreqcount($id);
                            $data['pendingnetwrk'] = $firewallmodel ->getupennetwkFirewallreqcount($id);
                            $data['rejfirewalllists'] = $firewallmodel ->userwiserejFirewallreqcount($id);
                            // $data['totalpendingfirewall'] = intval($data['penappfirewalllists']) + intval($data['pensecteam']) + intval($data['pendingnetwrk']);
                            $data['rejappfirewalllists'] = $firewallmodel ->getrejectbymanfw($id);
                            $data['rejsecteam'] = $firewallmodel ->getrejectbysecfw($id);
                            $data['rejnetwrk'] = $firewallmodel ->getrejectbynetfw($id);

                            $data['totalrejfwuserwise'] = intval($data['rejappfirewalllists']) + intval($data['rejsecteam']) + intval($data['rejnetwrk']);
                            $data['totalpendingfirewall'] = 28; 


                            // $intrequestmodel = new InternetRequestModel();
                            // $data['penappfirewalllists'] = $firewallmodel ->getapppenintreqcount($id);
                            // $data['pensecteam'] = $firewallmodel ->gesecpendingintuwise($id);
                            // $data['pendingnetwrk'] = $firewallmodel ->getnetwrkpenintuwise($id);
                            // $data['rejfirewalllists'] = $firewallmodel ->userwiserejFirewallreqcount($id);
                            // $data['totalpendingfirewall'] = intval($data['penappfirewalllists']) + intval($data['pensecteam']) + intval($data['pendingnetwrk']);
                            $data['rejappfirewalllists'] = $firewallmodel ->getrejectbymanfw($id);
                            $data['rejsecteam'] = $firewallmodel ->getrejectbysecfw($id);
                            $data['rejnetwrk'] = $firewallmodel ->getrejectbynetfw($id);

                            $data['totalrejfwuserwise'] = intval($data['rejappfirewalllists']) + intval($data['rejsecteam']) + intval($data['rejnetwrk']);

    
                            $data['penintreqlists'] = 15;
                            $data['comintreqlists'] = 50;
                            $data['rejintreqlists'] = 2;
    
                            $data['penvareqlists'] = 30;
                            $data['comvareqlists'] = 65;
                            $data['rejvareqlists'] = 5;
    
                            $data['penpwdlists'] = 15;
                            $data['compwdlists'] = 105;
                            $data['rejpwdlists'] = 4;
    
                            // Doughnut Values
                            $data['dval1'] = 4;
                            $data['dval2'] = 18;
                            $data['dval3'] = 4;
                            $data['dval4'] = 4;
                            $data['dval5'] = 4;
    
                            $data['barval_pending1'] = 4;
                            $data['barval_pending2'] = 18;
                            $data['barval_pending3'] = 7;
                            $data['barval_pending4'] = 22;
                            
                            $data['barval_active1'] = 9;
                            $data['barval_active2'] = 14;
                            $data['barval_active3'] = 12;
                            $data['barval_active4'] = 4;
    
                            $data['barval_reject1'] = 1;
                            $data['barval_reject2'] = 3;
                            $data['barval_reject3'] = 2;
                            $data['barval_reject4'] = 2;

                            $data['Pendingitemlist'] = $firewallmodel->getPendingrequestfordashbord($id); 

                            // print_r('<pre>');
                            // print_r($data);
                            // print_r('</pre>');die;
    
                            
                            // $this->session->set($userSession);
                            return view('common/dashboard', $data);
                        } else {
                            return redirect()->to(base_url('login'));
                        }
    
                }else if ($_SESSION['role_id'] == 3) {

                    if (isset($_SESSION['user_ID'])) {
    
                        $id = $_SESSION['user_ID'];
                        $depid = $_SESSION['dep_id'];

                        $firewallmodel = new FirewallRequestModel();
                        $data['penappfirewalllists'] = $firewallmodel ->getupenFirewallreqcount($id);
                        $data['pensecteam'] = $firewallmodel ->getupensecFirewallreqcount($id);
                        $data['pendingnetwrk'] = $firewallmodel ->getupennetwkFirewallreqcount($id);
                        $data['rejfirewalllists'] = $firewallmodel ->userwiserejFirewallreqcount($id);
                        // $data['totalpendingfirewall'] = intval($data['penappfirewalllists']) + intval($data['pensecteam']) + intval($data['pendingnetwrk']);
                        $data['rejappfirewalllists'] = $firewallmodel ->getrejectbymanfw($id);
                        $data['rejsecteam'] = $firewallmodel ->getrejectbysecfw($id);
                        $data['rejnetwrk'] = $firewallmodel ->getrejectbynetfw($id);

                        $data['totalrejfwuserwise'] = intval($data['rejappfirewalllists']) + intval($data['rejsecteam']) + intval($data['rejnetwrk']);
                        $data['totalpendingfirewall'] = 28; 


                        $data['penintreqlists'] = 15;
                        $data['comintreqlists'] = 50;
                        $data['rejintreqlists'] = 2;

                        $data['penvareqlists'] = 30;
                        $data['comvareqlists'] = 65;
                        $data['rejvareqlists'] = 5;

                        $data['penpwdlists'] = 15;
                        $data['compwdlists'] = 105;
                        $data['rejpwdlists'] = 4;

                        // Doughnut Values
                        $data['dval1'] = 4;
                        $data['dval2'] = 18;
                        $data['dval3'] = 4;
                        $data['dval4'] = 4;
                        $data['dval5'] = 4;

                        $data['barval_pending1'] = 4;
                        $data['barval_pending2'] = 18;
                        $data['barval_pending3'] = 7;
                        $data['barval_pending4'] = 22;
                        
                        $data['barval_active1'] = 9;
                        $data['barval_active2'] = 14;
                        $data['barval_active3'] = 12;
                        $data['barval_active4'] = 4;

                        $data['barval_reject1'] = 1;
                        $data['barval_reject2'] = 3;
                        $data['barval_reject3'] = 2;
                        $data['barval_reject4'] = 2;

                        $data['Pendingitemlist'] = $firewallmodel->getPendingrequestfordashbord($id); 

                        // print_r('<pre>');
                        // print_r($data);
                        // print_r('</pre>');die;

                        
                        // $this->session->set($userSession);
                        return view('common/dashboard', $data);
                    } else {
                        return redirect()->to(base_url('login'));
                    }

                }else if ($_SESSION['role_id'] == 4) {

                    if (isset($_SESSION['user_ID'])) {
    
                        $id = $_SESSION['user_ID'];
                        $depid = $_SESSION['dep_id'];

                        $firewallmodel = new FirewallRequestModel();
                        $data['penappfirewalllists'] = $firewallmodel ->getupenFirewallreqcount($id);
                        $data['pensecteam'] = $firewallmodel ->getupensecFirewallreqcount($id);
                        $data['pendingnetwrk'] = $firewallmodel ->getupennetwkFirewallreqcount($id);
                        $data['rejfirewalllists'] = $firewallmodel ->userwiserejFirewallreqcount($id);
                        // $data['totalpendingfirewall'] = intval($data['penappfirewalllists']) + intval($data['pensecteam']) + intval($data['pendingnetwrk']);
                        $data['rejappfirewalllists'] = $firewallmodel ->getrejectbymanfw($id);
                        $data['rejsecteam'] = $firewallmodel ->getrejectbysecfw($id);
                        $data['rejnetwrk'] = $firewallmodel ->getrejectbynetfw($id);

                        $data['totalrejfwuserwise'] = intval($data['rejappfirewalllists']) + intval($data['rejsecteam']) + intval($data['rejnetwrk']);
                        $data['totalpendingfirewall'] = 28; 


                        $data['penintreqlists'] = 15;
                        $data['comintreqlists'] = 50;
                        $data['rejintreqlists'] = 2;

                        $data['penvareqlists'] = 30;
                        $data['comvareqlists'] = 65;
                        $data['rejvareqlists'] = 5;

                        $data['penpwdlists'] = 15;
                        $data['compwdlists'] = 105;
                        $data['rejpwdlists'] = 4;

                        // Doughnut Values
                        $data['dval1'] = 4;
                        $data['dval2'] = 18;
                        $data['dval3'] = 4;
                        $data['dval4'] = 4;
                        $data['dval5'] = 4;

                        $data['barval_pending1'] = 4;
                        $data['barval_pending2'] = 18;
                        $data['barval_pending3'] = 7;
                        $data['barval_pending4'] = 22;
                        
                        $data['barval_active1'] = 9;
                        $data['barval_active2'] = 14;
                        $data['barval_active3'] = 12;
                        $data['barval_active4'] = 4;

                        $data['barval_reject1'] = 1;
                        $data['barval_reject2'] = 3;
                        $data['barval_reject3'] = 2;
                        $data['barval_reject4'] = 2;

                        $data['Pendingitemlist'] = $firewallmodel->getPendingrequestfordashbord($id); 

                        // print_r('<pre>');
                        // print_r($data);
                        // print_r('</pre>');die;

                        
                        // $this->session->set($userSession);
                        return view('common/dashboard', $data);
                    } else {
                        return redirect()->to(base_url('login'));
                    }

                }else if ($_SESSION['role_id'] == 5) {

                    if (isset($_SESSION['user_ID'])) {
    
                        $id = $_SESSION['user_ID'];
                        $depid = $_SESSION['dep_id'];

                        $firewallmodel = new FirewallRequestModel();
                        $data['penappfirewalllists'] = $firewallmodel ->getupenFirewallreqcount($id);
                        $data['pensecteam'] = $firewallmodel ->getupensecFirewallreqcount($id);
                        $data['pendingnetwrk'] = $firewallmodel ->getupennetwkFirewallreqcount($id);
                        $data['rejfirewalllists'] = $firewallmodel ->userwiserejFirewallreqcount($id);
                        // $data['totalpendingfirewall'] = intval($data['penappfirewalllists']) + intval($data['pensecteam']) + intval($data['pendingnetwrk']);
                        $data['rejappfirewalllists'] = $firewallmodel ->getrejectbymanfw($id);
                        $data['rejsecteam'] = $firewallmodel ->getrejectbysecfw($id);
                        $data['rejnetwrk'] = $firewallmodel ->getrejectbynetfw($id);

                        $data['totalrejfwuserwise'] = intval($data['rejappfirewalllists']) + intval($data['rejsecteam']) + intval($data['rejnetwrk']);
                        $data['totalpendingfirewall'] = 28; 


                        $data['penintreqlists'] = 15;
                        $data['comintreqlists'] = 50;
                        $data['rejintreqlists'] = 2;

                        $data['penvareqlists'] = 30;
                        $data['comvareqlists'] = 65;
                        $data['rejvareqlists'] = 5;

                        $data['penpwdlists'] = 15;
                        $data['compwdlists'] = 105;
                        $data['rejpwdlists'] = 4;

                        // Doughnut Values
                        $data['dval1'] = 4;
                        $data['dval2'] = 18;
                        $data['dval3'] = 4;
                        $data['dval4'] = 4;
                        $data['dval5'] = 4;

                        $data['barval_pending1'] = 4;
                        $data['barval_pending2'] = 18;
                        $data['barval_pending3'] = 7;
                        $data['barval_pending4'] = 22;
                        
                        $data['barval_active1'] = 9;
                        $data['barval_active2'] = 14;
                        $data['barval_active3'] = 12;
                        $data['barval_active4'] = 4;

                        $data['barval_reject1'] = 1;
                        $data['barval_reject2'] = 3;
                        $data['barval_reject3'] = 2;
                        $data['barval_reject4'] = 2;

                        $data['Pendingitemlist'] = $firewallmodel->getPendingrequestfordashbord($id); 

                        // print_r('<pre>');
                        // print_r($data);
                        // print_r('</pre>');die;

                        
                        // $this->session->set($userSession);
                        return view('common/dashboard', $data);
                    } else {
                        return redirect()->to(base_url('login'));
                    }

                } else {
                    return redirect()->to(base_url('invalidLogin'));

                }
            }

        } else {
            return redirect()->to(base_url('login'));
        }
        
    }
}
