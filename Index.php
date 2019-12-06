<?php

//include'css/style.css';
include('config.php');
include('function.php');
$id = null;
$term = get('search-term');
if (!empty($_GET['id'])) {
	$id = get('id');
	$events = searchEvents1($term, $id ,$database);
}
else{
	$events = searchEvents($term, $database);
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Visit Nepal 2020</title>
	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}
		li {
			float: left;
		}
		
		li a{
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
		li a:hover {
			background-color: #111;
		}
		
		.grid-container {
			display: grid;
			grid-template-columns: auto auto auto auto;
			grid-gap: 10px;
			background-color: #333;
			padding: 10px;
		}

		.grid-container > div {
			background-color: #d3d3d3;
			text-align: center;
			padding: 10px 0;
			font-size: 30px;
		}
		a{
			display: block;
			color: #111;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			
		}
		a:hover {
			background-color: #d3d3d3;
		}
		.add a{
			background-color: #9370DB;
		}
		.link a{
			background-color: #9370DB;
		}
			
	</style>
		

	

</head>
<body>
<div class = "them-main">
	<header class="theme-header position-relative">
		<div class="container">
			<div class="row">
				<div>
					<div class = "navbar">
						
						<ul>
							<li><a href="http://csweb.hh.nku.edu/csc301/bhandaris2/Assignment/index.php">Visit Nepal 2020</a>
							<img src="ProjectPic/Logo.jpg" height="60" width="150" alt"Mountain"></li>
							<li><a href="http://csweb.hh.nku.edu/csc301/bhandaris2/Assignment/index.php?id=2">Mountains</a>
							<img src="ProjectPic/images.jpg" height="60" width="150" alt"Mountain"></li> 
							<li><a href="http://csweb.hh.nku.edu/csc301/bhandaris2/Assignment/index.php?id=1">Places</a>
							<img src="ProjectPic/Nepal.jpg" height="60" width="150" alt"Mountain"></li>
							<li><a href="http://csweb.hh.nku.edu/csc301/bhandaris2/Assignment/index.php?id=3">Foods</a>
							<img src="ProjectPic/Momo.jpg" height="60" width="150" alt"Mountain"></li>
							
							
							<li style="float:right; margin: 12px 0px 0px 0px;">
								<form method="GET">
									<input type="text" name="search-term" placeholder="Search..." />
									<input type="submit" />
									
								</form>
							</li>
							
						
							
							
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</header>
</div>
<div class="container page">
	<div class="row">
		<div class = "grid-container">
		<?php foreach($events as $event) : ?>
			<div class="events">
				
				Name: 
				<?php echo $event['name']; ?><br />
				Category: 
				<?php echo $event['category']; ?><br/>
				Speciality: 
				<?php echo $event['speciality']; ?><br/>
				Weather: 
				<?php echo $event['weather']; ?><br/>
				Popularity: 
				<?php echo $event['popularity']; ?><br/>
				Success Rate:
				<?php echo $event['success_rate']; ?><br/>
				<a href="form.php?action=edit&id=<?php echo $event['ID'] ?>">Edit event</a><br />
			</div>
		<?php endforeach; ?>
		
		</div>
	</div>
	
	<div class= "add">
		<a href="form.php?action=add">Add Event</a><br />
	</div>
	<div class="pic">
	<?php if($id == 1): ?>
		<img src ="ProjectPic/mountain.jpg" class="img-fluid" width= "1080px" alt="Everest">
	<?php elseif($id == 2): ?>
		<img src ="ProjectPic/Everest.jpg" class="img-fluid" width= "1000px" alt="Everest">
	<?php elseif($id == 3): ?>
		<img src ="ProjectPic/food.jpg" class="img-fluid" width= "1000px" alt="Everest">
	<?php else: ?>
		<img src ="ProjectPic/logo1.svg" class="img-fluid" width= "1000px" alt="Nepal 2020">
	<?php endif ?>
	</div>
	
	<footer>
                        
                        <div class="link">
                            <p><a href="https://travel.state.gov/content/travel/en/traveladvisories/traveladvisories/nepal-travel-advis">Travel Guide</a></p>
                        </div>
                        
                    
                    <p style="text-align: center">Copyright &copy; Sagar Bhandari</p>
    </footer>
	
	
</div>
</body>

