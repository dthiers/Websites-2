<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 12:44
 */

class Blog {

    private $id;
    private $username;
    private $title;
    private $text;

    function __construct($id, $username, $title, $text)
    {
        $this->id = $id;
        $this->username = $username;
        $this->title = $title;
        $this->text = $text;
    }


    static function getBlog()
    {
        $db = Database::getDatabase();

        $result = $db->getBlog();

        $posts = array();
        while($row = $result->fetch_assoc()){
            $id = $row['Id'];
            $username = $row['Username'];
            $title = $row['Title'];
            $text = $row['Text'];

            $post = new Blog($id, $username, $title, $text);

            $posts[] = $post;
        };

        return $posts;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

}