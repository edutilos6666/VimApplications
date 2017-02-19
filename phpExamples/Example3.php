<?php
 require_once('Person.php'); 

function readline($prompt) {
	echo "$prompt:\r\n"; 
  return stream_get_line(STDIN , 1024 , PHP_EOL); 
}

 

function makePerson() {
	$id ; 
	$name; 
	$age; 
	$wage; 
	$active ; 
	$input = readline("insert id, name, age, wage, active: ");
       #echo "input = $input\r\n" ; 	
    $splitted = preg_split("/\s*,\s*/", $input); 
    $id = $splitted[0]; 
    $name = $splitted[1]; 
    $age = $splitted[2]; 
    $wage = $splitted[3]; 
    $active = $splitted[4]; 
    return new Person($id, $name, $age, $wage, $active); 
}


$arr = array(); 
$p = makePerson(); 
array_push($arr, $p); 
$p = makePerson() ; 
array_push($arr, $p); 
$p = makePerson() ; 
array_push($arr, $p); 

$nl = "\r\n"; 
foreach($arr as $el) 
	echo $el->toString() .$nl; 


?> 
