<html>
	<header>
		<title>COP4720 - Project 2</title>
		<link rel="stylesheet" type="text/css" href="../../cop4813/mystyle.css">
		<script language="javascript" type="text/javascript">
			function FilmsByGenre(){
				var ajaxRequest;
	
				//Browser support code 
				try{
					//Opera 8.0+, Firefox, or Safari
					ajaxRequest = new XMLHttpRequest();
				} catch (e){
				//Microsoft browsers 
				try{
					ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
				//Browser not supported 
				alert("ERROR! Your browser is not supported...");
				return false;
						}
					}
				}	
	
				//Receive data sent from the server
				ajaxRequest.onreadystatechange = function(){
				if(ajaxRequest.readyState == 4){
					document.getElementById("GenreOuput").innerHTML = ajaxRequest.responseText;
					}
				}
	
				var selection = document.myForm.listFilmsByGenre.value;
				ajaxRequest.open("GET", "ViewFilmsInGenreProcedure.php?selection=" + selection, true);
				ajaxRequest.send(null); 
			}
	</script>
	</header>
	
	<body>
	
		<h1>
		Fall 2017<br>
		COP4720<br>
		Project 2<br>
		</h1>
		
		<h2>Interacting with Database using Stored Procedures</h2>
		
		<hr>

		<h3>Andrew's Stored Procedures</h3>
		
			<form action="results.php" method="post">
				
				<input type="hidden" name="action" value="andrew1">
				<!-- Selector relevant to stored proc parameter -->
				<input type="submit" value="Submit">
			</form>
			
			<form action="results.php" method="post">
				
				<input type="hidden" name="action" value="andrew2">
				<!-- Selector relevant to stored proc parameter -->
				<input type="submit" value="Submit">
			</form>
		
		<hr>
		
		<h3>Chelsea's Stored Procedures<h3>
	
		<h2>View Films by Genre</h2>
		<h4 style="text-align: left;">Choose a Genre</h4>
		<form name='myForm'>
			<select name="listFilmsByGenre" onChange="FilmsByGenre()">
			<?php
        		$mysql_access = mysql_connect('localhost', 'n00194802', 'fall2017194802');
        		if (!$mysql_access)
        		{
                		echo "OOPS! Connection failed...";
                		exit;
       			 }
        		mysql_select_db('n00194802');
			$query = "select genre_name from Genres";
			$result = mysql_query($query);
			while ($record = mysql_fetch_array($result) ) {
				echo "<option value='$record[2]'>$record[0] $record[1]</option>";
			}
			mysql_close($mysql_access);
			?>
			</select>
		</form>
		<h4 style="text-align: left;">Films in Genre</h4>
		<p id="GenreOutput" style="text-align: left;"></p>

		<h2>View Films by Rating</h2>
                <h4 style="text-align: left;">Choose a Rating</h4>
                <form name='myForm'>
                        <select name="listFilmsByRating" onChange="ajaxFunction()">
                        <?php
                        $mysql_access = mysql_connect('localhost', 'n00194802', 'fall2017194802');
                        if (!$mysql_access)
                        {
                                echo "OOPS! Connection failed...";
                                exit;
                         }
                        mysql_select_db('n00194802');
                        $query = "select rating_type from Ratings";
                        $result = mysql_query($query);
                        while ($record = mysql_fetch_array($result) ) {
                                echo "<option value='$record[2]'>$record[0] $record[1]</option>";
                        }
                        mysql_close($mysql_access);
                        ?>
                        </select>
                </form>
                <h4 style="text-align: left;">Films in Rating</h4>
                <p id="RatingOutput" style="text-align: left;"></p>


		<hr>
		
		<h3>Christian's Stored Procedures<h3>
		
			<form action="results.php" method="post">
				<input type="hidden" name="action" value="christian1">
				<!-- Get a year from the user -->
				<input type="submit" value="Submit">
			</form>
			
			<form action="results.php" method="post">
				<input type="hidden" name="action" value="christian2">
				<!-- Selector relevant to stored proc parameter -->
				<input type="submit" value="Submit">
			</form>
		
	</body>
</html>
