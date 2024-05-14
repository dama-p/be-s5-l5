<?php

include_once __DIR__ . '/Signup.php';

class SignupControls extends Signup {

    // proprità dentro la classe:
    private $username;
    private $password;
    private $pwrepeat;
    private $email;

    //proprietà che prendiamo dall'user
    public function __construct($username, $password, $pwrepeat, $email) {
        //dobbiamo dire che le due proprietà corrispondono
        $this->username = $username;
        $this->password = $password;
        $this->pwrepeat = $pwrepeat;
        $this->email = $email;
    }

    //controlliamo se gli input sono vuoti
    private function emptyInput($username, $password, $pwrepeat, $email) {
        $result = false;
        if(empty($this->$username) || empty($this->$password) || empty($this->$pwrepeat) || empty($this->$email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


    //controllo per email invalida
    private function invalidEmail($email) {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        } 
        return $result;
    }

    //controllo per matchare la pw
    private function pwMatch() {
        $result = false;
        if($this->password !== $this->pwrepeat) {
            $result = false;
        } else {
            $result = true;
        } 
        return $result;
    }

    //controllo per user già esistente
    private function userExists() {
        $result = false;
        if(!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        } 
        return $result;
    }

    //Stabiliamo cosa succede se si passano tutti i controlli stabiliti precedentemente
    private function signupUser($username, $password, $pwrepeat, $email) {
        if($this->emptyInput($username, $password, $pwrepeat, $email) === false) {
            //echo "Empty input!";
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        if($this->invalidEmail($email) === false) {
            //echo "Invalid Email";
            header("location: ../index.php?error=invalidEmail");
            exit();
        }

        if($this->pwMatch() === false) {
            //echo "Passwords do not match";
            header("location: ../index.php?error=passwordsUnmatched");
            exit();
        }

        if($this->userExists() === false) {
            //echo "User already exists";
            header("location: ../index.php?error=userTaken");
            exit();
        }
    }

}