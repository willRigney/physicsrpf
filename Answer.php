<?php

$correct=0;
$scenario=0;
$total=0;
if(is_numeric($_GET['1a'])&&is_numeric($_GET['1b'])&&is_numeric($_GET['1h'])&&is_numeric($_GET['1i'])&&
	is_numeric($_GET['1j'])&&is_numeric($_GET['1k'])&&is_numeric($_GET['1m'])&&is_numeric($_GET['1n']))
	$scenario=1;
elseif(is_numeric($_GET['2a'])&&is_numeric($_GET['2b'])&&is_numeric($_GET['2c'])&&is_numeric($_GET['2h'])&&
	is_numeric($_GET['2i'])&&is_numeric($_GET['2j'])&&is_numeric($_GET['2k'])&&is_numeric($_GET['2m'])&&is_numeric($_GET['2n']))
	$scenario=2;
elseif(is_numeric($_GET['3a'])&&is_numeric($_GET['3b'])&&is_numeric($_GET['3c'])&& is_numeric($_GET['3d'])&&
	is_numeric($_GET['3e'])&&is_numeric($_GET['3h'])&&is_numeric($_GET['3i'])&&is_numeric($_GET['3j'])&&is_numeric($_GET['3k']) &&
	is_numeric($_GET['3m'])&&is_numeric($_GET['3n']))
	$scenario=3;
elseif(is_numeric($_GET['4a'])&&is_numeric($_GET['4b'])&&is_numeric($_GET['4c'])&&is_numeric($_GET['4d'])&&
	is_numeric($_GET['4e'])&&is_numeric($_GET['4f'])&&is_numeric($_GET['4g'])&&is_numeric($_GET['4h'])&&is_numeric($_GET['4i']) &&
	is_numeric($_GET['4j'])&&is_numeric($_GET['4k'])&&is_numeric($_GET['4m'])&&is_numeric($_GET['4n']))
	$scenario=4;
elseif(is_numeric($_GET['5a'])&&is_numeric($_GET['5b'])&&is_numeric($_GET['5c'])&&is_numeric($_GET['5d'])&&
	is_numeric($_GET['5e'])&&$_GET['starName']&&is_numeric($_GET['5f'])&&is_numeric($_GET['5g'])&&is_numeric($_GET['5h']) &&
	is_numeric($_GET['5i'])&&is_numeric($_GET['5j'])&&is_numeric($_GET['5k'])&&is_numeric($_GET['5m'])&&is_numeric($_GET['5n']))
	$scenario=5;
else
	$scenario=0;
if($_GET['studentFirstName']!=""&&$_GET['studentLastName']!="" && $_GET['period']!="" && $scenario!=0){
	
	}
else{
	header("Location: ErrorPage.html");
	exit;
	}
if($scenario==4 || $scenario==5)
	$total=4;
else
	$total=3;
	
$g=6.67e-11;
$msun=1.99e30;
$p=1.2e17;
$c=5.67e-8;
$convert=3.39e18;
$pi=3.141592;
$mearth=5.97e24;
$r=6.3728e6;


?>

<!DOCTYPE html>

<html>

<head>
<h1 align="center">Physics Planet Lab Calculations</h1>
<hr>
<style type="text/css">
body{
background-color:#d0e4fe;
}
table,tr{
width:100%;
border:1px solid black;
}
td{
border:1px solid black;
text-align:center;
background-color:#d0e4fe;
}
.fixed{
background-color:#696969;
}
<?php
if($scenario==1)
	echo ".correct1{
	background-color:#00FF00;
	}
	.incorrect1{
	background-color:#B22222;
	}";
elseif($scenario==2)
	echo ".correct2{
	background-color:#00FF00;
	}
	.incorrect2{
	background-color:#B22222;
	}";
elseif($scenario==3)
	echo ".correct3{
	background-color:#00FF00;
	}
	.incorrect3{
	background-color:#B22222;
	}";
elseif($scenario==4)
	echo ".correct4{
	background-color:#00FF00;
	}
	.incorrect4{
	background-color:#B22222;
	}";
elseif($scenario==5)
	echo ".correct5{
	background-color:#00FF00;
	}
	.incorrect5{
	background-color:#B22222;
	}";
?>
</style>
</head>

<body>

<form>
	<table>
		<tr>
		  <td>Scenario</td>
		  <td>Planet mass, m<sub>p</sub> [# of<br>times Earth's mass]</td>
		  <td>Planet radius, r<sub>p</sub> [# of<br>times Earth's radius]</td>
		  <td>Emissivity, &#949</td>
		  <td>Absorbed Power,<br>P<sub>abs</sub> [#of times Earth's absorbed power]</td>
		  <td>Orbit Radius, a [AU]</td>
		  <td>Kepler's constant, K [yr<sup>2</sup>/AU<sup>3</sup>]</td>
		  <td>Orbital Period, T<sub>orbit</sub> [Earth years]</td>
		  <td>Surface Gravity, g [m/s<sup>2</sup>]</td>
		  <td>Surface Temperature, T<sub>surface</sub> [F] without greenhouse gases</td>
		</tr>
		<tr>
			<td>1</td>
			<td><span name="1a"><?php echo $_GET['1a'];?></span></td>
			<td><span name="1b"><?php echo $_GET['1b'];?></span></td>
			<td class="fixed">0.70</td>
			<td class="fixed">1</td>
			<td class="fixed">1</td>
			<td class="fixed">1</td>
			<?php
			if(.9<=$_REQUEST['1i'] && $_REQUEST['1i']<=1.1){
				echo "<td class='correct1'>";
				$correct++;
				}
			else
				echo "<td class='incorrect1'>";
			?>
			Goal: <span name="1h"><?php echo $_GET['1h'];?></span><br>
			Actual: <span name="1i"><?php echo $_GET['1i'];?></span></td>
			<?php	
			if($_REQUEST['1b']!=0&&($g*$_REQUEST['1a']*$mearth/pow($_REQUEST['1b']*$r,2))*.9<=$_REQUEST['1k'] && $_REQUEST['1k']<=($g*$_REQUEST['1a']*$mearth/pow($_REQUEST['1b']*$r,2))*1.1){
				echo "<td class='correct1'>";
				$correct++;
				}
			else
				echo "<td class='incorrect1'>";
			?>
			Goal: <span name="1j"><?php echo $_GET['1j'];?></span><br>
			Actual: <span name="1k"><?php echo $_GET['1k'];?></span></td>
			<?php
			if($_REQUEST['1b']!=0 && 
			abs((1.8*(pow($p/($c*.7*4*$pi*pow($_REQUEST['1b']*$r,2)),.25))-459.67)-$_REQUEST['1n'])<=10 &&
			abs((1.8*(pow($p/($c*.7*4*$pi*pow($_REQUEST['1b']*$r,2)),.25))-459.67)-$_REQUEST['1n'])>=0){
				echo "<td class='correct1'>";
				$correct++;
				}
			else
				echo "<td class='incorrect1'>";
			?>
			Goal: <span name="1m"><?php echo $_GET['1m'];?></span><br>
			Actual: <span name="1n"><?php echo $_GET['1n'];?></span></td>
		</tr>
		<tr>
			<td>2</td>
			<td><span name="2a"><?php echo $_GET['2a'];?></span></td>
			<td><span name="2b"><?php echo $_GET['2b'];?></span></td>
			<td><span name="2c"><?php echo $_GET['2c'];?></span></td>
			<td class="fixed">1</td>
			<td class="fixed">1</td>
			<td class="fixed">1</td>
			<?php
			if(.9<=$_REQUEST['2i']&&$_REQUEST['2i']<=1.1){
				echo "<td class='correct2'>";
				$correct++;
				}
			else
				echo "<td class='incorrect2'>";
			?>
			Goal: <span name="2h"><?php echo $_GET['2h'];?></span><br>
			Actual: <span name="2i"><?php echo $_GET['2i'];?></span></td>
			<?php
			if($_REQUEST['2b']!=0&&($g*$_REQUEST['2a']*$mearth/pow($_REQUEST['2b']*$r,2))*.9<=$_REQUEST['2k']&&$_REQUEST['2k']<=($g*$_REQUEST['2a']*$mearth/pow($_REQUEST['2b']*$r,2))*1.1){
				echo "<td class='correct2'>";
				$correct++;
				}
			else
				echo "<td class='incorrect2'>";
			?>
			Goal: <span name="2j"><?php echo $_GET['2j'];?></span><br>
			Actual: <span name="2k"><?php echo $_GET['2k'];?></span></td>
			<?php
			if($_REQUEST['2b']!=0&&$_REQUEST['2c']!=0 && 
			abs((1.8*(pow($p/($c*$_REQUEST['2c']*4*$pi*pow($_REQUEST['2b']*$r,2)),.25))-459.67)-$_REQUEST['2n'])<=10 && 
			abs((1.8*(pow($p/($c*$_REQUEST['2c']*4*$pi*pow($_REQUEST['2b']*$r,2)),.25))-459.67)-$_REQUEST['2n'])>=0){
				echo "<td class='correct2'>";
				$correct++;
				}
			else
				echo "<td class='incorrect2'>";
			?>
			Goal: <span name="2m"><?php echo $_GET['2m'];?></span><br>
			Actual: <span name="2n"><?php echo $_GET['2n'];?></span></td>
		</tr>
		<tr>
			<td>3</td>
			<td><span name="3a"><?php echo $_GET['3a'];?></span></td>
			<td><span name="3b"><?php echo $_GET['3b'];?></span></td>
			<td><span name="3c"><?php echo $_GET['3c'];?></span></td>
			<td><span name="3d"><?php echo $_GET['3d'];?></span></td>
			<td><span name="3e"><?php echo $_GET['3e'];?></span></td>
			<td class="fixed">1</td>
			<?php
			if($_REQUEST['3e']!=0&&pow(pow($_REQUEST['3e'],3),.5)*.9<=$_REQUEST['3i']&&$_REQUEST['3i']<=pow(pow($_REQUEST['3e'],3),.5)*1.1){
				echo "<td class='correct3'>";
				$correct++;
				}
			else
				echo "<td class='incorrect3'>";
			?>
			Goal: <span name="3h"><?php echo $_GET['3h'];?></span><br>
			Actual: <span name="3i"><?php echo $_GET['3i'];?></span></td>
			<?php
			if($_REQUEST['3b']!=0&&($g*$_REQUEST['3a']*$mearth/pow($_REQUEST['3b']*$r,2))*.9<=$_REQUEST['3k']&&$_REQUEST['3k']<=($g*$_REQUEST['3a']*$mearth/pow($_REQUEST['3b']*$r,2))*1.1){
				echo "<td class='correct3'>";
				$correct++;
				}
			else
				echo "<td class='incorrect3'>";
			?>
			Goal: <span name="3j"><?php echo $_GET['3j'];?></span><br>
			Actual: <span name="3k"><?php echo $_GET['3k'];?></span></td>
			<?php
			if($_REQUEST['3b']!=0&&$_REQUEST['3c']!=0&&
			abs((1.8*(pow($_REQUEST['3d']*$p/($c*$_REQUEST['3c']*4*$pi*pow($_REQUEST['3b']*$r,2)),.25))-459.67)-$_REQUEST['3n'])<=10 && 
			abs((1.8*(pow($_REQUEST['3d']*$p/($c*$_REQUEST['3c']*4*$pi*pow($_REQUEST['3b']*$r,2)),.25))-459.67)-$_REQUEST['3n'])>=0){
				echo "<td class='correct3'>";
				$correct++;
				}
			else
				echo "<td class='incorrect3'>";
			?>
			Goal: <span name="3m"><?php echo $_GET['3m'];?></span><br>
			Actual: <span name="3n"><?php echo $_GET['3n'];?></span></td>
		</tr>
		<tr>
			<td>4</td>
			<td><span name="4a"><?php echo $_GET['4a'];?></span></td>
			<td><span name="4b"><?php echo $_GET['4b'];?></span></td>
			<td><span name="4c"><?php echo $_GET['4c'];?></span></td>
			<td><span name="4d"><?php echo $_GET['4d'];?></span></td>
			<td><span name="4e"><?php echo $_GET['4e'];?></span></td>
			<?php
			if($_REQUEST['4f']!=0&&((4*pow($pi,2)/($g*$_REQUEST['4f']*$msun))*$convert)*.9<=$_REQUEST['4g'] && $_REQUEST['4g']<=((4*pow($pi,2)/($g*$_REQUEST['4f']*$msun))*$convert)*1.1){
				echo "<td class='correct4'>";
				$correct++;
				}
			else
				echo "<td class='incorrect4'>";
			?>
			M<sub>star</sub> [# solar masses]<br><span name="4f"><?php echo $_GET['4f'];?></span><br>
			K: <span name="4g"><?php echo $_GET['4g'];?></span></td>
			<?php
			if($_REQUEST['4e']!=0&&pow($_REQUEST['4g']*pow($_REQUEST['4e'],3),.5)*.9<=$_REQUEST['4i']&&$_REQUEST['4i']<=pow($_REQUEST['4g']*pow($_REQUEST['4e'],3),.5)*1.1){
				echo "<td class='correct4'>";
				$correct++;
				}
			else
				echo "<td class='incorrect4'>";
			?>
			Goal: <span name="4h"><?php echo $_GET['4h'];?></span><br>
			Actual: <span name="4i"><?php echo $_GET['4i'];?></span></td>
			<?php
			if($_REQUEST['4b']!=0&&($g*$_REQUEST['4a']*$mearth/pow($_REQUEST['4b']*$r,2))*.9<=$_REQUEST['4k']&&$_REQUEST['4k']<=($g*$_REQUEST['4a']*$mearth/pow($_REQUEST['4b']*$r,2))*1.1){
				echo "<td class='correct4'>";
				$correct++;
				}
			else
				echo "<td class='incorrect4'>";
			?>
			Goal: <span name="4j"><?php echo $_GET['4j'];?></span><br>
			Actual: <span name="4k"><?php echo $_GET['4k'];?></span></td>
			<?php
			if($_REQUEST['4b']!=0&&$_REQUEST['4c']!=0&&
			abs((1.8*(pow($_REQUEST['4d']*$p/($c*$_REQUEST['4c']*4*$pi*pow($_REQUEST['4b']*$r,2)),.25))-459.67)-$_REQUEST['4n'])<=10 && 
			abs((1.8*(pow($_REQUEST['4d']*$p/($c*$_REQUEST['4c']*4*$pi*pow($_REQUEST['4b']*$r,2)),.25))-459.67)-$_REQUEST['4n'])>=0){
				echo "<td class='correct4'>";
				$correct++;
				}
			else
				echo "<td class='incorrect4'>";
			?>
			Goal: <span name="4m"><?php echo $_GET['4m'];?></span><br>
			Actual: <span name="4n"><?php echo $_GET['4n'];?></span></td>
		</tr>
		<tr>
			<td>5</td>
			<td><span name="5a"><?php echo $_GET['5a'];?></span></td>
			<td><span name="5b"><?php echo $_GET['5b'];?></span></td>	
			<td><span name="5c"><?php echo $_GET['5c'];?></span></td>
			<td><span name="5d"><?php echo $_GET['5d'];?></span></td>
			<td><span name="5e"><?php echo $_GET['5e'];?></span></td>
			<?php
			if($_REQUEST['5f']!=0&&((4*pow($pi,2)/($g*$_REQUEST['5f']*$msun))*$convert)*.9<=$_REQUEST['5g'] && $_REQUEST['5g']<=((4*pow($pi,2)/($g*$_REQUEST['5f']*$msun))*$convert)*1.1){
				echo "<td class='correct5'>";
				$correct++;
				}
			else
				echo "<td class='incorrect5'>";
			?>
			Star Name: <span name="starName"><?php echo $_GET['starName'];?></span><br>
			M<sub>star</sub> [# solar masses]<br><span name="5f"><?php echo $_GET['5f'];?></span><br>
			K: <span name="5g"><?php echo $_GET['5g'];?></span></td>
			<?php
			if($_REQUEST['5e']!=0&&pow($_REQUEST['5g']*pow($_REQUEST['5e'],3),.5)*.9<=$_REQUEST['5i']&&$_REQUEST['5i']<=pow($_REQUEST['5g']*pow($_REQUEST['5e'],3),.5)*1.1){
				echo "<td class='correct5'>";
				$correct++;
				}
			else
				echo "<td class='incorrect5'>";
			?>
			Goal: <span name="5h"><?php echo $_GET['5h'];?><br>
			Actual: <span name="5i"><?php echo $_GET['5i'];?></td>
			<?php
			if($_REQUEST['5b']!=0&&($g*$_REQUEST['5a']*$mearth/pow($_REQUEST['5b']*$r,2))*.9<=$_REQUEST['5k']&&$_REQUEST['5k']<=($g*$_REQUEST['5a']*$mearth/pow($_REQUEST['5b']*$r,2))*1.1){
				echo "<td class='correct5'>";
				$correct++;
				}
			else
				echo "<td class='incorrect5'>";
			?>
			Goal: <span name="5j"><?php echo $_GET['5j'];?><br>
			Actual: <span name="5k"><?php echo $_GET['5k'];?></td>
			<?php
			if($_REQUEST['5b']!=0 && $_REQUEST['5c']!=0 && 
			abs((1.8*(pow($_REQUEST['5d']*$p/($c*$_REQUEST['5c']*4*$pi*pow($_REQUEST['5b']*$r,2)),.25))-459.67)-$_REQUEST['5n'])<=10 &&
			abs((1.8*(pow($_REQUEST['5d']*$p/($c*$_REQUEST['5c']*4*$pi*pow($_REQUEST['5b']*$r,2)),.25))-459.67)-$_REQUEST['5n'])>=0){
				echo "<td class='correct5'>";
				$correct++;
				}
			else
				echo "<td class='incorrect5'>";
			?>
			Goal: <span name="5m"><?php echo $_GET['5m'];?><br>
			Actual: <span name="5n"><?php echo $_GET['5n'];?></td>
		</tr>
	</table>
</form>

<p>
<?php 
echo 'Name: '.$_GET['studentFirstName'].' '.$_GET['studentLastName']."<br>".
'Period: '.$_GET['period']."<br>".
'Scenario: '.$scenario."<br>".
'Correct: '.$correct.' out of '.$total;
?>
</p>
<?php
date_default_timezone_set('America/Boise');

/***************to set up the blank excel file with labelled columns*************/
if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/results/Answers.csv")==false){
	$handle=fopen("results/Answers.csv","a");
	fwrite($handle,"Student Name: ,Period: ,Scenario: ,Correct: ,Total: ,Date: ,Planet mass: ,Planet Radius: ,Emissivity: ,Absorbed Power: ,Orbit Radius: ,Star Name: ,Mass of Star: ,Kepler's Constant K: ,Orbital Period Goal: ,Orbital Period Actual: ,Surface Gravity Goal: ,Surface Gravity Actual: ,Surface Temperature Goal: ,Surface Temperature Actual: ,");
	fwrite($handle,"\n");
        fclose($handle);
}



$handle=fopen("results/Answers.csv","a");
if($scenario==1){
	fwrite($handle," ".$_GET['studentFirstName']." ".$_GET['studentLastName'].",".$_GET['period'].",".$scenario.",".$correct.",".$total.", ".date('D d M Y H:i:s').",".$_GET['1a'].",".$_GET['1b'].",0.70,1,1,1, , ,".$_GET['1h'].",".$_GET['1i'].",".$_GET['1j'].",".$_GET['1k'].",".$_GET['1m'].",".$_GET['1n']);
	fwrite($handle,"\n");
}
elseif($scenario==2){
	fwrite($handle," ".$_GET['studentFirstName']." ".$_GET['studentLastName'].",".$_GET['period'].",".$scenario.",".$correct.",".$total.", ".date('D d M Y H:i:s').",".$_GET['2a'].",".$_GET['2b'].",".$_GET['2c'].",1,1,1, , ,".$_GET['2h'].",".$_GET['2i'].",".$_GET['2j'].",".$_GET['2k'].",".$_GET['2m'].",".$_GET['2n']);
	fwrite($handle,"\n");
}
elseif($scenario==3){
	fwrite($handle," ".$_GET['studentFirstName']." ".$_GET['studentLastName'].",".$_GET['period'].",".$scenario.",".$correct.",".$total.", ".date('D d M Y H:i:s').",".$_GET['3a'].",".$_GET['3b'].",".$_GET['3c'].",".$_GET['3d'].",".$_GET['3e'].",1, , ,".$_GET['3h'].",".$_GET['3i'].",".$_GET['3j'].",".$_GET['3k'].",".$_GET['3m'].",".$_GET['3n']);
	fwrite($handle,"\n");
}
elseif($scenario==4){
	fwrite($handle," ".$_GET['studentFirstName']." ".$_GET['studentLastName'].",".$_GET['period'].",".$scenario.",".$correct.",".$total.", ".date('D d M Y H:i:s').",".$_GET['4a'].",".$_GET['4b'].",".$_GET['4c'].",".$_GET['4d'].",".$_GET['4e'].", ,".$_GET['4f'].",".$_GET['4g'].",".$_GET['4h'].",".$_GET['4i'].",".$_GET['4j'].",".$_GET['4k'].",".$_GET['4m'].",".$_GET['4n']);
	fwrite($handle,"\n");
}
elseif($scenario==5){
	fwrite($handle," ".$_GET['studentFirstName']." ".$_GET['studentLastName'].",".$_GET['period'].",".$scenario.",".$correct.",".$total.", ".date('D d M Y H:i:s').",".$_GET['5a'].",".$_GET['5b'].",".$_GET['5c'].",".$_GET['5d'].",".$_GET['5e'].",".$_GET['starName'].",".$_GET['5f'].",".$_GET['5g'].",".$_GET['5h'].",".$_GET['5i'].",".$_GET['5j'].",".$_GET['5k'].",".$_GET['5m'].",".$_GET['5n']);
	fwrite($handle,"\n");
}
else{
	fwrite($handle,"Error\n");
}

fclose($handle);
?>

</body>

</html>