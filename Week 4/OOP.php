<!DOCTYPE html>
<?php 
	include 'OOP.config.inc.php';
?>
<html>

<head>
	<title>OOP</title>
</head>

<body>
	<?php
		/**
		 * Antwoorden A:
		 * - De destructor wordt aangeroepen als: 
		 * The destructor method will be called as soon as there are no other 
		 * references to a particular object, or in any order during the shutdown sequence.
		 * Te vinden op: http://www.php.net/manual/en/language.oop5.decon.php
		 * - Waarom?: geclaimde resources worden zo vrijgegeven. Connectie, geheugen, enz.
	 	 */ 
    
		foreach ($database as $key => $value)
		{
			echo $key . ' ==> ' . $value . '<br />'; 
		}
		
		// om de inhoud van variabelen te checken is de volgende functie handig
		var_dump($database);
		
    ?>    
    
</body>

</html>