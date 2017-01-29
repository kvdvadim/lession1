<?php
	include "connect.php";
?>

<html>
    <head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	</head>
	<body>    
		<style>
			table {
			width=400px;
			}	
			td {
			width:110px;
			border:1px solid black;
			}
		</style>		
		<fieldset>            
            <legend>
				<h2>Додати:</h2>				
			</legend>
			<form action="add_video.php" method="post">
				<input type="text" name="Studio_name" placeholder="Назва студії">
				<input type="text" name="address" placeholder="адреса">
				<input type="text" name="Contact_person" placeholder="контактна особа">    
				<input type="submit" name="send_studio" value="додати"><br>
			</form>
			
			<form action="add_video.php" method="post">
				<input type="text" name="Director_name" placeholder="ПІБ режисера">
				<input type="date" name="Date_Birthday" placeholder="Date_Birthday">
				<input type="date" name="Date_Death" placeholder="Date_Death">    
				<input type="text" name="Citizenship" placeholder="Громадянство">    
				<input type="submit" name="send_director" value="додати">
			</form>
			
			<form action="" method="post">
				<select name="director" id="director">  
					<option size="10" value="">режисер</option>  
					<?php $result=$mysqli->query("SELECT * from director");
						$myrow=$result->fetch_assoc();
						do {  
							printf ("<p>
							<option value='%s'>%s</option>             
							</p> ", $myrow["director_id"], $myrow["Director_name"]);
						}
					while ($myrow=$result->fetch_assoc()); ?>                
				</select>
				<select name="studio" id="studio">  
					<option size="10" value="">фільм</option>  
					<?php $result=$mysqli->query("SELECT * from studio");
						$myrow=$result->fetch_assoc();
						do {  
							printf ("<p>
							<option value='%s'>%s</option>             
							</p> ", $myrow["studio_id"], $myrow["Studio_name"]);
						}
					while ($myrow=$result->fetch_assoc()); ?>  
				</select>
				<input type="text" id="movie_name" size="10" name="movie_name" placeholder="назва фільму">
				<input type="text" id="Genre" name="Genre" size="10" placeholder="Жанр">
				<input type="text" id="Duration" name="Duration" size="10" placeholder="Тривалість">
				<input type="text" id="Budget" name="Budget" size="10" placeholder="Бюджет">
				<input type="date" id="Production_year" name="Production_year" size="10" placeholder="Рік випуску">
				<input type="date" id="Prokat_Year" name="Prokat_Year"  placeholder="В прокаті">
				<input type="submit" name="send" id="send"  value="додати"><br>
			</form>
		</fieldset>
		<fieldset>
			<legend>				
				<h2>Видалити:</h2>				
			</legend>
			<p>Виберіть категорію  
				<select name="change_movie" id="change_movie">  
					<option value="">Видалити фільм</option>  
					<?php $result=$mysqli->query("SELECT * from movie");
						$myrow=$result->fetch_assoc();
						do {  
							printf ("<p>
							<option value='%s'>%s</option>             
							</p> ", $myrow["movie_id"], $myrow["movie_name"]);
						}
					while ($myrow=$result->fetch_assoc()); ?>  
					
					<input type="button" id="delet_movie" name="delet_movie" value="Видалити"/>
				</select>
				<div id="output_delete"></div>    
			</p>
			<p>Виберіть категорію  
				<select name="change_studio" id="change_studio">  
					<option value="">Видалити студію</option>  
					<?php $result=$mysqli->query("SELECT * from studio");
						$myrow=$result->fetch_assoc();
						do {  
							printf ("<p>
							<option value='%s'>%s</option>             
							</p> ", $myrow["studio_id"], $myrow["Studio_name"]);
						}
					while ($myrow=$result->fetch_assoc()); ?>            
					<input type="button" id="delet_studio" name="delet_studio" value="Видалити"/>
				</select>
				<div id="output_delete_studio"></div>
			</p>
			
			<p>Виберіть категорію  
				<select name="change_director" id="change_director">  
					<option value="">Видалити директора</option>  
					<?php $result=$mysqli->query("SELECT * from director");
						$myrow=$result->fetch_assoc();
						do {  
							printf ("<p>
							<option value='%s'>%s</option>             
							</p> ", $myrow["director_id"], $myrow["Director_name"]);
						}
					while ($myrow=$result->fetch_assoc()); ?>            
					<input type="button" id="delet_director" name="delet_director" value="Видалити"/>
				</select>
				<div id="output_delete_director"></div>
			</p>
		</fieldset>		
		
		<fieldset>
			<legend>				
				<h2>Вівід по фільму, рижесеру, студії:</h2>				
			</legend>
			<p>Виберіть категорію  
				<select name="show" id="show">  
					<option value="0">Виберіть категорію</option>  
					<option value="1">Вивід фільмів</option>  
					<option value="2">Вивід рижесерів</option>  
					<option value="3">Вивід студій</option>  
					
					<input type="button" id="show_category" name="show_category" value="Показати"/>
					
				</select>
				<div id="output_shows"></div>
			</p>
		</fieldset> 
		<fieldset>
			<legend>				
				<h2>пошук по частині фільма, рижесера, студії:</h2>				
			</legend>
			<form action="add_video.php" method="post">
				<input type="text" name="find" id="find" placeholder="Режисеру">
				<input type="text" name="find_studios" id="find_studios" placeholder="Студії">
				<input type="text" name="find_movie" id="find_movie" placeholder="Фільму">
				<input type="button" name="finds"  id="finds" value="Пошук">
				<div id="output_find"></div>     
			</form>
		</fieldset>
		<fieldset>
			<legend>				
				<h2>пошук рижесера з можливістю сортування:</h2>				
			</legend>
			<p>Виберіть категорію  
				<select name="showDirector" id="showDirector">  
					<option value="">Пошук по рижесеру</option>  
					<?php $result=$mysqli->query("SELECT * from director");
						$myrow=$result->fetch_assoc();
						do {  
							printf ("<p>
							<option value='%s'>%s</option>             
							</p> ", $myrow["director_id"], $myrow["Director_name"]);
						}
					while ($myrow=$result->fetch_assoc()); ?>            
					
				</select>
				<select name="showSort" id="showSort">  
					<option value="">Сортування</option> 
					<option value="1">ASC</option> 
					<option value="2">DESC</option> 
					<input type="button" id="findDirector" name="findDirector" value="знайти"/>
				</select>
				
				
				<div id="output_find_movie"></div>
			</p>
		</fieldset>
		<script>
			$(document).ready(function(){  
				$("#findDirector").click(function(){
					var showMovies=$("#showDirector").val();
					var showSorts=$("#showSort").val();
					
					$.ajax({  
						url:"add_video.php",  
						method:"POST",  
						data:{movies_show:showMovies,showSort:showSorts},  
						dataType:"html",  
						success:function(data)  
						{  
							$("#output_find_movie").html(data);  
						}
						});  
					}); 
					$("#finds").click(function(){
						var find_name=$("#find").val();
						var find_studio=$("#find_studios").val();  
						var find_movies=$("#find_movie").val();  
						
						$.ajax({  
							url:"add_video.php",  
							method:"POST",  
							data:{find:find_name,find_studios:find_studio,find_movie:find_movies},  
							dataType:"html",  
							success:function(data)  
							{  
								$("#output_find").html(data);  
							}
						});  
					}); 
					
					$("#show_category").click(function(){
						var shows=$("#show").val();                     
						$.ajax({  
							url:"add_video.php",  
							method:"POST",  
							data:{show:shows},  
							dataType:"html",  
							success:function(data)  
							{  
								$("#output_shows").html(data);  
							}
						});  
					}); 					
					$("#send").click(function(){
						var director=$("#director").val(); 
						var studio=$("#studio").val(); 
						var movie_names=$("#movie_name").val();
						var movie_Genres=$("#Genre").val();
						var movie_Durations=$("#Duration").val();
						var movie_Budgets=$("#Budget").val();
						var movie_Production_years=$("#Production_year").val();
						var movie_Prokat_Years=$("#Prokat_Year").val();
						$.ajax({  
							url:"add_video.php",  
							method:"POST",  
							data:{directors_id:director,studios_id:studio,movie_name:movie_names,Genre:movie_Genres,Duration:movie_Durations,Budget:movie_Budgets,Production_year:movie_Production_years,Prokat_Year:movie_Prokat_Years},  
							dataType:"html",  
							success:function(data)  
							{  
								$("#output_delete").html(data);  
							}
						});  
					});             
					$("#delet_movie").click(function(){
						var movie=$("#change_movie").val();           
						$.ajax({  
							url:"add_video.php",  
							method:"POST",  
							data:{movies:movie},  
							dataType:"html",  
							success:function(data)  
							{  
								$("#output_delete").html(data);  
							}
						});  
					}); 
					
					$("#delet_studio").click(function(){
						var studio=$("#change_studio").val();   
						
						$.ajax({  
							url:"add_video.php",  
							method:"POST",  
							data:{studios:studio},  
							dataType:"html",  
							success:function(data)  
							{  
								$("#output_delete_studio").html(data);  
							}
						});  
					}); 
					$("#delet_director").click(function(){
						var director=$("#change_director").val();                     
						$.ajax({  
							url:"add_video.php",  
							method:"POST",  
							data:{directors:director},  
							dataType:"html",  
							success:function(data)  
							{  
								$("#output_delete_director").html(data);  
							}
						});  
					}); 
					
				});  
			</script>
			
		</body>
	</html>	