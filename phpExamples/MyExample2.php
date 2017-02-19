<?php
require_once('Person.php'); 
require_once('PersonDAO.php'); 



$dao = new PersonDAOImpl(); 
$dao->save(new Person(1, "foo", 10, 100.0, true)); 
$dao->save(new Person(2, "bar", 20, 200.0 , false)); 
$dao->save(new Person(3, "bim", 30, 300.0, true)); 

$list = $dao->findAll(); 

$nl = "\r\n"; 
 foreach($list as $el) {
   echo $el->toString(). $nl ; 
 }


$dao->update(1, new Person(1, "newbar", 55, 666, false)); 

$list = $dao->findAll(); 
echo "after update $nl"; 
foreach($list as $el) {
  echo $el->toString(). $nl; 
}

# $p = new Person(1, "foo", 10, 100.0, true); 
# echo $p->isActive() .$nl ; 

echo "findById = 1 ".$nl ; 
$p =$dao->findById(1); 
echo $p->toString(). $nl ; 

$dao->delete(1); 
echo "after delete = 1 $nl"; 
$list = $dao->findAll(); 
foreach($list as $el) 
	echo $el->toString(). $nl ; 

?>
