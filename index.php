<?php include  $_SERVER['DOCUMENT_ROOT']."/inventoryCount/includes/variables.php";  ?>

<!DOCTYPE html>
<html>
<head><title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style type="text/css">
table,td,tr,th{
	border:1px solid black;
}
</style>
</head>
<body class="container">

<?php 
// get the list of assets
$db = new mysqli(DBLOCATION, DBUSER, DBPASS, DBNAME);
	$sql = "SELECT name,asset.id as id,quantity as threshold FROM asset LEFT JOIN asset_quantity_threshold ON asset.id = asset_quantity_threshold.asset_id";
	$result = $db->query($sql);
	if(!$result = $db->query($sql)){
    		die('There was an error getting list of assets [' . $db->error . ']');
		}
	$count=0;
	while($row = $result->fetch_assoc()){
		$assets[$count]['name'] = $row['name'];
		$assets[$count]['id'] = $row['id'];
		$assets[$count]['threshold'] = $row['threshold'];
		$count++;
	}
	$result->free();
	$db->close(); 

//get the quantites record and the dates related to them
$db = new mysqli(DBLOCATION, DBUSER, DBPASS, DBNAME);
	$sql = "SELECT current_stock as quantity,asset_id as id,created FROM asset_quantity order by asset_id";
	$result = $db->query($sql);
	if(!$result = $db->query($sql)){
    		die('There was an error getting list of assets [' . $db->error . ']');
		}
	$count=0;
	while($row = $result->fetch_assoc()){
		$assetsQuantites[$count]['id'] = $row['id'];
		$assetsQuantites[$count]['quantity'] = $row['quantity'];
		$assetsQuantites[$count]['date'] = $row['created'];
		$count++;
	}
	$result->free();
	$db->close(); 

$db = new mysqli(DBLOCATION, DBUSER, DBPASS, DBNAME);
	$sql = "SELECT DISTINCT created FROM asset_quantity";
	$result = $db->query($sql);
	if(!$result = $db->query($sql)){
    		die('There was an error getting list of assets [' . $db->error . ']');
		}
	$count=0;
	while($row = $result->fetch_assoc()){
		$assetsQuantitesDays[$count] = $row['created'];
		$count++;
	}
	$result->free();
	$db->close(); 

	//use for deciding the number of dif dates
	$numOfDays = count($assetsQuantitesDays);

?>
<div class="row">
<div class="col-lg-8">	
<?php include INC."/table.php"; ?>
</div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>