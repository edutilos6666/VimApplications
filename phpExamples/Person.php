<?php 
  
 # our model in php 
 class Person {
	 private $id; 
	 private $name ; 
	 private $age ; 
	 private $wage ; 
	 private $active; 

	 public function __construct($id , $name, $age, $wage, $active) {
        $this-> id = $id ; 
	$this-> name = $name; 
	$this-> age = $age ; 
	$this->wage = $wage ; 
	$this->active = $active ; 
	 } 


	 public function getId() {
            return $this->id; 
	 }

	 public function setId($id) {
		 $this->id = id ; 
	 }

	 public function getName(){
		 return $this->name; 
	 }
	 public function setName($name){
            $this->name = name ; 
	 }
	 public function getAge() {
             return $this->age ; 
	 }
	 public function setAge($age) {
             $this->age = age ; 
	 }
	 public function getWage() {
		 return $this->wage; 
	 }
	 public function setWage($wage) {
		 $this->wage = $wage ; 
	 }
	 public function isActive() {
		 return $this->active ; 
	 }
	 public function setActive($active) {
		  $this->active = $active; 
	 }

	 public function toString() {
              return "[$this->id , $this->name, $this->age, $this->wage, $this->active]"; 
	 }


 }

?> 
