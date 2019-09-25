<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$btitle = $_POST['btitle'];
	$cat = $_POST['cat'];
	$auth = $_POST['auth'];
	$pub = $_POST['pub'];
	$yearpub = $_POST['yearpub'];
		
	// checking empty fields
	if(empty($btitle) || empty($cat) || empty($auth) || empty($pub)|| empty($yearpub)) {
				
		if(empty($btitle)) {
			echo "<font color='red'>Book Title field is empty.</font><br/>";
		}
		if(empty($cat)) {
			echo "<font color='red'>Category field is empty.</font><br/>";
		}
		if(empty($auth)) {
			echo "<font color='red'>Author field is empty.</font><br/>";
		}
		
		if(empty($pub)) {
			echo "<font color='red'>Publisher field is empty.</font><br/>";
		}
		if(empty($yearpub)) {
			echo "<font color='red'>Year Published field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_books(btitle, cat, auth, pub, yearpub) VALUES(:btitle, :cat, :auth, :pub, :yearpub)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':btitle', $btitle);
		$query->bindparam(':cat', $cat);
		$query->bindparam(':auth', $auth);
		$query->bindparam(':pub', $pub);
		$query->bindparam(':yearpub', $yearpub);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
