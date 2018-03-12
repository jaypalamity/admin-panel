<?php
class MyClass3 {
 public function Myfunction3(){
	 $this->CI =& get_instance();
	 $contents = $this->CI->output->get_output();
	 $contents = str_replace("CodeIgniter","CodeIgniter Change",$contents);
	 echo $contents;
	 return;
	 //echo '------- PRE SYSTEMS ----------------';
 }
 
 public function Myfunction4($param){
//echo '<pre>';
print_r($param);	 
         echo "<br />"; 
	 	 echo '------- PRE CONTROLLER ----------------';
		 echo "<br />"; 
		 //echo "I like $param[0]"."</br>";
 }
 
 public function Myfunction5($param){
//echo '<pre>';
//print_r($param);	 
         echo "<br />"; 
	 	 echo '------- POST  CONTROLLER CONSTRUCTOR ----------------';
		 echo "<br />"; 
		 //echo "I like $param[0]"."</br>";
 }
 
 public function Myfunction6($param){
//echo '<pre>';
//print_r($param);	 
         echo "<br />"; 
	 	 echo '------- POST  SYSTEM  ----------------';
		 echo "<br />"; 
		 //echo "I like $param[0]"."</br>";
 }
	
}
	
