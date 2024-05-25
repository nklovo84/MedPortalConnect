<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: providerDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 15, 2023
 * Date Modified: Nov 19, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of providerDAO: function for provider model.
 * 
 */
session_start();
require_once('abstractDAO.php');
require_once('../model/provider.php');
class ProviderDAO extends abstractDAO {


    public function getProviderNameById($providerId) {
        $query = "SELECT providername FROM providers WHERE id = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $providerId);
        $stmt->execute();
        $stmt->bind_result($providerName);
        
        if ($stmt->fetch()) {
            return $providerName;
        }

        return null;
    }

    public function getAllProviderNameByLocationId($locationId) {
        $providers = array();
        $userid =  $_SESSION["user_id"];
        if (!$this->mysqli->connect_errno) {
            $query = 'SELECT * FROM providers WHERE locationid = ? AND NOT EXISTS (
                SELECT 1 
                FROM user_waitlist 
                WHERE user_waitlist.providerid = providers.id 
                AND user_waitlist.userid = ?
            )';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ii', $locationId,$userid);
            
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $provider = new Provider(
                    $row['id'],
                    $row['providername'],
                    $row['locationid']
                );
                $providers[] = $provider;
            }

            $stmt->close();
        }

        return $providers;
    }
}

?>
