<?php
$ncorrect=0;
$total=18;
//COMMENTS are GREEN APPLE.
//creates new color box and raises score if correct
function CandG($correct){
	if ($correct){
		echo "<td class='correct'>";
		global $ncorrect;
		$ncorrect ++;
	}
	else{
	echo "<td class = 'incorrect'>";
	}
}
//attempt at sig figs that seems to break credit:stackoverflow
function RoundSigDigs($number, $sigdigs) { 
    $multiplier = 1; 
    while ($number < 0.1) { 
        $number *= 10; 
        $multiplier /= 10; 
    } 
    while ($number >= 1) { 
        $number /= 10; 
        $multiplier *= 10; 
    } 
    return round($number, $sigdigs) * $multiplier; 
}
//Checks if input is correct based on equation and reference boxes
// a more flexible and time saving method to adapt in future
//$tr = trialnum, $field = the square location
// vx = velocity hor vy = velocity vert v = total velocity avg1 = avg velocities (m/s) mph = convert to mph
function isCorrect($field, $tr, $formula){
	//variables inputted
	$a = $_GET['a'.$tr]*(pi()/180);
	$r = $_GET['r'.$tr];
	$t = $_GET['t'.$tr];
	$hor = $_GET['hor'.$tr];
	$ver = $_GET['ver'.$tr];
	$vel = $_GET['vel'.$tr];
	$h  = $_GET['h'.$tr];
	if ($_GET[$field] == 0)
		return false;
	elseif($formula == 'vx'){
		if (($_GET[$field] > ($r/$t)*0.9)&& ($_GET[$field] < ($r/$t)*1.1)){
			return true;
			}
		return false;
	}
	elseif ($formula == 'v'){

		if (($_GET[$field] > sqrt($hor*$hor + $ver*$ver) *0.9) && ($_GET[$field] < sqrt($hor*$hor + $ver*$ver) *1.1 )){
			return true;
			}
		return false;
	}
	elseif($formula == 'vy'){
		if(($_GET[$field] > ($t*4.9 *0.9)) && ($_GET[$field] < ($t*4.9 *1.1))){
			return true; 
			}
		return false;
	}
	elseif ($formula =='yf'){
		//echo round(($ver * ($t/2) - 4.9*(pow($t/2, 2))),3);
		//exit();
		if ($_GET[$field] > 0){
		
		if (($_GET[$field] > (($ver * $ver/19.6) * 0.9)) && ($_GET[$field] < (($ver * $ver/19.6) * 1.1))){
			return true;
			}
		return false;
		}
		else {
		if (($_GET[$field] > (($ver * $ver/19.6) * 1.1)) && ($_GET[$field] < (($ver * $ver/19.6) * 0.9))){
			return true;
			}
		return false;
		}
		
	}
	elseif ($formula == 'avgv'){
		//echo "i luv bananas";
		$notzerocount = 0;
		$vsum = 0;
		for ($i =1; $i < 5 ; $i ++){
			if ($_GET['vel'.$i] != 0){
				$vsum += $_GET['vel'.$i];
				$notzerocount ++;
				}
		}
		//echo round($vsum/8,3);

		if (($_GET['avg1'] > ($vsum/$notzerocount) * 0.9) || ($_GET['avg1'] < ($vsum/$notzerocount) * 1.1))
			return true;
		else{
			return false;
		}
	}
	elseif ($formula == 'mph'){
		if (($_GET['avg2'] > ($_GET['avg1']*2.24)*0.9) || ($_GET['avg2'] < ($_GET['avg1']*2.24)*1.1))
			return true;
		else{
			return false;
		}
	}
}
	
?>

<?php

//checks for all fields inputted numerically
$required = array();
for ($i = 1; $i < 5; $i ++) {
	$required[] = 'a'.$i;
	$required[] = 't'.$i;
	$required[] = 'hor'.$i;
	$required[] = 'ver'.$i;
	$required[] = 'vel'.$i;
	$required[] = 'h'.$i;
}
/*var_dump($required);
exit();
*/
//checks if all are numeric inputs
$error = false;
foreach($required as $field){
	if (!(is_numeric($_GET[$field]))){
	//	$something = $_GET[$field];
	//	echo "error : $something";
		$var = $_GET[$field];
		echo "errir : $var field = $field";
		exit();	
		$error = true;
	//	exit();
		
		
	}
	
	
}
for ($i =1; $i < 5 ; $i ++){
			if ($_GET['a'.$i] == 90){
				echo "error: $_GET[$field]";
				exit();	
				$error =true;
				
				}
		}

//echo "error : $error";

if($error){
	exit;
	header("Location: RocketLabError.php");
	exit;
	}

else{
// confused with this part but just left it from old code b/c unfamiliar with function
if(ctype_alnum(str_replace(array("'"," "),"",$_GET['studentFirstName'])) && ctype_alnum(str_replace(array("'"," "),"",$_GET['studentLastName']))
		&& is_numeric($_GET['period'])){
	
	}
else{
	header("Location: RocketLabError.php");
	exit;
	}
	
}

//credit : old setup used as base point
?>
<!DOCTYPE html>
<html>

<head>
<h1 align="center">Rocket Lab</h1>
<hr>
<style type="text/css">
body{
	background-color:#d0e4fe;
	}
table{
	width:100%;
	}
td{
	text-align:center;
	background-color:#d0e4fe;
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
p#right{
	font-size:small;
	text-align:right;
	}
</style>
</head>

<body>

<form>
	<table border="1">
		<tr>
		<tr>
			<th> Angle (&deg;) </th>
			<th> Measured Average Time (s)</th>
			<th> Measured Average Range (m)</th>
			<th> Calculated Horizontal Velocity (m/s) 1 point </th>
			<th>Calculated Vertical Velocity (m/s) 1 point </th>
			<th> Calculated Total Velocity (m/s) 1 point </th>
			<th> Calculated Height (m) 1 point </th>
			
		</tr>
		<tr>
			<td> 
				<?php 
					$a1 = $_GET["a1"];
					echo "$a1";
				?>
			</td>
			<td><?php $t1 = $_GET['t1']; echo "$t1";?></td>
			<td><?php  $r1 = $_GET['r1']; echo "$r1";?></td>
				<?php 
					CandG(isCorrect('hor1',1,'vx'));
					$hor1 = $_GET['hor1']; 
					echo "$hor1";
					echo "</td>";
				
					CandG(isCorrect('ver1',1,'vy'));
					$ver1 = $_GET['ver1']; 
					echo "$ver1";
					echo "</td>";
				
					CandG(isCorrect('vel1',1,'v'));
					$vel1 = $_GET['vel1']; 
					echo "$vel1";
					echo "</td>";
				
					CandG(isCorrect('h1',1,'yf'));
					$h1 = $_GET['h1']; 
					echo "$h1";
					echo "</td>";
				?>
			
			
		</tr>
		
		<tr>
				<td> 
				<?php 
					$a2 = $_GET["a2"];
					echo "$a2";
				?>
			</td>
			<td><?php $t2 = $_GET['t2']; echo "$t2";?></td>
			<td><?php  $r2 = $_GET['r2']; echo "$r2";?></td>
				<?php 
					CandG(isCorrect('hor2',2,'vx'));
					$hor2 = $_GET['hor2']; 
					echo "$hor2";
					echo "</td>";
				
					CandG(isCorrect('ver2',2,'vy'));
					$ver2 = $_GET['ver2']; 
					echo "$ver2";
					echo "</td>";
				
					CandG(isCorrect('vel2',2,'v'));
					$vel2 = $_GET['vel2']; 
					echo "$vel2";
					echo "</td>";
				
					CandG(isCorrect('h2',2,'yf'));
					$h2 = $_GET['h2']; 
					echo "$h2";
					echo "</td>";
				?>
			
		</tr>
		<tr>
				<td> 
				<?php 
					$a3 = $_GET["a3"];
					echo "$a3";
				?>
			</td>
			<td><?php $t3 = $_GET['t3']; echo "$t3";?></td>
			<td><?php  $r3 = $_GET['r3']; echo "$r3";?></td>
				<?php 
					CandG(isCorrect('hor3',3,'vx'));
					$hor3 = $_GET['hor3']; 
					echo "$hor3";
					echo "</td>";
				
					CandG(isCorrect('ver3',3,'vy'));
					$ver3 = $_GET['ver3']; 
					echo "$ver3";
					echo "</td>";
				
					CandG(isCorrect('vel3',3,'v'));
					$vel3 = $_GET['vel3']; 
					echo "$vel3";
					echo "</td>";
				
					CandG(isCorrect('h3',3,'yf'));
					$h3 = $_GET['h3']; 
					echo "$h3";
					echo "</td>";
				?>
			
		</tr>
		<tr>
				<td> 
				<?php 
					$a4 = $_GET["a4"];
					echo "$a4";
				?>
			</td>
			<td><?php $t4 = $_GET['t4']; echo "$t4";?></td>
			<td><?php  $r4 = $_GET['r4']; echo "$r4";?></td>
				<?php 
					CandG(isCorrect('hor4',4,'vx'));
					$hor4 = $_GET['hor4']; 
					echo "$hor4";
					echo "</td>";
				
					CandG(isCorrect('ver4',4,'vy'));
					$ver4 = $_GET['ver4']; 
					echo "$ver4";
					echo "</td>";
				
					CandG(isCorrect('vel4',4,'v'));
					$vel4 = $_GET['vel4']; 
					echo "$vel4";
					echo "</td>";
				
					CandG(isCorrect('h4',4,'yf'));
					$h4 = $_GET['h4']; 
					echo "$h4";
					echo "</td>";
				?>
			
		</tr>
		
		<tr>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> Avg. Total Velocity (m/s) </td>
			
				<?php
	
					CandG(isCorrect('avg1',1,'avgv'));
					echo $_GET['avg1'];
					echo "</td>";
				?>
			
		</tr>
		<tr>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> Avg. Total Velocity (mph) </td>
			
				<?php
				CandG(isCorrect('avg2',2,'mph'));
				echo $_GET['avg2'];
					echo "</td>";
				?>
			
		</tr>
		
	</table>
<p>
<?php
//unsure with old scoring system so i just made it into a simple percentage based calculation with each box worth 1 point
echo 'Name: '.$_GET['studentFirstName'].' '.$_GET['studentLastName']."<br>".
		'Period: '.$_GET['period']."<br>".
		$ncorrect.' out of '.$total.' correct'."<br>".
		'Percentage: '.round($ncorrect/$total*100,1);
?>
<?php
date_default_timezone_set('America/Denver');
$lname = $_GET['studentLastName'];
$fname = $_GET['studentFirstName'];
$period = $_GET['period'];

if(file_exists("results/RocketLabStudents.csv") == false){
	$handle= fopen("results/RocketLabStudents.csv","wb");
	fwrite($handle,"Period,Last Name,First Name, % Score ,# Correct,DateTime,");
	fwrite($handle,PHP_EOL);		
    fclose($handle);
}


	$handle=fopen("results/RocketLabStudents.csv","a");
	fwrite($handle, $period.",".$lname.",".$fname.",".round($ncorrect/$total*100,1)."%,".$ncorrect.",".date('Y-m-d H:i:s').",");
	fwrite($handle,PHP_EOL);

fclose($handle);

?>
</body>

<p id="right">Version 1.2 Last Updated 4-9-13</p>

</html>
