<!DOCTYPE html>
<?php 
	include 'DatabasesEnOOP.database.class.php';
        include './Gebruiker.class.php';
        include './view.php';
        
        $gebruikers = Gebruiker::get_gebruikers_id(18);
        
        show_gebruikers($gebruikers);
        
?>