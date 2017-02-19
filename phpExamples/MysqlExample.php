<?php 
require('Person.php');

$server = "localhost" ; 
$user = "root"; 
$pass = ""; 
$db = "test" ; 


$conn = new mysqli($server , $user, $pass, $db); 

if($conn->connect_error) {
 die("Conneciton failed\r\n") ; 
}



$cmd = "drop table if exists Person" ; 
 $conn->query($cmd); 


$cmd = "create table if not exists Person (
id bigint not null primary key, 
name varchar(50) not null , 
age int not null, 
wage double not null, 
active boolean not null
	)"; 


$conn->query($cmd); 


//insert 
 $cmd = "insert into Person values(?, ?, ?, ?, ?)"; 
  $pstmt = $conn->prepare($cmd); 
$pstmt->bind_param("isidb", $id, $name, $age, $wage, $active); 
  $id = 1; $name = "foo"; $age = 10 ; $wage = 100.0 ; $active = true ; 
  $pstmt->execute(); 

$id = 2; $name = "bar"; $age = 20 ; $wage = 200.0 ; $active = false; 
  $pstmt->execute(); 


  $id = 1; $name = "bim"; $age = 30 ; $wage = 300.0 ; $active = true ; 
  $pstmt->execute(); 


  $cmd = "select * from Person"; 
$rs = $conn->query($cmd); 

while($row = $rs->fetch_assoc()) {
	$nl = "\r\n"; 
	  $p = rsToPerson($row); 
	  echo $p->toString() .$nl ; 
  }


function rsToPerson($row) {
   return new Person($row['id'], $row['name'], $row['age'], $row['wage'], $row['active']); 
}

?> 
