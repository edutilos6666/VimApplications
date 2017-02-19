<?php $name = "foo"; 
$age = 10 ; 
$wage = 100.0 ; 

echo ("name = $name , age = $age , wage = $wage"); 

$nl = "\r\n"; 


echo $nl ; 
  
function testOperator($x , $y)  {
	global $nl; 
  $sum = $x  + $y ; 
  $mult = $x * $y ; 
   $div = $x / $y ; 
   $sub = $x - $y ; 
   $mod = $x % $y ; 

    echo "sum $sum$nl" ; 
  echo "mult = $mult$nl";  
   echo "sub = $sub$nl" ; 
   echo "div = $div$nl"; 
   echo "mod = $mod$nl"; 
}

class Person {
 
	private $id; 
	private  $name ; 
	private  $age ; 
	private  $wage;

public  function __construct($id , $name, $age, $wage) {
   $this->id = $id ; 
   $this->name = $name ; 
    $this->age = $age ; 
   $this->wage = $wage ; 
 }	 

	public function __destruct() {
			global $nl ;
		echo "Person instance was destroyed.$nl"; 
		}

  
	public function toString() {
       return "id = $this->id , name = $this->name , age = $this->age , wage = $this->wage";  
	}
}






testOperator(10 , 5.0); 

$p = new Person(1, "foo", 10, 100.0); 
echo $p->toString() .$nl ; 


interface Runnable {
	public function run() ; 
	public function isRunnable(); 
}

interface Executable {
  public function execute(); 
  public function isExecutable(); 
}

interface Readable {
  public function read(); 
  public function isReadable(); 
}


class MyFile implements Runnable, Executable, Readable {

	 private $name ; 
	public function __construct($name) {
         $this->name = $name; 
	}
	 public function getName() {
         return $this->name ; 
	 }

	 public function setName($name) {
          $this->name = $name; 
	 }
	
	 public function run()  {
		 global $nl ; 
          echo "Running $this->name$nl"; 
	}
	 public function isRunnable() {
           return true ; 
	 }
	 public function execute() {
		 global $nl ; 
		 echo "Executing $this->name$nl"; 
	 }
	 public function isExecutable() {
            return true ; 
	 }
	 public function read() {
            global $nl ; 
	    echo "Reading $this->name$nl" ; 
	 }
	 public function isReadable() {
              return true ; 
	 }

	 public function runBatch() {
		 global $nl;
		$res = $this->isRunnable();  
	 echo "isRunable = $res$nl"; 
		 $this->run();
		 $res = $this->isReadable(); 
	 echo "isReadable = $res$nl"; 
		 $this->read();  
		 $res = $this->isExecutable(); 
	 echo "isExecutable = $res$nl"; 
	 $this->execute(); 
	 }
}


$myFile = new MyFile("foo.txt"); 
$myFile->runBatch(); 

function readline($prompt) {
	global $nl; 
	echo $prompt.$nl; 
  return stream_get_line(STDIN, 1024 , PHP_EOL); 
}

$name = readline("Insert your name: "); 
$age = readline("Insert your age: "); 
$wage = readline("Insert your wage: "); 

echo "name = $name , age = $age , wage = $wage$nl"; 


?> 
