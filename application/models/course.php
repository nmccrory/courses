<?php 

class Course extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function add_courses($info)
	{
		$name = $info['name'];
		$description = $info['description'];
		$query = "INSERT INTO courses VALUES (?,?,?,NOW(),NOW());";
		$arr = array($name, $description);
		$this->db->query($query, $arr);
	}

	public function get_courses(){
		$query = "SELECT * FROM courses";
		$result = $this->db->query($query)->result_array();
		return $result;
	}
}


 ?>
