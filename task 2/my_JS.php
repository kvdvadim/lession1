<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
								
								<!-- Latest compiled JavaScript -->
								<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
								
								<script type="text/javascript">
								$(document).ready(function(){
								$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
								localStorage.setItem('activeTab', $(e.target).attr('href'));
								});
								var activeTab = localStorage.getItem('activeTab');
								if(activeTab){
								$('#myTab a[href="' + activeTab + '"]').parent().addClass("active");
								$(activeTab).addClass("in active");
								} else {
								$('#home').addClass("in active");
								}
								});
								
								</script>
								
								<?php
								include "connect.php";?> 
								
								
								
								
								</body>
								</html>	
								<script>
								$(document).ready(function(){  
								$("#finds").click(function(){
								var find_name=$("#find").val();
								var find_studio=$("#find_studios").val();  
								var find_movies=$("#find_movie").val();  
								
								$.ajax({  
								url:"add.php",  
								method:"POST",  
								data:{find:find_name,find_studios:find_studio,find_movie:find_movies},  
								dataType:"html",  
								success:function(data)  
								{  
								$("#output_find").html(data);  
								}
								});  
								}); 
								$("#findDirector").click(function(){
								var showMovies=$("#showDirector").val();
								var showSorts=$("#showSort").val();
								
								$.ajax({  
								url:"add.php",  
								method:"POST",  
								data:{movies_show:showMovies,showSort:showSorts},  
								dataType:"html",  
								success:function(data)  
								{  
								$("#output_find_movie").html(data);  
								}
								});  
								});     
								$("#show_category").click(function(){
								var shows=$("#show").val();                     
								$.ajax({  
								url:"add.php",  
								method:"POST",  
								data:{show:shows},  
								dataType:"html",  
								success:function(data)  
								{  
								$("#output_shows").html(data);  
								}
								});  
								}); 
								$("#delet_movie").click(function(){
								var movie=$("#change_movie").val();           
								$.ajax({  
								url:"add.php",  
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
								url:"add.php",  
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
								url:"add.php",  
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