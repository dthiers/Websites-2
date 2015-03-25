<?php

class Gebruiker {
    
    private $id;
    private $voornaam;
    private $achternaam; 
    
    //setters
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }
    
    public function setAchternaam($achternaam) {
        $this->achternaam = $achternaam;
    }
    
    //getters
    public function getId() {
        return $this->id;
    }
    
    public function getVoornaam() {
        return $this->voornaam;
    }
    
    public function getAchternaam() {
        return $this->achternaam;
    }
    
    public static function get_gebruikers() {
        
        $query = "SELECT * FROM wsphp_gebruikers";
        
        $database = Database::getDatabase();
        $database->doSQL($query);
        
        $gebruikers = array();
        
        while ($row = $database->readRecord()) {
            $gebruiker = new Gebruiker();
            
            $gebruiker->setId($row['geb_id']);
            $gebruiker->setVoornaam($row['geb_voornaam']);
            $gebruiker->setAchternaam($row['geb_achternaam']);
            
            $gebruikers[] = $gebruiker;
        }
        return $gebruikers;
    }
    
    public static function get_gebruikers_id($id) {
        $query = "SELECT * FROM wsphp_gebruikers WHERE geb_id >= ".$id;
        
        $database = Database::getDatabase();
        $database->doSQL($query);
        
        $gebruikers = array();
        
        while ($row = $database->readRecord()) {
            $gebruiker = new Gebruiker();
            
            $gebruiker->setId($row['geb_id']);
            $gebruiker->setVoornaam($row['geb_voornaam']);
            $gebruiker->setAchternaam($row['geb_achternaam']);
            
            $gebruikers[] = $gebruiker;
        }
        return $gebruikers;
    }
}
