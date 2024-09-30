<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestLogModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'requestlog';
    protected $primaryKey           = 'id';
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
    
    
    public function getreqlists($u_id){
        return $this->db->select([
                        'requestlog.reqlog_id',
                        'requestlog.req_type',
                        'firewallrequestmaster.date AS Requested Date', // Columns from firewallrequestmaster
                        'internetrequestmaster.req_date AS Requested Date' // Columns from internetrequestmaster
                    ])
                    ->join('firewallrequestmaster', 'firewallrequestmaster.req_id = requestlog.reqlog_id', 'left')
                    ->join('internetrequestmaster', 'internetrequestmaster.intreq_id = requestlog.reqlog_id ', 'left')
                    ->where('requestlog.loged_usr', $u_id)
                    ->groupBy('requestlog.reqlog_id'); // Assuming requestlog.id is the primary key

                    //edited by samuda

                    // SELECT * FROM `requestlog` 
                    // LEFT JOIN firewallrequestmaster ON firewallrequestmaster.loged_user = requestlog.loged_usr
                    // LEFT JOIN internetrequestmaster ON internetrequestmaster.loged_user = requestlog.loged_usr
                    // WHERE requestlog.loged_usr = 2 GROUP BY requestlog.reqlog_id, requestlog.req_type;

    }
    

    public function getManagersforAppr()
    {

        return $this->whereIn('u_roleid', ['2','3'])
        ->get()
        ->getResult();

        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;    


    }

    public function findUserBypfno($pf) {
        return $this->where(['u_pfno' => $pf])->first();
        // $result = $this->where(['u_pfno' => $pf])->first();  
        // print_r('<pre>');
        // print_r($result);
        // print_r('</pre>');die;
    }

    
    public function resetpassword($id,$newPassword,$loguser){
        
        return $this->set($newPassword)
        ->where('u_id', $id)
        ->update(); // Replace 'user' with your table name

        // return $this->db->affected_rows(); // Return the number of affected rows   
       
    }

    public function updateuserstatus($seluid, $ustatedata){

        
        return $this->set($ustatedata)
        ->where('u_id', $seluid)
        ->update(); // Replace 'user' with your table name

        // return $this->db->affected_rows(); // Return the number of affected rows   
       
    }


}