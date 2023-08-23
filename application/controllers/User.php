<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Post Controller
 */
class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
	}

	public function index()
	{
		$data['data'] = $this->crud->get_records('tbluser');
		$this->load->view('user/list', $data);
	}


	public function create()
	{
		$this->load->view('user/create');
	}


	public function store()
	{
        // 'title' => $this->input->post('title');
        $now = date('Y-m-d H:i:s');
		$data['user_name'] = $this->input->post('user_name');
		$data['user_password'] = $this->input->post('user_password');
        $data['user_type'] = $this->input->post('user_type');
        $data['datetime_added'] = $now;
       

        /*
        $this->db->set('user_nicename', $nameVar);
        $this->db->set('user_login', $emailVar);
        $this->db->set('user_pass', $passwordVar);
        $this->db->set('user_registered', $now);
        $this->db->insert('doc_users');
        */

		$this->crud->insert('tbluser', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
		redirect(base_url());
	}

	public function edit($id)
	{
		$data['data'] = $this->crud->find_record_by_id('tbluser', $id);
		$this->load->view('user/edit', $data);
	}

	public function update($id)
	{
		$now = date('Y-m-d H:i:s');
        $data['user_name'] = $this->input->post('user_name');
		$data['user_password'] = $this->input->post('user_password');
        $data['user_type'] = $this->input->post('user_type');
		$data['datetime_modified'] = $now;

		$this->crud->update('tbluser', $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
		redirect(base_url());
	}

	public function delete($id)
	{
		$this->crud->delete('tbluser', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
		redirect(base_url());
	}
}