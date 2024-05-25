<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: location.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 14, 2023
 * Date Modified: Nov 15, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description : model a location data
 * 
 */
class Location
{
    private $id;
    private $locationname;


    public function __construct($id, $locationname)
    {
        $this->setId($id);
        $this->setLocationName($locationname);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLocationName()
    {
        return $this->locationname;
    }

    public function setLocationName($locationname)
    {
        $this->locationname = $locationname;
    }
}
?>