<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 21-3-2015
 * Time: 18:11
 */

class Order {
    private $id;
    private $userId;
    private $paid;
    private $date;
    private $paymentDate;
    private $address;
    private $zip;
    private $city;
    private $country;

    function __construct($id, $userId, $paid, $date, $paymentDate, $address, $zip, $city, $country)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->paid = $paid;
        $this->date = $date;
        $this->paymentDate = $paymentDate;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
    }

    //Getters
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getPaid()
    {
        return $this->paid;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    //Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    static function createOrder($userId, $paid, $date, $paymentDate, $address, $zip, $city, $country, $orderedProducts) {
        $db = Database::getDatabase();

        $order = new Order(null, $userId, $paid, $date, $paymentDate, $address, $zip, $city, $country);
        $bool = $db->createOrder($userId, $order);
        foreach ($orderedProducts as $productItem) {
            $db->createProductOrder($productItem->getId());
            $db->updateProductStock($productItem->getId());
        }

        return $bool;
    }

    // get all orders from a user
    static function getAllOrders($userId) {
        $db = Database::getDatabase();

        $orders = array();

        foreach ($db->getAllOrders($userId) as $item) {
            //local
            $orderId = $item['OrderId'];
            $userId = $item['Users_UserId'];
            $paid = $item['Paid'];
            $date = $item['Date'];
            $paymentDate = $item['PaymentDate'];
            $address = $item['Address'];
            $zip = $item['Zip'];
            $city = $item['City'];
            $country = $item['Country'];

            $order = new Order($orderId, $userId, $paid, $date, $paymentDate, $address, $zip, $city, $country);

            //add orders to the array
            $orders[] = $order;
        }

        return $orders;
    }
}