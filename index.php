<?php  
//session_start();
    $filename=realpath(__DIR__."/test.txt");
    if (!$filename){
        exit ('File not found');    
    }  
    $open=fopen($filename,"r");  
    $contents=fread($open, filesize($filename));
    fclose($open);
   if (($_POST['send'])){   
   $addtext=$_POST['addtext'];
   //$_SESSION['addtext']=$_POST['addtext'];
//header("Location:{$_SERVER['PHP_SELF']}");
//exit;
}	


if (!empty($addtext)){
	 
	$open=fopen($filename,"a"); 

    fwrite($open, "\n".$addtext);
    fclose($open);
	
}
    //echo nl2br($contents);
    //var_dump($contents);
    //$mas=array("$contents");
     $sentences = explode ("\n", $contents);
    echo "<h2>Отримати всю інформацію із файлу і вивести її у вікно браузера. </h2><table class='table table-bordered'>
    <thead>
    <tr>
    <th>назва фільму</th>
    <th>країна, у якій створено фільм</th>
    <th>жанр</th>
    <th>рік створення</th>
    <th>бюджет фільму</th>
    <th>режисера</th>
    </tr>
    </thead> <tbody>";

    foreach ($sentences as  $key => $val) {   
        $sentences[$key] = explode (", ", $val);   
         echo "<tr>";
            foreach ($sentences[$key] as $smena)
            {
                echo "<td>".$smena."</td>";
            }
             echo "</tr>";
    }

        echo "</tbody></table>";

    echo "<form id='orderform' method='post' action='.'>   
		
        <input type='text' value='' size='100' name='addtext' onSubmit='document.orderform.reset()'>
        <input type='submit' value='Додати' name='send'>
        </form>";

    function sortByOrder($a, $b) {
        return $a['4'] - $b['4'];
    }
    usort($sentences, 'sortByOrder');

    echo "<h2>Вивести усі фільми впорядковані за зростанням бюджету </h2><table class='table table-bordered'>
    <thead>
    <tr>
    <th>назва фільму</th>
    <th>країна, у якій створено фільм</th>
    <th>жанр</th>
    <th>рік створення</th>
    <th>бюджет фільму</th>
    <th>режисера</th>
    </tr>
    </thead> <tbody>";
    foreach ($sentences as  $val) {   

        echo "<tr>";
            foreach ($val as $sort)
            {
                echo "<td>".$sort."</td>";
            }
             echo "</tr>";
    }
     echo "</tbody></table>";



    if (isset($_POST['send'])){
    $word=$_POST['word'];}
    $_POST[]=FALSE;
     echo "<h3>У форму вводиться набір символів. Вивести у вікно браузера усі фільми, назви яких містять задані символи.</h3>
	 <table class='table table-bordered'>
    <thead>
    <tr>
    <th>назва фільму</th>
    <th>країна, у якій створено фільм</th>
    <th>жанр</th>
    <th>рік створення</th>
    <th>бюджет фільму</th>
    <th>режисера</th>
    </tr>
    </thead> <tbody>";
    foreach ($sentences as $value){
        echo "<tr>";
        if(stristr($value[0],$word)){

           // $zminnamas[]=$value;
            echo "<tr>";
            foreach ($value as $smena)
            {
                echo "<td>".$smena."</td>";
            }
             echo "</tr>";
        }

   
        } 
     echo "</tbody></table>
    <form method='post' >
        <input type='text'  size='50' value='' name='word'>       
        <input type='submit' value='Пошук' name='send'>
        </form>";

    //if (isset($_POST['send'])){
    //$country1=$_POST['country'];} 
    //$country='ukraina';
    
foreach($sentences as $value){
    $masoption[]=$value[1];    
}
$duplicat=array_unique($masoption);
 

echo "<h3>Обчислити середній бюджет фільмів, що були зняті в Україні серед тих, що зустрічаються у файлі.</h3><table class='table table-bordered'>
    <thead>
    <tr>
    <th>назва фільму</th>
    <th>країна, у якій створено фільм</th>
    <th>жанр</th>
    <th>рік створення</th>
    <th>бюджет фільму</th>
    <th>режисера</th>
    </tr>
    </thead> <tbody>";

    if (isset($_POST['send'])){
    $country=$_POST['country'];
    }
        if ($_POST['country']){
    //$country=$_POST['country'];
    foreach ($sentences as $value){    
        if ($value[1]==$country){
            
				
				 
			$summ+=$value[4];
            $count++;
            //$zminnamas[]=$country;
			
            echo "<tr>";
            foreach ($value as $smena)
            {
                echo "<td>".$smena."</td>";				
            }
             echo "</tr>";
		$my[]=$smena[1];
        }
		
    }   
        $_POST['country']=false;
if (($summ)&&(count($my)>1)){
	 echo "<tr>";
    echo "<td>"."<b>Середнье значення бюджета</b> ".$summ/$count."</td>";
	 echo "</tr>";
    }	        
		}
		 

     echo "</tbody></table>  <form method='post' action='index.php'> <select name='country'>";
	
foreach ($duplicat as $duplicates){
    echo "<option value='$duplicates'>$duplicates</option>";    
}
echo "<input type='submit' value='Вибрати' name='send'></select></form>";

 
    ?>
    <html>
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        </head>
        <body>
           
        </body>
    </html>