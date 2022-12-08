<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller {

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

		$this->load->model('UserModel','um');
		$this->load->model('CommonModel','cm');
	}

	public function index()
	{
		$data['employee']=$this->cm->common_select('employee');
		$data['page']="employee/index";
		$this->load->view('app',$data);
	}

	public function create(){
		/* load helper and library */
		$this->load->helper('form');
		$data['page']="employee/create";
		$this->load->view('app',$data);
	}

	public function store(){
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
            $this->load->view('employee/create');
        }else{
			$ud['name']=$this->input->post('name');
			$ud['designation']=$this->input->post('designation');
			$ud['contact']=$this->input->post('contact');
			$ud['email']=$this->input->post('email');
			$ud['nid']=$this->input->post('nid');
			$ud['salary']=$this->input->post('salary');
			$ud['pf']=$this->input->post('pf');
			$ud['hr']=$this->input->post('hr');
			

			if($this->um->create($ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
				redirect('employee');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				$this->load->view('employee/create');
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
			$data['employee']=$this->um->single_retrive($id);
            $this->load->view('employee/edit',$data);
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
			redirect('employee');
        }
	}

	public function destroy($id){
		$condition['id']=$id;
		if($this->um->delete($condition)){
			$this->session->set_flashdata('msg','<b class="text-success">Data deleted</b>');
		}else{
			$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
		}

		redirect('employee');
	}
}
