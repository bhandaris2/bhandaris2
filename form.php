<?php
include('config.php');
include('functions.php');
$action = $_GET['action'];
$id = get('id');
$event = null;
$category = null;
$weather = null;
$popularity = null;
$speciality = null;
$mountainHeight = null;
$success_rate = null;

if(!empty($id)) {
	$sql = file_get_contents('sql/getEvent.sql');
	$params = array(
		'ID' => $id
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$events = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$event = $events[0];
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$category = $_POST['category'];
	if($category == "Place"){
		$category_ID = 1;
	}
	else if ($category == "Mountain"){
		$category_ID = 2;
	}
	else{
		$category_ID = 3;
	}
	$weather = $_POST['weather'];
	$popularity = $_POST['popularity'];
	$speciality = $_POST['speciality'];
	$mountainHeight = $_POST['mountainHeight'];
	$success_rate = $_POST['success_rate'];
	
	if($action == 'add') {
	$sql = file_get_contents('sql/insertEvent.sql');
	$params = array(
	'name' => $name,
	'categoryID' => (int)$category_ID,
	'weather' => $weather,
	'popularity' => (int)$popularity,
	'speciality' => $speciality,
	'mtheight' => (int)$mountainHeight,
	'successRate' => (int)$success_rate
	);
	
	$statement = $database->prepare($sql);
	$statement->execute($params);
	}
	
	else if($action == 'edit') {
	$sql = file_get_contents('sql/updateEvent.sql');
	$params = array(
	'ID' => (int)$id,
	'name' => $name,
	'categoryID' => (int)$category_ID,
	'weather' => $weather,
	'popularity' => (int)$popularity,
	'speciality' => $speciality,
	'mtheight' => (int)$mountainHeight,
	'successRate' => (int)$success_rate
	);
	
	$statement = $database->prepare($sql);
	$statement->execute($params);
	}
	
	header('location: index.php');
	
}
?>



<body>
	<div class="page">
		<h1>Manage Events</h1>
		<form action="" method="POST">
			<div class="form-element">
				<label>Name:</label>
					<input type="text" name="name" class="textbox" value="<?php echo $event['name'] ?>"/>
			</div>
			<div class="form-element">
				<label>Category:</label><br />
				<?php if($event['category_ID']==1): ?>
					<input checked class="radio" type="checkbox" name="category" value="Place" /><span class="radio-label">Place</span><br />
				<?php else: ?>
					<input class="radio" type="checkbox" name="category" value="Place" /><span class="radio-label">Place</span><br />
				<?php endif; ?>
				<?php if($event['category_ID']==2): ?>
					<input checked class="radio" type="checkbox" name="category" value="Mountain" /><span class="radio-label">Mountain</span><br />
				<?php else: ?>
					<input class="radio" type="checkbox" name="category" value="Mountain" /><span class="radio-label">Mountain</span><br />
				<?php endif; ?>
				<?php if($event['category_ID']==3): ?>
					<input checked class="radio" type="checkbox" name="category" value="Food" /><span class="radio-label">Food</span><br />
				<?php else: ?>
					<input  class="radio" type="checkbox" name="category" value="Food" /><span class="radio-label">Food</span><br />
				<?php endif; ?>	
			</div>
			<div class="form-element">
				<label>Weather:</label>
				<input type="text" name="weather" class="textbox" value="<?php echo $event['weather'] ?>" />
			</div>
			<div class="form-element">
				<label>Popularity:</label>
				<input type="text" name="popularity" class="textbox" value="<?php echo $event['popularity'] ?>" />
			</div>
			<div class="form-element">
				<label>Speciality:</label>
				<input type="text" name="speciality" class="textbox" value="<?php echo $event['speciality'] ?>" />
			</div>
			<div class="form-element">
				<label>Mountain Height:</label>
				<input type="number" step="any" name="mountainHeight" class="textbox" value="<?php echo $event['mountainHeight'] ?>" />
			</div>
			<div class="form-element">
				<label>Success Rate:</label>
				<input type="number" step="any" name="success_rate" class="textbox" value="<?php echo $event['success_rate'] ?>" />
			</div>
			
			<div class="form-element">
				<input type="submit" class="button" />&nbsp;
				<input type="reset" class="button" />
			</div>
		
		</form>
		<div>
		<?php
		class Mountain {
			public $name;
				}
		$Macha = new Mountain();
		?>
		</div>
	</div>
</body>