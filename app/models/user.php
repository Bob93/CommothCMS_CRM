<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 25-5-2016
 * Time: 12:07
 */

class User extends Model{

    public $id;
    public $name = 'siisy';
    public $firstname;
    public $insertion;
    public $lastname;
    public $username;
    public $password;
    public $phone;
    public $address;
    public $country;
    public $email;
    public $rights;
    public $active;
    public $ip;
    public $registrationIP;
    public $datesignedup;
    public $lastlogin;
    public $lastlocation;

    public function __construct($id = null)
    {
//        if(!is_null($id)){
//            $this->getAllUserById($id);
//        }
    }

    public function PushInfoTest() {
        return 'yes';
    }

    // alle gebruikers inladen bij het is
    public function getAllUserById($id = null)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            $query = "SELECT UserID FROM Users WHERE UserID = :id";
            $sth = $this->dbh->prepare($query);
            $sth->bindValue(':id', $id);
            $sth->execute();
        }
        catch(Exception $e)
        {
            echo 'Het ophalen van de gebruikers is niet gelukt! ' . $e;
        }

        // alle gebruikers ophalen met een count 1 en hoger. Ze worden weergegeven met de voornaam, achternaam en username.
        if($sth->rowCount() >= 1)
        {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            $this->name = $row->firstname . ' ' . $row->lastname;
            $this->username = $row->username;
            $this->id = $row->id;
        }
    }

    // selecteer 1 user op het id
    public function getSingleUserById($id = null)
    {
        session_start();
        $username = $_GET['username'];

        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            $query = "SELECT UserID FROM users WHERE Username='$username' limit 1";
            $result = $this->dbh->prepare($query);
            $result->execute();
            $value = $result->fetch(PDO::FETCH_OBJ);
            $_SESSION['id'] = $value->id;
        }
        catch(Exception $e)
        {
            echo 'Het ophalen van de gebruiker is niet gelukt! ' . $e;
        }

        $this->id = $_SESSION['id'];

        if($this->id < 1)
        {
            session_die();
        }
    }

    // check of de username al in gebruik is
    public function checkUsername($username)
    {
        $query = "SELECT Username FROM users WHERE Username=`$username`";
        $sth = $this->dbh->prepare($query);
        $sth->execute($query);

        if($_SESSION['username'] == $username)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    // een gebruiker toevoegen aan de database (registratie van de gebruiker/admin)
    public function createUser($firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email,
        $registrationip)
    {
        $rights = 0;
        $active = 1;

        // hashen van het password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // client ip adres opvragen
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            // insertion query met prepare en execute statments
            $query = "INSERT INTO users (`Firstname`, `Insertion`, `Lastname`, `Username`, `Password`, `Phone`, `Address`,
          `Country`, `Email`, `Rights`, `Active`, `IP`, `RegistrationIP`, `DateSignedUp`, `LastLogin`, `LastLocation`) VALUES (`$firstname`,
          `$insertion`, `$lastname`, `$username`, `$hashed_password`, `$phone`, `$address`, `$country`, `$email`, `$rights`,
          `$active`, `$ip`, `$registrationip`, NOW(), NOW(), NULL )";
            $sth = $this->dbh->prepare($query);
            $sth->execute();
        }
        catch(Exception $e)
        {
            echo 'Het nieuwe account is niet aangemaakt! ' . $e;
        }
    }

    // aanpassingen van een gebruiker
    public function updateUser($id, $firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email, $rights,
                               $active)
    {
        // get het id van de gebruiker
        $this->getAllUserById($id);

        // het nieuwe of aangepaste wachtwoord opnieuw hashen voor het wordt opgeslagen.
        $new_hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // client ip adres opvragen
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try
        {
            // Updaten van de database, tabel users
            $query = "UPDATE users SET `Firstname`=`$firstname`, `Insertion`=`$insertion`, `Lastname`=`$lastname`, `Username`=`$username`,
           `Password`=`$new_hashed_password`, `Phone`=`$phone`, `Address`=`$address`, `Country`=`$country`, `Email`=`$email`,
           `Rights`=`$rights`, `Active`=`$active`, `IP`=`$ip`, `LastLogin`=NOW(), `LastLocation`=NULL";
            $sth = $this->dbh->prepare($query);
            $sth->execute();
        }
        catch(Exception $e)
        {
            echo 'Er is iets fout gegaan in de verwerking! ' . $e;
        }
    }

    // Door het verwijderen van de gebruiker wordt active op 0 gezet. Hij blijft dan nog wel in de database staan maar kan niet worden
    // gebruikt.
    public function deleteUser($id, $active = 0)
    {
        $this->getSingleUserById($id);

        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try {
            $query = "UPDATE users SET `Active`=`$active`";
            $sth = $this->dhb->prepare($query);
            $sth->execute();
        }
        catch(Exception $e)
        {
            echo 'De gebruiker is niet verwijderd! ' . $e;
        }
    }


}