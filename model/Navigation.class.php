<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 25/03/15
 * Time: 13:13
 */

class Navigation {

    private $id;
    private $label;
    private $link;
    private $parent;
    private $sort;


    function __construct($id, $label, $link, $parent, $sort)
    {
        $this->label = $label;
        $this->link = $link;
        $this->parent = $parent;
        $this->sort = $sort;
        $this->id = $id;
    }

    static function getNavigation(){
        $db = Database::getDatabase();

        $result = $db->getNavigation();

        $nav = array();
        while ($row = $result->fetch_assoc()){
            $id = $row['NavigationId'];
            $label = $row['Label'];
            $link = $row['Link'];
            $parent = $row['Parent'];
            $sort = $row['Sort'];

            $navigation = new Navigation($id, $label, $link, $parent, $sort);

            $nav[] = $navigation;
        };

        return $nav;
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param mixed $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }



}