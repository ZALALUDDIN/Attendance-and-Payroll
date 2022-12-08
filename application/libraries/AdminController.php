<?php 

class AdminController extends CI_Controller {
	function __construct(){
		parent::__construct();
		/* authentication  */
		if(!$this->session->get_userdata()['ud']){
			redirect('login');
		}
	}
	
	public function authorization($role_id){
		/* authorization  */
		if($this->session->get_userdata()['ud']->role_id !=$role_id){
			redirect('/');
		}
	}

	public function resizeimage($image_data){
		$conf=array(
			'image_library' => 'gd2',
			'source_image' 	=> $image_data['full_path'],
			'new_image'		=>'upload/profile/thumb/'.$image_data['file_name'],
			'maintain_ratio'=> FALSE,
			'width'			=> 300,
			'height'		=> 300
		);

		$this->load->library('image_lib');
		$this->image_lib->initialize($conf);
		$this->image_lib->resize();
		$this->image_lib->clear();
		return true;
	}

	public function watermark($image_data,$ctext){
		$conf['image_library']='gd2';
		$conf['source_image']=$image_data['full_path'];
		$conf['wm_text']=$ctext;
		$conf['wm_type']='text';
		$conf['wm_font_size']='16';
		$conf['wm_font_color']='000000';
		$conf['wm_vrt_alignment']='bottom';
		$conf['wm_hor_alignment']='right';
		$conf['wm_padding']='0';
		
		$this->load->library('image_lib');
		$this->image_lib->initialize($conf);
		$this->image_lib->watermark();
		$this->image_lib->clear();
		return true;
	}
}