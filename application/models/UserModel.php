<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/* for index function */
	public function retrive(){
		return $this->db->get('employee')->result();
	}

	/* for create function */
	public function create($data){
		$this->db->insert('employee',$data);
		return $this->db->insert_id();
	}

	/* for update function */
	public function single_retrive($id){
		return $this->db->where('id',$id)->get('employee')->row();
	}
	public function update($id,$data){
		$this->db->where('id',$id)->update('employee',$data);
		return $this->db->affected_rows();
	}

	/* for delete function */
	public function delete($condition){
		$this->db->delete('employee',$condition);
		return $this->db->affected_rows();
	}
}
