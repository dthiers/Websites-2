<html>

<head>
	<title>Databases</title>
</head>

<body>
	<?php
		/**
		 * Antwoorden onderdeel B:
		 * 1: http://www.php.net/manual/en/book.mysqli.php
		 * 2: Uitleg over fetch_assoc -> http://www.php.net/manual/en/mysqli-result.fetch-assoc.php
		 *    Uitleg over fetch_array -> http://www.php.net/manual/en/mysqli-result.fetch-array.php
		 * 3: Zie onderstaande code
		 * 4: Er zijn vele mogelijkheden.
	 	 */ 
    
		// connectie leggen met de database
		$conn = new mysqli('localhost', 'root', '', 'webs2_pr_wk2');
		
		// gaat er iets mis? Breek het script af.
		if ($conn->connect_errno != 0) //er gaat iets fout ...
		{
			die("Probleem bij het leggen van connectie of selecteren van database");
		}
		
		echo 'Connectie met db server gemaakt.<br />';
		echo 'Database geselecteerd.<br /><br />';
	
		$query = "SELECT * FROM ws_gebruikers";
		// executeer de query en geef het resultaat terug
		$result = $conn->query($query);
	
		echo "Gebruiker presenteren via fetch_array()<br />";
		echo "<table cellpadding=\"2\" border=\"1\">";
		echo "<tr><th>Id</th><th>Voornaam</th><th>Achternaam</th></tr>";
		
		// heel elke rij op in een associatief array
		while ($row = $result->fetch_array())
		{
			echo "<tr>";
		
			$id = $row[0];
			$voornaam = $row[1];
			$achternaam = $row[2];
			echo "<td>$id</td><td>$voornaam</td><td>$achternaam</td>";
		
			echo "</tr>";
		}
		
		echo "</table><br />";
		
		$result->close();
		$result = $conn->query($query);
		
		echo "Gebruiker presenteren via fetch_object()<br />";
		echo "<table cellpadding=\"2\" border=\"1\">";
		echo "<tr><th>Id</th><th>Voornaam</th><th>Achternaam</th></tr>";
		
		// heel elke rij op in een associatief array
		while ($row = $result->fetch_object())
		{		
			echo "<tr>";
		
			$id = $row->geb_id;
			$voornaam = $row->geb_voornaam;
			$achternaam = $row->geb_achternaam;
			echo "<td>$id</td><td>$voornaam</td><td>$achternaam</td>";
		
			echo "</tr>";
		}
		
		echo "</table><br />";
		
		echo 'Gebruikers aantallen via 1 resultaat.<br />';
		echo 'Het aantal gebruikers is: ' . $result->num_rows;
		// geef het geheugen vrij van het resultaat
		$result->close();
		// sluit de connectie
		$conn->close();	
		
		// alle resources worden altijd vrijgegeven als het script klaar is.
	?>
    
    
</body>

</html>