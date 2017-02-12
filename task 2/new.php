	<?php 
	function country()
{ 
      $results=array();
include "connect.php";    
  $result=$mysqli->query("SELECT * from country");
						$myrow=$result->fetch_assoc();
						do { 
                                $results[]=$myrow;
						}
					while ($myrow=$result->fetch_assoc());                
    	 return($results);			 
}	
$country=country();

function director()
{  
include "connect.php";    
  $result=$mysqli->query("SELECT director_id, Director_name from director");
						$myrow=$result->fetch_assoc();
						do {  
							     $results[]=$myrow;
						}
					while ($myrow=$result->fetch_assoc());  
    return ($results);
}
$director=director();
function movis()
{ 
      $results=array();
include "connect.php";    
  $result=$mysqli->query("SELECT * from movies");
						$myrow=$result->fetch_assoc();
						do { 
                                $results[]=$myrow;
						}
					while ($myrow=$result->fetch_assoc());                
    	 return($results);			 
}
$movis=movis();
function studios()
{ 
      $results=array();
include "connect.php";    
  $result=$mysqli->query("SELECT * from studio");
						$myrow=$result->fetch_assoc();
						do { 
                                $results[]=$myrow;
						}
					while ($myrow=$result->fetch_assoc());                
    	 return($results);			 
}

$studios=studios();
function genre()
{ 
      $results=array();
include "connect.php";    
  $result=$mysqli->query("SELECT * from genre");
						$myrow=$result->fetch_assoc();
						do { 
                                $results[]=$myrow;
						}
					while ($myrow=$result->fetch_assoc());                
    	 return($results);			 
}

$genre=genre();
function Citizenship()
{ 
      $results=array();
include "connect.php";    
  $result=$mysqli->query("SELECT * from citizenship");
						$myrow=$result->fetch_assoc();
						do { 
                                $results[]=$myrow;
						}
					while ($myrow=$result->fetch_assoc());                
    	 return($results);			 
}

$Citizenship=Citizenship();
function city()
{ 
      $results=array();
include "connect.php";    
  $result=$mysqli->query("SELECT * from city");
						$myrow=$result->fetch_assoc();
						do { 
                                $results[]=$myrow;
						}
					while ($myrow=$result->fetch_assoc());                
    	 return($results);			 
}
$city=city();




?>	
