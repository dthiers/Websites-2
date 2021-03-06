<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 17-3-2015
 * Time: 22:29
 */

class User {
    private $id;
    private $username;
    private $password;
    private $email;
    private $phone;
    private $firstName;
    private $lastName;
    private $address;
    private $zip;
    private $city;
    private $country;

    //constructor
    function __construct($id, $username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
    }

    //Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getZip() {
        return $this->zip;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCountry() {
        return $this->country;
    }

    //Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setZip($zip) {
        $this->zip = $zip;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    static function createUser($username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country) {
        $db = Database::getDatabase();
        $user = new User(null, $username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);
        $return = $db->createUser($user);

        return $return;
    }

    static function checkLogin($username, $password) {
        $return = "";
        $db = Database::getDatabase();
        if ($db->checkUser($username, $password)) {
            $result = $db->getUser($username);

            //local variables
            $id = $result[0]['UserId'];
            $username = $result[0]['Username'];
            $password = $result[0]['Password'];
            $email = $result[0]['Email'];
            $phone = $result[0]['Phone'];
            $firstName = $result[0]['FirstName'];
            $lastName = $result[0]['LastName'];
            $address = $result[0]['Address'];
            $zip = $result[0]['Zip'];
            $city = $result[0]['City'];
            $country = $result[0]['Country'];

            $user = new User($id, $username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);

            $return = $user;
        }

        return $return;
    }

    static function getUser($username) {
        $db = Database::getDatabase();
        $user = $db->getUser($username);

        //local variables
        $id = $user[0]['UserId'];
        $username = $user[0]['Username'];
        $password = $user[0]['Password'];
        $email = $user[0]['Email'];
        $phone = $user[0]['Phone'];
        $firstName = $user[0]['FirstName'];
        $lastName = $user[0]['LastName'];
        $address = $user[0]['Address'];
        $zip = $user[0]['Zip'];
        $city = $user[0]['City'];
        $country = $user[0]['Country'];

        $returnUser = new User($id, $username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);

        return $returnUser;
    }

    static function getUserById($userId) {
        $db = Database::getDatabase();
        $user = $db->getUserById($userId);

        //local variables
        $id = $user[0]['UserId'];
        $username = $user[0]['Username'];
        $password = $user[0]['Password'];
        $email = $user[0]['Email'];
        $phone = $user[0]['Phone'];
        $firstName = $user[0]['FirstName'];
        $lastName = $user[0]['LastName'];
        $address = $user[0]['Address'];
        $zip = $user[0]['Zip'];
        $city = $user[0]['City'];
        $country = $user[0]['Country'];

        $returnUser = new User($id, $username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);

        return $returnUser;
    }
}