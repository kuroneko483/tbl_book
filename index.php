<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM tbl_books ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
	<style>
	<td>
	</td>
	</style>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Book Title</td>
		<td>Category</td>
		<td>Author</td>
		<td>Publisher</td>
		<td>Year Published</td>
		<td>Date</td>
		<td>Edit/Delete</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['btitle']."</td>";
		echo "<td>".$row['cat']."</td>";
		echo "<td>".$row['auth']."</td>";
		echo "<td>".$row['pub']."</td>";
		echo "<td>".$row['yearpub']."</td>";	
		echo "<td>".$row['date']."</td>";
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
