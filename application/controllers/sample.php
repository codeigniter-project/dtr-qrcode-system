<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require "vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

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
		// return $this->load->view('sample');
		return $this->load->view('login');

	}



	public function authenticate(){

		$this->load->model('sample_model');

		$data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');

		$user = $this->sample_model->authenticate($data)->result();


		
		if($user && $user[0]->user_type==1){
			echo "http://localhost:8003/index.php/sample/user";
			
		}

		else if($user && $user[0]->user_type==2){
			echo "http://localhost:8003/index.php/sample/employee";
			
		}
		else{
			echo "http://localhost:8003";

		}

		
		

	}


	public function userAddDb()
	{
		$this->load->model('sample_model');

		$data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['userType'] = $this->input->post('userType');

		$res = $this->sample_model->userAdd($data);

		
		if($res){
			echo "http://localhost:8003/index.php/sample/user";
			
		}

		else{
			echo "http://localhost:8003";

		}
	}

	public function userAddEmployee()
	{
		$this->load->model('employee');

		$data['firstname'] = $this->input->post('firstname');
        $data['lastname'] = $this->input->post('lastname');
        // $data['userType'] = $this->input->post('userType');

		$res = $this->employee->EmployeeAdd($data);

		
		if($res){
			echo "http://localhost:8003/index.php/sample/employee";
			
		}

		else{
			echo "http://localhost:8003";

		}
	}


	public function userAdd()
	{
		return $this->load->view('addUser');
	}

	public function employee()
	{
		return $this->load->view('employee');
	}

	public function employeeAdd()
	{
		return $this->load->view('employeeAdd');
	}


	public function user()
	{
		return $this->load->view('user');
	}

	public function userUpdate()
	{
		return $this->load->view('userUpdate');
	}


	public function userUpdatenow(){

		return $this->load->view('userUpdate');
	}

	public function employeeUpdatenow(){

		$id =$this->input->get('id');

		$this->load->model('employee');


		$user['data'] = $this->employee->getEmployeeByid($id)->result();


		return $this->load->view('employeeUpdate', $user );
	}



	public function employeeDelete()
	{
		$id =$this->input->get('id');

		$this->load->model('employee');

		$this->employee->delete($id);

		return $this->load->view('employee');
	}

	public function employeeUpdate()
	{
		$data['firstname'] = $this->input->post('firstname');
        $data['lastname'] = $this->input->post('lastname');
        $data['id'] = $this->input->post('id');

		$this->load->model('employee');

		$this->employee->update($data);


		echo "http://localhost:8003/index.php/sample/employee";


	}


	public function showEmployeeQR(){

		$id =$this->input->get('id');

		$qr = QrCode::create("https://localhost:8003/index.php/sample/saveEmployeeDtr?id=".$id);
		$writer = new PngWriter();
	
		$result = $writer->write($qr);

		$data['image'] = "<img src='{$result->getDataUri()}'>";

		return $this->load->view('showQR', $data);
	}


	public function saveEmployeeDtr(){
		$id =$this->input->get('id');

		$this->load->model('employee');

	

		$user = $this->employee->EmployeeAddDtr($id);

		echo "Successfully time in";

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
					$r->id,
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
					$r->id,
                    $r->first_name,
                    $r->last_name,
                    $r->created_by,
                    $r->datetime_added,
                    $r->datetime_updated
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


	public function deleteUser(){

		$data['id'] = $this->input->post('id');
	}



	

	
}

