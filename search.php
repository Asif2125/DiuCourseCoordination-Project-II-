<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 20px;
  text-align: center;
}

h4 {text-align: center;}





body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}


</style>

<body>

<div class="center">
  <p> <h1> Search Subject With Course Code. </h1></p>
</div>

  <h4>Enter Your Subject</h4>

<form class="example" method="post"  style="margin:auto;max-width:300px">

  <input type="text" placeholder="Search.." name="search">
  <button type="submit" name="submit"><i class="fa fa-search"></i></button>
</form>
<!--
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
	-->
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=CodeFlix",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE code = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Course Code</th>
				<th>Course Title</th>
				<th>Available Batch</th>
				<th>Active Students</th>
				<th>Teacher</th>
			</tr>
			<tr>
				<td><?php echo $row->code; ?></td>
				<td><?php echo $row->title;?></td>
				<td><?php echo $row->batch; ?></td>
				<td><?php echo $row->students;?></td>
				<td><?php echo $row->teacher;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Subject Does not exist";

		}


}

?>