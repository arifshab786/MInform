<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function login()
	{
		$this->load->model('User_model');


		if ($this->User_model->authorised() == true) {
			$this->session->set_flashdata('msg', 'you are not authorised to access this page');
			redirect(base_url('index.php/Home/listOfAllChildApprovedByClinicalAdmin'));
		}



		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true) {
			// verify user from clinical_admin_master table
			// $formArray=array();
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user = $this->User_model->login($username);

			if (!empty($user)) {

				if ($password == $user['password']) {
					$sessionArray['id'] = $user['adminId'];
					$sessionArray['username'] = $user['adminName'];
					$sessionArray['status'] = $user['status'];
					$this->session->set_userdata('user', $sessionArray);

					// $this->session->set_flashdata('success','you have logged in successfully');
					redirect(base_url() . 'index.php/Home/listOfAllChildApprovedByClinicalAdmin');
				} else {
					$this->session->set_flashdata('msg', 'Incorrect password !! Try again !');
					redirect(base_url() . 'index.php/Home/login');
				}
			} else {
				$this->session->set_flashdata('msg', 'Incorrect username !! Try again !');
				redirect(base_url() . 'index.php/Home/login');
			}


			// $this->session->set_flashdata('success','you have logged in successfully');
			// redirect(base_url().'index.php/Home/Dashboard');
		} else {
			$this->load->view('login');
		}


		// $this->load->view('login');
	}



	public function loginWithHealthWorkerCredentials()
	{
		$this->load->model('User_model');


		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// $username="mira3";
			$user = $this->User_model->loginWithHealthWorkerCredentials($username);
			if (!empty($user)) {

				if ($password == $user['password']) {
					$sessionArray['id'] = $user['hw_id'];
					$sessionArray['username'] = $user['hw_name'];
					$sessionArray['name'] = $user['Name'];
					$sessionArray['sp_id'] = $user['sp_id'];
					$sessionArray['date_of_joining'] = $user['date_of_joining'];
					$sessionArray['email'] = $user['email'];
					$sessionArray['region_id'] = $user['region_id'];
					$sessionArray['contact_no'] = $user['contact_no'];
					$sessionArray['address'] = $user['address'];
					$sessionArray['is_active'] = $user['is_active'];
					$sessionArray['password'] = $user['password'];
					$sessionArray['totalRecord'] = $user['totalRecord'];
					$this->session->set_userdata('user', $sessionArray);
					// var_dump($user);

					// $this->session->set_flashdata('success','you have logged in successfully');
					redirect(base_url() . 'index.php/Home/HealthWorkerDashboard');
				} else {
					$this->session->set_flashdata('msg', 'Incorrect password !! Try again !');
					redirect(base_url() . 'index.php/Home/loginWithHealthWorkerCredentials');
				}
			} else {
				$this->session->set_flashdata('msg', 'Incorrect username !! Try again !');
				redirect(base_url() . 'index.php/Home/loginWithHealthWorkerCredentials');
			}
			// var_dump($user);


			// $this->session->set_flashdata('success','you have logged in successfully');
			// redirect(base_url().'index.php/Home/Dashboard');
		} else {
			$this->load->view('loginWithHealthWorkerCredentials');
		}


		// $this->load->view('loginWithHealthWorkerCredentials');
	}


	public function HealthWorkerDashboard(){
		$this->load->model('User_model');
		if ($this->User_model->authorised() == false) {
			$this->session->set_flashdata('msg', 'you are not authorised to access this page');
			redirect(base_url('index.php/Home/loginWithHealthWorkerCredentials'));
		}
		$user = $this->session->userdata('user');

		$data['user'] = $user;
		// var_dump($user);

		$this->load->view('HealthWorkerDashboard', $data);
	}


	function listOfAllChildApprovedByClinicalAdmin()
	{
		$this->load->model('User_model');
		if ($this->User_model->authorised() == false) {
			$this->session->set_flashdata('msg', 'you are not authorised to access this page');
			redirect(base_url('index.php/Home/login'));
		}
		$childdata = $this->User_model->childData();
		$user = $this->session->userdata('user');

		$data['childrendata'] = $childdata;
		$data['user'] = $user;
		// var_dump($user);

		$this->load->view('listOfAllChildApprovedByClinicalAdmin', $data);
	}

	function listOfAllChildsSubmittedForClinicalAdminApproval()
	{
		$this->load->model('User_model');
		if ($this->User_model->authorised() == false) {
			$this->session->set_flashdata('msg', 'you are not authorised to access this page');
			redirect(base_url('index.php/Home/login'));
		}
		$childdata = $this->User_model->pendingSupervisionChildData();
		$user = $this->session->userdata('user');

		$data['childrendata'] = $childdata;
		$data['user'] = $user;
		// var_dump($user);

		$this->load->view('listOfAllChildsSubmittedForClinicalAdminApproval', $data);
	}


	function childScreeningQuestionsAnswer($child_id)
	{
		$this->load->model('User_model');
		$screeningDetails = $this->User_model->getScreeningDetails($child_id);
		$data['screeningDetails'] = $screeningDetails;
		$this->load->view('childScreeningQuestionsAnswer', $data);
	}


	public function updateChildDetails(){
		$this->load->model('User_model');
		$child_id=$this->input->post('childId');
		$problems=array();
		$problems=$this->input->post('PossibleProblems');
		// var_dump($problems);


		$result=$this->User_model->submitClinicalAdminApproval($child_id, $problems);
		// if (ENVIRONMENT === 'development') {
		// 	echo "Last Query: " . $this->db->last_query();
		// }
		// var_dump($result);
		redirect(base_url('index.php/Home/listOfAllChildApprovedByClinicalAdmin'));

	}


	public function createHealthWorker(){
		$this->load->model('User_model');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');


		$region=$this->User_model->getRegion();
		$data['region']=$region;
		// var_dump($region);

		$user = $this->session->userdata('user');
		// $formArray['sp_id']=$user['id'];
		// var_dump($formArray['sp_id']);
		if($this->form_validation->run()==false){
			$this->load->view('createHealthWorker',$data);
		}else{
			$formArray=array();
			$formArray['hw_name']=$this->input->post('username');
			$formArray['Name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$formArray['password']=$this->input->post('password');
			$formArray['contact_no']=$this->input->post('mobile');
			$formArray['address']=$this->input->post('address');
			$formArray['date_of_joining']=$this->input->post('date');
			$formArray['region_id']=$this->input->post('area');
			$formArray['is_active']=1;
			$formArray['sp_id']=$user['id'];

			$this->User_model->createHealthWorker($formArray);
			$this->session->set_flashdata('success',"Health Worker has been created successfully !!!");
			redirect(base_url('index.php/Home/listOfAllChildApprovedByClinicalAdmin'));


		}
	}

		

	// public function updateChildDetails()
	// {
	// 	$childId = $_POST['childId'];
	// 	$problems = array();
	// 	$problems = $_POST['PossibleProblems'];
	// 	$cp = 0;
	// 	$hearingImpairment = 0;
	// 	$visualImpairment = 0;
	// 	$intellectualDisability = 0;
	// 	$epilepsy = 0;
	// 	$ASD = 0;


	// 	$this->load->model('User_model');
	// 	$querySuccess = false;
	// 	$childId = $this->input->post('childId');
	// 	$problems = $this->input->post('PossibleProblems');
	// 	// Initialize your problem variables as needed (e.g., $cp, $visualImpairment, etc.)
	// 	$result = $this->User_model->submitClinicalAdminApproval($childId, $cp);



	// 	$this->load->view('update_result_view', $data); // Load a view to display the result
	// }




	function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url('index.php/Home/login'));
	}
	function logoutHealthWorker()
	{
		$this->session->unset_userdata('user');
		redirect(base_url('index.php/Home/loginWithHealthWorkerCredentials'));
	}


}
