<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: provider.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 14, 2023
 * Date Modified: Nov 15, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description : model a provider data
 * 
 */
class Provider {
    private $id;
    private $providerName;
    private $locationId;

    public function __construct($id, $providerName, $locationId) {
        $this->setId($id);
        $this->setProviderName($providerName);
        $this->setLocationId($locationId);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getProviderName() {
        return $this->providerName;
    }

    public function setProviderName($providerName) {
        $this->providerName = $providerName;
    }

    public function getLocationId() {
        return $this->locationId;
    }

    public function setLocationId($locationId) {
        $this->locationId = $locationId;
    }
}

?>
