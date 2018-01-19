<html>
	<header>
		<title>COP4720 - Project 2</title>
		<link rel="stylesheet" type="text/css" href="../../cop4813/mystyle.css">
		
		<?php
			//connection info
			$servername = "localhost";
			$username = "n00194802";
			$password = "fall2017194802";
			$dbname = "n00194802";
			
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$selector = $_POST['action'];
				$parameter = $_POST['parameter'];

				switch ($selector) {
					case "andrew1":
						$stmt = $conn->prepare("CALL usp_filmsByName('$parameter');");
						break;
					case "andrew2":
						$stmt = $conn->prepare("CALL usp_filmsByDirector('$parameter');"); 
						break;
					case "chelsea1":
						$stmt = $conn->prepare("CALL ViewFilmsInGenres('$parameter')");
						break;
					case "chelsea2":
						$stmt = $conn->prepare("CALL ViewFilmsByRatings('$parameter')");
						break;
					case "christian1":
						$stmt = $conn->prepare("CALL usp_actorsByYear($parameter);");		
						break;
					case "christian2":
						$stmt = $conn->prepare("CALL usp_actorsByRole('$parameter');"); 
						break;
				}
				
				//get SQL results
				$stmt->execute();
				$result = $stmt;
				
				
			} catch (PDOException $e) {
					echo "Error: " . $e->getMessage();
			}
		?>
		
		
	</header>
	
	<body>
	
		<h1>
		Fall 2017<br>
		COP4720<br>
		Project 2<br>
		</h1>
		
		<p><a class="one" href="index.php">Return</a></p>
		
		<h2>Results</h2>
		
		<hr>
		
		<form action="" method="post" name="myForm">
			
			<!-- Table headers looped through and created dynamically -->
			<?php
				
				//get width of result
				$colcount = $stmt->columnCount();
				
				echo "<table border='1'><tr>";
	
				// Display the result column names
				for ($i = 0; $i < $colcount; $i++) {
					$col = $stmt->getColumnMeta($i);
					echo "<th>" . $col['name'] . "</th>";
				}
				echo "</tr>";
				
				//<!-- Display each row of result -->
				foreach($result as $row)
				{
					echo "<tr>";
						for ($x = 0; $x < $colcount; $x++) {
							echo "<td>" . $row[$x] . "</td>";	
						}
					echo "</tr>";
				}
				echo "</table>";
				
				$conn = null
			?>
		</form>

		
	</body>
</html>
