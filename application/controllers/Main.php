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
		$courseinfo = $this->Course->get_courses()->result_array();
		$this->load->view('index', array('courses'=>$courseinfo));
	}

	public function process()
	{
		if($this->input->post('action') && $this->input->post('action') == 'addcourse')
		{
			$errors = array();
			if(strlen($this->input->post('name')) >= 15){
				$name = $this->input->post('name');
			}else{
				$errors[] = 'Course name must be at least 15 characters';
			}
			//setting up description
			$description = $this->input->post('description');
			$this->load->model('Course');
			if(count($errors) > 0){
				$this->session->set_flashdata('errors', $errors);
			}
			$postinfo = array('name'=>$name, 'description'=>$description);
			$this->Course->add_courses($postinfo);
			$course_results = $this->course->get_courses();
			$this->load->view('index', array('courses'=>$course_results));
		}
	}
}