<!DOCTYPE html>
<?php 
	include 'DatabasesEnOOP.database.class.php';
        include './Gebruiker.class.php';
        include './view.php';
        
	$db = Database::getDatabase();
        
        $gebruikers = Gebruiker::get_gebruikers();
        
        show_gebruikers($gebruikers);
        
?>
