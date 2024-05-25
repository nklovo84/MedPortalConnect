<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: waitlistPreferenceDAO.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 16, 2023
 * Date Modified: Nov 20, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description of waitlistPreferenceDAO: function for waitlistPreference model
 * 
 */
session_start();
require_once('abstractDAO.php');
require_once('../model/waitlistPreference.php');
error_reporting(0);

class WaitlistPreferenceDAO extends abstractDAO
{

    function __construct()
    {
        try {
            parent::__construct();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }
    public function getwaitlistPreferenceByUserId()
    {
        $userId =  $_SESSION["user_id"];
        $stmt = $this->mysqli->prepare('SELECT wp.id, wp.locationid, lp.locationname, wp.userid FROM waitlist_preferences wp
            JOIN locations lp ON wp.locationid = lp.id
            WHERE wp.userid = ?');
        $stmt->bind_param('i', $userId);

        $stmt->execute();

        $result = $stmt->get_result();

        $locations = array();

        while ($row = $result->fetch_assoc()) {
            $location = new WaitlistPreference($row['id'], $row['locationid'], $row['locationname'], $row['userid']);
            $locations[] = $location;
        }

        $stmt->close();

        return $locations;
    }



    public function updateWaitlistPreference($locationId, $userId)
    {
        $existingPreference = $this->getWaitlistPreferenceByUserId($userId);

        if ($existingPreference) {
            $this->deleteUserWaitlistByLocationId($userId);
            $stmt = $this->mysqli->prepare('UPDATE waitlist_preferences SET locationid = ? WHERE userid = ?');
            $stmt->bind_param('ii', $locationId, $userId);
            $stmt->execute();
            $stmt->close();
        } else {
            $stmt = $this->mysqli->prepare('INSERT INTO waitlist_preferences (locationid, userid) VALUES (?, ?)');
            $stmt->bind_param('ii', $locationId, $userId);
            $stmt->execute();
            $stmt->close();
        }
        $this->insertRandomUserWaitlist($locationId, $userId);
    }

    private function insertRandomUserWaitlist($locationId, $userId)
    {
        $providerIds = $this->getProviderIdsByLocationId($locationId);
        shuffle($providerIds);
        $stmt = $this->mysqli->prepare('INSERT INTO user_waitlist (providerid, position, status, estimatewaittime, userid) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('iisii', $providerId, $position, $status, $estimateWaitTime, $userId);
        $status = 'Pending';
        foreach ($providerIds as $providerId) {
            $position = mt_rand(1, 100);
            $estimateWaitTime =  mt_rand(1, 100);
            $stmt->execute();
        }

        $stmt->close();
    }

    private function getProviderIdsByLocationId($locationId, $limit = 3)
    {
        $stmt = $this->mysqli->prepare('SELECT id FROM providers WHERE locationid = ? ORDER BY RAND() LIMIT ?');
        $stmt->bind_param('ii', $locationId, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $providerIds = [];
        while ($row = $result->fetch_assoc()) {
            $providerIds[] = $row['id'];
        }

        $stmt->close();

        return $providerIds;
    }
    private function deleteUserWaitlistByLocationId($userId)
    {
        $stmt = $this->mysqli->prepare('DELETE FROM user_waitlist WHERE userid = ?');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->close();
    }
}
?>