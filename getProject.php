<?php include 'DBConnection.php';  ?>

<html>
<head>
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="stylesheet" type="text/css" href="mystyle.css" media="all" />
	<title>XXX Projects</title>
	<meta http-equiv="Content-Language" content="tr">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
</head>
<body>

  <div id="second">
  <a href="/index.php"><img src="iyte_logo.png"></a>
	<p><H1>XXX Projects</H1>  </p>
  </div>


  <div id="pickingArea">

<?php


$prID=$_POST['selectedProject'];
if($prID=="") echo "First you should select a project..";

$sql ="SELECT  `isEmpty`,`projectName`,`projectCapacity`  FROM `projectsTable` WHERE `projectID` =$prID";
if($result = $conn->query($sql)){
			while ($row = $result->fetch_row()){

		if ($row[0]=='empty'){?>
		<p> You're taking this project:</p>
		<p> <h3><?php echo $row[1]; ?> </h3> </p>
			Student numbers:<br><br>
			<form action="projectSelection.php" onsubmit="return isValid(this)" method="post">
			<?php for ($i=1;$i<=$row[2];$i++){echo $i;?>
			. Person
			<input type="text" name="number<?php echo $i;?>" >  <br>
			<?php }?> 
			 <input type="hidden" name="varname" value="<?php echo $prID; ?>">
			 <input type="hidden" name="numberOfPeople" value="<?php echo $row[2]; ?>">
			 <p><input type="submit" /></p>
			</form> 

		<?php
		}else
		{
			echo "Sorry, this project has already been taken.";

			}
			}
    /* free result set */
$result->close();}

		?>



  </div>
  <div id="bottom">
	Copyright <a style="color: black; text-decoration: none; "href="http://www.azadkaratas.com" target="_blank">@Azad Karataş</a>
  </div>

