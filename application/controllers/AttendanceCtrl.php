<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceCtrl extends CI_Controller {

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
        $this->load->helper('form');
		$this->load->model('CommonModel','cm');
	}

	public function index()
	{
		$data['attendance']=$this->cm->common_select('attendance');
		$data['page']="attendance/index";
		$this->load->view('app',$data);
	}

    public function get_empdata_list(){
        $att_date=$this->input->get('att_date');
        if($att_date){
            $con['att_date']=$att_date;
            $attcheck=$this->cm->common_select('attendance','id',$con);
            if($attcheck){
                $data['attendance']=$this->db->query("SELECT attendance.*, employee.name,employee.designation,employee.contact FROM `attendance` JOIN employee on employee.id=attendance.employee_id WHERE attendance.att_date='$att_date'")->result();
                $result=$this->load->view('attendance/get_empdata_list',$data,true);
            }else{
                $result="<h2 class='text-center text-danger'>No attendance found at this date</h2>";
            }
        }else{
            $result="<h2 class='text-center text-danger'>Please select a date</h2>";
        }

        print_r(json_encode($result));
	}

	public function create(){
		/* load helper and library */
		$this->load->helper('form');
		$data['page']="attendance/create";
		$this->load->view('app',$data);
	}

	public function get_empdata(){
        $att_date=$this->input->get('att_date');
        if($att_date){
            $con['att_date']=$att_date;
            $attcheck=$this->cm->common_select('attendance','id',$con);
            if(!$attcheck){
                $data['employee']=$this->cm->common_select('employee','id,name,designation,contact');
                $result=$this->load->view('attendance/get_empdata',$data,true);
            }else{
                $result="<h2 class='text-center text-danger'>You have already hit this date</h2>";
            }
        }else{
            $result="<h2 class='text-center text-danger'>Please select a date</h2>";
        }

        print_r(json_encode($result));
	}

	public function store(){
		$ud=array();
        $emp=$this->input->post('status');
        foreach($emp as $emp_id=>$status){
            $ud[]=array(
                    'att_date'=>$this->input->post('att_date'),
                    'employee_id'=>$emp_id,
                    'status'=>$status,
                );
        }

        if($this->db->insert_batch('attendance', $ud)){
            $this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
            redirect('attendance');
        }else{
            $this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
            $this->load->view('attendance/add');
        }
        
	}

	public function update(){
		$ud['status']=$this->input->post('status');
		$con['id']=$this->input->post('att_id');

        if($this->cm->common_update('attendance',$ud,$con)){
            $this->session->set_flashdata('msg','<b class="text-success">Data updated</b>');
        }else{
            $this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
        }
			redirect('attendance');
        
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
