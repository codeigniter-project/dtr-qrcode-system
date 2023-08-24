<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sample_model extends CI_Model {

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
        $this->db->from('tbluser');
       return  $query = $this->db->get();

        // return [];
    }
    

    function login(){

        $this->db->select('*');
        $this->db->from('tbluser');
        return  $query = $this->db->get();
    }

    function authenticate($data){

        $this->db->select('*');
        $this->db->from('tbluser');
        $this->db->where('user_name',$data['username']);
        $this->db->where('user_password', $data['password']);
        
        return $query = $this->db->get();
    }


    function userAdd($data){

        $this->db->set('user_name', $data['username']);
        $this->db->set('user_password', $data['password']);
        $this->db->set('user_type', $data['userType']);
        $this->db->set('datetime_added', date("Y-m-d H:i:s"));
        $this->db->set('datetime_modefied', date("Y-m-d H:i:s"));
        return $this->db->insert('tbluser');
    }





}

