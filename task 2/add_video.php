<?php 
	include "connect.php";	
    if(isset($_POST['directors_id'])) {$directors_id=$_POST['directors_id']; if ($directors_id=='') {unset($directors_id);} }
	if(isset($_POST['studios_id'])) {$studios_id=$_POST['studios_id']; if ($studios_id=='') {unset($studios_id);} }       
	if(isset($_POST['movie_name'])) {$movie_name=$_POST['movie_name']; if ($movie_name=='') {unset($movie_name);} }
	if(isset($_POST['Genre'])) {$Genre=$_POST['Genre']; if ($Genre=='') {unset($Genre);} }if(isset($_POST['Duration'])) {$Duration=$_POST['Duration']; if ($Duration=='') {unset($Duration);} }
	if(isset($_POST['Budget'])) {$Budget=$_POST['Budget']; if ($Budget=='') {unset($Budget);} }	
	if(isset($_POST['Production_year'])) {$Production_year=$_POST['Production_year']; if ($Production_year=='') {unset($Production_year);} }
	if(isset($_POST['Prokat_Year'])) {$Prokat_Year=$_POST['Prokat_Year']; if ($Prokat_Year=='') {unset($Prokat_Year);} }
	$zminnatema = mysql_real_escape_string($zminnatema);
	$zminnatxt = mysql_real_escape_string($zminnatxt);
	
	if (isset($movie_name) && isset($Genre) && isset($Duration) && isset($Budget) && isset($Production_year) && isset($Prokat_Year)){    
		$mys=$mysqli->query("INSERT INTO  movie (director_id, movie_name, Genre,Duration,Budget,studio_id,Production_year,Prokat_Year) VALUES ('$directors_id','$movie_name','$Genre','$Duration','$Budget', '$studios_id','$Production_year','$Prokat_Year' )");
		if ($mys=='true') {
		echo "Рядок добавлений!";            }
		else {
			echo "error";
		}
	}
	if (isset($_POST['send_studio'])){
		if(isset($_POST['Studio_name'])) {$Studio_name=$_POST['Studio_name']; if ($Studio_name=='') {unset($Studio_name);} }
		if(isset($_POST['address'])) {$address=$_POST['address']; if ($address=='') {unset($address);} }
		if(isset($_POST['Contact_person'])) {$Contact_person=$_POST['Contact_person']; if ($Contact_person=='') {unset($Contact_person);} }  
		$zminnatema = mysql_real_escape_string($zminnatema);
		$zminnatxt = mysql_real_escape_string($zminnatxt);
		
		if (isset($Studio_name) && isset($address) && isset($Contact_person)){    
			$mys=$mysqli->query("INSERT INTO  studio (Studio_name, address, Contact_person ) VALUES ('$Studio_name','$address','$Contact_person')");
			if ($mys=='true') {
			echo "Рядок добавлений!";}
			else {
				echo "error";
			}
		}		
	}	
	if (isset($_POST['send_director'])){
		if(isset($_POST['Director_name'])) {$Director_name=$_POST['Director_name']; if ($Director_name=='') {unset($Director_name);} }
		if(isset($_POST['Date_Birthday'])) {$Date_Birthday=$_POST['Date_Birthday']; if ($Date_Birthday=='') {unset($Date_Birthday);} }
		if(isset($_POST['Date_Death'])) {$Date_Death=$_POST['Date_Death']; if ($Date_Death=='') {unset($Date_Death);} }    		
		if(isset($_POST['Citizenship'])) {$Citizenship=$_POST['Citizenship']; if ($Citizenship=='') {unset($Citizenship);} 
		if (isset($Director_name) && isset($Date_Birthday) && isset($Citizenship)){    
			$mys=$mysqli->query("INSERT INTO  director (Director_name, Date_Birthday, Date_Death, Citizenship ) VALUES ('$Director_name','$Date_Birthday','$Date_Death','$Citizenship')");
			if ($mys=='true') {
			echo "Рядок добавлений!";            }
			else {
				echo "error";
			}
		}
	}	
	if (isset($_POST['movies'])) {$movies = $_POST['movies'];}
	if (isset($_POST['studios'])) {$studios = $_POST['studios'];}
	if (isset($_POST['directors'])) {$directors = $_POST['directors'];}
	if(isset($movies) or isset($studios) or isset($directors)){   
		$mys=$mysqli->query("DELETE FROM movie WHERE movie_id='$movies'");    
		$mys=$mysqli->query("DELETE FROM studio WHERE studio_id='$studios'");    
		$mys=$mysqli->query("DELETE FROM director WHERE director_id='$directors'"); 
		if ($mys=='true') {echo "Рядок успішно видалений";}        		
		else {echo "error";}
	}	
	if(isset($_POST['show'])) {$show=$_POST['show']; if ($show=='') {unset($show);} }	
	if ($show==1){    
		$result=$mysqli->query("SELECT  movie.studio_id, movie.movie_name
		FROM  movie ,  studio 
		WHERE studio.studio_id = movie.studio_id");
		$myrow=$result->fetch_assoc();
		do {  
			printf ("<p>%s %s</p> ", $myrow["studio_id"], $myrow["movie_name"]);
		}
		while ($myrow=$result->fetch_assoc());
	}
	if ($show==2){
		$result=$mysqli->query("SELECT director.director_name,director.director_id
		FROM movie, director
		WHERE director.director_id = movie.director_id");
		$myrow=$result->fetch_assoc();
		do {  
			printf ("<p>%s %s</p> ",  $myrow["director_id"], $myrow["director_name"]);
		}
		while ($myrow=$result->fetch_assoc());	
		}
		if ($show==3){
			$result=$mysqli->query("SELECT studio.studio_name
			FROM studio, movie
			WHERE studio.studio_id = movie.director_id");
			$myrow=$result->fetch_assoc();
			do {  
				printf ("<p>%s %s</p> ",  $myrow["studio_id"], $myrow["studio_name"]);
			}
			while ($myrow=$result->fetch_assoc());	
		}
		if(isset($_POST['find'])) {$find=$_POST['find_studios']; if ($find_studios=='') {unset($find_studios);} }  if(isset($_POST['find_studios'])) {$find=$_POST['find']; if ($find=='') {unset($find);} }  
		if(isset($find)){
			$result=$mysqli->query("SELECT director.director_id,director.director_name FROM director WHERE director_name LIKE  '$find%'");
			$myrow=$result->fetch_assoc();
			do {  
				printf ("<p>
				%s %s
				</p> ", $myrow["director_id"],$myrow["director_name"]);
			}
			while ($myrow=$result->fetch_assoc());	
		}
		
		if(isset($_POST['find_studios'])) {$find_studios=$_POST['find_studios']; if ($find_studios=='') {unset($find_studios);} }  
		if(isset($find_studios)){
			$result=$mysqli->query("SELECT studio.studio_id,studio.studio_name FROM studio WHERE studio_name LIKE  '$find_studios%'");
			$myrow=$result->fetch_assoc();
			do {  
				printf ("<p>
				%s %s
				</p> ", $myrow["studio_id"],$myrow["studio_name"]);
			}
			while ($myrow=$result->fetch_assoc());	
		}
		if(isset($_POST['find_movie'])) {$find_movie=$_POST['find_movie']; if ($find_movie=='') {unset($find_movie);} }  
		if(isset($find_movie)){
			$result=$mysqli->query("SELECT  movie.movie_name FROM movie WHERE movie_name LIKE  '$find_movie%'");
			$myrow=$result->fetch_assoc();
			do {  
				printf ("<p>
				%s %s
				</p> ", $myrow["movie_id"],$myrow["movie_name"]);
			}
			while ($myrow=$result->fetch_assoc());	
		}		
		if(isset($_POST['movies_show'])) {$movies_show=$_POST['movies_show']; if ($movies_show=='') {unset($movies_show);} }  
		if(isset($_POST['showSort'])) {$showSort=$_POST['showSort']; if ($showSort=='') {unset($showSort);} }  
		if(isset($movies_show) && ($showSort==1)){
			$result=$mysqli->query("SELECT  movie.genre, movie.duration, movie.budget, movie.studio_id, movie.movie_name, director.director_name, studio.studio_name FROM movie,director,studio WHERE director.director_id=movie.director_id AND movie.studio_id=studio.studio_id AND director.director_id='$movies_show' ORDER BY movie.movie_name ASC");
			$myrow=$result->fetch_assoc();
			echo "<table cellpadding='4' cellspacing='0'><tr><td>Режисер</td><td>Назва фільму</td><td>Жанр</td><td>Тривалість</td><td>Бюджет</td><td>Студія</td></tr></table>";
			do {  
				printf ("<table cellpadding='4' cellspacing='0'>  
				<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr></table>
				",  $myrow["director_name"],$myrow["movie_name"],$myrow["genre"],$myrow["duration"],$myrow["budget"],$myrow["studio_name"]);
			}
			while ($myrow=$result->fetch_assoc());	
		}
		if(isset($movies_show) && ($showSort==2)){
			$result=$mysqli->query("SELECT  movie.genre, movie.duration, movie.budget, movie.studio_id, movie.movie_name, director.director_name, studio.studio_name FROM movie,director,studio WHERE director.director_id=movie.director_id AND movie.studio_id=studio.studio_id AND director.director_id='$movies_show' ORDER BY movie.movie_name DESC");
			$myrow=$result->fetch_assoc();
			echo "<table cellpadding='4' cellspacing='0'><tr><td>Режисер</td><td>Назва фільму</td><td>Жанр</td><td>Тривалість</td><td>Бюджет</td><td>Студія</td></tr></table>";
			do {  
				printf ("<table cellpadding='4' cellspacing='0'>  
				<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr></table>
				",  $myrow["director_name"],$myrow["movie_name"],$myrow["genre"],$myrow["duration"],$myrow["budget"],$myrow["studio_name"]);
			}
			while ($myrow=$result->fetch_assoc());	
		}
	?> 		