<?php include 'new.php';?>
<html lang="en">
	<head>
		
		<meta charset="UTF-8">
		<title>Movie</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		
	</head>
	<body>
		
		<div class="container">
			
			<div class="col-md-12 logo">
				<center><a href="index.php"><img src="img/logo.png" alt="SOFT GROUP"></a></center>
			</div>
			
			<div class="col-md-12 adding">
				<ul class="nav nav-tabs" id="myTab">
					<li><a data-toggle="tab" href="#home">Жанр</a></li>
					<li><a data-toggle="tab" href="#menu1">Режисер</a></li>
					<li><a data-toggle="tab" href="#menu2">Країна</a></li>
					<li><a data-toggle="tab" href="#menu3">Студія</a></li>
					<li><a data-toggle="tab" href="#menu4">Фільм</a></li>
					<li><a data-toggle="tab" href="#menu5">Вивід фільмів</a></li>
					<li><a data-toggle="tab" href="#menu6">Пошук</a></li>
					<li><a data-toggle="tab" href="#menu7">Сортування</a></li>
					<li><a data-toggle="tab" href="#menu8">Видалення</a></li>
				</ul>
				<div class="tab-content">	  
					<div id="home" class="tab-pane fade">  				 		
						<div class="form-group">
							<table class="table">   
								<tr>      
									<form  action="add.php" method="post">
									<td><input class="form-control" style="width:20%" type="text" name="genre" placeholder="жанр"></td> </tr>
									<br> 
									<tr><td>	<button type="submit" style="width:20%" name="add_genre"   class="btn btn-info btn-block"><b>Додати жанр</b></button></td></tr>
								</form>
								</table>
								</div>
								</div>  
								<div id="menu1" class="tab-pane fade">
								<div class="form-group">
								<table class="table">
								<thead> 								
								<div class="form-group">   
								<form  action="add.php" method="post">
								<tr> 
								<td><input class="form-control"   type="text" name="director" placeholder="ПІБ режисера" /> </td>
								<td><input class="form-control"   type="date" name="Date_Byrthday" placeholder="Дата народження"/> </td>
								<td><input class="form-control"  type="date" name="Date_Death" placeholder="Дата смерті"/></td>
								<td><select class="form-control"   id="Citizenship_" name="Citizenship_">
								<option class="form-control" >Виберіть країну</option>                
								<?php if (is_array($Citizenship) && count($Citizenship)) :?>
								<?php foreach ($Citizenship as $row) :?>                    
								<option class="form-control"  value='<?php echo $row['id_Citizenship'] ?>'><?php echo $row['Citizenship'] ?></option>                    
								<?php endforeach; ?>
								<?php endif; ?>                   
								</select></td>
								</tr>
								<tr><td>
								<button type="submit" style="width:100%" name="add_director" class="btn btn-info btn-block"><b>Додати режисера</b></button></td></tr>			  
								</form>
								</div>								
								</thead>
								</table>
								</div>
								</div>
								<div id="menu2" class="tab-pane fade">
								<div class="form-group">  
								
								<h2>Додати країну:</h2>				
								
								<form action="add.php" method="post">
								<input class="form-control" style="width:20%"  type="text" name="country" placeholder="країни"> 
								<br> 				
								<button type="submit" style="width:20%" name="add_country" class="btn btn-info btn-block"><b>Додати</b></button>				  
								</form>
								
								</div>
								</div>
								
								<div id="menu3" class="tab-pane fade">
								<div class="form-group"> 
								<h2>Додати студію:</h2>				
								<table class="table">
								<thead>
								<tr> 
								<form action="add.php" method="post">
								<td><input  class="form-control"   type="text" name="studio_name" placeholder="назва студії"> </td>
								<td>    <select class="form-control"    id="country_" name="country_">
								<option class="special">Виберіть країну</option>                
								<?php if (is_array($country) && count($country)) :?>
								<?php foreach ($country as $row) :?>                    
								<option class="special" value='<?php echo $row['country_id']; ?>'><?php echo $row['country']; ?></option>                    
								<?php endforeach; ?>
								<?php endif; ?>                   
								</select></td>
								<td><select class="form-control"  id="city_" name="city_">
								<option>Виберіть місто</option>                
								<?php if (is_array($city) && count($city)) :?>
								<?php foreach ($city as $row) :?>                    
								<option value='<?php echo $row['city_id'] ;?>'><?php echo $row['city']; ?></option>                    
								<?php endforeach; ?>
								<?php endif; ?>                   
								</select></td>
								<!--				<input type="text" name="street" placeholder="вулиця"> -->
								<td><input class="form-control"   type="text" name="PRmanag" placeholder="контактна особа"> </td></tr>
								
								<tr><td>
								<button type="submit"  class="btn btn-info btn-block" name="add_studio" >додати</button></td></tr>
								</form>
								
								</thead>
								</table>
								</div> 
								</div>
								
								<div id="menu4" class="tab-pane fade">
								<div class="form-group"> 
								
								<h2>Додати фільм:</h2>				
								<table class="table">
								<thead>
								<tr>
								<form class="" action="" method="post">
								<th style="width:20%"><button type="submit" name="sort-column" value="1" class="btn btn-info btn-block"><b>Режисер</b></button></th>
								<th style="width:20%"><button type="submit" name="sort-column" value="2" class="btn btn-info btn-block"><b>назва філма</b></button></th>
								<th style="width:20%"><button type="submit" name="sort-column" value="3" class="btn btn-info btn-block"><b>Жанр</b></button></th>
								<th style="width:10%"><button type="submit" name="sort-column" value="4" class="btn btn-info btn-block"><b>Тривалість</b></button></th>
								<th style="width:10%"><button type="submit" name="sort-column" value="5" class="btn btn-info btn-block"><b>Бюджет</b></button></th>
								<th style="width:5%"><button type="submit" name="sort-column" value="6" class="btn btn-info btn-block"><b>рік видання</b></button></th>
								<th style="width:20%"><button type="submit" name="sort-column" value="7" class="btn btn-info btn-block"><b>Студія</b></button></th>
								<th style="width:5%"><button type="submit" name="sort-column" value="8" class="btn btn-info btn-block"><b>В прокаті</b></button></th>        
								</form>
								</tr>
								</thead>
								<tbody>
								<tr>
								<form   action="add.php" method="post">
								<tr>
								<td><select class="form-control"  id="director" name="director">
								<option>Виберіть рижесера</option>                
								<?php if (is_array($director) && count($director)) :?>
								<?php foreach ($director as $row) :?>                    
								<option value='<?php echo $row['director_id'];?>'><?php echo $row['Director_name'] ;?></option>                    
								<?php endforeach; ?>
								<?php endif; ?>                   
								</select></td>
								
								<td> <input class="form-control" type="text" name="name_movie" placeholder="назва фільма">  </td>
								<td>      <select class="form-control"  id="genre" name="genre">
								<option>Виберіть жанр</option>                
								<?php if (is_array($genre) && count($genre)) :?>
								<?php foreach ($genre as $row) :?>                    
								<option value='<?php echo $row['genre_id'] ;?>'><?php echo $row['genre']; ?></option>                    
								<?php endforeach; ?>
								<?php endif; ?>  
								</select> </td>
								<td>  <input class="form-control " type="text" name="duration" placeholder="тривалість">  </td>
								<td><input class="form-control " type="text" name="Budget" placeholder="бюджет">  </td>
								<td> <input class="form-control" type="date" name="Production_year" placeholder="рік видання">  </td>
								
								
								<td><select  class="form-control"  id="studio" name="studio">
								<option>Виберіть студію</option>                
								<?php if (is_array($studios) && count($studios)) :?>
								<?php foreach ($studios as $row) :?>                    
								<option value='<?php echo $row['studio_id'] ;?>'><?php echo $row['Studio_name']; ?></option>                    
								<?php endforeach; ?>
								<?php endif; ?>                   
								</select> </td>
								<td><input class="form-control" type="date" name="Prokat_Year" placeholder="в прокаті">  </td>
								<br>			 
								</tr>
								<tr>
								<td><button type="submit"  style="width:100%"  class="btn btn-info btn-block" name="add_movie" >додати</button><br>  </td>
								</tr>
								</form>
								</tr>
								</tbody>
								</thead>
								</table>
								</div>
								
								</div>
								
								<div id="menu5" class="tab-pane fade">
								<div class="form-group"> 
								
								<h2>Вивід фільм:</h2>				
								<table class="table">
								<thead>
								<tr>
								<form class="" action="" method="post">
								<th style="width:20%"><button type="submit" name="sort-column" value="1" class="btn btn-info btn-block"><b>Режисер</b></button></th>
								<th style="width:20%"><button type="submit" name="sort-column" value="2" class="btn btn-info btn-block"><b>назва філма</b></button></th>
								<th style="width:20%"><button type="submit" name="sort-column" value="3" class="btn btn-info btn-block"><b>Жанр</b></button></th>              
								</form>
								</tr>
								</thead>
								<tbody>		
								<tr>
								<td><select class="form-control"  name="show" id="show">  
								<option value="0">Виберіть категорію</option>  
								<option value="1">Вивід фільмів</option>  
								<option value="2">Вивід рижесерів</option>  
								<option value="3">Вивід студій</option>  
								</select></td></tr>
								<tr><td><div id="output_shows"></div> </td></tr> 	
								<tr><td><button type="submit"  style="width:100%" id="show_category"   class="btn btn-info btn-block" name="show_category" >Показати</button><br>  </td></tr>  
								</tbody>
								</table>   
								</div>
								</div>
								
								
								
								<div id="menu6" class="tab-pane fade">
								<div class="form-group"> 
								<h2>пошук по частині фільма, рижесера, студії:</h2>				
								<table class="table">
								<thead>
								<tr>
								<form class="" action="" method="post">
								<th style="width:20%"><button type="submit" name="sort-column" value="1" class="btn btn-info btn-block"><b>Режисеру</b></button></th>
								<th style="width:20%"><button type="submit" name="sort-column" value="2" class="btn btn-info btn-block"><b>Студії</b></button></th>
								<th style="width:20%"><button type="submit" name="sort-column" value="3" class="btn btn-info btn-block"><b>Фільму</b></button></th>              
								</form>
								</tr>
								</thead>
								<tbody>		
								<tr>
								
								<td><input class="form-control " type="text" name="find" id="find" placeholder="Режисеру"></td>
								<td><input class="form-control " type="text" name="find_studios" id="find_studios" placeholder="Студії"></td>
								<td><input class="form-control " type="text" name="find_movie" id="find_movie" placeholder="Фільму"></td>			 		 	 
								</tr>
								<tr><td><div id="output_find"></div> </td></tr> 	
								<tr><td><button type="submit"  style="width:100%" id="finds"   class="btn btn-info btn-block" name="show_category" >Показати</button><br>  </td></tr>     
								
								</tbody>
								</table>   
								</div>
								</div>
								
								
								
								<div id="menu7" class="tab-pane fade">
								<div class="form-group">
								
								<h2>пошук рижесера з можливістю сортування:</h2>				
								<table class="table">
								<thead>
								<tr>
								<form class="" action="" method="post">
								<th style="width:20%"><button type="submit" name="sort-column" value="1" class="btn btn-info btn-block"><b>Режисеру</b></button></th>
								
								<th style="width:20%"><button type="submit" name="sort-column" value="3" class="btn btn-info btn-block"><b>Фільму</b></button></th>              
								</form>
								</tr>
								</thead>
								<tbody>		
								<tr>
								
								<td>	<select class="form-control"  name="showDirector" id="showDirector">         <option>Виберіть директора</option>                
								<?php if (is_array($director) && count($director)) :?>
								<?php foreach ($director as $row) :?>                    
								<option value='<?php echo $row['director_id'] ?>'><?php echo $row['Director_name'] ?></option>                    
								<?php endforeach; ?>
								<?php endif; ?>                   
								
								</select></td>
								
								<td>	<select class="form-control" name="showSort" id="showSort">  
								<option value="">Сортування</option> 
								<option value="1">ASC</option> 
								<option value="2">DESC</option>   
								</select></td>			 		 	 
								</tr>
								<tr><td>	<div id="output_find_movie"></div> </td></tr> 	
								<tr><td><button type="submit"  style="width:100%" id="findDirector"   class="btn btn-info btn-block" name="findDirector" >Показати</button><br>  </td></tr>     
								
								</tbody>
								</table>   
								
								
								</div>
								</div>
								
								
								
								<div id="menu8" class="tab-pane fade">
								
								<div class="form-group">
								
								<h2>Видалення:</h2>				
								<table class="table">
								<thead>
								<tr>
								<form class="" action="" method="post">
								<th style="width:20%"><button type="submit" name="sort-column" value="1" class="btn btn-info btn-block"><b>Видалити студію</b></button></th>
								
								<th style="width:20%"><button type="submit" name="sort-column" value="3" class="btn btn-info btn-block"><b>Видалити режисера</b></button></th>          
								
								<th style="width:20%"><button type="submit" name="sort-column" value="3" class="btn btn-info btn-block"><b>Видалити фільм</b></button></th>    
								</form>
								</tr>
								</thead>
								<tbody>		
								<tr>
								<td> <select class="form-control" name="change_studio" id="change_studio">  
								<option value="">Видалити студію</option>  
								<?php if (is_array($studios) && count($studios)) :?>
								<?php foreach ($studios as $row) :?>
								<option value='<?php echo $row['studio_id']; ?>'><?php echo $row['Studio_name'];?>
								</option>
								<?php endforeach; ?>
								<?php endif; ?>                    
								</select>    </td>
								<td><select class="form-control" name="change_director" id="change_director">  
								<option value="">Видалити директора</option>  
								<?php if (is_array($director) && count($director)) :?>
								<?php foreach ($director as $row) :?>
								<option value='<?php echo $row['director_id']; ?>'><?php echo $row['Director_name'];?>
								</option>
								<?php endforeach; ?>
								<?php endif; ?>                    
								</select>   </td> 
								
								
								<td><select class="form-control" name="change_movie" id="change_movie">  
								<option value="">Видалити фільм</option>  
								<?php if (is_array($movis) && count($movis)) :?>
								<?php foreach ($movis as $row) :?>
								<option value='<?php echo $row['movie_id']; ?>'><?php echo $row['movie_name'];?>
								</option>
								<?php endforeach; ?>
								<?php endif; ?>                    
								</select>    </td>
								</tr>
								<tr>
								<td><button type="submit"  style="width:100%" id="delet_studio"   class="btn btn-info btn-block" name="delet_studio" >Видалити</button>           
								</td>
								<td><button type="submit"  style="width:100%" id="delet_director"   class="btn btn-info btn-block" name="delet_director" >Видалити</button>           
								</td>
								<td><button type="submit"  style="width:100%" id="delet_movie"   class="btn btn-info btn-block" name="delet_movie" >Видалити</button>            
								</td>
								</tr>
								<tr><td><div id="output_delete_studio"></div></td>
								<td><div id="output_delete_director"></div></td>
								<td><div id="output_delete"></div> </td>
								</tr>
								
								</tbody></table>
								</div>
								</div>
								</div>
								
								<!-- jQuery library -->
								
								<?php 
								//$servername='localhost';
								//$username='vadim';
								//$password=12345;
								//$dbname='task22';
								//$conn = new mysqli($servername, $username, $password, $dbname);
								//// Check connection
								//if ($conn->connect_error) {
								//    die("Connection failed: " . $conn->connect_error);
								//} 
								
								//$result= "SELECT duration FROM movies";
								//$result = $mysqli->query($result);
								//
								//if ($result->num_rows > 0) {
								//    // output data of each row
								//    while($row = $result->fetch_assoc()) {
								//        
								//        echo "id: " . $row["duration"]. "<br>";
								//    }
								// $mas[]=$row;
								//} else {
								//    echo "0 results";
								//}
								?>
								<?php include 'my_js.php';?>
								
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
								
								<!-- Latest compiled JavaScript -->
								<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
								
								
																