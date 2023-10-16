<!--
Created by Steven Madachy
Made for: Mr. Hankla
Assisted by: Mr. Hettmansperger

for more information about how to write HTML go to http://www.w3schools.com/
for more information about how to write PHP go to http://php.net/
-->
<?php
$correct=0;
$total=-1;
$dF=-1;
if(is_numeric($_GET['scenario']) && 1 <= $_GET['scenario'] && $_GET['scenario'] <=5)
	$scenario=$_GET['scenario'];
else{
	header("Location: TimePieceError.html");
	exit;
	}
if($scenario!=5){
	header("Location: TimePieceScenario5Error.html");
	exit;
	}
if($scenario==5 && is_numeric($_GET['1a']) && is_numeric($_GET['2a']) && is_numeric($_GET['2b']) && is_numeric($_GET['2d']) && is_numeric($_GET['3a'])
		&& is_numeric($_GET['3b']) && is_numeric($_GET['3d']) && is_numeric($_GET['4a']) && is_numeric($_GET['4b']) && is_numeric($_GET['5a'])
		&& is_numeric($_GET['5b']) && is_numeric($_GET['6a']) && is_numeric($_GET['6b']) && is_numeric($_GET['7a']) && is_numeric($_GET['7b'])
		&& is_numeric($_GET['8a']) && is_numeric($_GET['8b']) && is_numeric($_GET['8c']) && is_numeric($_GET['9a']) && is_numeric($_GET['9b'])
		&& is_numeric($_GET['9c']) && is_numeric($_GET['10a']) && is_numeric($_GET['10b']) && $_GET['2a']!=0 && is_numeric($_GET['11a'])
		&& is_numeric($_GET['11b']) && $_GET['8a']!=0 && $_GET['8b']!=0){
	$total=22;
	$dF=1;
	}
else{
	header("Location: TimePieceError.html");
	exit;
	}
if(ctype_alnum(str_replace(array("'"," "),"",$_GET['studentFirstName'])) && ctype_alnum(str_replace(array("'"," "),"",$_GET['studentLastName']))
		&& is_numeric($_GET['period'])){
	
	}
else{
	header("Location: TimePieceError.html");
	exit;
	}

?>
<!DOCTYPE html>
<html>

<head>
<h1 align="center">Time Piece Lab Calculations</h1>
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
			<td></td>
			<td>Customer's Choice of Period</td>
			<td>1.0 Second Period</td>
			<td>1.0 Second Period</td>
			<td>1.0 Second Period</td>
		</tr>
		<tr>
			<td>Item</td>
			<td>Units</td>
			<td></td>
			<td>Right Side Up</td>
			<td>Upside Down</td>
			<td>Moon</td>
		</tr>
		<tr>
			<td>Scenario</td>
			<td>-</td>
			<td><?php echo $_GET['scenario'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Period-Given</td>
			<td>s</td>
			<td><?php echo $_GET['1a'];?></td>
			<td class="fixed">1.0</td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Mass-Calculated</td>
			<td>kg</td>
			<?php
			if(1==1){//this just automatically gives them the point
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['2a'];?></td>
			<?php
			if(1==1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['2b'];?></td>
			<td class="fixed"></td>
			<?php
			if(1==1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['2d'];?></td>
		</tr>
		<tr>
			<td>Frequency-Calculated</td>
			<td>Hz</td>
			<?php
			if((1/$_GET['1a'])*.9 <= $_GET['3a'] && $_GET['3a'] <= (1/$_GET['1a'])*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['3a'];?></td>
			<?php
			if((1)*.9 <= $_GET['3b'] && $_GET['3b'] <= (1)*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['3b'];?></td>
			<td class="fixed"></td>
			<?php
			if(($_GET['3b'])*.9 <= $_GET['3d'] && $_GET['3d'] <= ($_GET['3b'])*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['3d'];?></td>
		</tr>
		<tr>
			<td>Angular Frequency-Calculated</td>
			<td>rad/s</td>
			<?php
			if((2*3.14159*$_GET['3a'])*.9 <= $_GET['4a'] && $_GET['4a'] <= (2*3.14159*$_GET['3a'])*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['4a'];?></td>
			<?php
			if((2*3.14159*$_GET['3b'])*.9 <= $_GET['4b'] && $_GET['4b'] <= (2*3.14159*$_GET['3b'])*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['4b'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Amplitude-Chosen</td>
			<td>m</td>
			<td><?php echo $_GET['5a'];?></td>
			<td><?php echo $_GET['5b'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Maximum Velocity-Calculated</td>
			<td>m/s</td>
			<?php
			if(($_GET['4a']*$_GET['5a'])*.9 <= $_GET['6a'] && $_GET['6a'] <= ($_GET['4a']*$_GET['5a'])*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['6a'];?></td>
			<?php
			if(($_GET['4b']*$_GET['5b'])*.9 <= $_GET['6b'] && $_GET['6b'] <= ($_GET['4b']*$_GET['5b'])*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['6b'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Maximum Acceleration-Calculated</td>
			<td>m/s<sup>2</sup></td>
			<?php
			if(($_GET['5a']*pow($_GET['4a'],2))*.9 <= $_GET['7a'] && $_GET['7a'] <= ($_GET['5a']*pow($_GET['4a'],2))*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['7a'];?></td>
			<?php
			if(($_GET['5b']*pow($_GET['4b'],2))*.9 <= $_GET['7b'] && $_GET['7b'] <= ($_GET['5b']*pow($_GET['4b'],2))*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['7b'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Period-Measured</td>
			<td>s</td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['8a'];?></td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['8b'];?></td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['8c'];?></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Mass-Measured</td>
			<td>kg</td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['9a'];?></td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['9b'];?></td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['9c'];?></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Period after two minutes-Measured</td>
			<td>s</td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['10a'];?></td>
			<?php
			$correct++;
			?>
			<td><?php echo $_GET['10b'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
		<tr>
			<td>Spring Constant-Calculated</td>
			<td>N/m</td>
			<?php
			if((4*pow(3.14159,2)*$_GET['9a']/pow($_GET['8a'],2))*.9 <= $_GET['11a'] && $_GET['11a'] <= (4*pow(3.14159,2)*$_GET['9a']/pow($_GET['8a'],2))*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['11a'];?></td>
			<?php
			if((4*pow(3.14159,2)*$_GET['9b']/pow($_GET['8b'],2))*.9 <= $_GET['11b'] && $_GET['11b'] <= (4*pow(3.14159,2)*$_GET['9b']/pow($_GET['8b'],2))*1.1){
				echo "<td class='correct'>";
				$correct++;
				}
			else{
				echo "<td class='incorrect'>";
				}
			?>
			<?php echo $_GET['11b'];?></td>
			<td class="fixed"></td>
			<td class="fixed"></td>
		</tr>
	</table>
<p>
<?php
		date_default_timezone_set('America/Denver');
		echo "<strong>";
		echo '<div style = "font-size: large">';
		echo 'Name: '.$_GET['studentFirstName'].' '.$_GET['studentLastName']."&nbsp &nbsp &nbsp &nbsp Period: &nbsp".$_GET['period']."&nbsp &nbsp &nbsp &nbsp Scenario: ".$scenario.
		"&nbsp &nbsp &nbsp &nbsp Score: &nbsp".round($correct/$total*20,1)*1,' &nbsp out of 20 which is '.round($correct/$total*100,1).
		' % &nbsp &nbsp &nbsp &nbsp Date: &nbsp'.date('D d M Y H:i:s');
		
?>

<?php


if(file_exists("results/TimePieceFRQAnswers.csv") == false){
	$handle=fopen("results/TimePieceFRQAnswers.csv","a");
	fwrite($handle,"Class Period: ,Student Last Name: ,Student First Name: ,Scenario: ,Difficulty Factor, Correct: ,Total: ,Score: ,Date: ,Period C: ,Length C: ,Length S: ,Length M: ,Frequency C: ,Frequency S: ,Frequency M: ,Angular Frequency C: ,Angular Frequency S: ,Amplitude C: ,Amplitude S: ,Maximum V C: , Maximum V S: ,Maximum A C: ,Maximum A S: ,Measured Period C: , Measured Period S: , Measured Period U: ,Measured Length C: ,Measured Length S: ,Measured Length U: ,Period after two min C: ,Period after two min S: ,Spring Constant C: ,Spring Constant S: ");
	fwrite($handle,"\n");
	fclose($handle);
}
$handle=fopen("results/TimePieceFRQAnswers.csv","a");
fwrite($handle,$_GET['period'].",".$_GET['studentLastName'].",".$_GET['studentFirstName'].",".$scenario.",".$dF.",".$correct.",".$total.",".round($correct/$total*20,1)*$dF.",".date('D d M Y H:i:s').",".$_GET['1a'].",".$_GET['2a'].",".$_GET['2b'].",".$_GET['2d'].",".$_GET['3a'].",".$_GET['3b'].",".$_GET['3d'].",".$_GET['4a'].",".$_GET['4b'].",".$_GET['5a'].",".$_GET['5b'].",".$_GET['6a'].",".$_GET['6b'].",".$_GET['7a'].",".$_GET['7b'].",".$_GET['8a'].",".$_GET['8b'].",".$_GET['8c'].",".$_GET['9a'].",".$_GET['9b'].",".$_GET['9c'].",".$_GET['10a'].",".$_GET['10b'].",".$_GET['11a'].",".$_GET['11b']);
fwrite($handle,"\n");
fclose($handle);
?>
</body>

<p id="right">Version 2.1 Last Updated 1/24/2019 AKH</p>

</html>
