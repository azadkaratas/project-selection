<?php
$servername = "";
$username = "";
$password = "";
$dbname="";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  ?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css" media="all" />
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<meta http-equiv="Content-Language" content="tr">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>XXX Projects</title>

	<script>
            function isValid(frm)
            {


                {
                    alert("Choose a project.");
                    return false;
                }
                return true;
            }
        </script>
</head>
<body>

  <div id="second">
  <a href="index.php"><img src="iyte_logo.png"></a>
	<p><H1>XXX Projects</H1>  </p>
  </div>


 <div id="pickingArea" style="text-align: left;"> <h2 style="color:red;"> PROJECT SELECTION STARTED. </h2>
 <ul>
  <li>Only one student in a group should select the project.</li>
  <li>You must know the student number of your project partner.</li>
  <li><a href="/checkProject.php">Click here to check your project after selection is made. </a></li>
  
 </ul>
 </div>

  <div id="pickingArea">

<form action="getProject.php" onSubmit="return isValid(this)" method="POST">
<table border="2" width="100%" cellpadding="2" cellspacing="5">

<?php

$bilgiler = "SELECT `projectName`,`projectID`,`isEmpty`,`projectCapacity` FROM `projectesTable` ORDER BY `projectID` ";
if ($result = $conn->query($bilgiler)) {

    /* fetch object array */
    while ($roww = $result->fetch_row()) {
	?>
	<tr>
		<td width="30">
		<p align="center"><?php echo $roww[1];?></td>
		<td width="44">
		<p align="center"><?php if ($roww[2]=="Bos") echo "Empty"; else echo '<span style="color:#f00;text-align:center;">Full</span>';?></td>
		<td width="100">
		<p align="center"><?php echo $roww[3];?> People</td>
		<td width="500">
		<p align="center"><?php echo $roww[0];?></td>
		<td width="30">
		<p align="center"><input type="radio" name="selectedProject" value="<?php echo $roww[1];?>"></td>
	</tr>
	<?php }

    /* free result set */
    $result->close();
}
?>
</table>

<br>
<input type="submit" value="Choose the project">
</form>

  </div>
  <div id="bottom">
	Copyright <a style="color: black; text-decoration: none; "href="http://www.azadkaratas.com" target="_blank">@Azad Karataş</a>
  </div>
