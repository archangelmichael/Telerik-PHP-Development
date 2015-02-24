<?php
echo 'Hello From PHP'.'<br />';

// Variables
$myVariable = "Variable Value <br />";
echo $myVariable;

// Casts
$myFloatVariable = 2.556456;
$myIntVariable = (int)$myFloatVariable;
echo $myIntVariable;
echo '<br/>';
echo $myFloatVariable;
echo '<br/>';

// Arrays
$myArray = array(3, 'home', true);
print_r($myArray);
echo '<br/>';

$myArray[] = 'Added Later';
print_r($myArray);
echo '<br/>';

// Cycles
for($i=0; $i<5; $i++){
	echo $i.'iteration <br/>';
}

foreach($myArray as $key => $value){
	echo 'the key for '.$value.' is '.$key.'<br/>';
}
echo '<br/>';

// Conditional Statements
if(!is_array($myArray)) {
	echo 'Check is done!';
}
else if(count($myArray) < 3) {
	echo 'Array is too short';
}
else {
	echo 'You don\'t have an array';
}
echo '<br />';

// Functions
function printName($name) {
	if($name != '') {
		echo 'Your name is '.$name;
	}
	else {
		echo 'You don\'t have a name';
	}
}

printName('Slim Shaggy');
echo '<br />';

function editArrayElementAtPosition(&$array, $position, $text  = ' edited') {
	echo $array[$position].'<br/>';
	$array[$position]= $array[$position].$text;
	echo $array[$position].'<br/>';
	return 'OK';
}
editArrayElementAtPosition($myArray, 3);
editArrayElementAtPosition($myArray, 3, ' improved');
echo '<br/>';
?>