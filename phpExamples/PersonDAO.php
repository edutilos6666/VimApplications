<?php 

interface PersonDAO {
  public function save($person); 
  public function update($id, $person); 
  public function delete($id); 
  public function findById($id); 
  public function findAll(); 
}


class PersonDAOImpl implements PersonDAO {

	private $conn ; 
	private $server = "localhost"; 
	private $user = "root"; 
	private $pass = ""; 
	private $db = "test" ; 
	private $nl = "\r\n"; 
	private function connect() {
           $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->db); 
	   if($this->conn->connect_error) 
		  die("connection error". $this->nl);  
      }
	private function disconnect() {
         $this->conn->close();  
      }

       private function dropCreateTable() {
             $this->connect(); 
             $cmd = "drop table if exists Person" ; 
	      $this->conn->query($cmd); 
	     $cmd = "create table if not exists Person (
id bigint not null primary key, 
name varchar(50) not null, 
age int not null , 
wage double not null, 
active boolean not null 
		     )";
$this->conn->query($cmd);  
	     $this->disconnect(); 
       }

	public function save($person) {
		$this->connect(); 
                $cmd = "insert into Person VALUES(?,?,?, ?,?)"; 
		$pstmt = $this->conn->prepare($cmd); 
		$pstmt->bind_param("isidi", $person->getId() , $person->getName(), $person->getAge(), $person->getWage(), $person->isActive()); 
		$pstmt->execute(); 
		$this->disconnect(); 
	}
	public function update($id, $person) {
             $this->connect(); 
              $cmd = "update Person set name = ? , age = ? , wage = ? , active =? where id = ?" ; 
	       $pstmt = $this->conn->prepare($cmd); 
	     $pstmt->bind_param("sidii", $person->getName(), $person->getAge(), $person->getWage(), $person->isActive(), $id); 
	     $pstmt->execute(); 
	     $this->disconnect(); 
	}	
	public function delete($id) {
            $this->connect(); 
              $cmd = "delete from Person where id = ?"; 
	    $pstmt = $this->conn->prepare($cmd); 
	    $pstmt->bind_param("i", $id); 
	    $pstmt->execute(); 
	    $this->disconnect(); 
	}
	public function findById($id) {
            $this->connect(); 
            $cmd = "select * from Person where id = $id" ; 
	    //$pstmt = $this->conn->prepare($cmd); 
	    //$pstmt->bind_param("i", $id); 
	    $rs = $this->conn->query($cmd); 
	    $row = $rs->fetch_assoc(); 
	    $p = $this->rowToPerson($row); 
	    $this->disconnect(); 
	    return $p; 
	}
	public function findAll() {
		$this->connect(); 
		$cmd = "select * from Person"; 
		$arr = array(); 
		$rs = $this->conn->query($cmd); 
		while($row = $rs->fetch_assoc()) {
                   $p = $this->rowToPerson($row); 
                   array_push($arr, $p); 
		} 
		$this->disconnect(); 
		return $arr; 
	}

	private function rowToPerson($row) {
            return new Person($row['id'], $row['name'], $row['age'], $row['wage'], $row['active']); 
	}
}

?>
