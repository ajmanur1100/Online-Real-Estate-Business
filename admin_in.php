<?php 
include "admin_cont.php";

class Employee extends Main{
	
	protected $table = 'tbl_client';
	private $address;
	private $property;
	private $floor_space;
	private $utility;
	private $description;
	private $cost;
	

	public function setaddress($address){
		$this->address = $address;
	}
	public function setproperty($property){
		$this->property = $property;
	}
	public function setfloor_space($floor_space){
		$this->floor_space = $floor_space;
	}
	public function setutility($utility){
		$this->utility = $utility;
	}
	public function setdescription($description){
		$this->description = $description;
	}
	public function setcost($cost){
		$this->cost = $cost;
	}

	public function insert(){
		$sql = "INSERT INTO $this->table(address, property, floor_space, utility, description, cost) VALUES (:address,  :property, :floor_space, :utility, :description, :cost)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':address', $this->address);
		$stmt->bindParam(':property', $this->property);
		$stmt->bindParam(':floor_space', $this->floor_space);
		$stmt->bindParam(':utility', $this->utility);
		$stmt->bindParam(':description', $this->description);
		$stmt->bindParam(':cost', $this->cost);
		return $stmt->execute();
	}

	public function edit($id){
		$sql = "UPDATE $this->table SET address=:address, property=:property, floor_space=:floor_space, utility=:utility, description=:description, cost=:cost WHERE id=:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':address', $this->address);
		$stmt->bindParam(':property', $this->property);
		$stmt->bindParam(':floor_space', $this->floor_space);
		$stmt->bindParam(':utility', $this->utility);
		$stmt->bindParam(':description', $this->description);
		$stmt->bindParam(':cost', $this->cost);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}	
}
?>