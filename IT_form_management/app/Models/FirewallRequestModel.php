<?php

namespace App\Models;

use CodeIgniter\Model;

class FirewallRequestModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'firewallrequestmaster';
    protected $primaryKey           = 'req_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = false;
    protected $allowedFields        = [];
  
   	protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        return $data;
    }

    protected function beforeUpdate(array $data){
        return $data;
    }    

    public function getRequests()
    {
        // return $this->get()->getResult();
        return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($this->where('mng_apr',0)->findAll());
        // print_r('</pre>');die;
    }

    public function getRequestsforapp($depid)
    {
        // return $this->get()->getResult();
        return  $this->where('mng_apr',0)
                    ->where('department',$depid)
                    ->get()
                    ->getResult();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    public function getmyFRequests($u_id)
    {
        // return $this->get()->getResult();
        return $this->where('userid',$u_id)
                    ->get()
                    ->getResult();
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }


    public function saveRequest($data=[])
    {
        return $this->insert($data);
    }

    public function search_by_id($id){

       return $this->where('req_id',$id)->first();

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;

    }
    public function search_by_innerjn($id){

        //    $result = $this->where('req_id',$id)->first();
    
            return $this->db->table('firewallrequestmaster')->select([
                'firewallrequestmaster.pfno',       
                'departmentmaster.name',
                'designationmaster.desig_name',
            ])
            ->join('departmentmaster', 'departmentmaster.id = firewallrequestmaster.department')
            ->join('designationmaster', 'designationmaster.desig_id = firewallrequestmaster.position')
            ->where('firewallrequestmaster.req_id', $id)
            ->get()
            ->getResultArray();
    
            // print_r('<pre>');
            // print_r($result);
            // print_r('</pre>');die;
    
        }

    public function aproverequest($id,$data){

        // return $this->set('mng_apr',$data['mng_apr'])->set('managercommnt',$data['managercommnt'])
        //             ->where('req_id',$id)
        //             ->update();
        return $this->set($data)
        ->where('req_id', $id)
        ->update();
    }
    public function getpenbyman($status){

        return $this->where('mng_apr', $status)
        ->countAllResults();

    }

    public function getpenbysec($status) {

        return $this->where('mng_apr', $status)
        ->where('sec_apr', "0")
        ->countAllResults();

    }
    public function getpenbynetwrk($status) {

        return $this->where('mng_apr', $status)
        ->where('sec_apr', $status)
        ->where('isntwrkdeployed', "0")
        ->countAllResults();
    }

    public function getapproved($status) {

        return $this->where('isntwrkdeployed', "1")
        ->countAllResults();
    }

    public function getrejbyman($status) {

        return $this->where('mng_apr', $status)
        ->countAllResults();
    }
    public function getrejbysec($status) {

        return $this->where('sec_apr', $status)
        ->countAllResults();
    }
    public function getrejbynetwk($status) {

        return $this->where('isntwrkdeployed', $status)
        ->countAllResults();
    }
    
    
    public function getupenFirewallreqcount($id) {

        return $this->where('mng_apr', '0')
        ->where('userid', $id)
        ->countAllResults();

    }
    public function getupensecFirewallreqcount($id) {

        return $this->where('sec_apr', '0')
        ->where('userid', $id)
        ->countAllResults();

    }
    public function getupennetwkFirewallreqcount($id) {

        return $this->where('isntwrkdeployed', "0")
        ->where('userid', $id)
        ->countAllResults();
    }


    public function getrejectbymanfw($id) {

        return $this->where('mng_apr', '2')
        ->where('userid', $id)
        ->countAllResults();

    }
    public function getrejectbysecfw($id) {

        return $this->where('sec_apr', '2')
        ->where('userid', $id)
        ->countAllResults();

    }
    public function getrejectbynetfw($id) {

        return $this->where('isntwrkdeployed', "2")
        ->where('userid', $id)
        ->countAllResults();
    }




    public function userwiserejFirewallreqcount($id) {
        $array = array('mng_apr' => 2, 'sec_apr' => 2, 'isntwrkdeployed' => 2,'userid' => $id);
        return $this->where($array)
        ->countAllResults();
    }

    public function getPendingrequestfordashbord($uId)
    {

        $userId = 2;
        return $this->db->table('requestlog T1')
        ->join('firewallrequestmaster T2', 'T2.userid = T1.loged_usr', 'left')
        ->join('internetrequestmaster T3', 'T3.user_id = T1.loged_usr', 'left')
        ->where('T1.loged_usr', $uId)
        ->groupBy('T1.reqlog_id, T1.req_type')
        ->get()
        ->getResultArray();


        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;


    }

}