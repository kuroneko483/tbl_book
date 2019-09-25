<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$btitle=$_POST['btitle'];
	$cat=$_POST['cat'];
	$auth=$_POST['auth'];
	$pub=$_POST['pub'];
	$yearpub=$_POST['yearpub'];	
	
	// checking empty fields
	if(empty($btitle) || empty($cat) || empty($auth) || empty($pub) || empty($yearpub)) {	
			
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
	} else {	
		//updating the table
		$sql = "UPDATE tbl_books SET btitle=:btitle, cat=:cat, auth=:auth, pub=:pub, yearpub=:yearpub WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':btitle', $btitle);
		$query->bindparam(':cat', $cat);
		$query->bindparam(':auth', $auth);
		$query->bindparam(':pub', $pub);
		$query->bindparam(':yearpub', $yearpub);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM tbl_books WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$btitle = $row['btitle'];
	$cat = $row['cat'];
	$auth = $row['auth'];
	$pub = $row['pub'];
	$yearpub = $row['yearpub'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Book Title</td>
				<td><input type="text" name="btitle" value="<?php echo $btitle;?>"></td>
			</tr>
			<tr> 
				<td>Category</td>
				<td><input type="text" name="cat" value="<?php echo $cat;?>"></td>
			</tr>
			<tr> 
				<td>Author</td>
				<td><input type="text" name="auth" value="<?php echo $auth;?>"></td>
			</tr>
			<tr> 
				<td>Publisher</td>
				<td><input type="text" name="pub" value="<?php echo $pub;?>"></td>
			</tr>
			<tr> 
				<td>Year Published</td>
				<td><input type="text" name="yearpub" value="<?php echo $yearpub;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
