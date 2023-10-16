<?php

$ncorrect = 0;
$total    = 24;
$dF       = -1;
//this is not including the design, showing calcs, or reviews only the numbers

//grading functions
function CandG($correct)
{	
	//acts out appropriate response based on isCorrect
    //makes correct +1 and green box otherwise red if -1 makes grey
	/*if ($correct == -1){
		echo "<td class = 'fixed'>";
	}
	*/
    if ($correct) {
        echo "<td class='correct'>";
        global $ncorrect;
        $ncorrect++;
    } else {
        echo "<td class = 'incorrect'>";
    }
}
function isCorrect($field, $tr, $formula)
{	
	//determines if field is necessary
	
	$s = $_GET['scen'];

	
	
	
	/*if ($s == 1){
		//not required for scenario
		$Nrequired = array();
		for ($i = 2; $i < 10; $i++) {
			$Nrequired[] = 'v' . $i;
			$Nrequired[] = 'a' . $i;
			$Nrequired[] = 't' . $i;
			$Nrequired[] = 'd' . $i;
		}
		
		foreach($Nrequired as $box){
			if ($field == $box)
				return -1;
		}
	}
	
	elseif ($s == 2){
		//not required for scenario
		$Nrequired = array();
		for ($i = 4; $i < 10; $i++) {
			$Nrequired[] = 'v' . $i;
			$Nrequired[] = 'a' . $i;
			$Nrequired[] = 't' . $i;
			$Nrequired[] = 'd' . $i;
		}
		
		foreach($Nrequired as $box){
			if ($field == $box)
				return -1;
		}
	}
	*/
	
    //checks for correct through formulas and 10% error
    //variables inputted
    $v   = $_GET['v' . $tr];
    $a   = $_GET['a' . $tr];
    $t   = $_GET['t' . $tr];
    $d = $_GET['d' . $tr];
	$a1 = $_GET['a1'];
	$a2 = $_GET['a2'];
	$a3 = $_GET['a3'];
	//echo "a1 : $a1, a2 : $a2, a3:$a3";

    if ($_GET[$field] == 0 || $_GET[$field] == null)
        return false;
   
	elseif ($formula == 'accel'){
		if ($tr == 4){
		
			if ((abs($_GET[$field]) > abs($a1*0.5*0.9)) && (abs($_GET[$field]) < abs($a1*0.5*1.1)))
				return true;
			return false;
		}
		elseif ($tr == 5){
			if ((abs($_GET[$field]) > abs($a2*0.5*0.9)) && ((abs($_GET[$field]) < abs($a2*0.5*1.1))))
				return true;
			return false;
		}
		elseif ($tr == 6){
			if ((abs($_GET[$field]) > abs($a3*0.5*0.9)) && ((abs($_GET[$field]) < abs($a3*0.5*1.1))))
				return true;
			return false;
		}
		elseif ($tr == 7){
			if ((abs($_GET[$field]) > abs($a1*0.1*0.9)) && ((abs($_GET[$field]) < abs($a1*0.1*1.1))))
				return true;
			return false;
		}
		elseif ($tr == 8){
			if ((abs($_GET[$field]) > abs($a2*0.1*0.9)) && ((abs($_GET[$field]) < abs($a2*0.1*1.1))))
				return true;
			return false;
		}
		elseif ($tr == 9){
			if ((abs($_GET[$field]) > abs($a3*0.1*0.9)) && ((abs($_GET[$field]) < abs($a3*0.1*1.1))))
				return true;
			return false;
		}
	}
	elseif ($formula == 'stoptime'){
		if ($s == 3){
			if (($_GET[$field] > (($v*88/60)/(abs($a)))*0.9) && ($_GET[$field] < (($v*88/60)/(abs($a)))*1.1))
				return true;
			return false;
		}
		elseif ($s == 4 || $s == 5){
			if (($_GET[$field] > ((($v*88/60)/(abs($a)))+1)*0.9) && ($_GET[$field] < ((($v*88/60)/(abs($a)))+1)*1.1))
				return true;
			return false;
		}
	}
	elseif ($formula == 'stopdistance'){
		if ($s ==3){
			if (($_GET[$field] > ((($v*88/60)*$t)-(0.5*abs($a)*$t*$t)) * 0.9) && ($_GET[$field] < ((($v*88/60)*$t)-(0.5*abs($a)*$t*$t)) * 1.1))
				return true;
			return false;
		}
		elseif ($s==4 || $s == 5){
			if (($_GET[$field] > ($v*88/60*($t)-.5*abs($a)*($t-1)*($t-1))*0.9) && ($_GET[$field] < ($v*88/60*($t)-.5*abs($a)*($t-1)*($t-1))*1.1))
				return true;
			return false;
		}
	}
	
	
	

}
?>

<?php
//chris's new code
//checking for set and numeric of all input columns besides name + period
$required = array();
for ($i = 1; $i < 9; $i++) {
    $required[] = 'v' . $i;
    $required[] = 'a' . $i;
    $required[] = 't' . $i;
    $required[] = 'd' . $i;
}
//	$weoif = $_GET['v1'];
//	echo "v1 : $weoif";

//checks if all are numeric inputs 
$error = false;
foreach ($required as $field) {
    
    if (($_GET[$field] != null) && !(is_numeric($_GET[$field]))) {
        echo "hello!";
        //	$something = $_GET[$field];
        //	echo "$arror : $something";
        $var   = $_GET[$field];
        //echo "var : $var field = $field";
        //exit();	
        $error = true;
        //	exit();
        
        
    }
}

// old code check for name/lastname/period



if (isset($_GET['scen']) && is_numeric($_GET['scen'])) {
    $scen = htmlspecialchars($_GET['scen']);
    if ($scen == 5)
        $dF = 1;
    else {
        $dF = .325 + .15 * $scen;
    }
} else {
    header("Location: SafeIntersectionError.html");
    //echo "hellos";
    exit;
}
if (isset($_GET['fname']))
    $fname = htmlspecialchars($_GET['fname']);
else {
    header("Location: SafeIntersectionError.html");
    //echo "hellof";
    exit;
}
if (isset($_GET['lname']))
    $lname = htmlspecialchars($_GET['lname']);
else {
    //echo "hellol";
    header("Location: SafeIntersectionError.html");
    exit;
}
if (isset($_GET['period']) && is_numeric($_GET['period']))
    $period = $_GET['period'];
else {
    header("Location: SafeIntersectionError.html");
    //echo "hellop";
    exit;
}

if ($error) {
    header("Location: SafeIntersectionError.php");
    exit;
    
    
}



?>
<?php
//just me getting all the variables for easy use
$v1 = $_GET['v1'];
$v2 = $_GET['v2'];
$v3 = $_GET['v3'];
$v4 = $_GET['v4'];
$v5 = $_GET['v5'];
$v6 = $_GET['v6'];
$v7 = $_GET['v7'];
$v8 = $_GET['v8'];
$v9 = $_GET['v9'];

$a1 = $_GET['a1'];
$a2 = $_GET['a2'];
$a3 = $_GET['a3'];
$a4 = $_GET['a4'];
$a5 = $_GET['a5'];
$a6 = $_GET['a6'];
$a7 = $_GET['a7'];
$a8 = $_GET['a8'];
$a9 = $_GET['a9'];

$t1 = $_GET['t1'];
$t2 = $_GET['t2'];
$t3 = $_GET['t3'];
$t4 = $_GET['t4'];
$t5 = $_GET['t5'];
$t6 = $_GET['t6'];
$t7 = $_GET['t7'];
$t8 = $_GET['t8'];
$t9 = $_GET['t9'];

$d1 = $_GET['d1'];
$d2 = $_GET['d2'];
$d3 = $_GET['d3'];
$d4 = $_GET['d4'];
$d5 = $_GET['d5'];
$d6 = $_GET['d6'];
$d7 = $_GET['d7'];
$d8 = $_GET['d8'];
$d9 = $_GET['d9'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Safe Intersection RFP</title>
	<style type="text/css">
		body{
			background-color:#d0e4fe;
		}
		table{
			text-align:center;
			width:100%;
			font-size:medium;
			border-collapse:collapse;
			empty-cells:hide;
		}
		tr{
			height:60px;
			width:100px;
			text-align:center;
		}
		td{
			width:100px;
			text-align:center;
			background-color:#d0e4fe;
		}
		div.center{
			text-align:center;
		}
		input{
			width:100px;
		}
		.fixed{
			background-color:#696969;
		}
		.correct{
			background-color:#00FF00;
		}
		.incorrect{
			background-color:#B22222;
		}
	</style>
</head>
<body>
<h1 align="center">Safe Intersection Calculations</h1>
<br>
<table border="1">
	<!--Column 1-->
	<tr>
		<td>Scenario</td>
		<td>Vehicle</td>
		<td>Conditions</td>
		<td>Initial speed (mph)</td>
		<td>Deceleration (ft/s<sup>2</sup></td>
		<td>Stopping time* (s)</td>
		<td>Stopping Distance* (ft)</td>
	</tr>
	
	<!--Column 2-->
	<tr>
		<td>1-5</td>
		<td>Customer's Car:</td>
		<td>Dry</td>
		<td><?php
echo "$v1";
?></td>
		<td><?php
echo "$a1";
?></td>
		<?php CandG(isCorrect('t1',1,'stoptime'));
echo "$t1";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('d1',1,'stopdistance'));
echo "$d1";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 3-->
	<tr>
		<td>2-5</td>
		<td>Sporty car:</td>
		<td>Dry</td>
		<td><?php
echo "$v2";
?></td>
		<td><?php
echo "$a2";
?></td>
		<?php CandG(isCorrect('t2',2,'stoptime'));
echo "$t2";

?></td> <!--Calculated-->
		<?php CandG(isCorrect('d2',2,'stopdistance'));
echo "$d2";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 4-->
	<tr>
		<td>2-5</td>
		<td>18 wheeler</td>
		<td>Dry</td>
		<td><?php
echo "$v3";
?></td>
		<td><?php
echo "$a3";
?></td>
		<?php CandG(isCorrect('t3',3,'stoptime'));
echo "$t3";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('d3',3,'stopdistance'));
echo "$d3";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 5-->
	<tr>
		<td>3, 4 & 5</td>
		<td>Customer's Car:</td>
		<td>Wet</td>
		<td><?php
echo "$v4";
?></td>
		<?php CandG(isCorrect('a4',4,'accel'));
echo "$a4";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('t4',4,'stoptime'));
echo "$t4";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('d4',4,'stopdistance'));
echo "$d4";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 6-->
	<tr>
		<td>3, 4 & 5</td>
		<td>Sporty car:</td>
		<td>Wet</td>
		<td><?php
echo "$v5";
?></td>
		<?php CandG(isCorrect('a5',5,'accel'));
echo "$a5";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('t5',5,'stoptime'));
echo "$t5";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('d5',5,'stopdistance'));
echo "$d5";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 7-->
	<tr>
		<td>3, 4 & 5</td>
		<td>18 wheeler:</td>
		<td>Wet</td>
		<td><?php
echo "$v6";
?></td>
		<?php CandG(isCorrect('a6',6,'accel'));
echo "$a6";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('t6',6,'stoptime'));
echo "$t6";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('d6',6,'stopdistance'));
echo "$d6";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 8-->
	<tr>
		<td>3, 4 & 5</td>
		<td>Customer's car:</td>
		<td>Icy</td>
		<td><?php
echo "$v7";
?></td>
		<?php CandG(isCorrect('a7',7,'accel'));
echo "$a7";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('t7',7,'stoptime'));
echo "$t7";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('d7',7,'stopdistance'));
echo "$d7";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 9-->
	<tr>
		<td>3, 4 & 5</td>
		<td>Sporty car:</td>
		<td>Icy</td>
		<td><?php
echo "$v8";
?></td>
		<?php CandG(isCorrect('a8',8,'accel'));
echo "$a8";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('t8',8,'stoptime'));
echo "$t8";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('d8',8,'stopdistance'));
echo "$d8";
?></td> <!--Calculated-->
	</tr>
	
	<!--Column 10-->
	<tr>
		<td>3, 4 & 5</td>
		<td>18 wheeler:</td>
		<td>Icy</td>
		<td><?php
echo "$v9";
?></td>
		<?php CandG(isCorrect('a9',9,'accel'));
echo "$a9";
?></td> <!--Calculated-->
		<?php CandG(isCorrect('t9',9,'stoptime'));
echo "$t9";
?></td> <!--Calculated-->
		<?php
		CandG(isCorrect('d9',9,'stopdistance'));
echo "$d9";
?></td> <!--Calculated-->
	</tr>
</table>
<br>
<div>
	First Name: <?php
echo $fname;
?>
	<br>
	Last Name: <?php
echo $lname;
?>
	<br>
	Period: <?php
echo $period;
?>
	<br>
	Correct: <?php
echo $ncorrect . ' out of 24';
?>
	<br>

</div>
<?php
date_default_timezone_set('America/Denver');
$lname = $_GET['lname'];
$fname = $_GET['fname'];
$period = $_GET['period'];
$scen = $_GET['scen'];

if (file_exists("results/IntersectionResults.csv") == false) {
    $handle = fopen("results/IntersectionResults.csv","wb");
    fwrite($handle,"Period,LastName,FirstName,Correctof24,Date,Scenario,v1,a1,t1,d1,v2,a2,t2,d2,v3,a3,t3,d3,v4,a4,t4,d4,v5,a5,t5,d5,v6,a6,t6,d6,v7,a7,t7,d7,v8,a8,t8,d8,v9,a9,t9,d9");
    fwrite($handle, PHP_EOL);
    fclose($handle);	
}


$handle = fopen("results/IntersectionResults.csv", "a");
fwrite($handle,$lname . "," . $fname . "," . $period . "," . $ncorrect . "," . date('Y-m-d H:i:s') . "," .  $scen . "," . $v1 . "," . $a1."," . $t1 . "," . $d1 . "," . $v2 . "," . $a2 . "," . $t2 . "," . $d2 . "," . $v3 . "," . $a3 . "," . $t3 . "," . $d3 . "," . $v4 . "," . $a4 . "," . $t4 . "," . $d4 . "," . $v5 . "," . $a5 . "," . $t5 . "," . $d5 . "," . $v6 . "," . $a6 . "," . $t6 . "," . $d6 . "," . $v7 . "," . $a7 . "," . $t7 . "," . $d7 . "," . $v8 . "," . $a8 . "," . $t8 . "," . $d8 . "," . $v9 . "," . $a9 . "," . $t9 . "," . $d9);
fwrite ($handle, PHP_EOL);
/*
fwrite($handle, $lname . "," . $fname . "," . $period . "," . $correct . "," . $score . "," . date('D d M Y H:i:s') . "," . $Snum1 . "," . $a1 . "," . $b1 . "," . $c1 . "," . $d1 . "," . $e1 . "," . $f1 . "," . $g1 . "," . $h1 . "," . $i1);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum2 . "," . $a2 . "," . $b2 . "," . $c2 . "," . $d2 . "," . $e2 . "," . $f2 . "," . $g2 . "," . $h2 . "," . $i2);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum3 . "," . $a3 . "," . $b3 . "," . $c3 . "," . $d3 . "," . $e3 . "," . $f3 . "," . $g3 . "," . $h3 . "," . $i3);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum4 . "," . $a4 . "," . $b4 . "," . $c4 . "," . $d4 . "," . $e4 . "," . $f4 . "," . $g4 . "," . $h4 . "," . $i4);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum5 . "," . $a5 . "," . $b5 . "," . $c5 . "," . $d5 . "," . $e5 . "," . $f5 . "," . $g5 . "," . $h5 . "," . $i5);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum6 . "," . $a6 . "," . $b6 . "," . $c6 . "," . $d6 . "," . $e6 . "," . $f6 . "," . $g6 . "," . $h6 . "," . $i6);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum7 . "," . $a7 . "," . $b7 . "," . $c7 . "," . $d7 . "," . $e7 . "," . $f7 . "," . $g7 . "," . $h7 . "," . $i7);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum8 . "," . $a8 . "," . $b8 . "," . $c8 . "," . $d8 . "," . $e8 . "," . $f8 . "," . $g8 . "," . $h8 . "," . $i8);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum9 . "," . $a9 . "," . $b9 . "," . $c9 . "," . $d9 . "," . $e9 . "," . $f9 . "," . $g9 . "," . $h9 . "," . $i9);
fwrite($handle, "\n");
fwrite($handle, ",,,,,," . $Snum10 . "," . $a10 . "," . $b10 . "," . $c10 . "," . $d10 . "," . $e10 . "," . $f10 . "," . $g10 . "," . $h10 . "," . $i10);
fwrite($handle, "\n");
*/
fclose($handle);
?>
<p> Created by: Christopher Chen 9/9/2014 </p>
</body>
</html>