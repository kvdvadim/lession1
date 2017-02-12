<?php include 'connect.php';?>  
<?php include 'new.php';?> 

<?php 
 
    if (isset($_POST['add_Citizership'])){
 if(isset($_POST['Citizership'])) {$Citizership=$_POST['Citizership']; if ($Citizership=='') {unset($Citizership);} }
if (!empty($Citizership) ){
$mys=$mysqli->query("INSERT INTO  citizenship (Citizenship) VALUES ('$Citizership')");  
if ( $mys=='true') {
		echo "Рядок добавлений!";            }
		else {
			echo "error";
		} }}

  if (isset($_POST['add_genre'])){
if(isset($_POST['genre'])) {$genre=$_POST['genre']; if ($genre=='') {unset($genre);} }
if (!empty($genre)){
$mys=$mysqli->query("INSERT INTO  genre (genre) VALUES ('$genre')");
		 
if ( $mys=='true') {
		echo "Рядок добавлений!";            }
		else {
			echo "error";}
}}
 
 if(isset($_POST['add_director'])) { 
     if(isset($_POST['director'])) {$director=$_POST['director']; if ($director=='') {unset($director);} }
      if(isset($_POST['Citizenship_'])) {$Citizenship_=$_POST['Citizenship_']; if ($Citizenship_=='') {unset($Citizenship_);} }
      if(isset($_POST['Date_Byrthday'])) {$Date_Byrthday=$_POST['Date_Byrthday']; if ($Date_Byrthday=='') {unset($Date_Byrthday);} }
      if(isset($_POST['$Date_Death'])) {$Date_Death=$_POST['$Date_Death']; if ($Date_Death=='') {unset($Date_Death);} }
     if (!empty($director) && (!empty($Date_Byrthday)) ){
 $mys=$mysqli->query("INSERT INTO  director (Director_name, Date_Birthday, Date_Death, id_Citizenship ) VALUES ('$director','$Date_Byrthday','$Date_Death','$Citizenship_')");
			if ($mys=='true') {
			echo "Рядок добавлений!";            }
			else {echo "error";}
	}	}

 if(isset($_POST['add_country'])) { 
  if(isset($_POST['country'])) {$country=$_POST['country']; if ($country=='') {unset($country);} }
if (!empty($country)){
$mys=$mysqli->query("INSERT INTO  country (country) VALUES ('$country')");
  if ($mys=='true') {
			echo "Рядок добавлений!";            }
			else {echo "error";}
}}

if(isset($_POST['add_city'])) { 
if(isset($_POST['city'])) {$city=$_POST['city']; if ($city=='') {unset($city);} }
if(isset($_POST['house'])) {$house=$_POST['house']; if ($house=='') {unset($house);} }
if(isset($_POST['street'])) {$street=$_POST['street']; if ($street=='') {unset($street);} }
if(isset($_POST['posts'])) {$posts=$_POST['posts']; if ($posts=='') {unset($posts);} }
  		 
if (!empty($city) && !empty($house)&& !empty($street)&& !empty($posts)){
$mys=$mysqli->query("INSERT INTO  city (city, house,street, posts) VALUES ('$city','$house','$street','$posts')");
if ($mys=='true') {
			echo "Рядок добавлений!";            }
			else {echo "error";}
}}

if(isset($_POST['add_studio'])) { 
    if(isset($_POST['studio_name'])) {$studio_name=$_POST['studio_name']; if ($studio_name=='') {unset($studio_name);} }
     if(isset($_POST['city_'])) {$city_=$_POST['city_']; if ($city_=='') {unset($city_);} }
if(isset($_POST['country_'])) {$country_=$_POST['country_']; if ($country_=='') {unset($country_);} }
    if(isset($_POST['PRmanag'])) {$PRmanag=$_POST['PRmanag']; if ($PRmanag=='') {unset($PRmanag);} }
if (!empty($studio_name) && (!empty($studio_name))&& (!empty($PRmanag))&& (!empty($city_))){
$mys=$mysqli->query("INSERT INTO  studio (Studio_name,id_country,id_manager,id_city) VALUES ('$studio_name','$country_','$PRmanag','$city_')");
    if ($mys=='true') {
			echo "Рядок добавлений!";            }
			else {echo "error";}
    }}


if(isset($_POST['add_movie'])) {    
        if(isset($_POST['director'])) {$director=$_POST['director']; if ($director=='') {unset($director);} }
if(isset($_POST['name_movie'])) {$name_movie=$_POST['name_movie']; if ($name_movie=='') {unset($name_movie);} }
    if(isset($_POST['genre'])) {$genre=$_POST['genre']; if ($genre=='') {unset($genre);} }
if(isset($_POST['duration'])) {$duration=$_POST['duration']; if ($duration=='') {unset($duration);} }	
	if(isset($_POST['Budget'])) {$Budget=$_POST['Budget']; if ($Budget=='') {unset($Budget);} }	

    if(isset($_POST['Production_year'])) {$Production_year=$_POST['Production_year']; if ($Production_year=='') {unset($Production_year);} }

	if(isset($_POST['studio'])) {$studio=$_POST['studio']; if ($studio=='') {unset($studio);} }

	if(isset($_POST['Prokat_Year'])) {$Prokat_Year=$_POST['Prokat_Year']; if ($Prokat_Year=='') {unset($Prokat_Year);} }
    if (!empty($director) && (!empty($name_movie))&& (!empty($genre))&& (!empty($duration))&& (!empty($Budget)) && (!empty($Production_year)) && (!empty($studio))&& (!empty($Prokat_Year))){
$mys=$mysqli->query("INSERT INTO  movies (id_director,movie_name,id_Genre,Duration,Budget,Production_year,id_studio,Prokat_Year) VALUES ('$director','$name_movie','$genre','$duration','$Budget','$Production_year','$studio','$Prokat_Year' )");
         if ($mys=='true') {
			echo "Рядок добавлений!";            }
			else {echo "error";}
}
}


if (isset($_POST['movies'])) {$movies = $_POST['movies']; if ($movies=='') {unset($movies);} }
	if (isset($_POST['studios'])) {$studios = $_POST['studios']; if ($studios=='') {unset($studios);} }
	if (isset($_POST['directors'])) {$directors = $_POST['directors']; if ($directors=='') {unset($directors);} }
	if(isset($movies)){   
		$del_movie=$mysqli->query("DELETE FROM movies WHERE movie_id='$movies'");    
        if ($del_movie) {echo 'Рядок успішно видалений1';}        		
    }
        if (isset($studios)){
		$del_studio=$mysqli->query("DELETE FROM studio WHERE studio_id='$studios'");    
        if ($del_studio) {echo 'Рядок успішно видалений2';}  
        }
if (isset($directors)){
$del_dir=$mysqli->query("DELETE FROM director WHERE director_id='$directors'"); 
		if ($del_dir) {echo 'Рядок успішно видалений3';}        		 
	}	
 
if(isset($_POST['show'])) {$show=$_POST['show']; if ($show=='') {unset($show);} }	 
	if ($show==1)  : ?>
		<table class='table'>
			 <thead>
    <tr> <form action='' method='post'>
        <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Назва фільму</b></button></th>
		 <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Тривалість</b></button></th>
		 <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Дата видання</b></button></th>
      </form>
    </tr>    
                 <?php foreach ($movis as $row) :?>                
			
  <tr><td><?php echo $row['movie_name'];?></td><td><?php echo $row['Duration'];?></td> <td><?php echo $row['Production_year'];?></td></tr></thead>
		<?php endforeach;  ?>
<?php endif; ?>
	
<?php
            if(isset($_POST['show'])) {$show=$_POST['show']; if ($show=='') {unset($show);} }	 
             if ($show==2) {
		$result= ("SELECT director.director_name, director.director_id, director.Date_Birthday,citizenship.Citizenship
		FROM  director,citizenship WHERE citizenship.id_Citizenship=director.id_Citizenship"); 
        $result=$mysqli->query($result); 
            ?>    
		
       <table class='table'>
			 <thead>
    <tr>
			 <form action='' method='post'>
        <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>ПІБ рижесера</b></button></th>
		 <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Дата народження</b></button></th>
		 <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Громадянство</b></button></th>
      </form>
    </tr>  
     <?php                   
                 while ($myrow=$result->fetch_assoc()) : ?>
		 <tr><td>               
         <?php echo $myrow["director_name"] ?>
         </td><td>
         <?php echo $myrow["Date_Birthday"] ?>
         </td><td>
         <?php echo $myrow["Citizenship"] ?>
         </td></tr></thead>
		 <?php endwhile; ?>
		    <?php $mas[]=$myrow; ?>
		<?php } ?>
           
        <?php
		if ($show==3){
			$result= ("SELECT studio.studio_name, country.country,city.city,city.street, city.house, city.posts,
            studio.id_manager	FROM studio, country,city WHERE country.country_id=studio.id_country AND
            studio.id_city=city.city_id");
             $result=$mysqli->query($result); ?>
		
             <table class='table'>
			 <thead>
    <tr>
			 <form action='' method='post'>
        <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Назва студії</b></button></th>
		 <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Країна</b></button></th>
		 <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Місто</b></button></th>
          <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Вулиця</b></button></th>
           <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Індекс</b></button></th>
            <th> <button  type='submit'  value='1' class='btn btn-info btn-block'><b>Контактна особа</b></button></th>
        
        
      </form>
    </tr> 
                 <?php 	 while ($myrow=$result->fetch_assoc()) : ?>
			
				 <p><tr><td><?php echo $myrow["studio_name"]; ?></td><td><?php echo $myrow["country"]; ?></td><td><?php echo $myrow["city"];?></td><td><?php echo $myrow["street"];?></td> <td><?php echo $myrow["posts"]; ?></td><td><?php echo $myrow["id_manager"];?></td></tr></thead></p>    
			<?php endwhile; }?>
			
 	<?php
	
if(isset($_POST['movies_show'])) {$movies_show=$_POST['movies_show']; if ($movies_show=='') {unset($movies_show);} }  
		if(isset($_POST['showSort'])) {$showSort=$_POST['showSort']; if ($showSort=='') {unset($showSort);} }  
		if(isset($movies_show) && ($showSort==1)){
			$result=("SELECT  movies.id_genre, movies.duration, movies.budget, movies.id_studio, movies.movie_name, director.director_name, studio.studio_name FROM movies,director,studio WHERE   director.director_id='$movies_show' ORDER BY movies.movie_name ASC");
            $result=$mysqli->query($result); ?>
            
			<table cellpadding='4' cellspacing='0'><tr><td>Режисер</td><td>Назва фільму</td><td>Жанр</td><td>Тривалість</td><td>Бюджет</td><td>Студія</td></tr></table>
           <?php
			  

if ($result->num_rows > 0) {    
    while($myrow = $result->fetch_assoc()) :?>
<table cellpadding='4' cellspacing='0'> 
<tr><td><?php echo $myrow["director_name"];?></td><td><?php echo $myrow["movie_name"];?></td><td><?php echo $myrow["genre"];?></td><td><?php echo $myrow["duration"];?></td><td><?php echo $myrow["budget"];?></td><td><?php echo $myrow["studio_name"];?></td></tr></table>
    <?php endwhile; ?>
        <?php   
 $mas[]=$myrow;
} 
           else {
    echo "Відсутні записи";
} }
 
		 //endif
if(isset($movies_show) && ($showSort==2)){
			$result=("SELECT  movies.id_genre, movies.duration, movies.budget, movies.id_studio, movies.movie_name, director.director_name, studio.studio_name FROM movies,director,studio WHERE   director.director_id='$movies_show' ORDER BY movies.movie_name DESC");
			$result=$mysqli->query($result); ?>
           
    <table cellpadding='4' cellspacing='0'><tr><td>Режисер</td><td>Назва фільму</td><td>Жанр</td><td>Тривалість</td><td>Бюджет</td><td>Студія</td></tr></table>
			
           <?php 
if ($result->num_rows > 0) {    
    while($myrow = $result->fetch_assoc())  :?>
  <table cellpadding='4' cellspacing='0'> 
<tr><td><?php echo $myrow["director_name"];?></td><td><?php echo $myrow["movie_name"];?></td><td><?php echo $myrow["genre"];?></td><td><?php echo $myrow["duration"]?></td><td><?php echo $myrow["budget"];?></td><td><?php echo $myrow["studio_name"];?> </td></tr></table>
    <?php endwhile;  ?>
           
          <?php 
           
 $mas[]=$row;
} else {
    echo "Відсутні записи";
} }
		


if(isset($_POST['find'])) {$find=$_POST['find_studios']; if ($find_studios=='') {unset($find_studios);} }  if(isset($_POST['find_studios'])) {$find=$_POST['find']; if ($find=='') {unset($find);} }  
		if(isset($find)){
			$result=("SELECT director.director_id,director.director_name FROM director WHERE director_name LIKE  '%$find%'");
            $result=$mysqli->query($result);
            while ($myrow=$result->fetch_assoc()) : ?>
			
			
            
				<p>
				<?php echo $myrow["director_id"];?>
                    <?php echo $myrow["director_name"];?>
				</p> 
			<?php endwhile; } ?>
        
			
		<?php
		
		if(isset($_POST['find_studios'])) {$find_studios=$_POST['find_studios']; if ($find_studios=='') {unset($find_studios);} }  
		if(isset($find_studios)){
			$result=("SELECT studio.studio_id,studio.studio_name FROM studio WHERE studio_name LIKE  '%$find_studios%'");
			$result=$mysqli->query($result);
            while ($myrow=$result->fetch_assoc()) : ?>
			<p>
				<?php echo $myrow["studio_id"];?>
                    <?php echo $myrow["studio_name"];?>
				</p> 
			<?php endwhile;  ?>
				 <?php } ?>
		<?php
		
if(isset($_POST['find_movie'])) {$find_movie=$_POST['find_movie']; if ($find_movie=='') {unset($find_movie);} }  
		if(isset($find_movie)){
$result=("SELECT  movie_name FROM movies WHERE movie_name LIKE  '%$find_movie%' ");
          
             $result=$mysqli->query($result);
			while ($myrow=$result->fetch_assoc())   :?>
		<p>
				<?php echo $myrow["movie_id"];?>
                    <?php echo $myrow["movie_name"];?>
				</p> 
			<?php endwhile;  ?>
				 <?php } ?>
            
