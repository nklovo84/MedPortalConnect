<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: waitlistPreference.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 14, 2023
 * Date Modified: Nov 15, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description : model a waitlistPreference data
 * 
 */
class WaitlistPreference
{
    private $id;
    private $locationid;
    private $userid;
    private $locationname;
    public function __construct($id, $locationid, $locationname, $userid)
    {
        $this->setId($id);
        $this->setLocationId($locationid);
        $this->setUserId($userid);
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

    public function getLocationId()
    {
        return $this->locationid;
    }

    public function setLocationId($locationid)
    {
        $this->locationid = $locationid;
    }

    public function getuserId()
    {
        return $this->userid;
    }

    public function setUserId($userid)
    {
        $this->userid = $userid;
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