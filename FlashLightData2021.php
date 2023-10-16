<?php
$correct=0;
$total=-1;
$dF=-1;
$scenario=-1;

if(is_numeric($_GET['scenario']) && 1 <= $_GET['scenario'] && $_GET['scenario'] <=5)
	$scenario=$_GET['scenario'];
else{
	header("Location: FlashLightError.html");
	exit;
	}
if($scenario==1 && is_numeric($_GET['1b']) && is_numeric($_GET['1c']) && is_numeric($_GET['1d']) && is_numeric($_GET['2b']) && is_numeric($_GET['2c'])
		&& is_numeric($_GET['2d']) && is_numeric($_GET['5a']) && is_numeric($_GET['5b']) && is_numeric($_GET['5c'])
		&& is_numeric($_GET['5d']) && is_numeric($_GET['6a']) && is_numeric($_GET['6b']) && is_numeric($_GET['6c']) && is_numeric($_GET['6d'])){
	$total=7;
	$dF=.067;
	}
elseif($scenario==2 && is_numeric($_GET['1b']) && is_numeric($_GET['1c']) && is_numeric($_GET['1d']) && is_numeric($_GET['2b']) && is_numeric($_GET['2c'])
		&& is_numeric($_GET['2d']) && is_numeric($_GET['5a']) && is_numeric($_GET['5b']) && is_numeric($_GET['5c'])
		&& is_numeric($_GET['5d']) && is_numeric($_GET['6a']) && is_numeric($_GET['6b']) && is_numeric($_GET['6c']) && is_numeric($_GET['6d'])){
	$total=7;
	$dF=.333;
	}
elseif($scenario==3 && is_numeric($_GET['1b']) && is_numeric($_GET['1c']) && is_numeric($_GET['1d']) && is_numeric($_GET['2b']) && is_numeric($_GET['2c'])
		&& is_numeric($_GET['2d']) && is_numeric($_GET['5a']) && is_numeric($_GET['5b']) && is_numeric($_GET['5c'])
		&& is_numeric($_GET['5d']) && is_numeric($_GET['6a']) && is_numeric($_GET['6b']) && is_numeric($_GET['6c']) && is_numeric($_GET['6d'])){
	$total=7;
	$dF=.600;
	}
elseif($scenario==4 && is_numeric($_GET['1b']) && is_numeric($_GET['1c']) && is_numeric($_GET['1d']) && is_numeric($_GET['2b']) && is_numeric($_GET['2c'])
		&& is_numeric($_GET['2d']) && is_numeric($_GET['3b']) && is_numeric($_GET['3c']) && is_numeric($_GET['3d']) && is_numeric($_GET['4b'])
		&& is_numeric($_GET['4c']) && is_numeric($_GET['4d']) && is_numeric($_GET['5a']) && is_numeric($_GET['5b']) && is_numeric($_GET['5c'])
		&& is_numeric($_GET['5d']) && is_numeric($_GET['6a']) && is_numeric($_GET['6b']) && is_numeric($_GET['6c']) && is_numeric($_GET['6d'])){
	$total=11;
	$dF=.920;
	}
elseif($scenario==5 && is_numeric($_GET['1b']) && is_numeric($_GET['1c']) && is_numeric($_GET['1d']) && is_numeric($_GET['5a']) && is_numeric($_GET['5b'])
		&& is_numeric($_GET['5c'])
		&& is_numeric($_GET['5d']) && is_numeric($_GET['6a']) && is_numeric($_GET['6b']) && is_numeric($_GET['6c']) && is_numeric($_GET['6d'])
		&& is_numeric($_GET['13a'])
		&& is_numeric($_GET['13b']) && is_numeric($_GET['13c']) && is_numeric($_GET['13d']) && is_numeric($_GET['14b']) && is_numeric($_GET['14c'])
		&& is_numeric($_GET['14d']) && is_numeric($_GET['15a'])){
	$total=8;
	$dF=1;
	}
else{
	header("Location: FlashLightError.html");
	exit;
	}
if(ctype_alnum(str_replace(array("'"," "),"",$_GET['studentFirstName'])) && ctype_alnum(str_replace(array("'"," "),"",$_GET['studentLastName']))
		&& is_numeric($_GET['period'])){
	
	}
else{
	header("Location: FlashLightError.html");
	exit;
	}
	

?>
<!DOCTYPE html>
<html>

<head>
<h1 align="center">Flash Light Circuit Calculations</h1>
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
			<td></td>
			<td>Resistance [&#937;]</td>
			<td>Current [Amps]</td>
			<td>Voltage [Volts]</td>
			<td>Power [Watts]</td>
		</tr>
		<tr>
			<td>Scenario (for Scenario 4, only record the values for the 3-bulb position)</td>
			<td><?php echo $_GET['scenario'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Battery, when bulb is lit (max current for scenario 5)</td>
			<td class="fixed"></td>
			<?php
			if($scenario==5 && ((9-2)/$_GET['5a'])*.95<=$_GET['1b'] && $_GET['1b']<=((9-2)/$_GET['5a'])*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario==5){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['1b'];?></td>
			<td><?php echo $_GET['1c'];?></td>
			<?php
			if(($_GET['1b']*$_GET['1c'])*.95<=$_GET['1d'] && $_GET['1d']<=($_GET['1b']*$_GET['1c'])*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['1d'];?></td>
		</tr>
		<tr>
			<td>Bulb 1</td>
			<td class="fixed">48 &#937;</td>
			<td><?php echo $_GET['2b'];?></td>
			<?php
			if($scenario<5 && ($_GET['2b']*48)*.95<=$_GET['2c'] && $_GET['2c']<=($_GET['2b']*48)*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario<5){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['2c'];?></td>
			<?php
			if($scenario<5 && pow($_GET['2b'],2)*48*.95<=$_GET['2d'] && $_GET['2d']<=pow($_GET['2b'],2)*48*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario<5){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['2d'];?></td>
		</tr>
		<tr>
			<td>Bulb 2 (Scenario 4)</td>
			<td class="fixed">48 &#937;</td>
			<td><?php echo $_GET['3b'];?></td>
			<?php
			if($scenario==4 && $_GET['3b']*48*.95<=$_GET['3c'] && $_GET['3c']<=$_GET['3b']*48*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario==4){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['3c'];?></td>
			<?php
			if($scenario==4 && pow($_GET['3b'],2)*48*.95<=$_GET['3d'] && $_GET['3d']<=pow($_GET['3b'],2)*48*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario==4){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['3d'];?></td>
		</tr>
		<tr>
			<td>Bulb 3 (Scenario 4)</td>
			<td class="fixed">48 &#937;</td>
			<td><?php echo $_GET['4b'];?></td>
			<?php
			if($scenario==4 && $_GET['4b']*48*.95<=$_GET['4c'] && $_GET['4c']<=$_GET['4b']*48*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario==4){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['4c'];?></td>
			<?php
			if($scenario==4 && pow($_GET['4b'],2)*48*.95<=$_GET['4d'] && $_GET['4d']<=pow($_GET['4b'],2)*48*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario==4){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['4d'];?></td>
		</tr>
		<tr>
			<td>R<sub>eq</sub>=Equivalent Resistance of all resistors (not including bulb)</td>
			<td><?php echo $_GET['5a'];?></td>
			<td><?php echo $_GET['5b'];?></td>
			<?php
			if($_GET['5b']*$_GET['5a']*.95<=$_GET['5c'] && $_GET['5c']<=$_GET['5b']*$_GET['5a']*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['5c'];?></td>
			<?php
			if(pow($_GET['5b'],2)*$_GET['5a']*.95<=$_GET['5d'] && $_GET['5d']<=pow($_GET['5b'],2)*$_GET['5a']*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['5d'];?></td>
		</tr>
		<tr>
			<td>R<sub>1</sub></td>
			<td><?php echo $_GET['6a'];?></td>
			<td><?php echo $_GET['6b'];?></td>
			<?php
			if($_GET['6b']*$_GET['6a']*.95<=$_GET['6c'] && $_GET['6c']<=$_GET['6b']*$_GET['6a']*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['6c'];?></td>
			<?php
			if(pow($_GET['6b'],2)*$_GET['6a']*.95<=$_GET['6d'] && $_GET['6d']<=pow($_GET['6b'],2)*$_GET['6a']*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['6d'];?></td>
		</tr>
		<tr>
			<td>R<sub>2</sub></td>
			<td><?php echo $_GET['7a'];?></td>
			<td><?php echo $_GET['7b'];?></td>
			<?php
			if(is_numeric($_GET['7a']) && is_numeric($_GET['7b']) && is_numeric($_GET['7c']) && is_numeric($_GET['7d']) && 
					$_GET['7b']*$_GET['7a']*.95<=$_GET['7c'] && $_GET['7c']<=$_GET['7b']*$_GET['7a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['7a']) && is_numeric($_GET['7b']) && is_numeric($_GET['7c']) && is_numeric($_GET['7d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['7c'];?></td>
			<?php
			if(is_numeric($_GET['7a']) && is_numeric($_GET['7b']) && is_numeric($_GET['7c']) && is_numeric($_GET['7d']) && 
					pow($_GET['7b'],2)*$_GET['7a']*.95<=$_GET['7d'] && $_GET['7d']<=pow($_GET['7b'],2)*$_GET['7a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['7a']) && is_numeric($_GET['7b']) && is_numeric($_GET['7c']) && is_numeric($_GET['7d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['7d'];?></td>
		</tr>
		<tr>
			<td>R<sub>3</sub></td>
			<td><?php echo $_GET['8a'];?></td>
			<td><?php echo $_GET['8b'];?></td>
			<?php
			if(is_numeric($_GET['8a']) && is_numeric($_GET['8b']) && is_numeric($_GET['8c']) && is_numeric($_GET['8d']) && 
					$_GET['8b']*$_GET['8a']*.95<=$_GET['8c'] && $_GET['8c']<=$_GET['8b']*$_GET['8a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['8a']) && is_numeric($_GET['8b']) && is_numeric($_GET['8c']) && is_numeric($_GET['8d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['8c'];?></td>
			<?php
			if(is_numeric($_GET['8a']) && is_numeric($_GET['8b']) && is_numeric($_GET['8c']) && is_numeric($_GET['8d']) && 
					pow($_GET['8b'],2)*$_GET['8a']*.95<=$_GET['8d'] && $_GET['8d']<=pow($_GET['8b'],2)*$_GET['8a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['8a']) && is_numeric($_GET['8b']) && is_numeric($_GET['8c']) && is_numeric($_GET['8d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['8d'];?></td>
		</tr>
		<tr>
			<td>R<sub>4</sub></td>
			<td><?php echo $_GET['9a'];?></td>
			<td><?php echo $_GET['9b'];?></td>
			<?php
			if(is_numeric($_GET['9a']) && is_numeric($_GET['9b']) && is_numeric($_GET['9c']) && is_numeric($_GET['9d']) && 
					$_GET['9b']*$_GET['9a']*.95<=$_GET['9c'] && $_GET['9c']<=$_GET['9b']*$_GET['9a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['9a']) && is_numeric($_GET['9b']) && is_numeric($_GET['9c']) && is_numeric($_GET['9d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['9c'];?></td>
			<?php
			if(is_numeric($_GET['9a']) && is_numeric($_GET['9b']) && is_numeric($_GET['9c']) && is_numeric($_GET['9d']) && 
					pow($_GET['9b'],2)*$_GET['9a']*.95<=$_GET['9d'] && $_GET['9d']<=pow($_GET['9b'],2)*$_GET['9a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['9a']) && is_numeric($_GET['9b']) && is_numeric($_GET['9c']) && is_numeric($_GET['9d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['9d'];?></td>
		</tr>
		<tr>
			<td>R<sub>5</sub></td>
			<td><?php echo $_GET['10a'];?></td>
			<td><?php echo $_GET['10b'];?></td>
			<?php
			if(is_numeric($_GET['10a']) && is_numeric($_GET['10b']) && is_numeric($_GET['10c']) && is_numeric($_GET['10d']) && 
					$_GET['10b']*$_GET['10a']*.95<=$_GET['10c'] && $_GET['10c']<=$_GET['10b']*$_GET['10a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['10a']) && is_numeric($_GET['10b']) && is_numeric($_GET['10c']) && is_numeric($_GET['10d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['10c'];?></td>
			<?php
			if(is_numeric($_GET['10a']) && is_numeric($_GET['10b']) && is_numeric($_GET['10c']) && is_numeric($_GET['10d']) && 
					pow($_GET['10b'],2)*$_GET['10a']*.95<=$_GET['10d'] && $_GET['10d']<=pow($_GET['10b'],2)*$_GET['10a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['10a']) && is_numeric($_GET['10b']) && is_numeric($_GET['10c']) && is_numeric($_GET['10d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['10d'];?></td>
		</tr>
		<tr>
			<td>R<sub>6</sub></td>
			<td><?php echo $_GET['11a'];?></td>
			<td><?php echo $_GET['11b'];?></td>
			<?php
			if(is_numeric($_GET['11a']) && is_numeric($_GET['11b']) && is_numeric($_GET['11c']) && is_numeric($_GET['11d']) && 
					$_GET['11b']*$_GET['11a']*.95<=$_GET['11c'] && $_GET['11c']<=$_GET['11b']*$_GET['11a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['11a']) && is_numeric($_GET['11b']) && is_numeric($_GET['11c']) && is_numeric($_GET['11d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['11c'];?></td>
			<?php
			if(is_numeric($_GET['11a']) && is_numeric($_GET['11b']) && is_numeric($_GET['11c']) && is_numeric($_GET['11d']) && 
					pow($_GET['11b'],2)*$_GET['11a']*.95<=$_GET['11d'] && $_GET['11d']<=pow($_GET['11b'],2)*$_GET['11a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['11a']) && is_numeric($_GET['11b']) && is_numeric($_GET['11c']) && is_numeric($_GET['11d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['11d'];?></td>
		</tr>
		<tr>
			<td>R<sub>7</sub></td>
			<td><?php echo $_GET['12a'];?></td>
			<td><?php echo $_GET['12b'];?></td>
			<?php
			if(is_numeric($_GET['12a']) && is_numeric($_GET['12b']) && is_numeric($_GET['12c']) && is_numeric($_GET['12d']) && 
					$_GET['12b']*$_GET['12a']*.95<=$_GET['12c'] && $_GET['12c']<=$_GET['12b']*$_GET['12a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['12a']) && is_numeric($_GET['12b']) && is_numeric($_GET['12c']) && is_numeric($_GET['12d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['12c'];?></td>
			<?php
			if(is_numeric($_GET['12a']) && is_numeric($_GET['12b']) && is_numeric($_GET['12c']) && is_numeric($_GET['12d']) && 
					pow($_GET['12b'],2)*$_GET['12a']*.95<=$_GET['12d'] && $_GET['12d']<=pow($_GET['12b'],2)*$_GET['12a']*1.05){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			elseif(is_numeric($_GET['12a']) && is_numeric($_GET['12b']) && is_numeric($_GET['12c']) && is_numeric($_GET['12d'])){
				$total++;
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['12d'];?></td>
		</tr>
		<tr>
			<td>Capacitor [Farads] (Scenario 5)</td>
			<td><?php echo $_GET['13a'];?></td>
			<td><?php echo $_GET['13b'];?></td>
			<td><?php echo $_GET['13c'];?></td>
			<?php
			if($scenario==5 && $_GET['13b']*$_GET['13c']*.95<=$_GET['13d'] && $_GET['13d']<=$_GET['13b']*$_GET['13c']*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario==5){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['13d'];?></td>
		</tr>
		<tr>
			<td>LED (Scenario 5)</td>
			<td class="fixed"></td>
			<td><?php echo $_GET['14b'];?></td>
			<td><?php echo $_GET['14c'];?></td>
			<?php
			if($scenario==5 && $_GET['14b']*$_GET['14c']*.95<=$_GET['14d'] && $_GET['14d']<=$_GET['14b']*$_GET['14c']*1.05){
				echo "<td class='correct'>";
				$correct++;
				}
			elseif($scenario==5){
				echo "<td class='incorrect'>";
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['14d'];?></td>
		</tr>
		<tr>
			<td>Time to reach 10 mA [s] (Scenario 5)</td>
			<td><?php echo $_GET['15a'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Other (optional)</td>
			<td><?php echo $_GET['16a'];?></td>
			<td><?php echo $_GET['16b'];?></td>
			<td><?php echo $_GET['16c'];?></td>
			<?php
			if(is_numeric($_GET['16a']) && is_numeric($_GET['16b']) && is_numeric($_GET['16c']) && is_numeric($_GET['16d'])){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['16d'];?></td>
		</tr>
		<tr>
			<td>Other (optional)</td>
			<td><?php echo $_GET['17a'];?></td>
			<td><?php echo $_GET['17b'];?></td>
			<td><?php echo $_GET['17c'];?></td>
			<?php
			if(is_numeric($_GET['17a']) && is_numeric($_GET['17b']) && is_numeric($_GET['17c']) && is_numeric($_GET['17d'])){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['17d'];?></td>
		</tr>
		<tr>
			<td>Other (optional)</td>
			<td><?php echo $_GET['18a'];?></td>
			<td><?php echo $_GET['18b'];?></td>
			<td><?php echo $_GET['18c'];?></td>
			<?php
			if(is_numeric($_GET['18a']) && is_numeric($_GET['18b']) && is_numeric($_GET['18c']) && is_numeric($_GET['18d'])){
				echo "<td class='correct'>";
				$total++;
				$correct++;
				}
			else
				echo "<td>";
			?>
			<?php echo $_GET['18d'];?></td>
		</tr>
	</table>
<p>
<?php
date_default_timezone_set('America/Denver');
echo "<strong>";
echo '<div style = "font-size: large">';
echo 'Name: '.$_GET['studentFirstName'].' '.$_GET['studentLastName']."&nbsp &nbsp &nbsp &nbsp Period: &nbsp".$_GET['period']."&nbsp &nbsp &nbsp &nbsp Scenario: ".$scenario.
		"&nbsp &nbsp &nbsp &nbsp Difficulty Factor: ".$dF."&nbsp &nbsp &nbsp &nbsp Date: &nbsp".date('D d M Y H:i:s')."<br>".
		$correct.' out of '.$total.' correct which is '.round(100*$correct/$total,0).' % &nbsp &nbsp &nbsp &nbsp'.
		'Raw Score out of 30 = % correct * 30 : '.round($correct/$total*30,1).'&nbsp &nbsp &nbsp &nbsp Points Earned out of 30 = Raw Score * Difficulty Factor : '.round($dF*$correct/$total*30,1);

?>
<?php
date_default_timezone_set('America/Boise');

if(file_exists("results/FlashLightFRQAnswers.csv") == false){
	$handle=fopen("results/FlashLightFRQAnswers.csv","a");
	fwrite($handle,"Student Last Name: ,Student First Name: ,Period: ,Correct: ,Total: ,Scenario: ,Difficulty Factor: ,Score: ,Date: "
			.",Current Battery: ,Voltage Battery: ,Power Battery: "
			.",B1 Current: ,B1 Voltage: ,B1 Power: "
			.",B2 Current: ,B2 Voltage: ,B2 Power: "
			.",B3 Current: ,B3 Voltage: ,B3 Power: "
			.",R Eq Resistance: ,R Eq Current: ,R Eq Voltage: ,R Eq Power: "
			.",R1 Resistance: ,R1 Current: ,R1 Voltage: ,R1 Power: "
			.",R2 Resistance: ,R2 Current: ,R2 Voltage: ,R2 Power: "
			.",R3 Resistance: ,R3 Current: ,R3 Voltage: ,R3 Power: "
			.",R4 Resistance: ,R4 Current: ,R4 Voltage: ,R4 Power: "
			.",R5 Resistance: ,R5 Current: ,R5 Voltage: ,R5 Power: "
			.",R6 Resistance: ,R6 Current: ,R6 Voltage: ,R6 Power: "
			.",R7 Resistance: ,R7 Current: ,R7 Voltage: ,R7 Power: "
			.",Capacitor Resistance: ,Capacitor Current: ,Capacitor Voltage: ,Capacitor Power: "//maybe call this one 'C1'?
			.",LED Current: ,LED Voltage: ,LED Power: "
			.",Time: "
			.",O1 Resistance: ,O1 Current: ,O1 Voltage: ,O1 Power: "
			.",O2 Resistance: ,O2 Current: ,O2 Voltage: ,O2 Power: "
			.",O3 Resistance: ,O3 Current: ,O3 Voltage: ,O3 Power: ");
	fwrite($handle,"\n");
	fclose($handle);
}
$handle=fopen("results/FlashLightFRQAnswers.csv","a");
fwrite($handle,$_GET['studentLastName'].",".$_GET['studentFirstName'].",".$_GET['period'].",".$correct.",".$total.",".$scenario.",".$dF.",".round($correct/$total*30,1)*$dF.",".date('D d M Y H:i:s')
		.",".$_GET['1b'].",".$_GET['1c'].",".$_GET['1d'].",".$_GET['2b'].",".$_GET['2c'].",".$_GET['2d'].",".$_GET['3b'].",".$_GET['3c']
		.",".$_GET['3d'].",".$_GET['4b'].",".$_GET['4c'].",".$_GET['4d'].",".$_GET['5a'].",".$_GET['5b'].",".$_GET['5c'].",".$_GET['5d'].",".$_GET['6a']
		.",".$_GET['6b'].",".$_GET['6c'].",".$_GET['6d'].",".$_GET['7a'].",".$_GET['7b'].",".$_GET['7c'].",".$_GET['7d'].",".$_GET['8a'].",".$_GET['8b']
		.",".$_GET['8c'].",".$_GET['8d'].",".$_GET['9a'].",".$_GET['9b'].",".$_GET['9c'].",".$_GET['9d'].",".$_GET['10a'].",".$_GET['10b'].",".$_GET['10c']
		.",".$_GET['10d'].",".$_GET['11a'].",".$_GET['11b'].",".$_GET['11c'].",".$_GET['11d'].",".$_GET['12a'].",".$_GET['12b'].",".$_GET['12c'].",".$_GET['12d']
		.",".$_GET['13a'].",".$_GET['13b'].",".$_GET['13c'].",".$_GET['13d'].",".$_GET['14b'].",".$_GET['14c'].",".$_GET['14d'].",".$_GET['15a']
		.",".$_GET['16a'].",".$_GET['16b'].",".$_GET['16c'].",".$_GET['16d'].",".$_GET['17a'].",".$_GET['17b']
		.",".$_GET['17c'].",".$_GET['17d'].",".$_GET['18a'].",".$_GET['18b'].",".$_GET['18c'].",".$_GET['18d']);
fwrite($handle,"\n");
fclose($handle);
?>
</body>

<p id="right">Version 1.4 Last Updated 2/10/2021 AKH</p>

</html>
