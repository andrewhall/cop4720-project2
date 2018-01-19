<html>
	<header>
		<title>COP4720 - Project 2</title>
		<link rel="stylesheet" type="text/css" href="../../cop4813/mystyle.css">
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
				<p>Enter a partial title to search:</p>
				<input type="hidden" name="action" value="andrew1">
				<input type="text" name="parameter"  placeholder="Film to search">
				<input type="submit" value="Submit">
			</form>
			
			<form action="results.php" method="post">
				<p>Select a director to view their films:</p>
				<input type="hidden" name="action" value="andrew2">

				<?php
					//connection info
					$servername = "localhost";
					$username = "n00194802";
					$password = "fall2017194802";
					$dbname = "n00194802";
					
					
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						//prepare sql
						$stmt = $conn->prepare("SELECT CONCAT(director_firstname, ' ', director_lastname) AS 'Director' FROM Directors;");
						$stmt->execute();
						$data = $stmt -> fetchAll();
						
						$conn = null;
					
						
					} catch (PDOException $e) {
							echo "Error: " . $e->getMessage();
					}
					
				?>
				
				<select name="parameter">
					<?php foreach ($data as $row): ?>
						<option><?=$row["Director"]?></option>
					<?php endforeach ?>
				</select>
				<input type="submit" value="Submit">
			</form>
		
		<hr>
		
		<h3>Chelsea's Stored Procedures<h3>
		
			<form action="results.php" method="post">
				<p>Select genre to view films:</p>
				<input type="hidden" name="action" value="chelsea1">
				<select name="parameter">
						<option value="Action">Action</option>
						<option value="Adventure">Adventure</option>
						<option value="Comedy">Comedy</option>
						<option value="Drama">Drama</option>
						<option value="Horror">Horror</option>
						<option value="Thriller">Thriller</option>
				<input type="submit" value="Submit">
			</form>
			
			<form action="results.php" method="post">
				<p>Select rating to view films:</p>
				<input type="hidden" name="action" value="chelsea2">
				<input type="radio" name="parameter" value="G"> G<br>
				<input type="radio" name="parameter" value="PG"> PG<br>
				<input type="radio" name="parameter" value="PG-13"> PG-13<br>
				<input type="radio" name="parameter" value="R"> R<br>
				<input type="submit" value="Submit">
			</form>
		
		<hr>
		
		<h3>Christian's Stored Procedures<h3>
		
			<form action="results.php" method="post">
				<p>Select a year to view which actors were born then:</p>
				<input type="hidden" name="action" value="christian1">
				<?php
					//connection info
					$servername = "localhost";
					$username = "n00194802";
					$password = "fall2017194802";
					$dbname = "n00194802";
					
					
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						//prepare sql
						$stmt = $conn->prepare("SELECT DISTINCT YEAR(actor_dob) AS 'Year' FROM Actors ORDER BY YEAR(actor_dob);");
						$stmt->execute();
						$data = $stmt -> fetchAll();
						
						$conn = null;
					
						
					} catch (PDOException $e) {
							echo "Error: " . $e->getMessage();
					}
					
				?>
				
				<select name="parameter">
					<?php foreach ($data as $row): ?>
						<option><?=$row["Year"]?></option>
					<?php endforeach ?>
				</select>
				<input type="submit" value="Submit">
			</form>
			
			<form action="results.php" method="post">
				<p>Enter a partial role to search:</p>
				<input type="hidden" name="action" value="christian2">
				<input type="text" name="parameter"  placeholder="Role to search">
				<input type="submit" value="Submit">
			</form>
		
	</body>
</html>