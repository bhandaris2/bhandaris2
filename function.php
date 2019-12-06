<?php
function searchEvents($term, $database) {
	
	$term = $term . '%';
	$sql = file_get_contents('sql/getEvents.sql');
	$params = array(
		'term' => $term
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$events = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $events;
}

function searchEvents1($term, $category_ID,$database) {
	
	$term = $term . '%';
	$sql = file_get_contents('sql/getMountains.sql');
	$params = array(
		'term' => $term,
		'category_ID'=> $category_ID
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$events = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $events;
}

function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}
?>