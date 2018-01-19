<?php
$Genre = $_GET['selection'];

//Connect to database
$pdo = new PDO('localhost', 'n00194802', 'fall2017194802'); 

//Execute stored procedure 
$sql = 'CALL ViewFilmInGenre($Genre)'; 

//Call the stored procedure 
$q = $pdo->query($sql); 
$q->setFetchMode(PDO::FETCH_ASSOC); 

//Display film
while($r = $q->fetch()):
	echo "<b>Film Name:</b> $r['film_name']<br>";
	echo "<b>Certification:</b> $r['genre_name']<br>";
end while; 
?>