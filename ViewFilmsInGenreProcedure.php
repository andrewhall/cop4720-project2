
        <?php
		$Genre = $_GET['selection'];
		$host = localhost; 
		$dnname = n00194802;
		$username = n00194802; 
		$password = fall2017194802; 
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // execute the stored procedure
        $sql = 'CALL ViewFilmsInGenre($Genre)';
        // call the stored procedure
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        echo "<table>"
            echo "<tr>"
                echo "<th>Film</th>"
                echo "<th>Genre</th>"
            echo "</tr>"
            while ($r = $q->fetch()):
                echo "<tr>"
                    echo "<td>$r['film_name']</td>"
                    echo "<td>$r['genre_name']</td>"
                echo "</tr>"
            endwhile;
        </table>
		?>