<?php include  $_SERVER['DOCUMENT_ROOT']."/inventoryCount/includes/variables.php";  ?>

<!DOCTYPE html>
<html>
<head><title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body class="container">

<?php 
	//include 'include/dbconnect.php';
$db = new mysqli(DBLOCATION, DBUSER, DBPASS, DBNAME);
	$sql = "SELECT name,id FROM asset";
	$result = $db->query($sql);
	if(!$result = $db->query($sql)){
    		die('There was an error getting list of assets [' . $db->error . ']');
		}
	$count=0;
	while($row = $result->fetch_assoc()){
		$assets[$count]['name'] = $row['name'];
		$assets[$count]['id'] = $row['id'];
		$count++;
	}
	$result->free();
	$db->close(); 
//var_dump($assets);
?>
<div class="row">
<div class="col-lg-8">	
<?php include INC."/form.php"; ?>
</div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>