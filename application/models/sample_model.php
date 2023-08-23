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



}

