<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: abstractDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 19, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description:
 * Abstract data access class(Interface). Holds all of the database
 * Stores all the details needed to connect to the database and 
 * sets up a mysqli object as soon as it's created
 * 
 */
class abstractDAO
{
    protected $mysqli;
    protected static $DB_HOST = "127.0.0.1";
    protected static $DB_USERNAME = "MedPortalConnect";
    protected static $DB_PASSWORD = "password";
    protected static $DB_DATABASE = "MedPortalConnect";

    function __construct()
    {
        try {
            $this->mysqli = new mysqli(
                self::$DB_HOST,
                self::$DB_USERNAME,
                self::$DB_PASSWORD,
                self::$DB_DATABASE,
                3306
            );
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    public function getMysqli()
    {
        return $this->mysqli;
    }
}
?>