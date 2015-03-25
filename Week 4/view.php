<html>

<head>
	<title>Databases en OOP</title>
</head>

<body>
	<?php /*
		// voeg een gebruiker toe
		$query = "
			INSERT INTO wsphp_gebruikers (geb_voornaam, geb_achternaam)
			VALUE ('New', 'Teach')";
		$db->doSQL($query);

		// lees alle gebruikers uit
		$query = "
			SELECT *
			FROM wsphp_gebruikers";
		$db->doSQL($query);
         * 
         */
        ?>
        <?php 
        function show_gebruikers($gebruikers) { 
        ?>    
            <table>
                <tr>
                        <th>Id</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                </tr>
                <?php foreach($gebruikers as $gebruiker) {?>
                <tr>
                    <td><?php echo $gebruiker->getId(); ?></td>
                    <td><?php echo $gebruiker->getVoornaam(); ?></td>
                    <td><?php echo $gebruiker->getAchternaam(); ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php
        }
        ?>
    
    
</body>

</html>