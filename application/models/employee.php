<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employee extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_list(){

        // return $query = $this->db->query('SELECT * from tbl_login');
        // return $query->result();

        $this->db->select('*');
        $this->db->from('tblemployee');
       return  $query = $this->db->get();

        // return [];
    }



    function EmployeeAdd($data){

        $this->db->set('first_name', $data['firstname']);
        $this->db->set('last_name', $data['lastname']);

        $this->db->set('datetime_added', date("Y-m-d H:i:s"));
        $this->db->set('datetime_updated', date("Y-m-d H:i:s"));
        return $this->db->insert('tblemployee');
    }



    function EmployeeAddDtr($id){

        $this->db->select('*');
        $this->db->from('tblemployee');
        $this->db->where('id', $id);
        $query = $this->db->get()->result();

        $this->db->set('employee_id', $query[0]['id']);
        $this->db->set('user_id', $query[0]['created_by']);
        $this->db->set('date_added',  date("Y-m-d H:i:s"));
        $this->db->set('time_in', date("Y-m-d H:i:s"));
        $this->db->set('time_out', date("Y-m-d H:i:s"));
        return $this->db->insert('tblemployee_dtr');

     
    }


    public function getEmployeeByid($id){
        $this->db->select('*');
        $this->db->from('tblemployee');
        $this->db->where('id', $id);
    
        return $query = $this->db->get();
    }


    public function delete($id){

        $this->db->where('id', $id);
       return $this->db->delete('tblemployee');
    }


    public function update($data){

        $this->db->where('id', $data['id']);
       return $this->db->update('tblemployee', ['first_name'=> $data['firstname'], 'last_name' =>$data['lastname'] ]);
    }






}

