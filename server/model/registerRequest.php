<?php
/**
 * @author Pawinee Mahantamak Student number 041095866
 * Course: CST8285  
 * Lab Section: 331
 * Assesment: Assignment2 
 * File Name: registerRequest.php
 * Professor: Malek El-Kouzi
 * Date Created: Nov 14, 2023
 * Date Modified: Nov 15, 2023
 * Due Date: Nov 26, 2023
 * Version: 1.0
 * Description : model a registerRequest data
 * 
 */
	class RegisterRequest{
		private $username;
		private $password;
		private $firstname;
		private $lastname;
		private $dateofbirth;
		private $email;
		private $phonenumber;
		private $gender;
		private $healthcardno;
		private $versioncode;
		private $cardexpirydate;

		function __construct($username, $password,$firstname,$lastname,$dateofbirth,$email,$phonenumber,$gender,$healthcardno,$versioncode,$cardexpirydate){
			$this->setUsername($username);
			$this->setPassword($password);
			$this->setFirstname($firstname);
			$this->setLastName($lastname);
			$this->setDateOfBirth($dateofbirth);
			$this->setEmail($email);
			$this->setPhonenumber($phonenumber);
			$this->setGender($gender);
			$this->setHealthcardno($healthcardno);
			$this->setVersioncode($versioncode);
			$this->setCardExpiryDate($cardexpirydate);
		}
		
		public function getUsername(){
			return $this->username;
		}
		
		public function setUsername($username){
			$this->username = $username;
		}
		public function getPassword(){
			return $this->password;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
		public function getFirstName(){
			return $this->firstname;
		}
		
		public function setFirstName($firstname){
			$this->firstname = $firstname;
		}
		public function getLastName(){
			return $this->lastname;
		}
		
		public function setLastName($lastname){
			$this->lastname = $lastname;
		}
		public function getDateOfBirth(){
			return $this->dateofbirth;
		}
		
		public function setDateOfBirth($dateofbirth){
			$this->dateofbirth = $dateofbirth;
		}

		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setPhonenumber($phonenumber){
			$this->phonenumber = $phonenumber;
		}

		public function getPhonenumber(){
			return $this->phonenumber;
		}
		
		
		public function getGender(){
			return $this->gender;
		}
		
		public function setGender($gender){
			$this->gender = $gender;
		}
		public function getHealthcardno(){
			return $this->healthcardno;
		}
		
		public function setHealthcardno($healthcardno){
			$this->healthcardno = $healthcardno;
		}
		public function getVersioncode(){
			return $this->versioncode;
		}
		
		public function setVersioncode($versioncode){
			$this->versioncode = $versioncode;
		}
		public function getCardExpiryDate(){
			return $this->cardexpirydate;
		}
		
		public function setCardExpiryDate($cardexpirydate){
			$this->cardexpirydate = $cardexpirydate;
		}
		
	}
?>