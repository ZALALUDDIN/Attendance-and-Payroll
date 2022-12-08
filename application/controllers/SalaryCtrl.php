<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalaryCtrl extends CI_Controller {

	function __construct(){
		parent::__construct();
		/* authentication  */
		if(!$this->session->get_userdata()['ud']){
			redirect('login');
		}

		/* authorization  */
		if($this->session->get_userdata()['ud']->role_id !=1){
			redirect('/');
		}

		$this->load->model('SalaryModel','um');
		$this->load->model('CommonModel','cm');
	}

	public function index()
	{
		$data['salary']=$this->um->retrive();
		$data['page']="salary/index";
		$this->load->view('app',$data);
	}

	public function create(){
		/* load helper and library */
		$this->load->helper('form');
		$data['employee']=$this->cm->common_select('employee','id,name,designation,salary,pf,hr');
		$data['page']="salary/create";
		$this->load->view('app',$data);
	}

	public function get_salarydata_list(){
        $emp_id=$this->input->get('emp_id');
        $year=$this->input->get('year');
        $month=sprintf("%02d", $this->input->get('month'));
        if($month){
			$attend=$this->db->query("SELECT count(id) as statuss,status FROM `attendance` WHERE employee_id=$emp_id and month(`att_date`)=$month and year(`att_date`)=$year GROUP BY `status`")->result();
			$salary=$this->input->get('salary');
			$absent=$present=$deduction=0;
			if($attend){
				$absent=$present=0;
				foreach($attend as $att){
					if($att->status==="0"){
						$absent=$att->statuss;
					}else{
						$present=$att->statuss;
					}
				}

				$deduction=(($salary/30) * $absent);
			}
            
        }
		$returndata=array(
			"absent"=>$absent,
			"present"=>$present,
			"deduction"=>$deduction,
		);
        print_r(json_encode($returndata));
	}

	public function store(){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');

		/* set validatin */
		$this->form_validation->set_rules('emp_id', 'Employee Id', 'required');
		$this->form_validation->set_rules('salary', 'salary', 'required');
		$this->form_validation->set_rules('pf', 'Pro.fund', 'required');
		$this->form_validation->set_rules('hr', 'House Rant', 'required');
		$this->form_validation->set_rules('deduction', 'Deduction', 'required');
		$this->form_validation->set_rules('payment', 'Payment', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required');
		$this->form_validation->set_rules('month', 'Month', 'required');

		if ($this->form_validation->run() == FALSE){
            $this->load->view('salary/create');
        }else{
			$ud['employee_id']=$this->input->post('emp_id');
			$ud['salary']=$this->input->post('salary');
			$ud['pf']=$this->input->post('pf');
			$ud['hr']=$this->input->post('hr');
			$ud['deduction']=$this->input->post('deduction');
			$ud['payment']=$this->input->post('payment');
			$ud['year']=$this->input->post('year');
			$ud['month']=$this->input->post('month');
			

			if($this->um->create($ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
				redirect('salary');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				$this->load->view('salary/create');
			}
            
        }
	}

	public function update($id){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');

		/* set validatin */
		$this->form_validation->set_rules('name', 'Full Name', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('nid', 'NID', 'required');
		$this->form_validation->set_rules('salary', 'Salary', 'required');
		$this->form_validation->set_rules('pf', 'Provident Found', 'required');
		$this->form_validation->set_rules('hr', 'House Rant', 'required');
		

		if ($this->form_validation->run() == FALSE){
			$data['salary']=$this->um->single_retrive($id);
            $this->load->view('salary/edit',$data);
        }else{
			$ud['name']=$this->input->post('name');
			$ud['designation']=$this->input->post('designation');
			$ud['contact']=$this->input->post('contact');
			$ud['email']=$this->input->post('email');
			$ud['nid']=$this->input->post('nid');
			$ud['salary']=$this->input->post('salary');
			$ud['pf']=$this->input->post('pf');
			$ud['hr']=$this->input->post('hr');

			if($this->um->update($id,$ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data updated</b>');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				//$this->load->view('users/edit/'.$id);
			}
			redirect('salary');
        }
	}

	public function destroy($id){
		$condition['id']=$id;
		if($this->um->delete($condition)){
			$this->session->set_flashdata('msg','<b class="text-success">Data deleted</b>');
		}else{
			$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
		}

		redirect('salary');
	}
}
