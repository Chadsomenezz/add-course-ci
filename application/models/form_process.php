<?php


class form_process extends CI_Model{
	public function process_form($data){
		$this->db->set('date_added', 'NOW()', FALSE);
		$this->db->insert('course',$data);
	}

	public function display_form(){

		$this->db->order_by('date_added','desc');
		$result = $this->db->get('course');

		return $result->result();
	}

	public function remove_form($id){
		$this->db->where('id',$id);
		$this->db->delete('course');
	}



}
