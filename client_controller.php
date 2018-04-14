<?php 
include "smodel.php";

class Controller{

	public $model;

	public function __construct(){

		$this->model = new Model();
	}

	public function home(){

		$user = $this->model->gtStudentData();
		include 'client_hp.php';
	}
}
?>


