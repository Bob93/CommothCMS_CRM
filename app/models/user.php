<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 25-5-2016
 * Time: 12:07
 */

class User extends Model{

    public $id;
    public $name;
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
        parent::__construct();
        if(!is_null($id)){
           $this->getAllUserById($id);
        }
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

            // alle gebruikers ophalen met een count 1 en hoger. Ze worden weergegeven met de voornaam, achternaam en username.
            if($sth->rowCount() >= 1)
            {
                $row = $sth->fetch(PDO::FETCH_OBJ);
                $this->name = $row->firstname . ' ' . $row->lastname;
                $this->username = $row->username;
                $this->id = $row->id;

                return $row;
            }
            else
            {
                return 'Het ophalen van de gebruiker is mislukt.';
            }
        }
        catch(Exception $e)
        {
            return 'Het ophalen van de gebruiker is niet gelukt! ' . $e;
        }

    }

    // alle users opgehaald uit de users tabel
    public function getAllUsers($offset = 0)
    {
        $offset = $offset * 10;
        $query = "SELECT * FROM users WHERE Active = 1 LIMIT 9 OFFSET :offset";
        $sth = $this->dbh->prepare($query);
        $sth->bindValue(':offset',(int) $offset, PDO::PARAM_INT );
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchUsers($term = null) {
        $term = "%$term%";
        $query = "SELECT * FROM `users` WHERE Lastname LIKE :term OR FirstName LIKE :term OR Username LIKE :term";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':term', $term);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAllUsers() {
        $query = "SELECT * FROM users WHERE Active = 1";
        $sth = $this->dbh->prepare($query);
        $sth->execute();

        return $sth->rowCount();
    }

    // user wordt geselecteerd op wijze van id.
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE UserID=:id";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    // check of de username al in gebruik is
    public function checkUsername($username)
    {
        $query = "SELECT Username FROM users WHERE Username=:username";
        $sth = $this->dbh->prepare($query);
        $sth->bindParam(':username', $username);
        $sth->execute();

        if($sth->rowCount() >= 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    // check of het wachtwoord overeen komt
    public function checkPassword($password, $password_redo)
    {
        $hashed_password = md5($password);

        $check_hash = md5($password_redo);

        if($hashed_password == $check_hash)
        {
            return true;
        }
        else
        {
           return false;
        }
    }

    // een gebruiker toevoegen aan de database (registratie van de gebruiker/admin)
    public function createUser($firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email)
    {
        $rights = 0;
        $active = 1;

        // hashen van het password
        $hashed_password = md5($password);

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
            $query = "INSERT INTO users (`FirstName`, `Insertion`, `Lastname`, `Username`, `Password`,
                `Phone`, `Address`, `Country`, `Email`, `Rights`, `Active`, `BanTime`, `IP`, `RegistrationIP`, `DateSignedUp`,
                `LastLogin`, `LastLocation`) VALUES ('$firstname' ,'$insertion', '$lastname', '$username', '$hashed_password',
                '$phone', '$address', '$country', '$email', '$rights', '$active', NOW() , '$ip', '$ip', NOW(), NULL, NULL )";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':firstname', $firstname);
            $sth->bindParam(':insertion', $insertion);
            $sth->bindParam(':lastname', $lastname);
            $sth->bindParam(':username', $username);
            $sth->bindParam(':password', $hashed_password);
            $sth->bindParam(':phone', $phone);
            $sth->bindParam(':address', $address);
            $sth->bindParam(':country', $country);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':rights', $rights);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':ip', $ip);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'Het nieuwe account is niet aangemaakt! ' . $e->getMessage();
        }
    }

    // aanpassingen van een gebruiker
    public function updateUser($firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email, $rights,
                               $active, $bantime)
    {
        // het nieuwe of aangepaste wachtwoord opnieuw hashen voor het wordt opgeslagen.
        $hashed_password = md5($password);

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
            $query = "UPDATE users SET FirstName=:firstname AND Insertion=:insertion AND Lastname=:lastname AND
                Username=:username AND Password=:password AND Phone=:phone AND Address=:address AND
                Country=:country AND Email=:email AND Rights=:rights AND Active=:active AND BanTime=:bantime AND IP=:ip AND RegistrationIP=:ip AND
                DateSignedUp=NOW() AND LastLogin=NOW() AND LastLocation=NULL WHERE UserID=:id";

            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':firstname', $firstname);
            $sth->bindParam(':insertion', $insertion);
            $sth->bindParam(':lastname', $lastname);
            $sth->bindParam(':username', $username);
            $sth->bindParam(':password', $hashed_password);
            $sth->bindParam(':phone', $phone);
            $sth->bindParam(':address', $address);
            $sth->bindParam(':country', $country);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':rights', $rights);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':bantime', $bantime);
            $sth->bindParam(':ip', $ip);
            $sth->bindParam(':id', $id);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'Er is iets fout gegaan in de verwerking! ' . $e->getMessage();
        }
    }

    // Door het verwijderen van de gebruiker wordt active op 0 gezet. Hij blijft dan nog wel in de database staan maar kan niet worden
    // gebruikt.
    public function deleteUser($id, $active = 0)
    {
        // proberen de query uit te voeren, als dit niet lukt een error message laten zien.
        try {
            $query = "UPDATE users SET Active=:active WHERE UserId=:id";
            $sth = $this->dbh->prepare($query);
            $sth->bindParam(':active', $active);
            $sth->bindParam(':id', $id);
            $sth->execute();
            return true;
        }
        catch(Exception $e)
        {
            return 'De gebruiker is niet verwijderd! ' . $e->getMessage();
        }
    }


}