<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends AdminController {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('CommonModel','cm');
	}

	public function index(){
		$data['userdata']=$this->session->get_userdata()['ud'];
		$data['page']="profile/profile";
		$this->load->view('app',$data);
	}
	
	public function store(){
		/* load helper and library */
		$this->load->library('form_validation');
		/* default unique */
		$userdata=$this->session->get_userdata()['ud'];
		$uniqueun = $uniquecon = $uniqueem = "";
		
		if($this->input->post('contact_no') != $userdata->contact_no)
		   $uniquecon =  '|is_unique[tbl_auth.contact_no]';
	   
		if($this->input->post('username') != $userdata->username)
		   $uniqueun =  '|is_unique[tbl_auth.username]';
	   
		if($this->input->post('email_address') != $userdata->email_address)
		   $uniqueem =  '|is_unique[tbl_auth.email_address]';
		
		/* set validatin */
		$this->form_validation->set_rules('name', 'Full Name', 'required');
		
		$this->form_validation->set_rules('contact_no', 'Contact No', "required$uniquecon");
		$this->form_validation->set_rules('username', 'User Name', "required$uniqueun");
		$this->form_validation->set_rules('email_address', 'Email Address', "required|valid_email$uniqueem");
		
		if ($this->form_validation->run() == FALSE){
            $data['userdata']=$this->session->get_userdata()['ud'];
			$data['page']="profile/profile";
			$this->load->view('app',$data);
        }else{
			/* //basic file upload
			if($_FILES['photo']['name']){
				$imgname=time().rand(1000,9999);

				$c['file_name']=$imgname;
				$c['upload_path']='upload/profile/';
				$c['allowed_types']='jpeg|jpg|png|gif';

				$this->load->library('upload',$c);
				// "photo" is form name 
				if(!$this->upload->do_upload('photo')){
					$this->session->set_flashdata('msg',$this->upload->display_errors());
					redirect('profile');
					exit;
				}else{
					$image_data=$this->upload->data();
					$ud['photo']=$image_data['file_name'];
				}
			} */

			/*//basic file upload with resize
			if($_FILES['photo']['name']){
				$imgname=time().rand(1000,9999);

				$c['file_name']=$imgname;
				$c['upload_path']='upload/profile/';
				$c['allowed_types']='jpeg|jpg|png|gif';

				$this->load->library('upload',$c);
				// "photo" is form name 
				if(!$this->upload->do_upload('photo')){
					$this->session->set_flashdata('msg',$this->upload->display_errors());
					redirect('profile');
					exit;
				}else{
					$image_data=$this->upload->data();
					
					$conf=array(
						'image_library' => 'gd2',
						'source_image' 	=> $image_data['full_path'],
						'maintain_ratio'=> FALSE,
						'width'			=> 300,
						'height'		=> 300
					);

					$this->load->library('image_lib',$conf);
					$this->image_lib->resize();
					$this->image_lib->clear();



					$ud['photo']=$image_data['file_name'];
				}
			}*/

			//basic file upload with resize and watermark
			if($_FILES['photo']['name']){
				$imgname=time().rand(1000,9999);

				$c['file_name']=$imgname;
				$c['upload_path']='upload/profile/';
				$c['allowed_types']='jpeg|jpg|png|gif';
				$c['max_height']='1000'; //px
				$c['max_width']='1000'; //px
				$c['max_size']='1000'; //kb

				$this->load->library('upload',$c);
				// "photo" is form name 
				if(!$this->upload->do_upload('photo')){
					$this->session->set_flashdata('msg',$this->upload->display_errors());
					redirect('profile');
					exit;
				}else{
					$image_data=$this->upload->data();
					$image_name=$image_data['file_name'];
					// this is from AdminController file
					$this->resizeimage($image_data);
					$this->watermark($image_data,'Copyright 2022 WDPF-50');

					$ud['photo']=$image_name;
				}
			}
			
			// print_r($ud['photo']);
			// die();

			$ud['name']=$this->input->post('name');
			$ud['username']=$this->input->post('username');
			$ud['contact_no']=$this->input->post('contact_no');
			$ud['email_address']=$this->input->post('email_address');
			$ud['updated_at']=date('Y-m-d H:i:s');

			$con['id']=$userdata->id;
			
			if($this->cm->common_update('tbl_auth',$ud,$con)){
				/* set data to session again */
				$d=$this->db->query("SELECT a.*,r.role,r.role_name FROM tbl_auth a JOIN tbl_role r on a.role_id=r.id where a.id=".$userdata->id)->row();
				$this->session->set_userdata('ud',$d);

				$this->session->set_flashdata('msg','<b class="text-success">Data update</b>');
				redirect('profile');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				redirect('profile');
			}
        }
	}
	
	public function cp()
	{
		$data['page']="profile/change_password";
		$this->load->view('app',$data);
	}
	
	public function cp_store(){
		/* load helper and library */
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('opassword', 'Old Password', 'required|callback_checkPass');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		

		if ($this->form_validation->run() == FALSE){
			$data['page']="profile/change_password";
			$this->load->view('app',$data);
        }else{
			$ud['password']=sha1(md5($this->input->post('password')));
			$ud['updated_at']=date('Y-m-d H:i:s');

			$con['id']=$this->session->get_userdata()['ud']->id;
			
			if($this->cm->common_update('tbl_auth',$ud,$con)){
				/* set data to session again */
				$d=$this->db->where($con)->get('tbl_auth')->row();
				$this->session->set_userdata('ud',$d);
				
				$this->session->set_flashdata('msg','<b class="text-success">Data update</b>');
				redirect('change_password');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				redirect('change_password');
			}
        }
	}
	
	function checkPass($old){
		$old=sha1(md5($old));
		if($old !=$this->session->get_userdata()['ud']->password){
			$this->form_validation->set_message('checkPass', 'Old password is not matched');
			return false;
		}else{
			return true;
		}
	}

}
