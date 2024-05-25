<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: locationDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 15, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of locationDAO: function for location model 
 * 
 */
session_start();
require_once('abstractDAO.php');
require_once('../model/location.php');
class LocationDAO extends abstractDAO
{

    public function getAllLocationsForUserSelection()
    {
        $userId =  $_SESSION["user_id"];
        $location = array();

        if (!$this->mysqli->connect_errno) {
            $stmt = $this->mysqli->prepare('SELECT lp.id, lp.locationname FROM locations lp
            WHERE lp.id NOT IN (
                SELECT wp.locationid FROM waitlist_preferences wp
                WHERE wp.userid = ?
            )');
            $stmt->bind_param('i', $userId);
            $stmt->execute();

            $result = $stmt->get_result();



            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $locationItem = new Location(
                    $row['id'],
                    $row['locationname']

                );
                $location[] = $locationItem;
            }

            $stmt->close();
        }

        return $location;
    }
}
?>