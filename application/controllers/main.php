<?php


class Main extends CI_Controller{

	public function index(){

		$data['course_data'] = $this->form_process->display_form();
		$data['add_course_form'] = 'main/add_course_form';
		$this->load->view("main/main",$data);

	}

	public function process_form(){
		$this->load->helper('url');
		if(!$this->input->post('name')){
			redirect('main');
			die();
		}

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description')
		);

		$this->form_process->process_form($data);
		redirect('main');
	}

	public function remove_course($id=false){
		$this->load->helper("url");
		if($id === false){
			redirect('main');
			die();
		}
		$this->form_process->remove_form($id);
		redirect('main');

	}

}
