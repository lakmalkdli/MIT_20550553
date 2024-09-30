<?php

namespace App\Controllers;


class Dashboard extends BaseController
{
    

    public function __construct() {
        
    }

    public function index()
    {
        if (!$this->isSessionVallid()) {
            return redirect()->route('/');
        }

        // print_r('<pre>');
        // print_r($res);
        // print_r('</pre>');die;

        $data['requests'] = $this->firewallrequest->getRequests();

        // foreach ($requests as $row) {
        //     echo $row->staffmember;
        // }
        // // print_r('<pre>');
        // // print_r($requests);
        // // print_r('</pre>');
        // die;

        return view('common/dashboard', $data);
        // return view('login/dashbord');
    }    

    public function dashbord()
    {
        return view('common/dashbord');
         
    }


}