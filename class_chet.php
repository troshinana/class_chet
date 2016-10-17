<html>
<head> <meta charset="Utf-8"><title></title>
</head>
<body>
<form method="GET">
<input type="text" name="firstArg" value="">
<input type="text" name="secondArg" value="">
<input type="submit" name="compute" value="Вычеслить">
<select name="action">
	<option value="Add">Слож</option>
	<option value="Sub">Вычит</option>
	<option value="Mult">Умнож</option>
	<option value="div">Деление</option>
</select>
</form>



<?php
class Action {
public $firstArg;
public $secondArg;
public $resultArg;
}



class ActionAdd extends Action { //extend action (общие свойства с action)
	public function calc(){
	$this->result=$this->firstArg+$this->secondArg; //(складываем два числа)
	}
}

class ActionSub extends Action { 
	public function calc(){
	$this->result=$this->firstArg-$this->secondArg; 
	}
}

class ActionMult extends Action { 
	public function calc(){
	$this->result=$this->firstArg*$this->secondArg; 
	}
}
class ActionDiv extends Action { 
	public function calc(){
	$this->result=$this->firstArg/$this->secondArg; 
	}
}
?>


<?
if(isset($_GET['action'])) {
	$class="Action".$_GET['action']; //$class-То что выбрал пользователь из выпадающего списка
	$action=new $class; //создаем новый класс с тем что записано в переменной $class
	$action->firstArg=$_GET['firstArg']; //передаем переменную первую классу
	$action->secondArg=$_GET['secondArg'];//передаем переменную вторую классу
	$action->calc();//запускаем функцию ?> 
	<div class="result"> <?=$action->result;?> </div> <?
}
?>
</body>
</html>
