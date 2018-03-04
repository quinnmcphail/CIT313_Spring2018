<?php

class LoginController extends Controller{
	
	
   
   public function add($num1 = 0,$num2 = 0,$num3 = 0){
	   

		$sum = $num1+$num2+$num3;

	   
	   $this->set('numbers',$sum);
	   
   }
	
	
}