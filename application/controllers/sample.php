<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sample extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		return $this->load->view('sample');
		// return $this->load->view('login');

	}



	public function login(){
		return $this->load->view('login');


	}

	public function authenticate(){

		$this->input->post('username');
        $this->input->post('password');


		
        



		
	}





	public function employee_time_record()
	{
		return $this->load->view('employeeTimeRecord');
	}

	public function employee()
	{
		return $this->load->view('employee');
	}


	public function data(){


		$this->load->model('sample_model');

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));

      	  $user = $this->sample_model->get_list();

          $data = array();

          foreach($user->result() as $r) {

               $data[] = array(
                    $r->user_name,
                    $r->user_password,
                    $r->user_type,
                    $r->datetime_added,
                    $r->datetime_modefied
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $user->num_rows(),
                 "recordsFiltered" => $user->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
	}
	


	public function employeeData(){


		$this->load->model('employee');

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));

      	  $employee = $this->employee->get_list();

          $data = array();

          foreach($employee->result() as $r) {

               $data[] = array(
                    $r->first_name,
                    $r->last_name,
                    $r->created_by,
                    $r->datetime_added,
                    $r->datetime_updated,
					''
           
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $employee->num_rows(),
                 "recordsFiltered" => $employee->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
	}
	

	
}

