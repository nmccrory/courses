<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}
	public function index()
	{
		$this->load->model('Course');
		$courseinfo = $this->Course->get_courses();
		$this->load->view('index', array('courses'=>$courseinfo));
	}

	public function process()
	{
		$errors = array();
		if(strlen($this->input->post('name')) >= 15){
			$name = $this->input->post('name');
		}else{
			$errors[] = 'Course name must be at least 15 characters';
		}
		if($this->input->post('description')){
			$description = $this->input->post('description');
		}else{
			$errors[] = 'Course must contain a description';
		}

		
		if(count($errors) > 0){
			$this->session->set_flashdata('errors', $errors);
			redirect('/');
		}else{
			$this->load->model('Course');
			$postinfo = array('name'=>$name, 'description'=>$description);
			$this->Course->add_courses($postinfo);
			$this->load->view('index', array('courses'=>$this->Course->get_courses()));
		}
		
	}

	public function remove()
	{
		$this->load->model('Course');
		$courseinfo = $this->Course->get_by_id($this->uri->segment(3));
		$this->load->view('remove', array('courseinfo'=>$courseinfo));
	}
	public function deleteCourse(){
		$this->load->model('Course');
		$this->Course->delete($this->input->post('confirm_delete'));
		redirect('/');
	}
}